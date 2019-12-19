<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $this->e($title);?></title>
    <link rel="icon" href="/public/assets/img/Fevicon.png" type="image/png">

    <link rel="stylesheet" href="/public/assets/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/public/assets/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/public/assets/vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="/public/assets/vendors/linericon/style.css">
    <link rel="stylesheet" href="/public/assets/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="/public/assets/vendors/owl-carousel/owl.carousel.min.css">

    <link rel="stylesheet" href="/public/assets/css/style.css">
</head>
    <body>
        <!--================Header Menu Area =================-->
        <?= $this->insert('partials/navigations')?>
        <!--================Header Menu Area =================-->
        <main class="site-main">
            <!--================ Start Blog Post Area =================-->
                        <?=$this->section('content')?>

            <!--================ End Blog Post Area =================-->
        </main>
        <?= $this->insert('partials/footer')?>
        <script src="/public/assets/vendors/jquery/jquery-3.2.1.min.js"></script>
        <script src="/public/assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
        <script src="/public/assets/vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="/public/assets/js/jquery.ajaxchimp.min.js"></script>
        <script src="/public/assets/js/mail-script.js"></script>
        <script src="/public/assets/js/main.js"></script>
    </body>
</html>