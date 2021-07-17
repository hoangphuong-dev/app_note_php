<?php 
require_once 'core/init.php';
$session->destroy();
header('Location: index.php');