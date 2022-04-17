<section class="detail-products">
    <?php if (is_null($data["product"])) {
        echo "No product is available!";
        } else {
    ?>
    This is detail of <?=$data["product"]["id"]?> name is <?=$data["product"]["name"]?> <br>
    <a href="<?=Redirect("Cart", "Add")."/{$data["product"]["id"]}/1/Kg"?>">Thêm vào giỏ</a>
    <?php } ?>

    <div class="container grid">
        <div class="detail-des">
            <div class="Ingredient">
                <h3>Thành phần</h3>
                <ul>
                    <li>Thịt heo</li>
                    <li>Gia vị</li>
                    <li>Nước mắm nhĩ</li>
                </ul>
            </div>
            <div class="Smell">
                <h3>Hương vị</h3>
                <ul>
                    <li>Có vị thơm nồng của thịt luộc chín hòa quyện với mùi thơm của lá chuối.</li>
                    <li>
                        Hương vị đặc sắc này được tạo ra không chỉ bởi sự hòa hợp trọn vẹn của nước mắm nhĩ trong
                        từng tế bào thịt mà còn bởi kỹ thuật xay mịn và luộc với lá chuối.
                    </li>
                </ul>

            </div>
            <div class="use-pro">
                <h3>Cách thưởng thức</h3>
                <ul>
                    <li>Giò lụa thường được cắt thành khoanh tròn theo chiều ngang và chia đều thành 4-8 miếng theo
                        đường kính mỗi khoanh, trình bày trên đĩa thành hình hoa thị kèm với chén nước mắm ngon.
                    </li>
                    <li>Có thể ăn kèm với bánh giầy (gọi là bánh giầy giò), xôi (xôi giò), bánh cuốn hoặc món cơm
                        gạo tám (cơm tám giò chả). </li>
                    <li>Để tránh lát giò bị khô, có thể để lạnh.</li>
                </ul>
            </div>
            <a href="<?=Redirect("Cart", "Add")."/{$data["product"]["id"]}/1/Kg"?>"><button class="container">Thêm vào
                    giỏ hàng</button></a>

        </div>
        <div class="detail-img">
            <img id="bg-detail" src="<?= ImageLink("giolua.jpg")?>" alt="">
        </div>
    </div>
</section>
<?= RenderCSS("Detail")?>