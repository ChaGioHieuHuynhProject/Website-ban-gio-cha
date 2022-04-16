<?php if (is_null($data["product"])) {
    echo "No product is available!";
} else {?>
This is detail of <?=$data["product"]["id"]?> name is <?=$data["product"]["name"]?> <br>
<a href="<?=Redirect("Cart", "Add")."/{$data["product"]["id"]}/1/Kg"?>">Thêm vào giỏ</a>

<?php } ?>
