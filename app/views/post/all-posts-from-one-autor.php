<?php $this->layout('layout', ['title' =>  "{$user['username']} Posts"]) ?>

<!--================ Hero sm Banner start =================-->
<section class="mb-30px">
    <div class="container">
        <div class="hero-banner hero-banner--sm">
            <div class="hero-banner__content">
                <h1><?= $user['username']?> Posts </h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $user['username']?>  </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--================ Hero sm Banner end =================-->
        <?php if(components(\Delight\Auth\Auth::class)->getUserId() == $user['id']): ?>
<!--================ Start Blog Post Area =================-->

<section class="blog-post-area section-margin">
    <div class="container">
        <?= flash(); ?>
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <?php foreach ($posts as $post): ?>
                        <div class="col-md-6">
                            <div class="single-recent-blog-post card-view">
                                <div class="thumb">
                                    <img height="250" class="card-img rounded-0" src="<?= getImage('post', $post['image'])?>" alt="">
                                    <ul class="thumb-info">
                                        <li><a href="<?= config('link')['autor'] . $post['user_id'] ?>"><i class="ti-user"></i><?= acert(getUser($post['user_id'])['username'], 10)?></a></li>
                                        <li><i class="ti-themify-favicon"></i><?= commentsCount($post['id'])?> Comments</li>
                                    </ul>
                                </div>
                                <div class="details mt-20">
                                    <a href="<?=config('link')['post'] . $post['slug']?>">
                                        <h3><?= $post['title']?></h3>
                                    </a>
                                    <p><?= $post['description']?></p>
                                    <a class="button1" href="<?= config('link')['post'] .'slug/'. $post['id']?>">Read More <i class="ti-arrow-right"></i></a>
                                    <a class="button1" href="<?=config('link')['post'] .'id/'. $post['id']?>/edit">Edit <i class="ti-pencil"></i></a>
                                    <a class="button1" href="<?=config('link')['post'] .'id/'. $post['id']?>/delete">Delete<i class="ti-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?= $this->insert('partials/paginate', ['paginator' => $paginator])?>
            </div>
            <!-- Start Blog Post Siddebar -->
            <?= $this->insert('partials/sidebar')?>
            <!-- End Blog Post Siddebar -->
        </div>
</section>
<?php else: ?>
<section class="blog-post-area section-margin">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <?php foreach ($posts as $post): ?>
                                    <div class="col-md-6">
                                        <div class="single-recent-blog-post card-view">
                                            <div class="thumb">
                                                <img class="card-img rounded-0" src="<?= getImage('post', $post['image'])?>" alt="">
                                                <ul class="thumb-info">
                                                    <li><a href="#"><i class="ti-user"></i><?= acert(getUser($post['user_id'])['username'], 10)?></a></li>
                                                    <li><a href="#"><i class="ti-themify-favicon"></i><?= commentsCount($post['id'])?> Comments</a></li>
                                                </ul>
                                            </div>
                                            <div class="details mt-20">
                                                <a href="/post/<?= $post['slug']?>">
                                                    <h3><?= $post['title']?></h3>
                                                </a>
                                                <p><?= $post['description']?></p>
                                                <a class="button" href="/post/<?= $post['id']?>">Read More <i class="ti-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <?= $this->insert('partials/paginate', ['paginator' => $paginator])?>
                        </div>
                        <!-- Start Blog Post Siddebar -->
                        <?= $this->insert('partials/sidebar')?>
                        <!-- End Blog Post Siddebar -->
                    </div>
            </section>

        <?php endif; ?>
