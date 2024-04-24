<!DOCTYPE HTML>

<body>
    
    <?php
        if(!empty($_POST['insertImie'])&&
         filter_var($_POST['insertEmail'],FILTER_VALIDATE_EMAIL) &&
         filter_var($_POST['insertWiek'],FILTER_VALIDATE_INT))
        {
            try{
                $connection = new MongoDB\Driver\Manager('mongodb+srv://KZ:wasdwasd1@atlascluster.phqy27j.mongodb.net/');
                $filter = [];
                $options = ['sort'=> ['id' => -1], 'limit' => -1];
                $query = new MongoDB\Driver\Query($filter, $options);
                $cursor = $connection->executeQuery('test.Ludzie', $query);
                $maxid = $cursor->toArray()[0]->id;

                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->insert([
                    'id' => $maxid+1,
                    'imie' => $_POST['insertImie'],
                    'email' => $_POST['insertEmail'],
                    'wiek' => (int)$_POST['insertWiek']
                ]);
                $connection->executeBulkWrite('test.Ludzie', $bulk);
                header("Location: EdytujLista.php");



            }catch(Exception $e){echo "".$e->getMessage()."";}
        }else{
            ?>
            <button onclick="location.href = 'index.php'">Wróć do strony głównej</button>
            <button onclick="location.href = 'EdytujLista.php'">Wróć do strony Edycji</button>
            <?php
            echo "<h2>Błąd w polach wprowadzania danych!</h2>";
            if(empty($_POST["insertImie"])) echo "Brak imienia!<br>";
            if(!filter_var($_POST["insertEmail"], FILTER_VALIDATE_EMAIL)) echo "Błąd w emailu!<br>";
            if(!filter_var($_POST["insertWiek"], FILTER_VALIDATE_INT)) echo "Błąd wieku!<br>";
        }
        ?>

</body>