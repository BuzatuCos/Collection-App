<?php
//create a function to connect to the database
//add attribute that will allow to extract only associative arrays
function dbConn():PDO{
    $db = new PDO('mysql:host=db; dbname=cosminCollection', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}
//create a function to fetch data from database
//after fetching the data we will obtain a multidimensional array with associative arrays
function getCarsFromDb(PDO $db) :array {
    $query = $db->prepare("SELECT `Brand`,`Model`,`Year` FROM `Cars`;");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}
$db = dbConn();
$result = getCarsFromDb($db);
//create function will iterate  through my multidimensional array
//extract the keys from the associative array
//extract the value from each associative array
//prepare the data to be output
function extractDataForOutput(array $result) :string
{
    $output = '';
    foreach ($result as $array) {
        $key = array_keys($array);
        $output .='<div class="rows">' . '<p class="brand">' . $key[0] . ' ' . $array[$key[0]] . '</p>' . '<p class="model">' . $key[1] . ' ' . $array[$key[1]] . '</p>' . ' ' . '<p class="year">' . $key[2] . ' ' . $array[$key[2]] . '</p>' . '</div>';
    }
    return $output;
}

$output = extractDataForOutput($result);
echo $output;
?>

