<?php
    class ImgModel extends Model{

        function getImgListByProductId($productId){
            $results = $this->con->query("SELECT * FROM imgs LEFT JOIN products ON imgs.productId = products.id WHERE products.id ={$productId}");
            $imgList = [];
            while ($row = $results->fetch_assoc()) {
                array_push($imgList, $row);
            }
            return $imgList;
        }

        function addImg($productId, $link){
            $sql = "INSERT INTO imgs (productId, link) 
            VALUES('$productId', '$link)";
            return $this->con->query($sql);
        }

        function updateImg($id, $link){
            $sql = "UPDATE imgs SET link = '$link' WHERE id = {$id}";
            return $this->con->query($sql);
        }

        function deleteImg($id){
            $sql = "DELETE FROM imgs where id = $id";
            return $this->con->query($sql);
        }
    }
?>