<section class="t2-container">
    <div class="banner">
        <div class="slides">
            <?php foreach($data["bannerList"] as $banner) { ?>
            <div class="t2-slide">
                <img src="<?= ImageLink($banner["img"])?>" alt="">
            </div>
            <?php } ?>
        </div>
        <div class="right-banner">
            <div class="title">
                <h3>GIÒ CHẢ NHÀ <br>HIẾU & HUYNH</h3>
                <h1>GIA TRUYỀN HƠN 30 NĂM</h1>
            </div>
        </div>
    </div>
</section>
<section class="featured-products">
    <div class="N-title">
        <p>Sản phẩm nổi bật</p>
    </div>
    <div class="featured-products__content">
        <?php foreach ($data["productList"] as $product) { ?>
        <div class="t-div-image">
            <img src="<?= ImageLink($product["img"]) ?>" alt="" />
            <div class="t-title"><?= $product["name"] ?></div>
            <div class="t-overlay"></div>
            <div class="t-button"><a href="<?= Redirect("Product") ?>"> Xem Thêm </a></div>
            <div class="t-block"></div>
        </div>
        <?php } ?>
    </div>
</section>
<section class="foundation">
    <div class="t2-content">
        <div class="N-title">
            <p>Lịch sử hình thành</p>
        </div>

        <p class="content-center">
            Chồng tôi kể rằng: “Bố là dân di cư từ Bắc vào Đà Nẵng vào năm 1954. Lúc còn nhỏ, tôi chỉ
            biết bám theo ông, ông dậy sớm giã chả, tôi cũng dậy theo... Vào năm 1975, bố mất lúc tôi
            chỉ mới 7 tuổi. Lớn lên tôi còn nhớ về bố trong những lần vét cối giã chả, gói trong lá
            chuối rồi đem hấp. Mùi vị chả gói trong lá chuối đến bây giờ vẫn còn đọng mãi trong tôi. Vị ngọt
            của thịt, vị mặn vừa phải của nước mắm, và mùi thơm đặc trưng của giò Bắc (còn gọi là
            chả lụa)...
        </p>
        <div class="N-see-more">
            <a class="N-btn N-btn-see-more" href="<?= Redirect("AboutUs") ?>">Tìm hiểu thêm</a>
        </div>
    </div>
    <img src="<?= ImageLink('Banner2.png')?>" alt="">
</section>
<section class="N-container">
    <div class="N-title">
        <p>Câu chuyện mỗi ngày</p>
    </div>
    <div class="N-layout">
    <?php foreach ($data["storiesList"] as $story) { ?>
        <div class="N-card">
            <img class="N-card-img" src="https://www.disneycooking.com/wp-content/uploads/2021/04/cha-bo.jpg" alt="">
            <div class="N-card-body">
                <p class="N-card-title"><?= $story["title"] ?></p>
                <p class="N-card-text"><?= $story["content"] ?></p>
            </div>
        </div>
        <?php } ?>
    </div>

    <div class="N-see-more">
        <a class="N-btn N-btn-see-more" href="<?= Redirect("Stories") ?>">Tìm hiểu thêm</a>
    </div>
</section>

<link rel="stylesheet" href="<?= ROOT_URL ?>Assets/css/HomeStyle.css">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?=RenderJs("home")?>