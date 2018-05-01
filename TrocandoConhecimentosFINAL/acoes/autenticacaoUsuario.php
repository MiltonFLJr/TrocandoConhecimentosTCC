<?php

require_once(__DIR__.'/../classes/Usuario.php');

$email=$_POST['email'];
$senha=$_POST['senha'];

$us = new Usuario();

$us->consultarConta($email, $senha);

