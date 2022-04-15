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

<?= RenderCSS("Login") ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>