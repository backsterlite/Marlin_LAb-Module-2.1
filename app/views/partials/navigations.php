<?php if(components(\Delight\Auth\Auth::class)->isLoggedIn()) :?>
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="/"><img src="/public/assets/img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-center">
                        <li class="nav-item active"><a class="nav-link" href="<?= config('link')['home']?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= config('link')['userProfile'] . components(\Delight\Auth\Auth::class)->getUserId();?>">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= config('link')['category']?>">Category</a>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">Post</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="/post/create">Add</a></li>
                                <li class="nav-item"><a class="nav-link" href="/post/add">AddXNotes</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="<?= config('link')['autor'] .components(\Delight\Auth\Auth::class)->getUserId();?>">My Posts</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right navbar-social">
                        <li><a href="/user/logout" ><i class="ti-unlock mr-2"></i></a>|</li>
                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                        <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                        <li><a href="#"><i class="ti-instagram"></i></a></li>
                        <li><a href="#"><i class="ti-skype"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<?php else: ?>
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="/"><img src="/public/assets/img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-center">
                        <li class="nav-item active"><a class="nav-link" href="<?= config('link')['home']?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= config('link')['category']?>">Category</a>
                    </ul>
                    <ul class="nav navbar-nav navbar-right navbar-social">
                        <li><a href="/user/login" ><i class="ti-lock mr-2"></i></a>|</li>
                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                        <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                        <li><a href="#"><i class="ti-instagram"></i></a></li>
                        <li><a href="#"><i class="ti-skype"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<?php endif; ?>