<?php 
    class PageNotFound
    {
        function default()
        {
            $Remote = new Call_Models_View();
            $Remote->view("PageNotFound",1);
        }
    }
?>