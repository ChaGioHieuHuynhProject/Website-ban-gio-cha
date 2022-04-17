<?php class BannerModel extends Model {
     function getBannerList() {
        $results = $this->con->query("SELECT * FROM banners WHERE isDisplayed = 1");
        $bannerList = [];
        while ($row = $results->fetch_assoc()) {
            array_push($bannerList, $row);
        }
        return $bannerList;
    }
    function getAllBanner(){
        $results = $this->con->query("SELECT * FROM banners");
        $bannerList = [];
        while ($row = $results->fetch_assoc()) {
            array_push($bannerList, $row);
        }
        return $bannerList;
    }
    function getBannerById($id) {
        $result = $this->con->query("SELECT * FROM banners WHERE id = $id");
        return $result ? $result->fetch_assoc() : null;
    }
    function addBanner($img, $isDisplayed){
        return $this->con->query("INSERT INTO banners (img, isDisplayed) VALUES ('$img', $isDisplayed)");
    }
    function updateDisplayStatus($id) {
        return $this->con->query("UPDATE banners SET isDisplayed = !isDisplayed WHERE id = $id");
    }
    function deleteBanner($id) {
        return $this->con->query("DELETE FROM banners WHERE id = $id");
    }
}
?>