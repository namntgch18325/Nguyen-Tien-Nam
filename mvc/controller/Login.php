<?php

    class Login
    {
        function default()
        {
            $remote = new Call_Models_View();
            $Login = $remote->Models("Login_Model");
            $Google = $Login->CreateURLLoginByGoogle();
            $Facebook = $Login->CreateURLForLoginFacebook();
            $remote->view("Login_View",["URL_auth" =>$Google,"Facebook_Login"=>$Facebook]);
        }
        function LoginWithLocalAccount($data)
        {
            session_destroy();
            session_start();
            $remote = new Call_Models_View();
            $Model = $remote->Models("Login_Model");
            $check = $Model->LoginWithLocalAccount_Model($data["account"],$data["password"]);
            if($check==1)
            {
                header('Location: http://localhost:8080/NhaTro/Home');
            }
            else header('Location: http://localhost:8080/NhaTro/Login');
        }
        function LoginWith_Facebook()
        {
            $remote = new Call_Models_View();
            $Login = $remote->Models("Login_Model");
            $Login->LoginWith_Facebook_Model();
            header("Location: http://localhost:8080/NhaTro/Home");
        }
        function LoginWith_Gmail()
        {
            session_destroy();
            session_start();
            $remote = new Call_Models_View();
            $Login = $remote->Models("Login_Model");
            $Login->LoginWith_Gmail_Model();
            header("Location: http://localhost:8080/NhaTro/Home");
        }
    }
?>