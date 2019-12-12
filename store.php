<?php
$db->store('comments', $_POST);
flash()->success('Post added');
header('Location:/');
exit;