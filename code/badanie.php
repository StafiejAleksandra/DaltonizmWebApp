<html> 
    <head>
    <title>Badanie Daltonizm</title>
    </head>
    <body>
    <?php
        include("nagl.php");
    ?>
        <H1>Badanie na daltonizm</H1>
        <H3>1. Jaką liczbę widać na zdjęciu?</H3>
        <img src="./Obrazki/zdjecie12.png" alt="Obraz1" width="300" height="300"><br>
        <form method="post" action="./wyniki.php" id = "formBadanie">
            Odpowiedź: <input type="text" id="zad1" name="zad1" placeholder = "Numer"><br>
            <input type="radio" id="brak1" name="brak1">
            <label for="brak1">Nie widzę liczby!</label><br>
        </form>

        <H3>2. Jaką liczbę widać na zdjęciu?</H3>
        <img src="./Obrazki/Zero.jpg" alt="Obraz2" width="300" height="300"><br>
        Odpowiedź: <input type="text" id="zad2" name="zad2" placeholder = "Numer" form = "formBadanie"><br>
        <input type="radio" id="brak2" name="brak2" form = "formBadanie">
        <label for="brak2">Nie widzę liczby!</label><br>

        <H3>3. Jaką liczbę widać na zdjęciu?</H3>
        <img src="./Obrazki/Obraz74.jpg" alt="Obraz3" width="300" height="300"><br>
        Odpowiedź: <input type="text" id="zad3" name="zad3" placeholder = "Numer" form = "formBadanie"><br>
        <input type="radio" id="brak3" name="brak3" form = "formBadanie">
        <label for="brak3">Nie widzę liczby!</label><br>

        <H3>4. Jaką liczbę widać na zdjęciu?</H3>
        <img src="./Obrazki/zdjecie45.jpg" alt="Obraz4" width="300" height="300"><br>
        Odpowiedź: <input type="text" id="zad4" name="zad4" placeholder = "Numer" form = "formBadanie"><br>
        <input type="radio" id="brak4" name="brak4" form = "formBadanie">
        <label for="brak4">Nie widzę liczby!</label><br><br>

        Imię: <input type = "text", name="imie" required form = "formBadanie"><br>
        Płeć: <br>
        <input type="radio" id="mezczyzna" name="gender" value="mezczyzna" form = "formBadanie">
        <label for="mezczyzna">Mężczyzna</label><br>
        <input type="radio" id="kobieta" name="gender" value="kobieta" form = "formBadanie">
        <label for="kobieta">Kobieta</label><br>
        <input type="radio" id="inne" name="gender" value="inne" form = "formBadanie">
        <label for="inne">Inne</label><br><br>

        <input type="submit" value="Gotowe" form = "formBadanie" style="height:30px; width:80px">
    </body>
</html>
