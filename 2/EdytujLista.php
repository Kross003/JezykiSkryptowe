<!DOCTYPE HTML>

<body>
    <button onclick="location.href = 'index.php'">Wróć do strony głównej</button>
    <?php
        $connection = new MongoDB\Driver\Manager("mongodb+srv://KZ:wasdwasd1@atlascluster.phqy27j.mongodb.net/");

        $filter = [];
        $options = [];
        $query = new MongoDB\Driver\Query($filter, $options);
        $cursor = $connection->executeQuery('test.Ludzie', $query);

        ?>
        <h4>Kolekcja:</h4>
        
        <?php
        foreach($cursor as $d){
            echo "<form action=\"EdytujForm.php\" method=\"POST\">
                <b>id:</b> $d->id<br>
                <b>Imie:</b> $d->imie<br>
                <b>Email:</b> $d->email<br>
                <b>Wiek:</b> $d->wiek
                    <input name=\"wybraneId\" value=\"$d->id\" hidden>
                    <input type=\"submit\" value=\"Edytuj\">
                    <input formaction=\"Usun.php\" type=\"submit\" value=\"Usun\">
                <br><br></form>";
                
        }
        ?>
        
</body>