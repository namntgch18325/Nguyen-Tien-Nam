<?php
    class forgot_password
    {
        function default()
        {
            $remote = new Call_Models_View();
            $remote->view("forgot-password",1);
        }
      
    }
?>