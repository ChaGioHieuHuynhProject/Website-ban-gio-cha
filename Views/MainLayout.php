<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$data['page']?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=ROOT_URL?>Assets/css/mainLayout.css" type="text/css">
</head>
<body>
    <header>
        <section class="header">
            <!-- <div></div> -->
            <div class="header-logo">
                <img class="header-logo__img" src="<?=ROOT_URL?>Assets/img/Logo.png" alt="">
            </div>
            <ul class="header-menu">
                <li><a href="<?=Redirect("Index", "Home")?>">TRANG CHỦ</a></li>
                <li><a href="<?=Redirect("Index", "AboutUs")?>">VỀ CHÚNG TÔI</a></li>
                <li><a href="<?=Redirect("Index", "Product")?>">SẢN PHẨM</a></li>
                <li><a href="<?=Redirect("Index", "Stories")?>">CÂU CHUYỆN</a></li>
                <li><a href="<?=Redirect("Index", "Review")?>">ĐÁNH GIÁ</a></li>
                <li><a href="<?=Redirect("Index", "Qaa")?>">HỎI ĐÁP</a></li>
                <li><a href="<?=Redirect("Index", "Contact")?>">LIÊN HỆ</a></li>
            </ul>
            <div>
                <div class="header__btn">
                    <input type="text" placeholder="Tìm kiếm...">
                    <i class="fas fa-shopping-cart header-icon__btn"></i>
                    <a href="<?=Redirect("Index", "Login")?>"><i class="fa-solid fa-user header-icon__btn"></i></a>
                </div>
            </div>
        </section>
    </header>
    <?php require_once "./Views/Pages/{$data['page']}.php"?>
    <footer>
    <section class="footer">
        <div class="footer-top">
            <img class="footer-top__img" src="<?=ROOT_URL?>Assets/img/Logo.png" alt="">
            <div></div>
            <div class="footer-top-right">
                Theo dõi chúng tôi tại <a href=""><i class="fa-brands fa-facebook footer-top__icon"></i></a> <a href=""><i class="fa-solid fa-globe footer-top__icon"></i></a>
            </div>
        </div>
        <hr>
        <div class="footer-center">
            <div class="footer-center-left">
                <h1>ĐẶT HÀNG</h1>
                <p for=""><i class="fa-solid fa-location-dot footer-icon__btn"></i>40 Đường Trần Duy Chiến, Mân Thái, Sơn Trà, Đà Nẵng.</p>
                <p for=""><i class="fa-solid fa-phone footer-icon__btn"></i>(+84) 905 101 471</p>
                <p for=""><i class="fa-solid fa-earth-americas footer-icon__btn"></i><a href="XXX">https://chagiohieuhuynh.com/</a></p>
                <p for=""><i class="fa-brands fa-facebook footer-icon__btn"></i><a href="https://www.facebook.com/giochacoman">https://www.facebook.com/giochacoman</a></p>
            </div>
            <div class="footer-center-mid">
                <h1>KHÁM PHÁ</h1>
                <p><i class="fa-solid fa-circle-chevron-right footer-icon__btn"></i><a href="">Trang Chủ</a> </p>
                <p><i class="fa-solid fa-circle-chevron-right footer-icon__btn"></i><a href="">Về Chúng Tôi</a> </p>
                <p><i class="fa-solid fa-circle-chevron-right footer-icon__btn"></i><a href="">Sản Phẩm</a> </p>
                <p><i class="fa-solid fa-circle-chevron-right footer-icon__btn"></i><a href="">Câu Chuyện</a> </p>
                <p><i class="fa-solid fa-circle-chevron-right footer-icon__btn"></i><a href="">Đánh giá</a> </p>
                <p><i class="fa-solid fa-circle-chevron-right footer-icon__btn"></i><a href="">Hỏi đáp</a> </p>
                <p><i class="fa-solid fa-circle-chevron-right footer-icon__btn"></i><a href="">Liên Hệ</a> </p>
            </div>
            <div class="footer-center-right">
                <h1>VITRADE</h1>
                <img src="<?=ROOT_URL?>Assets/img/vitrade.jpg" alt="">
            </div>
        </div>
        <div class="footer-bottom">© 2022 by <a href="https://www.passerellesnumeriques.org/vi/">Passerelles numériques Vietnam</a> students </div>      
    </section>
    </footer>
</body>
</html>
