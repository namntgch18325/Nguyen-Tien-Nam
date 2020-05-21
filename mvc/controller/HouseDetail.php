<?php
class HouseDetail
{   
    function default()
    {
          //$remote->view("house-detail",10);
    }
    function detail($houseID)
    {
        $remote = new Call_Models_View();
        $Model = $remote->Models("House_Detail");
        $data = $Model->GetInformationDetail($houseID[2]);
        $Avalible_Comment =  $Model->GetAvalibeComment($houseID[2]);
        $Comment = $Model->GetComment($houseID[2]);
        $Model = $remote->Models("registermeethost_model");
        $Date = "-1";
        if(isset($_SESSION["username"]))
        {
            $QR_Code = $Model->CreateQR_Code($houseID[2],$_SESSION["username"]);
            $Date =  $QR_Code["Date"];
        }
        else 
        $QR_Code["img"] = -1;
        
        $remote->view("house-detail",["Information"=>$data["Information"],
        "Image"=>$data["Image"],"Description"=>$data["Description"],
        "Comment"=>$Comment,"AvalibleComment"=>$Avalible_Comment,
        "QR"=>$QR_Code["img"],"HouseID"=>$houseID[2],"Date"=>$Date]);
    }

}
?>