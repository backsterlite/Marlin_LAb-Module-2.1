<?php

error_reporting(-1);
if( !session_id() ) @session_start();
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/app/start.php';