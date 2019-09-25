<?php

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
<form action="index.php" method="post">
    <fieldset class="centerField">
    <div class="newBrand">Brand: <input type="text" placeholder="Enter the Brand" name="Brand" required></div>
    <div class="newModel">Model: <input type="text" placeholder="Enter the Model" name="Model" required></div>
    <div class="newYear">Year: <input type="text" placeholder="Enter the Year" name="Year" required></div>
        <div class="submitButton"><input type="submit"></div>
        </fieldset>
</form>
</body>
</html>