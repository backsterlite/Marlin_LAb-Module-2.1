<?php $this->layout('layout', ['title' =>  "Posts at {$post['created_at']} "]) ?>

<!--================ Hero sm Banner start =================-->
<section class="mb-30px">
    <div class="container">
        <div class="hero-banner hero-banner--sm">
            <div class="hero-banner__content">
                <h1>Posts at <?= $post['created_at']?>  </h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $post['created_at']?>  </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--================ Hero sm Banner end =================-->

<!--================ Start Blog Post Area =================-->
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