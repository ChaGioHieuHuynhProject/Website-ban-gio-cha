<?php if (empty($data["orderList"])) { ?>
    <div style="height: 80vh" class="d-flex flex-row align-items-center justify-content-center font-weight-bold">
        Chưa có đơn đặt hàng nào!
    </div>
<?php } else { ?>
    <table class="table vertical-middle">
        <thead>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Thông tin khách hàng</th>
            <th scope="col">Ghi chú</th>
            <th scope="col"></th>
        </thead>
    </table>
<?php } ?>