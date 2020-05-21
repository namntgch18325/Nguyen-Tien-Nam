<?php
    class mode360
    {
        function default()
        {
            $remote = new Call_Models_View();
            $remote->view("ThreeSixTenMode",1);
            //echo "360";
        }
    }
?>