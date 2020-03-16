<?php if ($pages_count > 1): ?>
    <div class="pagination">
        <ul class="pagination__control">
            <?php foreach ($pages as $page): ?>
                <a href="/catalog.php?page=<?= $page; ?>"
                   class="pagination__link <?php if ($page == $cur_page): ?>pagination__link--active<?php endif; ?>">
                    <li class="pagination__item <?php if ($page == $cur_page): ?>pagination__item--active<?php endif; ?>">
                        <?= $page; ?>
                    </li>
                </a>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
