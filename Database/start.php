<?php


require_once 'Connection.php';
require_once 'QueryBuilder.php';

return new QueryBuilder(Connection::make($config['database']));