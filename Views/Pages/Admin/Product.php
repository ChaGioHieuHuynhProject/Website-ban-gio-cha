<section class="products" >
    <?php if (empty($data["productList"])) { ?>
        <div style="height: 80vh" class="d-flex flex-row align-items-center justify-content-center font-weight-bold">
            Chưa có đơn đặt hàng nào!
        </div>
    <?php } else { ?>
        <table class="table">
            <thead class="w-100">
                <tr>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col" style="width: 15%">Thành phần</th>
                    <th scope="col" style="width: 20%">Mô tả</th>
                    <th scope="col" style="width: 20%">HDSD</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody class="text-justify w-100">
                <?php foreach ($data["productList"] as $product) { ?>
                    <tr>
                        <td><?= $product["name"] ?></td>
                        <td><img class="img-fluid" src="<?= ImageLink($product["img"]) ?>"></td>
                        <td><?= number_format($product["price"]) ?> Đ</td>
                        <td style="width: 15%"><?= $product["ingredients"] ?></td>
                        <td style="width: 20%"><?= $product["description"] ?></td>
                        <td style="width: 20%"><?= $product["usageGuide"] ?></td>
                        <td class="text-center">
                            <a onclick="deleteProduct(<?= $product['id'] ?>)" role="button" class="btn btn-danger">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                            <br>
                            <a href="<?= Redirect("Admin", "Product") ?>/Update/<?= $product["id"] ?>" role="button" class="btn btn-primary mt-2">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</section>
<?= RenderCSS("tableStyles");
RenderJs("AdminProduct") ?>