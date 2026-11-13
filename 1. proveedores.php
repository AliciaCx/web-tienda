<?php

$conn= new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "");

$cons = "SELECT nombre_empresa from proveedor";
$res =$conn->query($cons);
$proveedores=$res->fetchAll(PDO::FETCH_ASSOC);

header("Content-type: application/json");
echo json_encode($proveedores);
$conn=null;
