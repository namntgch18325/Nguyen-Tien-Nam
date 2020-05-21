<?php
    class Home_Model extends db_connect
    {
        function GetPlaceInformation()
        {
            $qr = "select * from avalibleplace INNER JOIN placeimage ON placeimage.matp = avalibleplace.matp where isAvalible = 1 GROUP by(placeimage.matp)";
            $place_Name = mysqli_query($this->conn,$qr);
            $qr = "select placeimage.imageURL from avalibleplace INNER JOIN placeimage ON placeimage.matp = avalibleplace.matp where isAvalible = 1 LIMIT 0,5";
            $place_Image_Carousel = mysqli_query($this->conn,$qr);
            return ["Place_Name"=>$place_Name,"Place_Image_Carousel"=>$place_Image_Carousel];
        }
    }
?>