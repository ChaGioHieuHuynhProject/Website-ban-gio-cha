<?php
    class QAAModel extends Model{

        function getQAAList(){
            $results = $this->con->query("SELECT * FROM QaA");
            $QAAList = [];
            while ($row = $results->fetch_assoc()) {
                array_push($QAAList, $row);
            }
            return $QAAList;
        }

        function getQAAById($id){
            $result = $this->con->query("SELECT * FROM QaA WHERE id={$id}");
            return $result->fetch_assoc();
        }

        function addQAA($question, $answer){
            $sql = "INSERT INTO reviews(question,answer) 
            VALUES('$question','$answer')";
            $this->con->query($sql);
        }

        function updateQAA($id,$question, $answer){
            $sql = "UPDATE QaA set question = '$question', answer = '$answer' where id={$id}";
            $this->con->query($sql);
        }

        function deleteQAA($id){
            $sql = "DELETE FROM QaA where id = $id";
            $this->con->query($sql);
        }
    }
?>