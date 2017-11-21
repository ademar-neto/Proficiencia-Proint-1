<?php
require_once('../config.php');
require_once(DBAPI);
$denuncias = null;
$denuncia = null;
/**
 *  Listagem de Clientes
 */
function index() {
	global $denuncias;
	$denuncias = find_all('denuncias');
}
/**
 *  Cadastro de Clientes
 */
function add() {
  if (!empty($_POST['denuncia'])) {
    
    $today = 
      date_create('now', new DateTimeZone('America/Maceio'));
    $denuncia = $_POST['denuncia'];
    $denuncia['modified'] = $denuncia['created'] = $today->format("Y-m-d H:i:s");
    
    save('denuncias', $denuncia);
    header('location: index.php');
  }
}
/**
 *	Atualização/Edição de Cliente
 */
function edit() {
  $now = date_create('now', new DateTimeZone('America/Maceio'));
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['denuncia'])) {
      $denuncia = $_POST['denuncia'];
      $denuncia['modified'] = $now->format("Y-m-d H:i:s");
      update('denuncias', $id, $denuncia);
      header('location: index.php');
    } else {
      global $denuncia;
      $denuncia = find('denuncias', $id);
    } 
  } else {
    header('location: index.php');
  }
}
/**
 *  Visualização de um Cliente
 */
function view($id = null) {
  global $denuncia;
  $denuncia = find('denuncias', $id);
}
/**
 *  Exclusão de um Cliente
 */
function delete($id = null) {
  global $denuncia;
  $denuncia = remove('denuncias', $id);
  header('location: index.php');
}
?>
