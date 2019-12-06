<?php
$db->update('comments', $_POST);
header('Location: /');
exit;