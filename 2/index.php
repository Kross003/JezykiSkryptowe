<!DOCTYPE HTML>

<body>
    <button onclick="location.href = 'zad1.php'">Zadanie 1</button>
    <button onclick="location.href = 'EdytujLista.php'">Edytuj</button>

    <h4>Wyszukaj po:</h4>
    <form action="WyszukajPo.php" method="POST">
        Imie rozpoczynające się na:<input type="text" name="findImie"><br>
        Email z domeny (np. yahoo): <input type="text" name="findEmail"><br>
        Wiek większy niż:<input type="number" name="findWiek"><br>
        <input type="submit" value="Wyślij">
    </form>

    <h4>Dodaj:</h4>
    <form action="Dodaj.php" method="POST">
        Imie:<input type="text" name="insertImie"><br>
        Email: <input type="text" name="insertEmail"><br>
        Wiek:<input type="number" name="insertWiek"><br>
        <input type="submit" value="Wyślij">
    </form>
    <?php
    
    ?>

</body>