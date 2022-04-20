<?php class ContactModel extends Model
{
    function getContactList()
    {
        $results = $this->con->query("SELECT * FROM contacts ORDER BY createdDate DESC");
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
        $date = date_create("now", new DateTimeZone("Asia/Ho_Chi_Minh"))->format("Y-m-d H:i:s");
        $sql = "INSERT INTO contacts (name, phoneNumber, address, note, createdDate)
            VALUES ('$name', '$phoneNumber', '$address', '$note','$date')";
        return $this->con->query($sql);
    }
    function deleteContact($id)
    {
        $sql = "DELETE FROM contacts WHERE id= $id";
        return $this->con->query($sql);
    }
    function countContact() {
        return $this->con->query("SELECT count(*) AS count FROM contacts")->fetch_assoc()["count"];
    }
}
