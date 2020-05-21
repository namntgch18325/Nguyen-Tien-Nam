<?php
    class Home
    {
        function default()
        {
            $remote = new Call_Models_View();
            $Model = $remote->Models("Home_Model");
            $data = $Model->GetPlaceInformation();
            $remote->view("Home_View",["PlaceInformation"=>$data["Place_Name"],"CarouselImage"=>$data["Place_Image_Carousel"]]);
        }
    }
?>