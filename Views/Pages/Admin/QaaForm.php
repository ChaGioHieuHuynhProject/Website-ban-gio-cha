<?php if (empty($data["qaa"])) {
    $question = $answer = "";
    $title = "Tạo Mới câu hỏi và câu trả lời";
} else {
    $title = "Chỉnh Sửa câu hỏi và câu trả lời";
    $question = $data["qaa"]["question"];
    $answer = $data["qaa"]["answer"];
}
?>
<div class="d-flex justify-content-center align-items-center my-5">
    <div class="w-75">
        <h1 class="text-center"><?= $title ?></h1>
        <p>***Lưu ý: Khi muốn xuống dòng trong đoạn văn, bạn cần chèn "<span>
                </span>br<span>></span>" vào đầu câu cần xuống hàng. </p>
        <form action="" method="post">
            <div class="my-2">
                <label for="name">Câu hỏi:</label><br>
                <textarea type="text" value="<?= $question ?>" name="question" class="form-control" rows="5" required></textarea>
            </div>
            <div class="my-2">
                <label for="price">Câu trả lời:</label>
                <textarea type="text" value="<?= $answer ?>" name="answer" class="form-control" rows="5" required></textarea>
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