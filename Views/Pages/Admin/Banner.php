<table class="table">
    <thead>
        <tr class="text-center">
            <th scope="col">Ảnh</th>
            <th scope="col">Trạng thái hiển thị</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody class="text-justify">
        <?php foreach ($data["bannerList"] as $banner) { ?>
            <tr class="text-center">
                <td><img style="max-width: 30rem;" class="img-fluid" src="<?= ImageLink($banner["img"]) ?>"></td>
                <td> 
                    <input type="checkbox" name="isDisplayed" <?= $banner["isDisplayed"] ? "checked" : "" ?> 
                    onclick="updateStatus(<?=$banner['id']?>)"> 
                </td>
                <td>
                    <a href="<?= Redirect("Admin", "Banner") . "/Delete/{$banner['id']}" ?>" role="button" class="btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?=RenderJs("AdminBanner")?>