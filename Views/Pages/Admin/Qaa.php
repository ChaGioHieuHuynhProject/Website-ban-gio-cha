<table class="table">
    <thead class=" w-100">
        <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Câu hỏi</th>
            <th scope="col" class="w-60">Trả lời</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody class="text-justify w-100">
        <?php foreach ($data["qaaList"] as $qaa) { ?>
            <tr class="text-justify">
                <th scope="row"><?= $qaa["id"] ?></th>
                <td><?= $qaa["question"] ?></td>
                <td class="w-60"><?= $qaa["answer"] ?></td>
                <td class="text-center">
                    <a onclick="deleteQaa(<?=$qaa['id']?>)" role="button" class="btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a> <br>
                    <a href="<?= Redirect("Admin", "Qaa") ?>/Update/<?= $qaa["id"] ?>" role="button" class="btn btn-primary mt-2">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?=RenderCSS("tableStyles");
RenderJs("AdminQaa")?>