<div class="container">
<section class="login">
    <form method="post" class="register-right hidden" id="register-right" style="background-image: url('<?=ROOT_URL?>Assets/img/bg.jpeg');">
        <h1>Đăng Ký</h1>
        <input placeholder="Họ tên *" type="text" name="name" id=""><br>
        <input placeholder="Email *" type="email" name="email" id=""><br>
        <input placeholder="Điện thoại *" type="tel" name="phone-number" id=""><br>
        <input placeholder="Địa chỉ *" type="text" name="address" id=""><br>
        <input placeholder="Mật khẩu *" type="password" name="password" id=""><br>
        <!-- <input placeholder="Nhập lại mật khẩu *" type="email" name="" id=""><br> -->
        <div class="error" style="color:red"><?=!empty($data["registerMessage"]) ? $data["registerMessage"] : ""?></div>
        <button class="btn-login" onclick="animation_login()">Đăng Nhập</button><br>
        <button class="btn-signup" name="register" type="submit">Đăng Ký</button><br>
    </form>
    <form method="post" class="login-left" id="login-left" style="background-image: url('<?=ROOT_URL?>Assets/img/bg.jpeg');">
        <h1>Đăng Nhập</h1>
        <input placeholder="Số điện thoại *" type="tel" name="phone-number" id="" required="Vui lòng nhập số điện thoại"><br>
        <input placeholder="Mật khẩu *" type="password" name="password" id="" required><br>
        <a href="http://">Quên mật khẩu</a><br>
        <div class="error" style="color:red"><?=!empty($data["loginMessage"]) ? $data["loginMessage"] : ""?></div>
        <button class="btn-login" name="login" type="submit">Đăng Nhập</button><br>
        <button class="btn-signup" onclick="animation_register()">Đăng Ký</button><br>    
    </form>
    
    <div class="login-right">
        <i class="fa-solid fa-circle-xmark login-exit "></i>
        <img id="bg-login" src="<?=ROOT_URL?>Assets/img/Chagiavitg.jpg" alt="">
        <img id="bg-register" class="hidden" src="<?=ROOT_URL?>/Assets/img/giolua.jpg" alt="">
    </div>
</section>
</div>

<link rel="stylesheet" href="<?=ROOT_URL?>Assets/css/Login-Register.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?=ROOT_URL?>Assets/js/Login-Register.js"></script>

