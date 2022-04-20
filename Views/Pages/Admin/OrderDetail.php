<link rel="stylesheet" href="../../../Assets/css/orderDetailStyles.css">
<?php if (empty($data["order"])) { ?>
    <div class="d-flex-justify-content-center align-items-center">
        <h2 class="text-danger">Không có order này!</h2>
    </div>
<?php } else { ?>
    <section class="order-detail">
        <br>
        <h4 class="text-center text-uppercase font-weight-bold">Chi Tiết Đơn Hàng</h4>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-5 info-order">
                    <h5 class="text-center font-weight-bold">Thông Tin Đơn Hàng</h5>
                    <br>
                    <div class="info">
                        <h6>Mã Đơn Hàng: <?= $data["order"]['id'] ?></h6>
                        <br>
                        <h6>Tên Khách Hàng: <?= $data["order"]['customerName'] ?></h6>
                        <br>
                        <h6>Số Điện Thoại: <?= $data["order"]['customerPhone'] ?></h6>
                        <br>
                        <h6>Địa Chỉ: <?= $data["order"]['customerAddress'] ?></h6>
                        <br>
                        <h6>Ghi Chú: <?= $data["order"]['note'] ?></h6>
                        <br>
                        <h6>Ngày Đặt: <?= $data["order"]['date'] ?></h6>
                        <br>
                        <h6>Trạng Thái: <?= $data["order"]['nameStatus'] ?></h6>
                        <br>
                        <h6>Phí ship: <input style="width: 30%" type="number" value="<?= $data["order"]['shipFee'] ?>" onblur="updateShipFee(<?=$data['order']['id']?>, this.value)"> Đ</h6>
                        <br>
                    </div>
                </div>
                <div class="col-7 info-list-product">
                    <h5 class="text-center font-weight-bold">Danh Sách Sản Phẩm</h5>
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
                                            <td><?= number_format($orderDetail['price']) ?>(VNĐ) / <?= str_replace("_", " ", $orderDetail['massUnit']) ?></td>
                                            <td class="quantity"><?= $orderDetail['quantity'] ?> (<?= str_replace("_", " ", $orderDetail['massUnit']) ?>)</td>
                                            <td><?= number_format($orderDetail['total']) ?>(VNĐ)</td>
                                        </tr>
                                    <?php
                                        $total = $total + $orderDetail['total'];
                                    } ?>
                                    <h6>Tổng Hóa Đơn: <?= number_format($total) ?> Đ</h6>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?=RenderJs("AdminOrder")?>