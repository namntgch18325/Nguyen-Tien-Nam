<?php
    if(isset($_POST["register"]))
    {
        if(isset($_POST["username"]) && $_POST["email"] && $_POST["fullname"] && $_POST["password"])
        {
            //$this->second_active_name  = "registed";
            $this->params["username"] = $_POST["username"];
            $this->params["fullname"] = $_POST["fullname"];
            $this->params["password"] =  $_POST["password"];
            $this->params["email"] = $_POST["email"];
        }
    }
?>