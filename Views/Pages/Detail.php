<section class="detail-product">
    <?php if (is_null($data["product"])) {
        echo "No product is available!";
    } else {
        $product = $data["product"];
    ?>
    <h1><?= $product["name"] ?></h1>
    <div class="container grid">
        <div class="detail-des">
            <div class="ingredient">
                <h3>Thành phần:</h3>
                <p><?=$product["ingredients"]?></p>
            </div>
            <div class="description">
                <h3>Mô tả:</h3>
                <p><?=$product["description"]?></p>
            </div>
            <div class="usage-guide">
                <h3>Cách thưởng thức:</h3>
                <p><?=$product["usageGuide"]?></p>
            </div>
            <div class="top-product">
                <h3>Giá: <span
                        id="price"><?= number_format($product["price"] * $data["massUnitList"][0]["factor"]) ?></span>
                    VND</h3>
            </div>
            <div class="top-product mass-unit">
                <h3>Đơn vị: <span>
                        <select id="mass-unit" onchange="changeMassUnit()">
                            <?php foreach ($data["massUnitList"] as $massUnit) { ?>
                            <option value="<?= $massUnit["name"] ?>"
                                data-price="<?= ($product["price"] * $massUnit["factor"]) ?>">
                                <?= str_replace("_", " ", $massUnit["name"]) ?></option>
                            <?php } ?>
                        </select>
                        <script>
                        const changeMassUnit = () => {
                            $('#price').text(new Intl.NumberFormat().format($("#mass-unit").find(":selected").attr(
                                "data-price")));
                            $(".buy-btn a").attr("href",
                                `<?= Redirect("Cart", "Add") . "/{$product["id"]}/1" ?>/${$("#mass-unit").val()}`
                            )
                        }
                        </script>
                    </span>
                </h3>
            </div>
            <div class="buy-btn">
                <a role="button" href="<?= Redirect("Cart", "Add") . "/{$data["product"]["id"]}/1/Kg" ?>">Đặt
                    hàng</button>
            </div>
        </div>
        <div class="detail-img">
            <img id="detail__img" src="<?= ImageLink($product["img"]) ?>">
        </div>
    </div>
    <?php } ?>
</section>
<?= RenderCSS("Detail") ?>