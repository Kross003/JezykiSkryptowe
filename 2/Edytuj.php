<!DOCTYPE HTML>

<body>
    
    <?php
        if(
          !empty($_POST["editImie"]) &&
          filter_var($_POST["editEmail"], FILTER_VALIDATE_EMAIL) &&
          filter_var($_POST["editWiek"], FILTER_VALIDATE_INT))
        {
                try{
                $connection = new MongoDB\Driver\Manager("mongodb+srv://KZ:wasdwasd1@atlascluster.phqy27j.mongodb.net/");
                $bulk = new MongoDB\Driver\BulkWrite;

                $bulk->update(
                    ['id' => (int)$_POST['wybraneId']],
                    ['$set' => ['imie' => $_POST["editImie"],
                                'email' => $_POST["editEmail"],
                                'wiek' => (int)$_POST["editWiek"]]
                    ],
                    ['multi' => false, 'upsert'=>false]
                );
                
                $connection->executeBulkWrite('test.Ludzie', $bulk);
                header('Location: EdytujLista.php');
            }catch(Exception $e){echo"Problem z połączeniem: ". $e->getMessage(). PHP_EOL;}
        }
        else{
            ?>
            <button onclick="location.href = 'index.php'">Wróć do strony głównej</button>
            <button onclick="location.href = 'EdytujLista.php'">Wróć do strony Edycji</button>
            <?php
            echo "<h2>Błąd w polach edycji!</h2>";
            if(empty($_POST["editImie"])) echo "Brak imienia!<br>";
            if(!filter_var($_POST["editEmail"], FILTER_VALIDATE_EMAIL)) echo "Błąd w emailu!<br>";
            if(!filter_var($_POST["editWiek"], FILTER_VALIDATE_INT)) echo "Błąd wieku!<br>";
        }
        ?>

</body>