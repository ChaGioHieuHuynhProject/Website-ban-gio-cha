<div class="N-layout">
    <div class="N-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.573867606748!2d108.2414556153612!3d16.08758804321766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314217f3807e8a07%3A0x9631e77f9843d8d2!2zNDAgxJAuIFRy4bqnbiBEdXkgQ2hp4bq_biwgTcOibiBUaMOhaSwgU8ahbiBUcsOgLCDEkMOgIE7hurVuZywgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1648747127271!5m2!1sen!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="N-form-contact">
        <form class="form-contact" action="" method="post">
            <input class="N-field" type="text" name="name" placeholder="Họ và Tên *" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Vui lòng nhập tên của bạn')">
            <input class="N-field" type="text" name="address" placeholder="Địa chỉ *" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Vui lòng nhập email của bạn')">
            <input class="N-field" type="text" name="phone-number" placeholder="Điện thoại *" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại của bạn')">
            <textarea class="N-field" name="note" cols="30" rows="8" placeholder="Lời nhắn *" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Vui lòng nhập lời nhắn đến shop')"></textarea>
            <div style="margin: 1rem 0; color: red; text-align: center">
                <?= empty($data["message"]) ? "" : $data["message"] ?></div>
            <button class="N-submit" type="submit" name="send-contact">Gửi</button>
        </form>
    </div>
</div>

<?= RenderCSS("Contact") ?>