<!DOCTYPE HTML>
<html>
    <head>

    </head>
    <body>
    <button onclick="location.href = 'index.php'">index</button>
        <?php
        session_start();
            
            $connection = new MongoDB\Driver\Manager("mongodb+srv://KZ:wasdwasd1@atlascluster.phqy27j.mongodb.net/");

            $filter = ['id' => ['$in' => $_SESSION['listaID']]];
            //$filter = [];
            $options = [];
            $query = new MongoDB\Driver\Query($filter, $options);
            $cursor = $connection->executeQuery('test.Owoce', $query);

            echo "<h3>Wybrane elementy do usunięcia: </h3>";
            ?>
            <form action = "zad4_delete.php" method="POST">
                <input type="submit" value="Usun" name="usuwanie">
            </form>
            <?php
            foreach($cursor as $d){
                echo "<b> ID: $d->id</b>
                     <b> Owoc: </b> $d->owoc
                     <b> Kolor: </b> $d->kolor
                     <b> Cena/kg: </b> $d->cena_za_kg
                     <br>";
            }

            if(isset($_POST["usuwanie"])){
                $bulk = new MongoDB\Driver\BulkWrite;
                $cursor2 = $connection->executeQuery('test.Owoce', $query);
                foreach($cursor2 as $d){
                    $bulk->delete(['_id' => $d->_id]);
                }
                $connection->executeBulkWrite("test.Owoce", $bulk);
                session_destroy();
                header("Location: index.php");
            }

            ?>      
    </body>
</html>