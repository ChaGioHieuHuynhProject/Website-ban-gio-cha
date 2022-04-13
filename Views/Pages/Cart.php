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
                    <th colspan="2">Thành Tiền</th>
                </tr>
            </thead>
            <tbody id="tbl">
                <?php foreach ($data["detailList"] as $index => $detail) { ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><img class="tbl-img" src="<?= ImageLink($detail["productInfo"]["img"]) ?>" alt=""></td>
                        <td><?= $detail["productInfo"]["name"] ?></td>
                        <td id="cost"><?= $detail["productInfo"]["price"] ?> VND</td>
                        <td>
                            <div class="number-input">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown();update(<?= $index ?>, this.parentNode.querySelector('input[type=number]').value)"></button>
                                <input class="quantity" min="1" name="quantity" value="1" type="number">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp(); update(<?= $index ?>, this.parentNode.querySelector('input[type=number]').value)" class="plus"></button>
                            </div>
                        </td>
                        <td id="total"><?= $detail["productInfo"]["price"] * $detail["quantity"] ?> VNĐ</td>
                        <td><a class="del-btn" href="<?= Redirect("Cart", "Delete") . "/$index" ?>">X</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="below">
            <div class="confirm">
                <table cellspacing="0">
                    <tr>
                        <td>Tổng gía</td>
                        <td class="confirm-title-right">100000 VNĐ</td>
                    </tr>
                    <tr>
                        <td>Phí vận chuyển</td>
                        <td class="confirm-title-right">100000 VNĐ</td>
                    </tr>
                    <tr>
                        <td>Giảm giá</td>
                        <td class="confirm-title-right">100000 VNĐ</td>
                    </tr>
                    <tr>
                        <td class="confirm-title">Tổng thanh toán</td>
                        <td class="confirm-title confirm-title-right">100000 VNĐ</td>
                    </tr>
                </table>
                <button class="confirm-btn">XÁC NHẬN</button>
            </div>
        </div>
    <?php } ?>
</section>
<?= RenderCSS("Cart");
RenderJs("Cart");
?>