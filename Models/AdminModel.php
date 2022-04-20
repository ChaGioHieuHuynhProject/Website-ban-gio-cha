<?php class AdminModel extends Model {
    function getAdmin($email) {
        return $this->con->query("SELECT * FROM admins WHERE email = '$email'")->fetch_assoc();
    }

    function addAdmin($email, $password) {
        $pwdPeppered = hash_hmac("sha256", $password, $_ENV["pepper"]);
        $pwdHashed = password_hash($pwdPeppered, PASSWORD_DEFAULT);
        return $this->con->query("INSERT INTO admins(email, password) VALUES ('$email', '$pwdHashed')");
    }

    function checkUserEmail($email){
        if($this->getAdmin($email)){
            return false;
        }
        return true;
    }
} 
?>