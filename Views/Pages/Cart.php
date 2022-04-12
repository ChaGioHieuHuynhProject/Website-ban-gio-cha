<section class="cart">
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
            <tr>
                <td>1</td>
                <td><img id="tbl-img"
                        src="https://product.hstatic.net/1000003969/product/kem_bl121_1_073669c67b0d420983f1a91dbdf6a6c6_grande.jpg"
                        alt=""></td>
                <td>Balo 2 Ngăn Có Túi Nhỏ Trang Trí Phía Trước</td>
                <td id="cost">500000 VNĐ</td>
                <td>
                    <div class="number-input">
                        <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"></button>
                        <input class="quantity" min="1" name="quantity" value="1" type="number">
                        <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus"></button>
                    </div>
                </td>
                <td id="total">500000 VNĐ</td>
                <td><button class="del-btn" onclick="">X</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td><img id="tbl-img"
                        src="https://product.hstatic.net/1000003969/product/kem_bl121_1_073669c67b0d420983f1a91dbdf6a6c6_grande.jpg"
                        alt=""></td>
                <td>Balo 2 Ngăn Có Túi Nhỏ Trang Trí Phía Trước</td>
                <td id="cost">500000 VNĐ</td>
                <td>
                    <div class="number-input">
                        <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"></button>
                        <input class="quantity" min="1" name="quantity" value="1" type="number">
                        <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus"></button>
                    </div>
                </td>
                <td id="total">500000 VNĐ</td>
                <td><button class="del-btn" onclick="">X</button></td>
            </tr>
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
</section>
<?=RenderCSS("Cart");
RenderJs("Cart");
?>
