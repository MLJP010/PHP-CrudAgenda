<?php
require 'db_Config.php';
require_once 'session.inc.php';

if (isset($_POST['verzend']))
{
    $id     = $_POST['idVeld'];
    $ond    = $_POST['onderwerp'];
    $inh    = $_POST['inhoud'];
    $begin  = $_POST['datumB'];
    $eind   = $_POST['datumE'];
    $prior  = $_POST['prioriteit'];
    $stat   = $_POST['status'];

    $query  = "UPDATE crud_agenda ";
    $query .= "SET Onderwerp = '{$ond}', Inhoud = '{$inh}', Begindatum = '{$begin}', Einddatum = '{$eind}', Prioriteit = '{$prior}', Status = '{$stat}' ";
    $query .= "WHERE ID = {$id}";

    $result = mysqli_query($mysqli, $query);

    if ($result)
    {
        echo "<p>Je agenda item is aangepast</p>";
    }

    else
    {
        echo "FOUT bij het aanpassen</p>";
        echo $query . "<br/>";
        echo mysqli_error($mysqli);
    }

    echo "<a href='toonagenda.php'>OVERZICHT</a>";
}
else
{
    echo "<p>Het formulier is niet goed verstuurd</p>";
}
?>