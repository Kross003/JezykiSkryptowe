<!DOCTYPE HTML>
<html>
    <head>

    </head>
    <body>
    <button onclick="location.href = 'index.php'">index</button>
        <?php
            $connection = new MongoDB\Driver\Manager('mongodb+srv://KZ:wasdwasd1@atlascluster.phqy27j.mongodb.net/');
            $filter = [];
            $options = ['sort' => ['id'=> -1], 'limit' => 1];
            $query = new MongoDB\Driver\Query($filter, $options);
            $cursor = $connection->executeQuery('test.Owoce',$query);
            $aaa = $cursor->toArray();
            $maxid = $aaa[0]->id;
            // foreach($cursor as $s){
            //     $maxid = $s->id;
            // }

            
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->insert(['id'=> $maxid + 1,
                'owoc'=> $_POST['inOwoc'],
                'kolor'=> $_POST['inKolor'],
                'cena_za_kg'=> (float)$_POST['inCena']]);

            $connection -> executeBulkWrite('test.Owoce', $bulk);

            $filter = [];
            $options = [];
            $query = new MongoDB\Driver\Query($filter, $options);
            $cursor = $connection->executeQuery('test.Owoce',$query);

            echo '<h1> Kolekcja: </h1><br>';
            foreach($cursor as $d){
                echo "<b> ID: $d->id</b><br>
                     <b> Owoc: </b> $d->owoc<br>
                     <b> Kolor: </b> $d->kolor<br>
                     <b> Cena/kg: </b> $d->cena_za_kg<br><br>";
            }

            ?>
            
    </body>
</html>