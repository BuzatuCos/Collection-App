<?php

require_once 'functions.php';

if (isset($_POST['Brand'])){
    if ($_POST ['Brand'] == TRUE && strlen ($_POST['Brand'] <= 255) && is_string($_POST['Brand'])){
        $newBrand = validation($_POST['Brand']);
    }
}
if (isset($_POST['Model'])){
    if ($_POST['Model'] == TRUE && strlen($_POST['Model'] <= 255) && is_string($_POST['Model'])){
        $newModel= validation($_POST['Model']);
    }
}
if (isset($_POST['Year'])){
    $newYear = validation($_POST['Year']);
}

if (isset($newBrand) && isset($newModel) && isset($newYear) ){
    $db = dbConn();
    addNew($newBrand,$newModel,$newYear,$db);
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en-gb">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="stylesInsertToDb.css" />
    <title>Add to Collection</title>
</head>
<body>
<h1>Add to your Collection</h1>
<form action="insertToDb.php" method="post">
    <fieldset class="centerField">
    <div class="newBrand">Brand: <input type="text" placeholder="Enter the Brand" name="Brand" required></div>
    <div class="newModel">Model: <input type="text" placeholder="Enter the Model" name="Model" required></div>
    <div class="newYear">Year: <input type="text" placeholder="Enter the Year" name="Year" required></div>
        <div class="submitButton"><input type="submit"></div>
    </fieldset>
    <a href="index.php"><p>Back to Car Collection</p></a>
</form>
</body>
</html>