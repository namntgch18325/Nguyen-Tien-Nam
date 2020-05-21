<?php
    if(isset($_POST["date"]) && (isset($_POST["regis"])))
    {
        $this->params["Date"] = $_POST["date"];
        $this->params["HouseID"] = $_POST["regis"];
        $this->params["currentURL"] = $_GET["url"];
    }
    // $this->params["currentURL"] = $_GET["url"];
    // echo $this->params["currentURL"];
?>