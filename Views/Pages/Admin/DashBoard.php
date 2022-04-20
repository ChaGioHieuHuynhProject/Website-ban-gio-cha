<div class="my-3">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content text-center">
                    <span class="info-box-text">Số người đã đặt mua</span>
                    <span class="info-box-number display-5">
                        <?= $data["numOfCustomers"] ?>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <a class="info-box mb-3" role="button" href="<?= Redirect("Admin", "Product") ?>">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-box-open"></i></span>

                <div class="info-box-content text-center">
                    <span class="info-box-text">Số sản phẩm</span>
                    <span class="info-box-number display-5"><?= $data["numOfProducts"] ?></span>
                </div>
                <!-- /.info-box-content -->
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
            <a class="info-box mb-3" role="button" href="<?= Redirect("Admin", "Order") ?>">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content text-center">
                    <span class="info-box-text">Số đơn hàng đã có</span>
                    <span class="info-box-number display-5"><?= $data["numOfOrders"] ?></span>
                </div>
                <!-- /.info-box-content -->
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <a class="info-box mb-3" role="button" href="<?= Redirect("Admin", "Contact") ?>">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content text-center">
                    <span class="info-box-text">Số lượt liên hệ</span>
                    <span class="info-box-number display-5"><?= $data["numOfContacts"] ?></span>
                </div>
                <!-- /.info-box-content -->
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
</div>