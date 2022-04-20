<h1 class="text-center my-5">Danh Sách Các câu hỏi và câu trả lời</h1>
<table class="table">
    <thead>
        <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Câu hỏi</th>
            <th scope="col">Trả lời</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody class="text-justify">
        <?php foreach ($data["qaaList"] as $qaa) { ?>
            <tr class="text-justify">
                <th scope="row"><?= $qaa["id"] ?></th>
                <td><?= $qaa["question"] ?></td>
                <td><?= $qaa["answer"] ?></td>
                <td>
                    <a onclick="deleteQaa(<?=$qaa['id']?>)" role="button" class="btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                    <a href="<?= Redirect("Admin", "Qaa") ?>/Update/<?= $qaa["id"] ?>" role="button" class="btn btn-primary mt-2">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?=RenderJs("AdminQaa")?>