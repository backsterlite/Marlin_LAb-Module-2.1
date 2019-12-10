<?php
$db->update('comments', $_POST, $_GET['id']);
header('Location: /');
exit;