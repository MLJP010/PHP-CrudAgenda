<html>
    <head>
        <title>Gegevens aanpassen</title>
    </head>
    <body>
    <?php
        require 'db_Config.php';
        require_once 'session.inc.php';

        $id = $_GET['id'];

        $query = "SELECT * FROM crud_agenda WHERE ID = " . $id;
        $result = mysqli_query($mysqli, $query);

        if (mysqli_num_rows($result) > 0)
        {   
            echo '<div style="color:blue;">';
            echo "<table border='1px'>";

            echo "<tr><th>Onderwerp</th><th>Inhoud</th><th>Begindatum</th><th>Einddatum</th><th>Prioriteit</th><th>Status</th><th>Verwijder</th></tr>";

            $item = mysqli_fetch_assoc($result);
            ?>
                <form class="form" name="agendaFormulier" method="post" action="pasaanVerwerk.php">
                    
                <input type="hidden" name="idVeld" value="<?php echo $item['ID'];?>">

                    <div class="input_field">
                        <label>Onderwerp</label>
                        <input type="text" name="onderwerp" class="input" value="<?php echo $item['Onderwerp'];?>">
                    </div>
                    <div class="input_field">
                        <label>Inhoud</label>
                        <input type="textarea" name="inhoud" class="input" value="<?php echo $item['Inhoud'];?>">
                    </div>
                    <div class="input_field">
                        <label>Begindatum</label>
                        <input type="date" name="datumB" class="input" value="<?php echo $item['Begindatum'];?>">
                    </div>
                    <div class="input_field">
                        <label>Einddatum</label>
                        <input type="date" name="datumE" class="input" value="<?php echo $item['Einddatum'];?>">
                    </div>
                    <div class="input_field">
                        <label>Prioriteit</label>
                        <select class="input" name="prioriteit" value="<?php echo $item['Prioriteit'];?>">
                            <option value="1"<?php if ($item['Prioriteit'] == '1') echo "Selected"?>>1</option>
                            <option value="2"<?php if ($item['Prioriteit'] == '2') echo "Selected"?>>2</option>
                            <option value="3"<?php if ($item['Prioriteit'] == '3') echo "Selected"?>>3</option>
                            <option value="4"<?php if ($item['Prioriteit'] == '4') echo "Selected"?>>4</option>
                            <option value="5"<?php if ($item['Prioriteit'] == '5') echo "Selected"?>>5</option>
                        </select>
                    </div>
                    <div class="input_field">
                        <label>Status</label>
                        <select class="input" name="status" value="<?php echo $item['Status'];?>">
                            <option value="n"<?php if ($item['Status'] == 'n') echo "Selected"?>>Niet begonnen</option>
                            <option value="b"<?php if ($item['Status'] == 'b') echo "Selected"?>>Bezig</option>
                            <option value="a"<?php if ($item['Status'] == 'a') echo "Selected"?>>Afgerond</option>
                        </select>
                    </div>
                    <br>
                    <div class="inputfield">
                        <input type="submit" name="verzend" value="item aanpassen" class="btn">
                    </div>
                    <br><br>
            </form>
            <?php
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
    ?>
    </body>
</html>