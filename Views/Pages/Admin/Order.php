<link rel="stylesheet" href="../Assets/css/orderStyles.css">
<section class="orders">
    <div class="order-bottom">
        <form class="text-center" action="" method="post">
            <input type="hidden" name="filter-order-status" value="0">
            <button type="submit" style="background-color: transparent; border: none">
                <a href="" class="text-center position-relative">
                    <i class="fa-solid fa-hourglass"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?= isset($data['statuses'][0]) ? $data['statuses'][0] : 0 ?>
                    </span>
                    <p>Đang Chờ Duyệt Đơn Hàng</p>
                </a>
            </button>
        </form>
        <form class="text-center" action="" method="post">
            <input type="hidden" name="filter-order-status" value="1">
            <button type="submit" style="background-color: transparent; border: none">
                <a href="" class="text-center position-relative">
                    <i class="fa-solid fa-box-archive"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?= isset($data['statuses'][1]) ? $data['statuses'][1] : 0 ?>
                    </span>
                    <p>Đang chuẩn bị hàng</p>
                </a>
            </button>
        </form>
        <form class="text-center" action="" method="post">
            <input type="hidden" name="filter-order-status" value="2">
            <button type="submit" style="background-color: transparent; border: none">
                <a href="" class="text-center position-relative">
                    <i class="fa-solid fa-people-carry-box"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?= isset($data['statuses'][2]) ? $data['statuses'][2] : 0 ?>
                    </span>
                    <p>Giao hàng thành công</p>
                </a>
            </button>
        </form>
    </div>
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
                    <th scope="col">Xem Chi Tiết</th>
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
                        <td style="max-width: 20vw"><?= $order["note"] ?></td>
                        <td><?= $order["date"] ?></td>
                        <td>
                            <?php if ($order["statusID"] == 0) { ?>
                                <a href="<?= Redirect("Admin", "Order") . "/UpdateStatus/{$order["id"]}/1" ?>" class="status">
                                    <input type="checkbox" name="updateStatus-<?= $order["id"] ?>">
                                    <?= $order["status"] ?>
                                </a>
                            <?php } elseif ($order["statusID"] == 1) { ?>
                                <a href="<?= Redirect("Admin", "Order") . "/UpdateStatus/{$order["id"]}/2" ?>" class="status">
                                    <input type="checkbox" name="updateStatus-<?= $order["id"] ?>">
                                    <?= $order["status"] ?>
                                </a>
                            <?php } else { ?>
                                <p><i class="fas fa-check"></i> Giao Hành Thành Công</p>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="<?= Redirect("Admin", "Order") . "/Show/{$order["id"]}" ?>" role="button" class="btn btn-primary">
                                Xem Chi Tiết
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</section>