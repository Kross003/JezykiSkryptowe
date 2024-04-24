<!DOCTYPE HTML>

<body>
    
    <?php
        if(!empty($_POST['wybraneId']) && filter_var($_POST['wybraneId'], FILTER_VALIDATE_INT)){
            try{
                $connection = new MongoDB\Driver\Manager("mongodb+srv://KZ:wasdwasd1@atlascluster.phqy27j.mongodb.net/");
                $bulk = new MongoDB\Driver\BulkWrite;


                $bulk->delete(['id' => (int)$_POST['wybraneId']]);
                $connection->executeBulkWrite('test.Ludzie', $bulk);

                $query = new MongoDB\Driver\Query([],[]);
                $cursor = $connection->executeQuery('test.Ludzie',$query);

                header('Location: EdytujLista.php');
            }catch(Exception $e){echo "Błąd połączenia " . $e->getMessage();}
        }
        ?>

</body>