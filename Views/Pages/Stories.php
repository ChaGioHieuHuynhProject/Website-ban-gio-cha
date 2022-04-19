<section class="N-container">
    <div class="N-title">
        <p>Câu chuyện mỗi ngày</p>
    </div>
    <div class="N-layout">
        <?php foreach ($data["storyList"] as $index => $story) { ?>
            <div class="story<?= $index % 2 == 1 ? " reverse" : "" ?>">
                <div class="N-layout-img-item">
                    <img class="N-img" src="<?= ImageLink($story["img"]) ?>" alt="">
                </div>
                <div class="N-layout-text-item">
                    <p class="N-text-title"><?= $story["title"] ?></p>
                    <p class="N-text-content"><?= $story["content"] ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<?= RenderCSS("Stories") ?>