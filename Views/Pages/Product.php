this is product page

<table>
    <thead>
        <th>ID</th>
        <th>Name</th>
    </thead>
    <tbody>
        <?php 
            if (is_null($data["data"])) {
                echo "<h3>Sorry, No product to show!</h3>";
            }
            else 
                foreach($data["productList"] as $product) { ?> 
                <tr>
                    <td><?=$product['id']?></td>
                    <td><?=$product["name"]?></td>
                    <td><button onclick="location.href='http://localhost//Product/Detail/<?=$product['id']?>'">detail</button></td>
                </tr>
        <?php }
        ?>
    </tbody>
</table>