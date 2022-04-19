<div class="d-flex justify-content-center align-items-center">
    <div class="w-50">
        <h1 class="text-center my-5">Cập Nhật Thông Tin Website</h1>
        <form action="" method="post">
            <div class="my-2">
                <label for="phone-number">Số diện thoại:</label>
                <input type="text" name="phone-number" class="form-control" value="<?=$data["info"]["phoneNumber"]?>">
            </div>
            <div class="my-2">
                <label for="address">Địa chỉ:</label>
                <input type="text" name="address" class="form-control" value="<?=$data["info"]["address"]?>">
            </div>
            <div class="my-2">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="<?=$data["info"]["email"]?>">
            </div>
            <div class="my-2">
                <label for="facebook">Facebook Link:</label>
                <input type="text" name="facebook" class="form-control" value="<?=$data["info"]["facebook"]?>">
            </div>
            <div class="my-2">
                <label for="zalo">Số diện thoại Zalo:</label>
                <input type="text" name="zalo" class="form-control" value="<?=$data["info"]["zalo"]?>">
            </div>
            <div class="my-2 text-center text-danger"><?=$data["message"]?></div>
            <div class="my-2 text-center">
                <button class="btn btn-primary" type="submit" name="save">Lưu</button>
            </div>
        </form>
    </div>
</div>