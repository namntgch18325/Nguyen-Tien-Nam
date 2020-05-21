<?php session_start(); ?>

            <?php 

                require_once "./mvc/Call_Models_View/Call_Models_View.php";
                require_once "./mvc/remote_controller/App.php"; 
                require_once "db_connect.php";
                $Call_Models_View = new Call_Models_View();
                $App = new App();
            ?>
        <!-- </body>
        <footer>
            <?php
                  //require_once "./mvc/View/Sub-View/Foot-ter.php";
            ?>
        </footer>
</html> -->