<?php

$id = $_GET['id'];
$db->delete('comments', $id);
flash()->success('Post delete');
header('Location:/');
exit;