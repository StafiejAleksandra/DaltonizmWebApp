<html> 
 <head>
  <title>Wyniki</title>
 </head>
    <body>
        <H1> Wyniki </H1>
<?php 
        include("nagl.php");

        $Wynik =0;

        if ($_POST['zad1'] == "12") 
            $Wynik+=1;
        if ($_POST['brak2']=="on") 
            $Wynik+=1;
        if ($_POST['zad3'] == "74") 
            $Wynik+=1;   
        if ($_POST['zad4'] == "45") 
            $Wynik+=1;  

        echo "<H3> Twój wynik: ". $Wynik . "</H3>";

        if($Wynik==4)
            echo "Gratulacje! Twój wzrok jest prawidłowy! <br>";
        else echo "Twoje odpowiedzi wskazują, że możesz mieć problem z prawidłowym postrzeganiem barw. Zaleca się konrakt z okulistą. <br>";   
        
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
    
        $sql = sprintf("INSERT INTO `telemedycyna_daltonizm` (`id`, `imie`, `plec`, `wynik`, `max_wynik`) VALUES (NULL, '%s', '%s', %d, %d)",
                    $_POST["imie"], $_POST["gender"], $Wynik, 4);
        //echo "<br>$sql<br>";

        if ($polaczenie = polaczZbaza()){
            mysqli_set_charset($polaczenie, 'utf8');
            $wynik = @$polaczenie->query($sql);
            echo "<br>Twoje dane zostały zapisane do bazy";
        }else echo "Brak połączenia z bazą, skontaktuj się z administratorem.";

?>

        <br><a href="./baza.php">Idź do bazy danych</a><br>
        <br><a href="./yours.php">Idź do twoich wyników</a><br>
        <br><a href="./wprowadzenie.php">Powrót do strony głównej</a>
                
    </body>
</html>
