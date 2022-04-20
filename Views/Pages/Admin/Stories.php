<?php if (empty($data["storiesList"])) { ?>
    <div style="height: 80vh" class="d-flex flex-row align-items-center justify-content-center font-weight-bold">
        Chưa có stories nào!
    </div>
<?php } else { ?>
    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Thao tác</th>
        </thead>
        <tbody class="text-justify">
            <?php foreach ($data["storiesList"] as $stories) { ?>
                <tr>
                    <th scope="row"><?= $stories["id"] ?></th>
                    <td><?= $stories["title"] ?></td>
                    <td><img class="img-fluid" src="<?= ImageLink($stories["img"]) ?>"></td>
                    <td><?= $stories["content"] ?></td>
                    <td>
                        <a onclick="deleteStory(<?=$stories['id']?>)" role="button" class="btn btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                        <a href="<?= Redirect("Admin", "Stories") ?>/Update/<?= $stories["id"] ?>" role="button" class="btn btn-primary mt-2">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>
<?=RenderJs("AdminStories")?>