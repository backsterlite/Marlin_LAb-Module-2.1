
<div class="row">
    <div class="col-lg-12">
        <nav class="blog-pagination justify-content-center d-flex">
            <ul class="pagination">
                <?php if ($paginator->getPrevUrl()): ?>
                <li class="page-item">
                    <a href="<?= $paginator->getPrevUrl();?>" class="page-link" aria-label="Previous">
                              <span aria-hidden="true">
                                  <i class="ti-angle-left"></i>
                              </span>
                    </a>
                </li>
                <?php endif; ?>
                <?php foreach ($paginator->getPages() as $page): ?>
                <?php if ($page['url']): ?>
                <li <?php echo $page['isCurrent'] ? 'class="page-item active"' : 'class="page-item "'; ?>>
                    <a  class="page-link" <?php  echo $page['isCurrent'] ? null : 'href="' . $page['url'] . '"';?> ><?php echo $page['num']; ?></a>
                </li>
                <?php else: ?>
                <li class="page-item"><a href="#" class="page-link disabled"><?php echo $page['num']; ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php if ($paginator->getNextUrl()): ?>
                <li class="page-item">
                    <a href="<?= $paginator->getNextUrl()?>" class="page-link" aria-label="Next">
                              <span aria-hidden="true">
                                  <i class="ti-angle-right"></i>
                              </span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</div>
