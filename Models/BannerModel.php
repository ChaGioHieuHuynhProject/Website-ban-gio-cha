<?php class BannerModel extends Model {
    function getBannerList() {
        $results = $this->con->query("SELECT * FROM banners WHERE isDisplayed = 1");
        $bannerList = [];
        while ($row = $results->fetch_assoc()) {
            array_push($bannerList, $row);
        }
        return $bannerList;
    }

}
?>