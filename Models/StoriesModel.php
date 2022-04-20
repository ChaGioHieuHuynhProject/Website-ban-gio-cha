<?php class StoriesModel extends Model
{
    function getStoryList()
    {
        $storyList = [];
        $results = $this->con->query("SELECT * FROM stories ORDER BY id DESC");
        if ($results) {
            while ($row = $results->fetch_assoc()) {
                array_push($storyList, $row);
            }
        }
        return $storyList;
    }
    function get2LatestStories() {
        $storyList = [];
        $results = $this->con->query("SELECT * FROM stories ORDER BY id DESC LIMIT 2");
        if ($results) {
            while ($row = $results->fetch_assoc()) {
                array_push($storyList, $row);
            }
        }
        return $storyList;
    }
    function getStoryById($id)
    {
        $result = $this->con->query("SELECT * FROM stories WHERE id = {$id}");
        return $result->fetch_assoc();
    }
    function addStory($title, $content, $img)
    {
        $this->con->query("INSERT INTO stories (title,content,img)  
            VALUES('$title', '$content', '$img')");
    }
    function updateStory($id,$title, $content, $img){
        $this->con->query("UPDATE stories SET title= '$title', content='$content', img = '$img' WHERE id = {$id}");

    }
    function deleteStory($id){
        return $this->con->query("DELETE FROM stories WHERE id = {$id}");
    }
}
