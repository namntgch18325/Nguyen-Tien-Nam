<?php
  if(isset($_POST["Login"]))
  {
      if(isset($_POST["username"]) && $_POST["password"])
      {
          $this->params["account"] = $_POST["username"];
          $this->params["password"] =  $_POST["password"];
      }
  }
?>