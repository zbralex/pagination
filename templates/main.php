<a href="/"><h1>На главную</h1></a>
<form action="/search.php" method="get" enctype="multipart/form-data">
    <div class="search_wrap">
        <input  type="text" name="q" class="search search__input" placeholder="Поиск...">
        <input type="submit" class="search search__btn"  value="Найти">
    </div>

</form>

<ul>
    <?php foreach ($items as $item): ?>
        <li class="item"><a href="/item.php?<?= http_build_query([
                'id' => $item['id']
            ]) ?>">
                <strong><?= $item['id']; ?></strong>
                <?= $item['name']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
<?= isset($pagination) ? $pagination : '' ?>

