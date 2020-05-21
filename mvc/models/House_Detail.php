<?php
    class House_Detail extends db_connect
    {
        function GetInformationDetail($ID)
        {
            $House_Detail = new House_Detail();
            $qr = sprintf("SELECT houseinfor.ID, houseinfor.Description, Price, HouseNumber,
            tinhthanhpho.name as 'TP', 
            quanhuyen.name as'Quan',xaphuongthitran.name as 'Huyen', HouseNumber 
            FROM houseinfor 
            INNER JOIN tinhthanhpho on City = tinhthanhpho.matp 
            INNER JOIN quanhuyen on District = quanhuyen.maqh 
            INNER JOIN xaphuongthitran on Sub_District = xaphuongthitran.xaid
            WHERE SHA1(houseinfor.ID) = '%s';",$ID);
            $data = mysqli_query($this->conn,$qr);
            return ["Information"=>$data,"Image"=>$House_Detail->GetImageHouse($ID),"Description"=>$House_Detail->GetFullDescrription($ID)];
        }
        function GetComment($ID)
        {
            $qr = sprintf("SELECT customeraccount.FullName, comment.content, DATE FROM comment 
            INNER JOIN customeraccount 
            on comment.Account = customeraccount.Account 
            where SHA1(houseID) = '%s' ORDER BY DATE;",$ID);
            $data = mysqli_query($this->conn,$qr);
            return $data;        }
        private function GetImageHouse($ID)
        {
            $ImageArr = [];
            $count = 0;
            $qr = sprintf("SELECT imageURL FROM `houseimage` WHERE SHA1(ID) = '%s'",$ID);
            $data = mysqli_query($this->conn,$qr);
            while($Image = mysqli_fetch_array($data))
            {
                $ImageArr[$count] = $Image["imageURL"]; 
                $count++;
            }
            return $ImageArr;
        }
        private function GetFullDescrription($ID)
        {
            $qr = sprintf("SELECT Description FROM `house_detail_information` where SHA1(ID) = '%s'",$ID);
            $data = mysqli_query($this->conn,$qr);
            $Description = mysqli_fetch_array($data);
            return $Description["Description"];
        }
        function GetAvalibeComment($ID)
        {
            if(isset($_SESSION["username"]))
            {
                $qr = sprintf("select Status from avaliblecomment where Account_ID = '%s' and SHA1(HouseID) = '%s'",$_SESSION["username"],$ID);
                $data = mysqli_query($this->conn,$qr);
                $data = mysqli_fetch_array($data);
                $Avalible = $data["Status"];
                if($Avalible==1)
                {
                    return true;
                }
                else
                {
                    return false;
                }

            }
            else return false;
        }
    }
?>