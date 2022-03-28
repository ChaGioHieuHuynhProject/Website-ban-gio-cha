<?php
    class ReviewModel extends Model{

        function getReviewList(){
            $results = $this->con->query("SELECT * FROM reviews");
            $reviewList = [];
            while ($row = $results->fetch_assoc()) {
                array_push($reviewList, $row);
            }
            return $reviewList;
        }

        function getReviewByProduct($productId)
        {
            $reviewList = [];
            $results = $this->con->query("SELECT * FROM reviews LEFT JOIN products ON reviews.productId = products.id WHERE productId={$productId}");
            while ($row = $results->fetch_assoc()) {
                array_push($reviewList, $row);
            }
            return $reviewList;
        }

        function addReview($cusId,$productId,$content,$vote,$date){
            $sql = "INSERT INTO reviews(cusId,productId,content,vote,date) 
            VALUES('$cusId','$productId','$content','$vote','$date')";
            return $this->con->query($sql);
        }

        function updateReview($id, $content, $vote, $date){
            $sql = "UPDATE reviews set content = '$content', vote = '$vote', date = '$date' where id={$id}";
            return $this->con->query($sql);
        }

        function deleteReviewById($id){
            $sql = "DELETE FROM reviews where id = $id";
            return $this->con->query($sql);
        }

        function countReviews(){
            $result = $this->con->query("SELECT COUNT(id) as count FROM reviews");
            return $result->fetch_assoc()["count"];
        }

        function avgOfVoteByProduct($productId){
            $result = $this->con->query("SELECT AVG(vote) as avg FROM reviews WHERE productId = {$productId} ");
            return $result->fetch_assoc()["avg"];
        }
    }
?>