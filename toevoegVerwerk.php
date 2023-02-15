<?php
require 'db_Config.php';

if (isset($_POST['verzend']) && isset($_POST['onderwerp']) &&
    isset($_POST['inhoud']) && isset($_POST['datumB']) &&
    isset($_POST['datumE']) && isset($_POST['prioriteit']) &&
    isset($_POST['status']))
{
    $ond    = $_POST['onderwerp'];
    $inh    = $_POST['inhoud'];
    $begin  = $_POST['datumB'];
    $eind   = $_POST['datumE'];
    $prior  = $_POST['prioriteit'];
    $stat   = $_POST['status'];

    $begin1 = strtotime($begin);
    $eind1 = strtotime($eind);
    $goede_datum1 = date('Y-m-d', $begin1);
    $goede_datum2 = date('Y-m-d', $eind1);

    if ($begin == $goede_datum1 && $eind == $goede_datum2 &&
        is_numeric($prior) && $prior >= 1 && $prior <= 5)
    {
        $query  = "INSERT INTO crud_agenda";
        $query .= "(Onderwerp, Inhoud, Begindatum, Einddatum, Prioriteit, Status)";
        $query .= "VALUES ('{$ond}', '{$inh}', '{$begin}', '{$eind}', '{$prior}', '{$stat}')";
    
        $result = mysqli_query($mysqli, $query);
    
        if ($result)
        {
            echo "<p>Je agenda item is toegevoegd</p>";
        }
    
        else
        {
            echo "FOUT bij het toevoegen</p>";
            echo $query . "<br/>";
            echo mysqli_error($mysqli);
        }
    
        echo "<a href='toevoegForm.html'>Nog een item toevoegen</a><br/><br/>";
        echo "<a href='inlog.html'>Inloggen</a><br/>";
    }
    else
    {
        echo "<p>Het formulier is niet goed verstuurd</p>";
        echo "FOUT bij het toevoegen</p>";
        echo $query . "<br/>";
        echo mysqli_error($mysqli);
    }
}

else
{
    echo "<p>Het formulier is niet goed verstuurd</p>";
}

?>