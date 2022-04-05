<?php
    class InfoModel extends Model{

        function getContactList(){
            $results = $this->con->query("SELECT * FROM infos");
            $infoList = [];
            while ($row = $results->fetch_assoc()) {
                array_push($infoList, $row);
            }
            return $infoList;
        }

        function getInfoById($id)
        {
            $result = $this->con->query("SELECT * FROM infos WHERE id={$id}");
            return $result->fetch_assoc();
        }

        function addInfo($address, $phone, $email){
            $sql = "INSERT INTO infos (address, phone, email) 
            VALUES('$address', '$phone, '$email')";
            return $this->con->query($sql);
        }

        function updateInfo($id, $address, $phone, $email){
            $sql = "UPDATE infos SET address = '$address', phone ='$phone', email ='$email' WHERE id = {$id}";
            return $this->con->query($sql);
        }

        function deleteInfo($id)
        {
            $sql = "DELETE FROM infos where id = $id";
            return $this->con->query($sql);
        }
    }
?>