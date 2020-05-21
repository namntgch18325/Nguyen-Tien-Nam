<?php
class Logout
{
    function default()
    {
        $remote = new Call_Models_View();
        $Logout = $remote->Models("Login_Model");
        $Logout->LogOut();
        header("Location: http://localhost:8080/NhaTro/Home");
    }
}
?>