<?php
    class AskAndAnswerModel extends Model{

        function getAskAndAnswerList(){
            $results = $this->con->query("SELECT * FROM QaA");
            $askAndAnswerList = [];
            while ($row = $results->fetch_assoc()) {
                array_push($askAndAnswerList, $row);
            }
            return $askAndAnswerList;
        }

        function getAskAndAnswerById($id){
            $result = $this->con->query("SELECT * FROM QaA WHERE id={$id}");
            return $result->fetch_assoc();
        }

        function addAskAndAnswer($question, $answer){
            $sql = "INSERT INTO reviews(question,answer) 
            VALUES('$question','$answer')";
            return $this->con->query($sql);
        }

        function updateAskAndAnswer($id,$question, $answer){
            $sql = "UPDATE QaA set question = '$question', answer = '$answer' where id={$id}";
            return $this->con->query($sql);
        }

        function deleteAskAndAnswer($id){
            $sql = "DELETE FROM QaA where id = $id";
            return $this->con->query($sql);
        }
    }
?>