<div class="item_detail">
    <a href="/"><h1>На главную</h1></a>
    <h1 class="item_detail-title">⚡️
        <?= $detail['name'] ?>
    </h1>

    <?php if (!empty($detail['description'])): ?>
        <h2> Описание:  </h2>
        <p>
            <?= $detail['description'] ?>
        </p>
    <?php endif; ?>
    <img src="<?= $detail['img'] ?>" alt="<?= $detail['description'] ?>">
</div>

