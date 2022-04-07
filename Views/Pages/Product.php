this is product page

<table>
    <thead>
        <th>ID</th>
        <th>Name</th>
    </thead>
    <tbody>
        <?php 
            if (is_null($data["data"])) {
                echo "<h3>Sorry, No product to show!</h3>";
            }
            else 
                foreach($data["productList"] as $product) { ?>
        <tr>
            <td><?=$product['id']?></td>
            <td><?=$product["name"]?></td>
            <td><button onclick="location.href='http://localhost//Product/Detail/<?=$product['id']?>'">detail</button>
            </td>
        </tr>
        <?php }
        ?>
    </tbody>
</table>
<section class="products">
    <div class="container">
        <h1>SẢN PHẨM NỔI BẬT</h1>
        <div class="content">
            <div class="div-image">
                <img src="https://photo-cms-kienthuc.zadn.vn/zoom/800/uploaded/hoangthao/2021_04_28/lam_cha_gio_1_SWUD.jpg"
                    alt="" />
                <p class="title">Chả lụa</p>
                <div class="overlay"></div>
                <div class="button"><a href="http://127.0.0.1:5500/PROJECT/products.html"> Xem Thêm </a></div>
                <div class="block"></div>
            </div>
            <div class="div-image">
                <img src="https://photo-cms-kienthuc.zadn.vn/zoom/800/uploaded/hoangthao/2021_04_28/lam_cha_gio_1_SWUD.jpg"
                    alt="" />
                <p class="title">Chả lụa</p>
                <div class="overlay"></div>
                <div class="button"><a href="http://127.0.0.1:5500/PROJECT/products.html"> Xem Thêm </a></div>
                <div class="block"></div>
            </div>
            <div class="div-image">
                <img src="https://photo-cms-kienthuc.zadn.vn/zoom/800/uploaded/hoangthao/2021_04_28/lam_cha_gio_1_SWUD.jpg"
                    alt="" />
                <p class="title">Chả lụa</p>
                <div class="overlay"></div>
                <div class="button"><a href="http://127.0.0.1:5500/PROJECT/products.html"> Xem Thêm </a></div>
                <div class="block"></div>

            </div>
        </div>
    </div>
</section>
<link rel="stylesheet" href="<?=ROOT_URL?>Assets/css/product.css">