<?php
class DisplayHouse
{
    function default()
    {
        
    }
    function DisplayByCity($param)
    { 
        $remote = new Call_Models_View();
        $Model = $remote->Models("Search");
        $data = $Model->GetHouseType();
        $Model = $remote->Models("Search");
        $City = $Model->GetPlace();
        $Model = $remote->Models("ListHouse");
        $ListHouse = $Model->GetListHouse($param[2]);
        $remote->view("DislpayHouse",["HouseType"=>$data,"City"=>$City,"ListHouse"=>$ListHouse,"CityName"=>$param[2]]);
    }
}
?>