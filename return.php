<?php

//alterando o header para permitir requisições de outros sites
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST ,PUT ,DELETE ,OPTIONS");
header("Content-Type: application/json");

//função do php que transforma um array normal e um jsson
echo json_encode($array);
exit;