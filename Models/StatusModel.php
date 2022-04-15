<?php class StatusModel extends Model {
    function getStatusList() {
        $statusList = [];
        $results = $this->con->query("SELECT * FROM statuses");
        while ($row = $results->fetch_assoc()) {
            array_push($statusList, $row);
        }
        return $statusList;
    }
}
?>