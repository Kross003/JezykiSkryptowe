<!DOCTYPE HTML>
<html>
    <head>

    </head>
    <body>
    <button onclick="location.href = 'index.php'">index</button>
        <?php
        session_start();
            if(!empty($_POST["numberID"])){
                if(!isset($_SESSION["listaID"]) ){
                    $_SESSION["listaID"] = array();
                }
                if(!in_array($_POST["numberID"], $_SESSION["listaID"])){
                    $_SESSION["listaID"][] = (int)$_POST["numberID"];
                }
            }
            echo "<br>";
            if(!empty($_SESSION["listaID"])){
                ?>
                <button onclick="location.href = 'zad4_delete.php'">Usuń zaznaczone elementy</button><br>
                <?php
                sort($_SESSION["listaID"]);
                foreach($_SESSION["listaID"] as $a){
                    echo "$a, ";
                }
            }

            echo "<br>";
            

            $connection = new MongoDB\Driver\Manager('mongodb+srv://KZ:wasdwasd1@atlascluster.phqy27j.mongodb.net/');

            $filter = ['id' => ['$ne' => null]];
            $options = [];
            $query = new MongoDB\Driver\Query($filter, $options);
            $cursor = $connection->executeQuery('test.Owoce', $query);

            ?>
            <h1> Kolekcja: </h1><br>
            <form action="zad4.php" method="POST">
            <?php
            foreach($cursor as $d){
                echo "<b> ID: $d->id</b>
                     <b> Owoc: </b> $d->owoc
                     <b> Kolor: </b> $d->kolor
                     <b> Cena/kg: </b> $d->cena_za_kg
                     Usuń: <input type=\"submit\" name=\"numberID\" value=\"$d->id\">
                     <br>";
            }
            ?>
            </form>
            
    </body>
</html>