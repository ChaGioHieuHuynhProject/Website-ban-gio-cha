<?php if (empty($data["orderList"])) { ?>
    <div style="height: 80vh" class="d-flex flex-row align-items-center justify-content-center font-weight-bold">
        Chưa có đơn đặt hàng nào!
    </div>
<?php } else { ?>
    <table class="table mx-4">
        <thead>
            <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Thông tin khách hàng</th>
                <th scope="col">Ghi chú</th>
                <th scope="col">Ngày đặt hàng</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data["orderList"] as $order) { ?>
                <tr>
                    <th scope="row"><?= $order["id"] ?></th>
                    <td>
                        <div>Tên khách hàng: <?= $order["customerName"] ?></div>
                        <div>SĐT: <?= $order["customerPhone"] ?></div>
                        <div>Địa chỉ: <?= $order["customerAddress"] ?></div>
                    </td>
                    <td><?= $order["note"] ?></td>
                    <td><?= $order["date"] ?></td>
                    <td><?= $order["status"] ?></td>
                    <td>
                        <a href="#" role="button" class="btn btn-primary">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>