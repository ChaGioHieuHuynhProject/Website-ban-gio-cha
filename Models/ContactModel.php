<?php class ContactModel extends Model {
    function getContactList()
    {
        $results = $this->con->query("SELECT * FROM contacts");
        $contactList = [];
        while ($row = $results->fetch_assoc()) {
            array_push($contactList, $row);
        }
        return $contactList;
    }

    function getContactById($id)
    {
        $result = $this->con->query("SELECT * FROM contacts WHERE id = {$id}");
        return $result->fetch_assoc();
    }
    function addContact($name, $phoneNumber, $address, $note)
    {
        $sql = "INSERT INTO contacts (name, phoneNumber, address, note)
            value ('$name', '$phoneNumber', '$address', '$note')";
        return $this->con->query($sql);
    }
    function delateContact($id)
    {
        $sql = "DELETE FROM contacts WHERE id={$id}";
        return $this->con->query($sql);
    }
}
