
    <script src=”https://unpkg.com/babel-standalone@6/babel.min.js”></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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

<?= RenderCSS("Login");
    RenderCSS("modal");
    RenderJs("modal")
 ?>