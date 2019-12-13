<?php if ($paginator->getNumPages() > 1): ?>
<ul class="pagination justify-content-center">
<?php if ($paginator->getPrevUrl()): ?>
    <li class="page-item"><a class="page-link" href="<?php echo $paginator->getPrevUrl(); ?>">&laquo; Previous</a></li>
<?php endif; ?>

<?php foreach ($paginator->getPages() as $page): ?>
    <?php if ($page['url']): ?>
        <li class="page-item" <?php echo $page['isCurrent'] ? 'class="active"' : ''; ?>>
            <a class="page-link" href="<?php echo $page['url']; ?>"><?php echo $page['num']; ?></a>
        </li>
    <?php else: ?>
        <li class="page-item disabled"><span><?php echo $page['num']; ?></span></li>
    <?php endif; ?>
<?php endforeach; ?>

<?php if ($paginator->getNextUrl()): ?>
    <li class="page-item"><a class="page-link" href="<?php echo $paginator->getNextUrl(); ?>">Next &raquo;</a></li>
<?php endif; ?>
</ul>
<?php endif; ?>
<p>
    Всего  <?php echo  $paginator->getTotalItems(); ?> Постов .

    Выведено
    <?php echo $paginator->getCurrentPageFirstItem(); ?>
    -
    <?php echo $paginator->getCurrentPageLastItem(); ?>.
</p>