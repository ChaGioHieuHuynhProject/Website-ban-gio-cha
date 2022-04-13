<?php class MassUnitModel extends Model {
    function getMassUnitListByProductId($productId) {
        $massUnitList = [];
        $results = $this->con->query("SELECT * FROM massunits WHERE productId = $productId");
        while ($row = $results->fetch_assoc()) {
            array_push($massUnitList, $row);
        }
        return $massUnitList;
    }
    function getFactor($productId, $massUnit) {
        return $this->con->query("SELECT * FROM massunits WHERE productId = $productId and name = '$massUnit'")->fetch_assoc()["factor"];
    }
}
?>