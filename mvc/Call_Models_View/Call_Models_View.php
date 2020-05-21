<?php
    class Call_Models_View
    {
        //public $Connect ="1234";
        function view($view_name,$data)
        {
            require_once "./mvc/view/". $view_name.".php";  
        }

        function Models($models_name)
        {
            require_once "./mvc/models/". $models_name.".php";  
            return new $models_name; // retrun new Call_Models_View();
        }
    }
?>