<?php
$db->update('comments', $_POST, $_GET['id']);
flash()->success('Post update');
header('Location: /');
exit;