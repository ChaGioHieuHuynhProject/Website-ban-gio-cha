<?php class MassUnitModel extends Model {

    function getMassUnitList(){
        $massUnitList = [];
        $results = $this->con->query("SELECT productId, products.name as nameProduct, massunits.name as massunit, factor 
        FROM massunits
        LEFT JOIN products
        ON massunits.productId = products.id");
        while ($row = $results->fetch_assoc()) {
            array_push($massUnitList, $row);
        }
        return $massUnitList;
    }
    function getMassUnitListByProductId($productId) {
        $massUnitList = [];
        $results = $this->con->query("SELECT * FROM massunits WHERE productId = $productId");
        while ($row = $results->fetch_assoc()) {
            array_push($massUnitList, $row);
        }
        return $massUnitList;
    }
    
    function getFactor($productId, $massUnit) {
        return $this->con->query("SELECT * FROM massunits 
        WHERE productId = $productId and name = '$massUnit'")->fetch_assoc()["factor"];
    }

    function getMassUnit($productId, $nameMassUnit){
        $result = mysqli_query($this->con, "SELECT productId, massunits.name as massunit, factor, products.name as nameProduct 
        FROM massunits
        LEFT JOIN products
        ON massunits.productId = products.id
        WHERE productId = {$productId} and massunits.name = '{$nameMassUnit}'");
        return $result->fetch_assoc();
    }
    
    function addMassUnit($productId, $nameMassUnit, $factor){
        $sql = "INSERT INTO massunits (productId, name, factor) 
            VALUES('$productId', '$nameMassUnit', '$factor')";
        return $this->con->query($sql);
    }

    function updateMassUnit($productId, $name, $nameMassUnit, $factor){
        $sql = "UPDATE massunits SET name ='$nameMassUnit', factor = '$factor' WHERE productId = {$productId} and name = '{$name}'";
        return $this->con->query($sql);
    }
    
    function deleteMassUnit($productId, $name){
        $sql = "DELETE FROM  massunits WHERE productId = {$productId} and name = '{$name}'";
        return $this->con->query($sql);
    }
}
?>