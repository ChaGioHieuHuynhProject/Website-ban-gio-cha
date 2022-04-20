<script src=”https://unpkg.com/babel-standalone@6/babel.min.js”></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<section class="signup-form">
    <div class="modal">
        <a href="http://localhost:8080/Website-ban-gio-cha/Admin/<?= $_SESSION["indexPage"] ?>"><i class="fa-solid fa-xmark"></i></a>
        <div class="modal-container">
            <div class="modal-left">
                <h1 class="modal-title">Đăng Ký</h1>
                <form action="" method="Post">
                    <div class="input-block">
                        <label for="email" class="input-label">Email</label>
                        <input type="text" name="user-email" required>
                    </div>
                    <div class="input-block">
                        <label for="password" class="input-label">Mật Khẩu</label>
                        <input type="password" name="user-password" required>
                    </div>
                    <div class="input-block">
                        <label for="password" class="input-label">Nhập Lại Mật Khẩu</label>
                        <input type="password" name="enter-the-password" required>
                    </div>
                    <h5 id="error"><?= $data["error"] ?></h5>
                    <div class=" modal-buttons">
                        <button class="input-button" name="signup">Đăng Ký</button>
                    </div>
                </form>
            </div>
            <div class="modal-right">
                <img src="../Assets/img/backgroundloginsignup.PNG" alt="">
            </div>
        </div>
    </div>
</section>
<?= RenderCSS("modal");
RenderJs("modal")
?>