<?php
require_once 'functions.php';
$db = dbConn();
$result = getCarsFromDb($db);
$output = extractDataForOutput($result);
?>
<!DOCTYPE html>
<html lang="en-gb">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title>Collection</title>
</head>
<body>
<h1>Car Collection</h1>
<section class="section">
<?php echo $output; ?>
</section>
</body>
</html>

