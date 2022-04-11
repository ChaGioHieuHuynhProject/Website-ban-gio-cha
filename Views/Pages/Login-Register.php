<div class="container">
    <div class="login">
        <form method="post" class="register-right hidden" id="register-right" style="background-image: url('<?= ROOT_URL ?>Assets/img/bg.jpeg');">
            <h1>Đăng Ký</h1>
            <input placeholder="Họ tên *" type="text" name="name" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Vui lòng nhập tên của bạn')"><br>
            <input placeholder="Email *" type="email" name="email" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Vui lòng nhập email của bạn')"><br>
            <input placeholder="Điện thoại *" type="tel" name="phone-number" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại')"><br>
            <input placeholder="Địa chỉ *" type="text" name="address" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Vui lòng nhập địa chỉ của bạn')"><br>
            <input placeholder="Mật khẩu *" type="password" name="password" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu mới')"><br>
            <div class="error-message"><?= !empty($data["registerMessage"]) ? $data["registerMessage"] : "" ?></div>
            <button class="btn-signup" name="register" type="submit">Đăng Ký</button><br>
            <button class="btn-login" type="button" onclick="animation_login()">Đăng Nhập</button><br>
        </form>
        <form method="post" class="login-left" id="login-left" style="background-image: url(<?=ImageLink("bg.jpeg")?>);">
            <h1>Đăng Nhập</h1>
            <input placeholder="Số điện thoại *" type="tel" name="phone-number" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại')"><br>
            <input placeholder="Mật khẩu *" type="password" name="password" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu')"><br>
            <a href="http://">Quên mật khẩu</a><br>
            <div class="error-message"><?= !empty($data["loginMessage"]) ? $data["loginMessage"] : "" ?></div>
            <button class="btn-login" name="login" type="submit">Đăng Nhập</button><br>
            <button class="btn-signup" type="button" onclick="animation_register()">Đăng Ký</button><br>
        </form>

        <div class="login-right">
            <i class="fa-solid fa-circle-xmark login-exit "></i>
            <img id="bg-login" src="<?=ImageLink("Chagiavitg.jpg")?>" alt="">
            <img id="bg-register" class="hidden" src="<?=ImageLink("giolua.jpg")?>" alt="">
        </div>
    </div>
</div>

<?= RenderCSS("Login-Register") ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?= RenderJs("Login-Register") ?>