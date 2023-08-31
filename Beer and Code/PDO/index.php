<?php 
require_once('config.php');

$nome = 'Icaro Jobs';

$query = $pdo->prepare("SELECT * FROM usuarios WHERE nome = :nome");
$query->execute(['nome' => $nome]);

$resultado = $query->fetch();

var_dump($resultado);
?>