<?php

$conn= new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "");

$cons = "select*from empleado2";
$res =$conn->query($cons);
$empleados=$res->fetchAll(PDO::FETCH_ASSOC);

header("Content-type: application/json");
echo json_encode($empleados);
$conn=null;

