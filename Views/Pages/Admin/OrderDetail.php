<style>
    table {
        table-layout: fixed;
    }

    th,
    td {
        padding: 10px 10px;
    }

    thead {
        background: #f9f9f9;
        display: table;
        width: 100%;
        /* width: calc(100% - 18px); */
    }

    tbody {
        height: 200px;
        overflow: auto;
        display: block;
        width: 100%;
    }

    tr {
        display: table;
        width: 100%;
        table-layout: fixed;
    }

    .quantity {
        padding-left: 40px !important;
    }

    .info-order {
        padding-left: 7%;
    }
</style>
<section class="order-detail">
    <br />
    <br />
    <h4 class="text-center">Chi Tiết Đơn Hàng</h4>
    <br />
    <div class="container">
        <div class="row">
            <div class="col-5 info-order">
                <h5 class="text-center">Thông Tin Đơn Hàng</h5>
                <br>
                <div class="info">
                    <h6>Mã Đơn Hàng: <?= $data["order"]['id'] ?></h6>
                    <br />
                    <h6>Tên Khách Hàng: <?= $data["order"]['customerName'] ?></h6>
                    <br />
                    <h6>Số Điện Thoại: <?= $data["order"]['customerPhone'] ?></h6>
                    <br />
                    <h6>Địa Chỉ: <?= $data["order"]['customerAddress'] ?></h6>
                    <br />
                    <h6>Ghi Chú: <?= $data["order"]['note'] ?></h6>
                    <br />
                    <h6>Ngày Đặt: <?= $data["order"]['date'] ?></h6>
                    <br>
                    <h6>Trạng Thái: <?= $data["order"]['nameStatus'] ?></h6>
                    <br>
                    <a href="http://localhost:8080/Website-ban-gio-cha/Admin/order" role="button" class="btn btn-primary">
                        Thoát
                    </a>
                </div>
            </div>
            <div class="col-7 info-list-product">
                <h5 class="text-center">Danh Sách Sản Phẩm</h5>
                <br>
                <div class="info">
                    <div class="tab-pane" id="product">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th class="stt">Mã Sản Phẩm</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Giá</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng Tiền</th>
                                </tr>
                            </thead>
                            <tbody id="tbl">
                                <?php
                                $total = 0;
                                foreach ($data["orderDetail"] as $orderDetail) { ?>
                                    <tr>
                                        <td><?= $orderDetail['productId'] ?></td>
                                        <td><?= $orderDetail['productsName'] ?></td>
                                        <td><?= number_format($orderDetail['price']) ?>(VNĐ)/<?= $orderDetail['massUnit'] ?></td>
                                        <td class="quantity"><?= $orderDetail['quantity'] ?> <?= $orderDetail['massUnit'] ?></td>
                                        <td><?= number_format($orderDetail['total']) ?>(VNĐ)</td>
                                    </tr>
                                <?php
                                    $total = $total + $orderDetail['total'];
                                } ?>
                                <h6>Tổng Hóa Đơn: <?= number_format($total) ?> (VNĐ)</h6>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>