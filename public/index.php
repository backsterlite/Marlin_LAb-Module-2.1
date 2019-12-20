<?php

use Aura\SqlQuery\QueryFactory;

if( !session_id() ) @session_start();
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/app/start.php';
