<?php
require 'db_Config.php';
require_once 'session.inc.php';

$id = $_GET['id'];

if ($id !="")
{   
    echo "<p>Item met ID: " . $id . " wordt verwijderd</p>";

    $query = "DELETE FROM crud_agenda WHERE ID = " .$id;
    $result = mysqli_query($mysqli, $query);

    if ($result)
    {   
        echo "<p>Het item is verwijderd</p>";
    }

    else
    {
        echo "FOUT bij het verwijderen</p>";
        echo $query . "<br/>";
        echo mysqli_error($mysqli);
    }
}

else
{
    echo "Er is geen record met ID: " . $id . "<br/>";
}

echo "<a href='toonagenda.php'>OVERZICHT</a>";
?>