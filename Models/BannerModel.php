<?php class BannerModel extends Model {
    function getBannerList()
    {
        $bnList=[];
        $results = $this->con->query("SELECT * FROM banners");
        if ($results){

        }
    }
}