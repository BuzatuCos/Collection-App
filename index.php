<?php
$db = new PDO('mysql:host=db; dbname=cosminCollection', 'root', 'password');

$db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);