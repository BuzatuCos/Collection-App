<?php
/**create a function to connect to the database
 * add attribute that will allow to extract only associative arrays
 *
 * @return PDO the database connection
 */
function dbConn(): PDO {
    $db = new PDO('mysql:host=db; dbname=cosminCollection', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

/**create a function to fetch data from database
 * after fetching the data we will obtain a multidimensional array with associative arrays
 *
 * @param PDO $db the database
 *
 * @return array a multidemnsional array fetch from database
 */
function getCarsFromDb(PDO $db): array {
    $query = $db->prepare("SELECT `Brand`,`Model`,`Year` FROM `Cars`;");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}

/**create function will iterate  through my multidimensional array
 * extract the keys from the associative array
 * extract the value from each associative array
 * prepare the data to be output
 *
 * @param array $result a multidimensional array generated from the database
 *
 * @return string extracting data from the array preparing for the html including div and p with different classes
 */
function extractDataForOutput(array $result): string
{
    $output = '';
    foreach ($result as $array) {
        if(array_key_exists('Brand',$array) === false || array_key_exists('Model',$array) === false || array_key_exists('Year',$array) === false) {
            return 'Error';
        }
        $output .= '<div class="rows">' . '<p class="brand">' . $array['Brand'] . '</p>' . '<p class="model">' . 'Model : ' . $array['Model'] . '</p>' . '<p class="year">' . 'Year : ' . $array['Year'] . '</p>' . '</div>';
        }
        return $output;

}

/**
 * @param $validation  input from the user through the post method
 *
 * trim() function removes extra spaces.
 *
 * stripslashes function removes backslashes
 *
 * htmlspecialchars — Convert special characters to HTML entities prevents Cross-Site Scripting (abbreviated as XSS)
 *
 * @return $validation it validates the data from the input
 */
function validation(string $data) :string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * @param string $brand Brand input from the user
 *
 * @param string $model Model input from the user
 *
 * @param string $year Year input from the user
 *
 * @param PDO $db Data base connection
 *
 * @return bool to execute the new input  into the database used Binding parameters for sanitisation purposes
 *
 */
function addNew(string $brand , string $model , string $year, PDO $db) {
    $query = $db->prepare("INSERT INTO `Cars` (`Brand`, `Model` , `Year`) VALUES (:brand, :model , :year)");
   $query->bindParam(':brand', $brand, PDO::PARAM_STR, 255);
    $query->bindParam(':model', $model, PDO::PARAM_STR, 255);
    $query->bindParam(':year', $year, PDO::PARAM_STR, 4);
    $var =  $query->execute();
    return $var;
}
