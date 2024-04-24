<!DOCTYPE HTML>

<body>
    <button onclick="location.href = 'index.php'">Wróć do strony głównej</button>
    <?php
        $connection = new MongoDB\Driver\Manager("mongodb+srv://KZ:wasdwasd1@atlascluster.phqy27j.mongodb.net/");
        $filter = ['id' => (int)$_POST['wybraneId']];
        $options = ['limit' => 1];
        $query = new MongoDB\Driver\Query($filter, $options);
        $cursor = $connection->executeQuery('test.Ludzie', $query);

        $a = $cursor->toArray();
        $d = $a[0];
        ?>
        <h4>Edycja:</h4>
        <form action="Edytuj.php" method="POST"><br>
            Imie:<input type="text" name="editImie" value="<?php echo $d->imie ?>"><br>
            Email:<input type="text" name="editEmail" value="<?php echo $d->email ?>"><br>
            Wiek:<input type="number" name="editWiek" value="<?php echo $d->wiek ?>"><br>
            <input name="wybraneId" value="<?php echo $d->id ?>" hidden>
            <input type="submit" value="Zatwierdź zmiany">
        
        </form>
</body>