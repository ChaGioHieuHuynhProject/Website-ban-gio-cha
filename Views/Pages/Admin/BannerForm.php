<div class="d-flex justify-content-center align-items-center my-5">
    <div class="w-50">
        <h1 class="text-center">Tạo Banner Mới</h1>
        <form action="" enctype="multipart/form-data" method="post">
            <div class="my-2">
                <label for="price">Ảnh sản phẩm</label>
                <input type="file" name="img" class="form-control" required>
            </div>
            <div class="my-2">
                <label for="price">Trạng thái hiển thị:</label><br>
                <input style="transform: scale(2);" class="ml-2" type="checkbox" name="isDisplayed">
            </div>
            <div class="my-2">
                <div class="text-danger"><?= $data["error"] ?></div>
            </div>
            <div class="my-3 text-center">
                <button class="btn btn-primary px-5" type="submit" name="save">Lưu</button>
            </div>
        </form>
    </div>
</div>