<?php $this->layout('layout', ['title' => 'Blog']) ?>
<!--================Hero Banner start =================-->
<section class="mb-30px">
    <div class="container">
        <div class="hero-banner">
            <div class="hero-banner__content">
                <h3>Tours & Travels</h3>
                <h1>Amazing Places on earth</h1>
                <h4><?=  $now->format('F d, Y'); ?></h4>
            </div>
        </div>
    </div>
</section>
<!--================Hero Banner end =================-->
<!--================ Blog slider start =================-->
<section>
    <div class="container">
        <div class="owl-carousel owl-theme blog-slider">
            <?php foreach ($featuredPosts  as $featuredPost): ?>
            <div class="card blog__slide text-center">
                <div class="blog__slide__img">
                    <img class="card-img rounded-0" src="<?php echo __DIR__ .'/'. $featuredPost['image'] ?>" alt="">
                </div>
                <div class="blog__slide__content">
                    <a class="blog__slide__label" href="#">Show</a>
                    <h3><a href="#"><?php echo $featuredPost['title']; ?></a></h3>
                    <p><?= diffDates(date('Y,m,d,H,i,s', strtotime($featuredPost['date'])), $now); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!--================ Blog slider end =================-->


<section class="blog-post-area section-margin mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php foreach ($posts as $post): ?>
                <div class="single-recent-blog-post">
                    <div class="thumb">
                        <img class="img-fluid" src="<?php echo __DIR__ .'/'. $post['image'] ?>" alt="">
                        <ul class="thumb-info">
                            <li><a href="#"><i class="ti-user"></i><?php echo acert(getUser($post['user_id'])['username'], 10); ?></a></li>
                            <li><a href="#"><i class="ti-notepad"></i><?= date('F d,Y', strtotime($post['date']))?></a></li>
                            <li><a href="/post/comments/<?= $post['id'];?>"><i class="ti-themify-favicon"></i><?php echo commentsCount($post['id']);?> Comment(s)</a></li>
                            <li><a href="#"><i class="ti-eye"></i><?= $post['views'];?> View(s)</a></li>
                        </ul>
                    </div>
                    <div class="details mt-20">
                        <a href="/post/<?= $post['id'];?>">
                            <h3><?= $post['description']?></h3>
                        </a>
                        <p class="tag-list-inline">Tag: <?php foreach (getTags() as $tag): ?> <?php echo (end(getTags())['id'] != $tag['id'])?
                                '<a href=" /tag/' . $tag['id'] . '">' .  $tag['title'] . '</a>,': '<a href=" /tag/' . $tag['id'] . '">' .
                                                                                    $tag['title'] . '</a>'?> <?php endforeach; ?></p>
                        <p><?= $post['content']?></p>
                        <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div><!-- Start Blog Post Siddebar -->
            <?= $this->insert('partials/sidebar', ['categories' => $categories, 'popularPosts' => $popularPosts, 'tags' => $tags])?>
            <!-- End Blog Post Siddebar -->
        </div>
        <?= $this->insert('partials/paginate', ['paginator' => $paginator])?>
    </div>
</section>











