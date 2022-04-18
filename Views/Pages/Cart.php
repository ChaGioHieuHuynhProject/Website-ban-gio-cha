<section class="cart">
    <?php if (empty($_SESSION[CART])) { ?>
    <div class="blank-cart">Bạn chưa thêm gì vào giỏ hàng!</div>
    <?php } else { ?>
    <table cellspacing="0" class="cart-table">
        <thead class="tbl-title">
            <tr>
                <th>STT</th>
                <th colspan="2">Sản Phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành Tiền</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="cart-tbl-body">
            <?php foreach ($data["detailList"] as $index => $detail) { ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><img class="tbl-img" src="<?= ImageLink($detail["productInfo"]["img"]) ?>" alt=""></td>
                <td><?= $detail["productInfo"]["name"] ?><?= $detail["massUnit"] == null ? '' : "({$detail['massUnit']})" ?>
                </td>
                <td><span id="price-<?= $index ?>"><?= $detail["price"] ?></span> VND</td>
                <td>
                    <div class="number-input">
                        <button
                            onclick="this.parentNode.querySelector('input[type=number]').stepDown();update(<?= $index ?>, this.parentNode.querySelector('input[type=number]').value)"></button>
                        <input min="1" value="<?= $detail["quantity"] ?>" type="number">
                        <button
                            onclick="this.parentNode.querySelector('input[type=number]').stepUp(); update(<?= $index ?>, this.parentNode.querySelector('input[type=number]').value)"
                            class="plus"></button>
                    </div>
                </td>
                <td class="total"><span id="total-<?= $index ?>"><?= $detail["price"] * $detail["quantity"] ?></span>
                    VNĐ</td>
                <td><a class="del-btn" href="<?= Redirect("Cart", "Delete") . "/$index" ?>">X</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="below">
        <div class="confirm">
            <div class="input-content">
                <input class="N-field" type="text" name="name" placeholder="Họ và Tên *" required
                    oninput="this.setCustomValidity('')"
                    oninvalid="this.setCustomValidity('Vui lòng nhập tên của bạn')">
                <input class="N-field" type="text" name="address" placeholder="Địa chỉ *" required
                    oninput="this.setCustomValidity('')"
                    oninvalid="this.setCustomValidity('Vui lòng nhập email của bạn')">
                <input class="N-field" type="text" name="phone-number" placeholder="Điện thoại *" required
                    oninput="this.setCustomValidity('')"
                    oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại của bạn')">
                <textarea class="N-field" name="note-contact" id="note" cols="30" rows="4" placeholder="Lời nhắn *"
                    required oninput="this.setCustomValidity('')"
                    oninvalid="this.setCustomValidity('Vui lòng nhập lời nhắn đến shop')">
            </textarea>
                <div style="margin: 1rem 0; color: red; text-align: center">
                    <?= empty($data["message"]) ? "" : $data["message"] ?>
                </div>
            </div>
            <div class="input-content">
                <table cellspacing="0">
                    <tr>
                        <td>Phí vận chuyển</td>
                        <td class="confirm-title-right">Sẽ được tính bởi chủ shop</td>
                    </tr>
                    <tr>
                        <td class="confirm-title">Tính tạm</td>
                        <td class="confirm-title confirm-title-right"><span id="temp-cost"></span> VNĐ</td>
                    </tr>
                </table>
            </div>
        </div>
        <button id="confirm-btn" onclick="confirmOrder()">XÁC NHẬN</button>
    </div>
    <?php } ?>
</section>
<?= RenderCSS("Cart");
RenderJs("Cart");
?>