<?php
    include("nagl.php");
?>
<H1> Twoje Wyniki </H1>
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
        //var_dump($_MySQL);
        return $wynik;
    }
    
    if ($polaczenie = polaczZbaza()){
        mysqli_set_charset($polaczenie, 'utf8');
        echo "Połączenie z bazą <br><br>";
        
        if(!empty($_POST['Imie'])){
            $sqlU = sprintf("SELECT * FROM `telemedycyna_daltonizm` WHERE imie = '%s'", $_POST['Imie']);
            //echo "<br>$sqlU<br>";
            //echo "Wybrano z POST<br>";
        }

        $wynikUzytkownik = WykonajZapytanie($polaczenie, $sqlU);

        if($wynikUzytkownik){
            while($wiersz = $wynikUzytkownik -> fetch_assoc()){
                echo $wiersz['id'] . ": " . $wiersz["imie"] . ", wynik: " . $wiersz["wynik"] . "/".  $wiersz["max_wynik"] . "<br>";
            }
        }

?>   
    <form action="./yours.php" method="post">
        <input type="text" name="Imie">
        <input type="submit" value="Wybór">
    </form>



    <br><a href="./wprowadzenie.php">Powrót do strony głównej</a>


<?php
    }else echo "Brak połączenia z bazą, skontaktuj się z administratorem.";
?>
    