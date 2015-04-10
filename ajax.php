<?php
header("Access-Control-Allow-Origin: *");

require_once 'autoload.php';
require_once "ajax/{$_POST['a']}/{$_POST['b']}.php";