<?php
if( !session_id() ) @session_start();
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/helpers.php';
$config = require_once dirname(__DIR__) . '/config.php';
 require_once dirname(__DIR__) . '/routes.php';
