<section class="h-content">
    <div class="img-content">
        <img class="h-img" src="https://chaluacosa.com/wp-content/uploads/2017/07/lam-cha-lua-ngon-don-gian-tai-nha.jpg"
            alt="">
    </div>
    <div class="h-questions">
        <div class="h-accordion">
            <?php foreach($data["qaaList"] as $qaa) { ?>
            <div class="h-container">
                <div class="h-label"><?=$qaa["question"]?></div>
                <div class="h-text"><?=$qaa["answer"]?></div>
            </div>
            <hr>
            <?php } ?>
            <!-- <div class="h-container">
                <div class="h-label">Giò chả có thể vận chuyển đi xa được không?</div>
                <div class="h-text">CSS stands for Cascading Style Sheets. It is the language for describing the
                    presentation of Web pages, including colours, layout, and fonts, thus making our web pages
                    presentable to the users. CSS is designed to make style sheets
                    for the web. It is independent of HTML and can be used with any XML-based markup language. CSS
                    is popularly called the design language of the web.
                </div>
            </div>
            <hr>
            <div class="h-container">
                <div class="h-label">Cách thức thanh toán?</div>
                <div class="h-text">JavaScript is a scripting or programming language that allows you to implement
                    complex features on web pages — every time a web page does more than just sit there and display
                    static information for you to look at — displaying timely
                    content updates, interactive maps, animated 2D/3D graphics, scrolling video jukeboxes, etc. —
                    you can bet that JavaScript is probably involved. It is the third of the web trio.</div>
            </div>
            <hr>
            <div class="h-container">
                <div class="h-label">Cách thức đổi trả hàng lỗi (nếu có)?</div>
                <div class="h-text">React is a JavaScript library created for building fast and interactive user
                    interfaces for web and mobile applications. It is an open-source, component-based, front-end
                    library responsible only for the application’s view layer.
                    In Model View Controller (MVC) architecture, the view layer is responsible for how the app looks
                    and feels. React was created by Jordan Walke, a software engineer at Facebook. </div>
            </div> -->
        </div>
    </div>
</section>
<?=
RenderJs("QAA");
RenderCSS("QAA")
?>