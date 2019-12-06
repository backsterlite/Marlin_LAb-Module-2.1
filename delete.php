<?php

$id = $_GET['id'];
$db->delete('comments', $id);
header('Location:/');
exit;