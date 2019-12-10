<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/helpers.php';
$config = require_once dirname(__DIR__) . '/config.php';
$db = require_once dirname(__DIR__) .'/Database/start.php';
$key = require_once dirname(__DIR__) . '/routes.php';
include  dirname(__DIR__) . $key.".php";

