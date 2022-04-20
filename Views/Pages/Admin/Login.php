<!-- <section class="login-form">
    <div class="container">
        <div class="login">
            <form method="post" class="login-left" id="login-left" style="background-image: url(<?= ImageLink("bg.jpeg") ?>);">
                <h1>Đăng Nhập</h1>
                <input placeholder="Email *" type="tel" name="email" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Vui lòng nhập email')"><br>
                <input placeholder="Mật khẩu *" type="password" name="password" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu')"><br>
                <a href="http://">Quên mật khẩu</a><br>
                <div class="error-message"><?= !empty($data["loginMessage"]) ? $data["loginMessage"] : "" ?></div>
                <button class="btn-login" name="login" type="submit">Đăng Nhập</button><br>
            </form>

            <div class="login-right">
                <i class="fa-solid fa-circle-xmark login-exit "></i>
                <img id="bg-login" src="<?= ImageLink("giolua.jpg") ?>" alt="">
            </div>
        </div>
    </div>
</section> -->

    <script src=”https://unpkg.com/babel-standalone@6/babel.min.js”></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="http://localhost:8080/T%E1%BB%B1%20h%E1%BB%8Dc%20PHP/otakuvn/public/css/modalChaitan.css">
    <section class="login-form">
        <div class="modal">
            <div class="modal-container">
                <div class="modal-left">
                    <h1 class="modal-title">Đăng Nhập</h1>
                    <form method="post" id="login-left">
                        <div class="input-block">
                            <label for="email" class="input-label">Email</label>
                            <input type="tel" name="email" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Vui lòng nhập email')">
                        </div>
                        <div class="input-block">
                            <label for="password" class="input-label">Mật Khẩu</label>
                            <input type="password" name="password" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu')">
                        </div>
                        <div class="error-message"><?= !empty($data["loginMessage"]) ? $data["loginMessage"] : "" ?></div>
                        <a href="http://">Quên mật khẩu</a>
                        <div class="modal-buttons">
                            <button class="input-button" name="login" type="submit">Đăng Nhập</button>
                        </div>
                    </form>
                </div>
                <div class="modal-right">
                    <img src="../Assets/img/backgroundloginsignup.PNG" alt="">
                </div>
            </div>
        </div>
    </section>
    <script src="http://localhost:8080/T%E1%BB%B1%20h%E1%BB%8Dc%20PHP/otakuvn/public/js/modal.js"></script>

<?= RenderCSS("Login") ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>