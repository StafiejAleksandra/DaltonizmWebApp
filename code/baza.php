<?php
    include("nagl.php");
?>
<H1> Baza Danych </H1>
<br>
<?php
    function polaczZbaza()
    {
        include('zmiennedb.php');
        $dbSerwer = "mysql.agh.edu.pl";
        $dbLogin = "stafiej";
        $dbHaslo = $dbHaslo_z_Pliku_zmiennedb;
        $dbBaza = "stafiej";
        //echo "Polaczenie <br>";
        return @new mysqli($dbSerwer, $dbLogin, $dbHaslo, $dbBaza);
    }

    function WykonajZapytanie($polaczenie, $_MySQL)
    {
        mysqli_set_charset($polaczenie, 'utf8');
        $wynik = @$polaczenie->query($_MySQL);
        return $wynik;
    }
    
    if ($polaczenie = polaczZbaza()){
        mysqli_set_charset($polaczenie, 'utf8');
        echo "Połączenie z bazą <br><br>";
  
        if(!empty($_GET['opcja'])){
            $sql = $_GET['opcja'];
            //echo "Wybrano z GET<br>";
        }else
            $sql = "SELECT * FROM `telemedycyna_daltonizm`";

        $wynik = WykonajZapytanie($polaczenie, $sql);

        if($wynik){
            while($wiersz = $wynik -> fetch_assoc()){
                echo $wiersz['id'] . ": " . $wiersz["imie"] . ", wynik: " . $wiersz["wynik"] . "/".  $wiersz["max_wynik"] . "<br>";
            }
        }
?>
    <H4>Wybierz jedna z opcji</H4>
    <form action="./baza.php" method="get">
    <select id="option" name="opcja">
        <option value="SELECT * FROM `telemedycyna_daltonizm`">Wszystkie</option>
        <option value="SELECT * FROM `telemedycyna_daltonizm` ORDER BY imie  DESC">Posortowane po imieniu Z-A</option>
        <option value="SELECT * FROM `telemedycyna_daltonizm` ORDER BY imie">Posortowane po imieniu A-Z</option>
        <option value="SELECT * FROM `telemedycyna_daltonizm` ORDER BY wynik">Posortowane po wyniku rosnąco</option>
        <option value="SELECT * FROM `telemedycyna_daltonizm` ORDER BY wynik DESC">Posortowane po wyniku malejąco</option>
        <option value="SELECT * FROM `telemedycyna_daltonizm` WHERE plec = 'kobieta'"> Kobiety </option>
        <option value="SELECT * FROM `telemedycyna_daltonizm` WHERE plec = 'mezczyzna'"> Mężczyźni </option>
        <option value="SELECT * FROM `telemedycyna_daltonizm` WHERE wynik = max_wynik"> Osoby z najlepszym wynikiem</option>
        <option value="SELECT * FROM `telemedycyna_daltonizm` WHERE wynik BETWEEN 0 AND 3"> Osoby z wynikiem sugerujacym nieprawidłowości widzenia kolorów</option>
        <option value="SELECT * FROM `telemedycyna_daltonizm` WHERE plec = 'kobieta' AND wynik = max_wynik">Kobiety z dobrym wzrokiem</option>
        <option value="SELECT * FROM `telemedycyna_daltonizm` WHERE plec = 'mezczyzna' AND wynik = max_wynik"> Mężczyźni z dobrym wzrokiem </option>
    </select>
        <input type="submit" value="Potwierdzam wybór">
    </form>



    <br><a href="./wprowadzenie.php">Powrót do strony głównej</a>


<?php
    }else echo "Brak połączenia z bazą, skontaktuj się z administratorem.";
?>
    