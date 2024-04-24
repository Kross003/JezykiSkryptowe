<!DOCTYPE HTML>

<body>
    <button onclick="location.href = 'index.php'">Wróć do strony głównej</button>
    <?php
    $connection = new MongoDB\Driver\Manager("mongodb+srv://KZ:wasdwasd1@atlascluster.phqy27j.mongodb.net/");

    $filter =[];
    $options = [];
    $query = new MongoDB\Driver\Query($filter, $options);
    $cursor = $connection->executeQuery("test.Ludzie", $query);

    echo "<h4>Kolekcja:</h4>";
    foreach($cursor as $d){
        echo "
            <b>id:</b> $d->id<br>
            <b>Imie:</b> $d->imie<br>
            <b>Email:</b> $d->email<br>
            <b>Wiek:</b> $d->wiek<br><br>";
    }
    ?>

</body>