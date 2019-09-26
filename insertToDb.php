<?php
$newBrand = '';
$newModel = '';
$newYear = '';
if (!empty($_POST['Brand']) && strlen( $_POST[ 'Brand' ] ) <= 255 ) && is_string($_POST[ 'Brand' ] ) {
    $newBrand =  validation($_POST['Brand']);
    }else{
    echo 'Your format is not accepted';
}
if (!empty($_POST['Model'])&& strlen( $_POST[ 'Model' ] ) <= 255 ) && is_string($_POST[ 'Model' ] )) {
    $newModel = validation($_POST['Model']);
    }else{
    echo 'Your format is not accepted';
}
if (!empty($_POST['Year'])&& strlen( $_POST[ 'Year' ] ) === 4 ) && is_int($_POST[ 'Brand' ] )) {
    $newYear = validation($_POST['Year']);
}else{
    echo 'Your format is not accepted';
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