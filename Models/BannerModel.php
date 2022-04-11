<?php class BannerModel extends Model {
    function get3Banners() {
        $results = $this->con->query("SELECT * FROM products ORDER BY id DESC LIMIT 2");
        $bannerList = [];
        while ($row = $results->fetch_assoc()) {
            array_push($bannerList, $row);
        }
        return $bannerList;
    }
}
?>