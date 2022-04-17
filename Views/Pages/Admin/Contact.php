<h1 class="text-center my-5">Danh Sách Các Liên Hệ</h1>

<div class="d-flex justify-content-center align-items-center">
    <div class="w-50">
        <?php foreach($data["contactList"] as $contact){ ?>
            <div class="card mx-auto" style="width: 40rem;">
            <div class="card-body" style="padding:2rem 3rem">
                <h3 class="font-weight-bold">Tên KH: <?=$contact["name"]?></h3>
                <p class="card-text">SĐT: <?=$contact["phoneNumber"]?></p>
                <p class="card-text">Địa Chỉ: <?=$contact["address"]?></p>
                <p class="card-text">Lời Nhắn: <?=$contact["note"]?></p>
                <p class="card-text text-right"><small class="text-muted"><?=$contact["createdDate"]?></small></p>
            </div>
        </div>
        <?php }?>
    </div>
</div>