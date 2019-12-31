<?php $this->layout('layout', ['title' =>  "{$tag['title']} Tag"]) ?>

<!--================ Hero sm Banner start =================-->
<section class="mb-30px">
    <div class="container">
        <div class="hero-banner hero-banner--sm">
            <div class="hero-banner__content">
                <h1>&lang;<?= $tag['title']?>&rang; Tag </h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $tag['title']?> Tag </li>
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

                        <div class="col-md-6">
                            <h3>К сожалению еще нет ни одного поста  тегом : "<?= $tag['title'];?>"</h3><br>
                            <h3>Будьте первыми</h3>
                        </div>

                </div>
            </div>
            <!-- Start Blog Post Siddebar -->
            <?= $this->insert('partials/sidebar')?>
            <!-- End Blog Post Siddebar -->
        </div>
</section>
