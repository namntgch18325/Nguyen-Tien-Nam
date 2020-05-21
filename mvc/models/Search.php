<?php
    class Search extends db_connect
    {
        function GetHouseType()
        {
            $qr = "SELECT * FROM `housetype`";
            $data = mysqli_query($this->conn, $qr);
            return $data;
        }
        function GetPlace()
        {
            $qr = "SELECT * FROM `avalibleplace`";
            $data = mysqli_query($this->conn, $qr);
            return $data;
        }
    }
?>