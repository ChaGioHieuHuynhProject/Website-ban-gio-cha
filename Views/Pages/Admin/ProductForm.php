<section class="product-form">
    <?php if (empty($data["product"])) {
        $name = $price = $img = $ingredients = $description = $usageGuide = "";
        $title = "Tạo Mới Sản Phẩm";
    } else {
        $title = "Chỉnh Sửa Sản Phẩm";
        $name = $data["product"]["name"];
        $price = $data["product"]["price"];
        $img = $data["product"]["img"];
        $ingredients = $data["product"]["ingredients"];
        $description = $data["product"]["description"];
        $usageGuide = $data["product"]["usageGuide"];
    }
    ?>
    <div class="d-flex justify-content-center align-items-center my-5">
        <div class="w-75">
            <h1 class="text-center"><?= $title ?></h1>
            <p>***Lưu ý: Khi muốn xuống dòng trong đoạn văn, bạn cần chền "<span>
                    << /span>br<span>></span>" vào đầu câu cần xuống hàng. </p>
            <form action="" enctype="multipart/form-data" method="post">
                <div class="my-2">
                    <label for="name">Tên sản phẩm:</label><br>
                    <input type="text" value="<?= $name ?>" name="name" class="form-control" required>
                </div>
                <div class="my-2">
                    <label for="price">Giá sản phẩm:</label>
                    <input type="text" value="<?= $price ?>" name="price" class="form-control" required>
                </div>
                <div class="my-2">
                    <label for="price">Ảnh sản phẩm</label>
                    <input type="hidden" name="old-img" value="<?= $img ?>">
                    <input type="file" name="img" class="form-control" <?= empty($data["product"]) ? "required" : "" ?>>
                </div>
                <div class="my-2">
                    <label for="price">Thành phần:</label>
                    <textarea rows="3" name="ingredients" class="form-control"><?= $ingredients ?></textarea>
                </div>
                <div class="my-2">
                    <label for="price">Mô tả (hương vị,...):</label>
                    <textarea rows="3" name="description" class="form-control"><?= $description ?></textarea>
                </div>
                <div class="my-2">
                    <label for="price">Hướng dẫn sử dụng:</label>
                    <textarea rows="3" name="usageGuide" class="form-control"><?= $usageGuide ?></textarea>
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
</section>