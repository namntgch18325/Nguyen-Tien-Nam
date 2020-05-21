<?php
    class registermeethost_model extends db_connect
    {
        function CreateQR_Code($HouseID,$Account)
        {
            $newObj = new registermeethost_model();
            require_once './phpqrcode/qrlib.php'; 
            $data = $newObj->GetMeetingValid($HouseID,$Account);
            if($data["Status"] != false)
            {
                $text="http://localhost:8080/NhaTro/Scan/".$HouseID."/".SHA1($Account)."";
               // echo $text;
                $folder="img/";
                $file_name="qr.png";
                $file_name=$folder.$file_name;
                QRcode::png($text,$file_name,10,10);          
                return ["img"=>"<center><img src='/NhaTro/".$file_name."'></center>","Date"=>$data["MeetingDate"]]; 
            }
            else return ["img"=>-1,"Date"=>-1];
        }
        private function GetMeetingValid($HouseID,$Account)
        {
            $qr = sprintf("SELECT count(*), Account, HouseID, Date_ FROM `viewhomelist` WHERE Account = '%s' and SHA1(houseID) = '%s'",$Account,$HouseID);
            $data = mysqli_query($this->conn,$qr);
            $count = mysqli_fetch_array($data);
            if($count["count(*)"]==1)
            {
                return ["Account"=>$count["Account"],"HouseID"=>$count["HouseID"],"Status"=>true,"MeetingDate"=>$count["Date_"]];
            }
            else
            return ["Status"=>false];
        }
    } 
?>