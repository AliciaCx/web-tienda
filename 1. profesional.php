<?php

$conn= new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "");

$cons = "select nombre, apellido from profesional";
$res =$conn->query($cons);
$profesional=$res->fetchAll(PDO::FETCH_ASSOC);

header("Content-type: application/json");
echo json_encode($profesional);
$conn=null;
