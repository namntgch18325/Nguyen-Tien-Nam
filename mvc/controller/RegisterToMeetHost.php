<?php 
    class RegisterToMeetHost
    {
        function default($data)
        {
            if(isset($_SESSION["username"]))
            {
                $Remote =  new Call_Models_View();
                $Model = $Remote->Models("RegisterToMeetHost_Model");
                $Model->CreateMeeting($_SESSION["username"],$data["HouseID"],$data["Date"]);
            }
           
            header("Location: http://localhost:8080/NhaTro/HouseDetail/detail/".$data["HouseID"]);           
        }
    }
?>