<?php if (is_null($data["data"])) {
    echo "No product is available!";
} else {?>
This is detail of <?=$data["data"]["id"]?> name is <?=$data["data"]["name"]?> <br>
<a href="<?=Redirect("Cart", "Add")."/{$data["data"]["id"]}/1"?>">Thêm vào giỏ</a>

<?php } ?>
