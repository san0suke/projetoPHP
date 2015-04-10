<?php
function __autoload($classe) {
	require_once "classes/$classe.php";
}