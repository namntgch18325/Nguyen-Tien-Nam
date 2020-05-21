<?php
    class App
    {
        private $controller_name = "PageNotFound";
        private $active_name = "default";
        private $params;
        private $second_active_name = "-1";
        private $check_param = true;
        function __construct()
        {
            $CheckList = ["union","order by","'",'"',"<",">","script" ,"group by","%","(",")","#","!",",","^","*","{","}"];
            if(isset($_GET["url"]))
            {
                $get_url = $_GET["url"];
                for($i = 0;$i<count($get_url);$i++)
                {
                    str_replace('<', '', $get_url);
                    str_replace('>', '', $get_url);
                }
                $url = [];   
                $url = explode("/",trim($_GET["url"],"/")); 
                if(isset($url[0]))
                {
                    $url_check = strtolower($url[0]);
                    foreach($CheckList as $key =>  $value) 
                    {
                        if(strstr($url_check,  $value)==true)
                        {
                            $url[0] = "PageNotFound";
                        }
                    }
                }
                if(file_exists("./mvc/Controller/".$url[0].".php"))
                {
                    $this->controller_name = $url[0];
                }
                unset($url[0]);              
            }
            require_once "./mvc/Controller/". $this->controller_name.".php"; //controller đã đc gọi 
            require_once "./mvc/remote_controller/Post_Register.php";
            require_once "./mvc/remote_controller/Post_Login.php";
            require_once "./mvc/remote_controller/Regis_Meet_House.php";
            
                if(isset($url[1]) && $this->second_active_name =="-1")
                {
                    $url_check = strtolower($url[1]);
                    foreach($CheckList as $key =>  $value) 
                    {
                        if(strstr($url_check,  $value)==true)
                        {
                            $url[1] = "default";
                        }
                    }

                    if(method_exists($this->controller_name, $url[1]))
                    {
                        $this->active_name = $url[1];
                    }
                    else
                    {   
                        $this->controller_name = "PageNotFound";
                        $this->active_name = "default";
                    }      
                    unset($url[1]);        
                }
                else if($this->second_active_name != "-1")
                {
                    $url_check = strtolower($this->second_active_name);
                    foreach($CheckList as $key =>  $value) 
                    {
                        if(strstr($url_check,  $value)==true)
                        {
                            $this->second_active_name = "default";
                        }
                    }
                    if(method_exists($this->controller_name, $this->second_active_name))
                    {
                        $this->active_name = $this->second_active_name;
                    }    
                    else
                    {   
                        $this->controller_name = "PageNotFound";
                        $this->active_name = "default";
                    }                 
                }
            if(isset($url[2]) && $url[2] != null)
            {
                foreach ($url as $key => $value) 
                {
                    $url_check = strtolower($value);
                    foreach($CheckList as $key =>  $value2) 
                    {
                        if(strstr($url_check,  $value2)==true)
                        {
                            $this->check_param = false;
                        }
                    }
                }
                if($this->check_param ==true)
                $this->params = $url;
            }
            else 
            if(isset($this->params) && $this->params !=null)
            {
                foreach ($this->params as $key => $value) 
                {
                    $url_check = strtolower($value);
                    foreach($CheckList as $key =>  $value2) 
                    {
                        if(strstr($url_check,  $value2)==true)
                        {
                            $this->check_param = false;
                        }
                    }
                }
            }
            if($this->check_param == false || $this->controller_name == "PageNotFound")
            {
                $this->controller_name = "PageNotFound";
                $this->active_name = "default";
                require_once "./mvc/Controller/". $this->controller_name.".php";
            }
            //echo $this->controller_name;
           /// echo $this->active_name;
           call_user_func_array([$this->controller_name,$this->active_name],[$this->params]); 
            }
    }
?>