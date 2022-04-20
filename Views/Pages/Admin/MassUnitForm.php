<section class="massUnit-form">
    <?php if (empty($data["MassUnit"])) {
        $productId = $nameMassUnit = $factor = "";
        $title = "Tạo Đơn Vị Mới";
    } else {
        $title = "Chỉnh Đơn Vị Sản Phẩm";
        $productId = $data["MassUnit"]["productId"];
        $nameMassUnit = $data["MassUnit"]["massunit"];
        $factor = $data["MassUnit"]["factor"];
        $nameProduct = $data["MassUnit"]["nameProduct"];
    }
    ?>
    <div class="d-flex justify-content-center align-items-center my-5">
        <div class="w-75">
            <h1 class="text-center"><?= $title ?></h1>
            <p>***Lưu ý: Khi muốn xuống dòng trong đoạn văn, bạn cần chền "<span>
                    << /span>br<span>></span>" vào đầu câu cần xuống hàng. </p>
            <form action="" enctype="multipart/form-data" method="post">
                <?php if (empty($data['MassUnit'])) { ?>
                    <div class="my-2">
                        <label for="name">Mã Sản Phẩm:</label><br>
                        <select name="productId">
                            <option value="">---Chọn Mã Sản Phẩm---</option>
                            <?php foreach ($data["productList"] as $product) { ?>
                                <option value="<?= $product["id"] ?>"><?= $product["id"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                <?php } else { ?>
                    <div class="my-2">
                        <label for="name">Tên Sản Phẩm:</label><br>
                        <input type="text" disabled value="<?= $nameProduct ?>" name="nameProduct" class="form-control" required>
                    </div>
                <?php } ?>
                <div class="my-2">
                    <label for="price">Tên Đơn Vị:</label>
                    <input type="text" value="<?= str_replace("_", " ", $nameMassUnit) ?>" name="nameMassUnit" class="form-control" required>
                </div>
                <div class="my-2">
                    <label for="price">Hệ Số</label>
                    <input type="float" name="factor" value="<?= $factor ?>" class=" form-control">
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