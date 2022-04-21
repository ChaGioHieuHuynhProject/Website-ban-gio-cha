<section class="products">
    <h1 class="products-title">Các Sản Phẩm Có Bán Tại Cơ Sở</h1>
    <div class="content">
        <?php foreach ($data["productList"] as $product) { ?>
        <div class="div-image">
            <img src="<?= ImageLink($product["img"]) ?>" />
            <p class="title button">
                <a href="<?= Redirect("Product", "Detail") . "/" . $product["id"] ?>"><?= $product["name"] ?></a>
            </p>
            <div class="overlay"></div>
            <div class="block"></div>
        </div>
        <?php } ?>
    </div>
</section>
<?= RenderCSS("product") ?>