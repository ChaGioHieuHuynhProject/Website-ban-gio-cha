<?php if (empty($data["productList"])) { ?>
    <div style="height: 80vh" class="d-flex flex-row align-items-center justify-content-center font-weight-bold">
        Chưa có đơn đặt hàng nào!
    </div>
<?php } else { ?>
    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col">Mã sản phẩm</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Giá (VND)</th>
                <th scope="col">Thành phần</th>
                <th scope="col">Mô tả</th>
                <th scope="col">HDSD</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody class="text-justify">
            <?php foreach ($data["productList"] as $product) { ?>
                <tr>
                    <th scope="row"><?= $product["id"] ?></th>
                    <td><?= $product["name"] ?></td>
                    <td><img class="img-fluid" src="<?= ImageLink($product["img"]) ?>"></td>
                    <td><?= $product["price"] ?></td>
                    <td><?= $product["ingredients"] ?></td>
                    <td><?= $product["description"] ?></td>
                    <td><?= $product["usageGuide"] ?></td>
                    <td>
                        <a onclick="deleteProduct(<?=$product['id']?>)" role="button" class="btn btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                        <a href="<?= Redirect("Admin", "Product") ?>/Update/<?= $product["id"] ?>" role="button" class="btn btn-primary mt-2">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>
<?=RenderJs("AdminProduct")?>