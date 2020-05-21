<?php
    class Login_Model extends db_connect
    {
        function LogOut()
        {
            session_destroy();
        }
        private function GetRScOIN($Username)
        {
            $qr = sprintf("select RS_Coin from customeraccount where Account = '%s'",$Username);
            $excute = mysqli_query($this->conn,$qr);
            $rs_coin = mysqli_fetch_array($excute);
            echo $qr;
            $_SESSION["RS_Coin"] = $rs_coin["RS_Coin"];
            echo $rs_coin["RS_Coin"];
        }
        function LoginWithLocalAccount_Model($Username,$Password)
        {
            $qr = sprintf("SELECT COUNT(*), `Account`, `FullName` FROM `customeraccount` WHERE Account = '%s' and Pass = '%s' AND Auth = 1 and LocalAccount = 1;",$Username,sha1($Password));
            $data = mysqli_query($this->conn,$qr);
            $row = mysqli_fetch_array($data);
            if($row ["COUNT(*)"] == 1)
            {
                $_SESSION["username"] = $row['Account'];
                $_SESSION["name"] = $row['FullName'];
                $newOBJ = new Login_Model();
                $newOBJ->GetRScOIN( $_SESSION["username"]);
                return true;
            }
            else return false;
        }
        function CreateURLForLoginFacebook()
        {
            require_once "./APIs/Facebook/vendor/autoload.php";
            $fb = new Facebook\Facebook([
                'app_id' => '571260730438784',
                'app_secret' => '24d10a6d93c38d7dfef10adbb8e0d090',
                'default_graph_version' => 'v2.10',]);
                $facebook_output = '';
                if(!isset($_GET['code']))
                {
                $facebook_helper = $fb->getRedirectLoginHelper();
                $url =  $facebook_helper->getLoginUrl("http://localhost:8080/NhaTro/Login/LoginWith_Facebook");
                return $url;
                }
        }
        function CreateURLLoginByGoogle()
        {
            // require_once "./APIs/Google/vendor/autoload.php";
            // $clientID = '433821562109-1grqlr4mf0rs0osshnnbmvqgfqo54qof.apps.googleusercontent.com';
            // $clientSecret = 'RQyI9eCHmG83VwfUdIbREFIx';
            // $redirectUri = 'http://localhost:8080/NhaTro/Login/LoginWith_Gmail';
            // // create Client Request to access Google API
            // $client = new Google_Client();
            // $client->setClientId($clientID);
            // $client->setClientSecret($clientSecret);
            // $client->setRedirectUri($redirectUri);
            // $client->addScope("email");
            // $client->addScope("profile");
            // return $client->createAuthUrl();
        }
        function LoginWith_Facebook_Model()
        {
            require_once "./APIs/Facebook/vendor/autoload.php";
            $fb = new Facebook\Facebook([
                'app_id' => '571260730438784',
                'app_secret' => '24d10a6d93c38d7dfef10adbb8e0d090',
                'default_graph_version' => 'v2.10',]);
            $facebook_helper = $fb->getRedirectLoginHelper();
            if(isset($_GET['code']))
            {
                  if(isset($_SESSION['access_token']))
                  {
                   $access_token = $_SESSION['access_token'];
                  }
                  else
                  {
                    $access_token = $facebook_helper->getAccessToken();
                    
                    $_SESSION['access_token'] = $access_token;
                    
                    $fb->setDefaultAccessToken($_SESSION['access_token']);
                    }
                    $_SESSION["username"] = '';
                    $_SESSION["name"] ='';
                    $_SESSION["avartar"] = '';         
                    $graph_response = $fb->get("/me?fields=email,name", $access_token);
                    
                    $facebook_user_info = $graph_response->getGraphUser();
                    
                    if(!empty($facebook_user_info['id']))
                    {
                        $_SESSION["avartar"] = 'http://graph.facebook.com/'.$facebook_user_info['id'].'/picture';   
                        $_SESSION["username"] = $facebook_user_info['id'];         
                        $newObj = new Login_Model();
                        $newObj->CreateAccountSocialMedia($_SESSION["username"],$_SESSION["name"],$_SESSION["username"]);
                    }   
                    else
                    {
                        session_destroy();
                    }        
                    if(!empty($facebook_user_info['name']))
                    {
                        $_SESSION["name"] = $facebook_user_info['name'];
                    }                        
            }   
        }               
        function LoginWith_Gmail_Model()
        {
        //     require_once "./APIs/Google/vendor/autoload.php";
        //     $clientID = '433821562109-1grqlr4mf0rs0osshnnbmvqgfqo54qof.apps.googleusercontent.com';
        //     $clientSecret = 'RQyI9eCHmG83VwfUdIbREFIx';
        //     $redirectUri = 'http://localhost:8080/NhaTro/Login/LoginWith_Gmail';
        //     // create Client Request to access Google API
        //     $client = new Google_Client();
        //     $client->setClientId($clientID);
        //     $client->setClientSecret($clientSecret);
        //     $client->setRedirectUri($redirectUri);
        //     $client->addScope("email");
        //     $client->addScope("profile");

        //     // authenticate code from Google OAuth Flow
        //     if (isset($_GET['code'])) {
        //     $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        //     $client->setAccessToken($token['access_token']);
            
        //     // get profile info
        //     $google_oauth = new Google_Service_Oauth2($client);
        //     $google_account_info = $google_oauth->userinfo->get();
        //     $email =  $google_account_info->email;
        //     $name =  $google_account_info->name;
        //     $avartar =  $google_account_info->picture;
        //     $gender = $google_account_info->gender;
        //     $_SESSION["username"] = $email;
        //     $_SESSION["name"] = $name;
        //     $_SESSION["avartar"] = $avartar;
        //     if(isset($_SESSION["username"]))
        //     {
        //         if(isset($_SESSION["name"]))
        //         {
        //             $newObj = new Login_Model();
        //             $newObj->CreateAccountSocialMedia($_SESSION["username"],$_SESSION["name"],$_SESSION["username"]);
        //         }
        //     }
        //     else
        //     {
        //         session_destroy();
        //     }
        // }
          
        }    
        function Register($data)
        {
            $qr = sprintf("INSERT INTO `customeraccount`(`Account`, `Pass`, `FullName`, `Auth`, Email) 
            VALUES ('%s','%s','%s',0,'%s')",$data["username"],sha1($data["password"]),$data["fullname"],$data["email"]);
            mysqli_query($this->conn,$qr);
        }
        function AuthenthicEmail_Model($data)
        {
            $check = 0;
            if(sha1("$!0@aBc-") == $data[2])
            {
                $qr = sprintf("SELECT COUNT(*) FROM `customeraccount` WHERE SHA1(Email) = '%s' AND Auth = 0;",$data[3]);
                $count = mysqli_query($this->conn,$qr);
                $countAccount = mysqli_fetch_array($count);
                if($countAccount["COUNT(*)"] == 1)
                {
                    $qr = sprintf("UPDATE `customeraccount` SET `Auth`= 1  WHERE SHA1(Email) = '%s'",$data[3]);
                    $check  = mysqli_query($this->conn,$qr);               
                }
            }
           if($check==1)
           {
                $qr = sprintf("SELECT `Account`, `FullName` FROM `customeraccount` WHERE SHA1(Email) = '%s' AND Auth = 1;",$data[3]);
                $data = mysqli_query($this->conn,$qr);
                $row = mysqli_fetch_array($data);
                $_SESSION["username"] = $row['Account'];
                $_SESSION["name"] = $row['FullName'];
                return true;
           }
           else return false;
        }
        private function CreateAccountSocialMedia($Account,$FullName,$Email)
        {
            $qr = sprintf("select count(*) from customeraccount where Account = '%s' and LocalAccount = 0",$Account);
            $excute = mysqli_query($this->conn,$qr);
            $data = mysqli_fetch_array($excute);
            $Avalible = $data["count(*)"];
            if($Avalible==0)
            {
                $qr = sprintf("INSERT INTO `customeraccount`(`Account`, `Pass`, `FullName`, `Auth`, `Email`, `RS_Coin`, `LocalAccount`) VALUES 
                ('%s',SHA1('SocialMedia'),'%s',1,'SocialAccount: %s',100000,0)",$Account,$FullName,$Email,$Account);
                mysqli_query($this->conn,$qr);
                $newOBJ = new Login_Model();
                $newOBJ->GetRScOIN($Account);
                return true;
            }
            else
            {   
                        $newOBJ = new Login_Model();
                        $newOBJ->GetRScOIN($Account); 
                        return false;
            }
        }
    }
?>