<section class="h-content">
    <div class="img-content">
        <img class="h-img" src="https://chaluacosa.com/wp-content/uploads/2017/07/lam-cha-lua-ngon-don-gian-tai-nha.jpg" alt="">
    </div>
    <div class="h-questions">
        <div class="h-accordion">
            <?php foreach ($data["qaaList"] as $qaa) { ?>
                <div class="h-container">
                    <div class="h-label"><?= $qaa["question"] ?></div>
                    <div class="h-text"><?= $qaa["answer"] ?></div>
                </div>
                <hr>
            <?php } ?>
        </div>
    </div>
</section>
<?=
RenderJs("QAA");
RenderCSS("QAA")
?>