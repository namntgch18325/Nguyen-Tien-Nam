<?php
    class RegisterToMeetHost_Model extends db_connect
    {
        function CreateMeeting($Account,$HouseID,$date)
        {
            $qr = sprintf("INSERT INTO `viewhomelist`(`Account`, `houseID`, `Date_`) 
            VALUES ('%s',(SELECT houseinfor.ID FROM houseinfor WHERE SHA1(ID) = '%s')  ,'%s')",$Account,$HouseID,$date);
            mysqli_query($this->conn,$qr);
        }
    }
?>