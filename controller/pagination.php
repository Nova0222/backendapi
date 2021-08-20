<?php 



$number_pages = number_pages($items_config['items_per_page'], $connect); ?>
<nav aria-label="Page navigation">
<ul class="pagination">
<?php for($i = 1; $i <= $number_pages; $i++): ?>
<?php if (actual_page() === $i): ?>
<li class="active"><a><?php echo $i; ?> <span class="sr-only">(current)</span></a></li>
<?php else: ?>
<li><a href="<?php $_SERVER['HTTP_REFERER'] ?>?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
<?php endif ?>
<?php endfor; ?>
</ul>
</nav>