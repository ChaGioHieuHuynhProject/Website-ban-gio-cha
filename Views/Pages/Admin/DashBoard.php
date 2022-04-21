<div class="my-3">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><?= $data["numOfCustomers"] ?> <small>người</small></h4>
                    <p><span class="display-6 font-weight-bold">đã đặt mua</span></p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h4><?= $data["numOfProducts"] ?> <small>sản phẩm</small></h4>
                    <p><span class="display-6 font-weight-bold">có trong shop</span></p>
                </div>
                <a class="icon" href="<?= Redirect("Admin", "Product") ?>">
                    <i class=" fas fa-box-open"></i>
                </a>
            </div>
        </div>
        <div class="clearfix hidden-md-up"></div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h4><?= $data["numOfOrders"] ?> <small>đơn hàng</small></h4>
                    <p><span class="display-6 font-weight-bold">đã được bán</span></p>
                </div>
                <a class="icon" href="<?= Redirect("Admin", "Order") ?>">
                    <i class=" fas fa-file-invoice"></i>
                </a>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h4><?= $data["numOfContacts"] ?> <small>khách hàng</small></h4>
                    <p><span class="display-6 font-weight-bold">đã liên hệ</span></p>
                </div>
                <a class="icon" href="<?= Redirect("Admin", "Contact") ?>">
                    <i class=" fas fa-envelope"></i>
                </a>
            </div>

        </div>
        <!-- /.col -->
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><?= $data["bestSeller"]["count"] ?> <small>lần</small></h4>
                    <p><span class="display-5 font-weight-bold"><?= $data["bestSeller"]["name"] ?></span><br>được mua nhiều nhất</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>
        </div>
    </div>
</div>