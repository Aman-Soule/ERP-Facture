<?php


require_once "model/model.php";

$employe = new Employe();
$data = $employe->getAllEmployes();

// Retourner en JSON pour DataTables
echo json_encode(["data" => $data]);