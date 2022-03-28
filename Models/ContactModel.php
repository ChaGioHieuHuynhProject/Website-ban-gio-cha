<?php
    class ContactModel extends Model{

        function getContactList(){
            $results = $this->con->query("SELECT * FROM contacts");
            $contactList = [];
            while ($row = $results->fetch_assoc()) {
                array_push($contactList, $row);
            }
            return $contactList;
        }

        function getContactsById($id)
        {
            $result = $this->con->query("SELECT * FROM contacts WHERE id={$id}");
            return $result->fetch_assoc();
        }

        function addContact($address, $phone, $email){
            $sql = "INSERT INTO contacts (address, phone, email) 
            VALUES('$address', '$phone, '$email')";
            return $this->con->query($sql);
        }

        function updateContact($id,$address, $phone, $email){
            $sql = "UPDATE contacts SET address = '$address', phone ='$phone', email ='$email' WHERE id = {$id}";
            return $this->con->query($sql);
        }

        function deleteContact($id)
        {
            $sql = "DELETE FROM contacts where id = $id";
            return $this->con->query($sql);
        }
    }
?>