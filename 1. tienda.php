<?php

$conn= new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "");

$cons = "SELECT * from tienda";
$res =$conn->query($cons);
$tiendas=$res->fetchAll(PDO::FETCH_ASSOC);

header("Content-type: application/json");
echo json_encode($tiendas);
$conn=null;
