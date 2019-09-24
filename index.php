<?php
//create a function to connect to the database
//add attribute that will allow to extract only associative arrays
function dbConn(){
    $db = new PDO('mysql:host=db; dbname=cosminCollection', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}
//create a function to fetch data from database
//after fetching the data we will obtain a multidimensional array with associative arrays
function getCarsFromDb($db){
    $query = $db->prepare("SELECT `Brand`,`Model`,`Year` FROM `Cars`;");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}
$db = dbConn();
$result = getCarsFromDb($db);


