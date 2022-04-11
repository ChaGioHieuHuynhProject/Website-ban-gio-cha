<section class="t2-container">
    <div class="banner">
        <div class="slides">
            <div class="t2-slide">
                <img src="<?= ROOT_URL ?>Assets/img/Banner.jpg" alt="">
            </div>
            <div class="t2-slide">
                <img src="<?= ROOT_URL ?>Assets/img/Banner1.png" alt="">
            </div>
            <div class="t2-slide">
                <img src="<?= ROOT_URL ?>Assets/img/Banner2.png" alt="">
            </div>
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
    <h1 class="home-title">Sản phẩm nổi bật</h1>
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
        <h1 class="home-title">Lịch sử hình thành</h1>
        <p class="content-center">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, dolorum unde consequuntur nesciunt hic
            nihil eius odio iure voluptatum, consequatur cum provident error atque porro voluptas odit, quas optio.
            Consequuntur voluptas deleniti, id quae quidem suscipit dolor vel in laboriosam eum numquam excepturi, eos,
            minus fugit corrupti commodi quia. Nostrum?
        </p>
        <div class="N-see-more">
            <a class="N-btn N-btn-see-more" href="<?= Redirect("AboutUs") ?>">Tìm hiểu thêm</a>
        </div>
    </div>
    <img src="<?= ROOT_URL ?>Assets/img/Banner2.png" alt="">
</section>
<section class="N-container">
    <div class="N-title">
        <p>Câu chuyện mỗi ngày</p>
    </div>
    <div class="N-layout">
        <div class="N-card">
            <img class="N-card-img" src="https://www.disneycooking.com/wp-content/uploads/2021/04/cha-bo.jpg" alt="">
            <div class="N-card-body">
                <p class="N-card-title">Chả Gia Vị</p>
                <p class="N-card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content. Vận dụng những kiến thức đã học về cách viết câu, viết đoạn văn hoàn chỉnh, em
                    hãy thực hành viết một đoạn văn ngắn về gia đình em, từ 3 đến 5 câu để ôn luyện và nâng cao hơn
                    nữa kĩ năng xây dựng đoạn văn sao cho ngắn gọn, dễ hiểu, rành mạch và thu hút người đọc.</p>
            </div>
        </div>
        <div class="N-card">
            <img class="N-card-img" src="https://www.disneycooking.com/wp-content/uploads/2021/04/cha-bo.jpg" alt="">
            <div class="N-card-body">
                <p class="N-card-title">Chả Gia Vị</p>
                <p class="N-card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content. </p>
            </div>
        </div>
    </div>
    <div class="N-see-more">
        <a class="N-btn N-btn-see-more" href="<?= Redirect("Stories") ?>">Tìm hiểu thêm</a>
    </div>
</section>

<link rel="stylesheet" href="<?= ROOT_URL ?>Assets/css/HomeStyle.css">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="<?= ROOT_URL ?>Assets/js/home.js"></script>