<?php 
    class ListHouse extends db_connect
    {
        function GetListHouse($CityName)
        {
            $Name =  str_replace('_', ' ', $CityName);
            $qr = sprintf("SELECT houseinfor.ID, houseinfor.Description,houseimage.imageURL, Price, HouseNumber,
            tinhthanhpho.name as 'TP', 
            quanhuyen.name as'Quan',xaphuongthitran.name as 'Huyen', HouseNumber 
            FROM houseinfor 
            INNER JOIN tinhthanhpho on City = tinhthanhpho.matp 
            INNER JOIN quanhuyen on District = quanhuyen.maqh 
            INNER JOIN xaphuongthitran on Sub_District = xaphuongthitran.xaid 
            INNER JOIN houseimage ON houseinfor.ID = houseimage.ID 
            WHERE tinhthanhpho.name = '%s' 
            GROUP BY(houseimage.ID)",$Name);
            $data = mysqli_query($this->conn,$qr);
            return $data;
        }
    }
?>