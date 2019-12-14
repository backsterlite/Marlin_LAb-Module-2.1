<?php if($check): ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">BLog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="/post/add" title="Зарегестрируйтесь">Add <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/post/add/30">Add 30  </a>
            </li>
        </ul>
        <div class="col-md text-center">
            <p>Добро пожаловать <strong><?php echo auth()->getUsername(); ?></strong></p>
        </div>
        <ul class="navbar-nav ">
            <li class="nav-item ">
                <a title="comingSoon" class="nav-link mr-sm-2 disabled" href="/user/profile" >Profile </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link mr-sm-2" href="/user/logout">Logout </a>
            </li>
        </ul>

    </div>
</nav>
<?php else: ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">BLog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link disabled" href="/post/add" title="Зарегестрируйтесь">Add <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <ul class="navbar-nav ">
            <li class="nav-item ">
                <a class="nav-link mr-sm-2" href="/user/login">Login </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link mr-sm-2" href="/user/register">Register </a>
            </li>
        </ul>
    </div>
</nav>
<?php endif; ?>