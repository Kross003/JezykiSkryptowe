<!DOCTYPE HTML>
<html>
    <head>

    </head>
    <body>
        <button onclick="location.href = 'zad1.php'">zad1</button>
        <button onclick="location.href = 'zad4.php'">zad4</button>
        <br>
        Zad 2:
        <form action="zad2.php" method="POST">
            Wyświetl dokumenty z ceną większą niż: <br>
            <input type="number" step="0.01" name="number" required>
            <input type="submit" value="Wyślij">
        </form>

        <br>
        Zad 3 - Dodaj owoc:
        <form action="zad3.php" method="POST">
            Owoc: <input type="text" name="inOwoc" required>
            Kolor: <input type="text" name="inKolor" required>
            Cena: <input type="number" step="0.01" name="inCena" required>
            <input type="submit" value="Wyślij">
        </form>

        <?php
        session_start();
        session_unset();
        session_destroy();
            //$connection = new MongoDB\Driver\Manager('mongodb+srv://KZ:wasdwasd1@atlascluster.phqy27j.mongodb.net/');
            // echo "Ustawiono połączenie z bazą <br>";

            // $bulk = new MongoDB\Driver\BulkWrite;

            // $bulk->insert(['x' => 1]);
            // $bulk->insert(['x'=> 2]);
            // $bulk->insert(['x'=> 3]);

            // $connection -> executeBulkWrite('test.Owoce', $bulk);

            // $filter = ['x' => ['$gt' => 1]];
            // $options = [
            //     'projection' => ['_id' =>0],
            //     'sort' => ['x'=> -1],

            // ];

            ?>
            
            

    </body>
</html>