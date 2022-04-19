<?php if (empty($data["story"])) {
    $title = $content = $img = "";
    $formTitle = "Tạo Mới câu chuyện";
} else {
    $formTitle = "Chỉnh Sửa câu chuyện";
    $title = $data["story"]["title"];
    $content = $data["story"]["content"];
    $img = $data["story"]["img"];
}
?>
<div class="d-flex justify-content-center align-items-center my-5">
    <div class="w-75">
        <h1 class="text-center"><?= $formTitle ?></h1>
        <p>***Lưu ý: Khi muốn xuống dòng trong đoạn văn, bạn cần chền "<span><</span>br<span>></span>" vào đầu câu cần xuống hàng. </p>
        <form action="" enctype="multipart/form-data" method="post">
            <div class="my-2">
                <label for="name">Tên câu chuyện:</label><br>
                <input type="text" value="<?= $title ?>" name="title" class="form-control" required>
            </div>
            <div class="my-2">
                <label for="price">Nội dung câu chuyện:</label>
                <textarea name="content" class="form-control" rows="5" required><?= $content ?></textarea>
            </div>
            <div class="my-2">
                <label for="price">Ảnh câu chuyện</label>
                <input type="hidden" name="old-img" value="<?= $img ?>">
                <input type="file" name="img" class="form-control" <?= empty($data["story"]) ? "required" : "" ?>>
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