<?php
require 'db_Config.php';

$query = "INSERT INTO crud_agenda VALUES (NULL, 'Rekenen', 'Opdrachten maken', '2022-11-3', '2022-11-10', '3', '2')";

$result = mysqli_query($mysqli, $query);
?>