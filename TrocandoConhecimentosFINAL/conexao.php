<?php

$user = "root";
$password = "";
    try{
$con = new PDO('mysql:host=localhost;dbname=id2832453_trocalivro',$user,$password);

$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $ex){
   echo "ERROR: ". $ex->getMessage();
   }