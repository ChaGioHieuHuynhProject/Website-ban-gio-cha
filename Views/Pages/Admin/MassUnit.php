<link rel="stylesheet" href="../Assets/css/tableStyles.css">
<section class="massunit container">
    <div class="tab-pane" id="product">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th class="stt">Mã Sản Phẩm</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Đơn vị</th>
                    <th>Hệ số</th>
                    <th>Đơn giá</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody id="tbl">
                <?php foreach ($data["massUnitList"] as $massUnit) { ?>
                    <tr>
                        <td><?= $massUnit['productId'] ?></td>
                        <td><?= $massUnit['nameProduct'] ?></td>
                        <td><?= str_replace("_", " ", $massUnit['massunit']) ?></td>
                        <td><?= $massUnit['factor'] ?></td>
                        <td><?= number_format($massUnit['price']) ?> Đ</td>
                        <td>
                            <a href="<?= Redirect("Admin", "MassUnit") ?>/Update/<?= $massUnit['productId'] ?>/<?= $massUnit['massunit'] ?>" role="button" class="btn btn-primary">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="<?= Redirect("Admin", "MassUnit") ?>/Delete/<?= $massUnit['productId'] ?>/<?= $massUnit['massunit'] ?>" role="button" class="btn btn-primary">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>