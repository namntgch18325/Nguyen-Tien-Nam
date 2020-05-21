<?php
    class register
    {
        function default()
        {
            $remote = new Call_Models_View();
            $data = "data 2";
            $remote->view("register",$data);
        }
        private function AuthEmail($email,$name)
        {
            $remote = new Call_Models_View();
            $Model = $remote->Models("EmailSending");
            $Model->Send($email,$name);
        }
        function registed($data)
        {
            $remote = new Call_Models_View();
            $Model = $remote->Models("Login_Model");
            $Model->Register($data);
            $regis = new register();
            $regis->AuthEmail($data["email"],$data["fullname"]);
            echo "Cảm ơn bạn đã đăng ký xử dụng nền tảng, chỉ còn 1 bước nữa để hoàn tất,vui lòng hãy kiểm tra email của bạn ";
        }
        function AuthEmailURl($data)
        {
            $remote = new Call_Models_View();
            $Model = $remote->Models("Login_Model");
            $check = $Model->AuthenthicEmail_Model($data);
            if($check==1)
            {
                header('Location: http://localhost:8080/NhaTro/Home');
            }
            else echo "Lỗi Bất ngờ, không thể xác thực";
        }
    }
?>