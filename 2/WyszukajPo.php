<!DOCTYPE HTML>

<body>
    <button onclick="location.href = 'index.php'">Wróć do strony głównej</button>
    <?php
    if(!empty($_POST["findImie"])){
        $findImie = $_POST['findImie'];
        echo "<h6>smh jest imie</h6>";
    }
    else{
        $findImie = "";
        echo "<h6>Nie ma imie</h6>";
    }

    if(!empty($_POST['findEmail'])){
        $findEmail = $_POST['findEmail'];
    }
    else{
        $findEmail = "";
    }

    if(!empty($_POST['findWiek'])){
        if(filter_var($_POST["findWiek"], FILTER_VALIDATE_INT)){
            $findWiek = (int)$_POST['findWiek'];
        }
        else{
            $findWiek = 0;
            echo "<h6>Błędny Wiek!</h6>";
        }
    }
    else{
        $findWiek = 0;
    }
    

    $connection = new MongoDB\Driver\Manager("mongodb+srv://KZ:wasdwasd1@atlascluster.phqy27j.mongodb.net/");


    $filter = ['$and' =>[
                    ['imie' => ['$regex' => "^$findImie"]],
                    ['email' => ['$regex' => "\b@$findEmail\b"]],
                    ['wiek' => ['$gt' => $findWiek]]
                ]
              ];
    $options =[];
    $query = new MongoDB\Driver\Query($filter, $options);
    $cursor = $connection->executeQuery('test.Ludzie',$query);

    foreach($cursor as $d){
        echo "
            <b>id:</b> $d->id<br>
            <b>Imie:</b> $d->imie<br>
            <b>Email:</b> $d->email<br>
            <b>Wiek:</b> $d->wiek<br><br>";
    }
    ?>

</body>