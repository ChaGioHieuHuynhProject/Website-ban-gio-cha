<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$data['page']?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <section class="header">
            <!-- <div></div> -->
            <div class="header-logo">
                <img class="header-logo__img" src="Assets/img/Logo.png" alt="">
            </div>
            <ul class="header-menu">
                <li><a href="homePage.php">TRANG CHỦ</a></li>
                <li><a href="aboutUs.php">VỀ CHÚNG TÔI</a></li>
                <li><a href="products.php">SẢN PHẨM</a></li>
                <li><a href="stories.php">CÂU CHUYỆN</a></li>
                <li><a href="review.php">ĐÁNH GIÁ</a></li>
                <li><a href="qa.php">HỎI ĐÁP</a></li>
                <li><a href="contact.php">LIÊN HỆ</a></li>
            </ul>
            <div>
                <div class="header__btn">
                    <input type="text" placeholder="Tìm kiếm...">
                    <i class="fas fa-shopping-cart header-icon__btn"></i>
                    <i class="fa-solid fa-user header-icon__btn"></i>
                </div>
            </div>
        </section>
    </header>
    <?php require_once "./Views/Pages/{$data['page']}.php"?>
    <footer>
        <section class="footer">
            <div class="footer__top">
                <div class="footer-logo">
                    <img class="footer-logo__img" src="Assets/img/Logo.png" alt="">
                </div>
                <div class="footer-contact">
                    <h3>CONTACT</h3>
                    <p for=""><i class="fa-solid fa-location-dot footer-icon__btn"></i>40 Đường Trần Duy Chiến, Mân Thái, Sơn Trà, Đà Nẵng.</p>
                    <p for=""><i class="fa-solid fa-phone footer-icon__btn"></i>(+84) 905 101 471</p>
                    <p for=""><i class="fa-solid fa-earth-americas footer-icon__btn"></i><a href="XXX">https://chagiohieuhuynh.com/</a></p>
                    <p for=""><i class="fa-brands fa-facebook footer-icon__btn"></i><a href="XXX">https://chagiohieuhuynh.fb/</a></p>
                </div>
                <div class="footer-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.5738676067235!2d108.24145561482648!3d16.087588043218915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314217f3807e8a07%3A0x9631e77f9843d8d2!2zNDAgxJAuIFRy4bqnbiBEdXkgQ2hp4bq_biwgTcOibiBUaMOhaSwgU8ahbiBUcsOgLCDEkMOgIE7hurVuZywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1648148234705!5m2!1svi!2s" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="footer-description">
                    <h3>GIÒ CHẢ HIẾU HUYNH</h3>
                    <p>Giò chả Hiếu Huỳnh là một cơ sỏ sản xuất gia truyền hơn 30 năm. Đã được chứng nhận bởi OCOP. Tự hào là cơ sở sản xuất chất lượng. Đảm bảo, tự tin đem đến cho khách hàng những sản phẩm tốt nhất!</p>
                </div>
            </div>
            <div class="footer__bottom">© 2023 by <span><a href="https://www.passerellesnumeriques.org/en/our-actions/vietnam/"> Passerelles numériques Vietnam</a></span> students</div>
        </section>
    </footer>
</body>
</html>
