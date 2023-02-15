<?php
require 'db_Config.php';
require_once 'session.inc.php';


$id = $_GET['id'];

echo "ID van het agenda items is: " . $id . "<br/>";

$query = "SELECT * FROM crud_agenda WHERE ID = " . $id;
$result = mysqli_query($mysqli, $query);

if (mysqli_num_rows($result) > 0)
{   
    echo '<div style="color:blue;">';
    echo "<table border='1px'>";

    echo "<tr><th>Onderwerp</th><th>Inhoud</th><th>Begindatum</th><th>Einddatum</th><th>Prioriteit</th><th>Status</th><th>Verwijder</th></tr>";

    $item = mysqli_fetch_assoc($result);
    echo "<tr>";
        echo "<td>" . $item['Onderwerp'] . "</td>";
        echo "<td>" . $item['Inhoud'] . "</td>";
        echo "<td>" . $item['Begindatum'] . "</td>";
        echo "<td>" . $item['Einddatum'] . "</td>";
        echo "<td>" . $item['Prioriteit'] . "</td>";
        echo "<td>" . $item['Status'] . "</td>";
        echo "<td><a href='verwijder.php?id=". $item['ID'] ."'>verwijder</a></td>";
    echo "</tr>";

    echo "</table>";
    echo "</div>";
}
else
{
    echo "Er is geen record met ID: " . $id . "<br/>";
}

echo "<a href='toonagenda.php'>OVERZICHT</a>";
?>