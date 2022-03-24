<?php class KyModel extends Model{
    public function getName() {
        $results = $this->con->query("SELECT * FROM users");
        return $results->fetch_assoc();
    }
}
?>