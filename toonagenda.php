<?php
require 'db_Config.php';
require_once 'session.inc.php';

$query = "SELECT * FROM crud_agenda";
$result = mysqli_query($mysqli, $query);

if (mysqli_num_rows($result) > 0)
{
    // echo '<div style="background-color:blue;">';
    echo "<table border='1px'>";

    echo "<tr><th>Onderwerp</th><th>Inhoud</th><th>Details</th><th>Verwijder</th><th>Pas aan</th></tr>";

    while ($item = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
            echo "<td>" . $item['Onderwerp'] . "</td>";
            echo "<td>" . $item['Inhoud'] . "</td>";
            echo "<td><a href='detail.php?id=". $item['ID'] ."'>detail</a></td>";
            echo "<td><a href='verwijder.php?id=". $item['ID'] ."'>verwijder</a></td>";
            echo "<td><a href='pasaan.php?id=". $item['ID'] ."'>pas aan</a></td>";
            echo "</tr>";
    }

    echo "</table>";
    echo "</div>";

    echo "<br/>";
    echo "<a href='loguit.php'>Uitloggen</a>";
}
else
{
    echo "<p>Geen items gevonden!</p>";
}
?>