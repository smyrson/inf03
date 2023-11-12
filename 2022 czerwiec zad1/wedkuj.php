<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <div class="banerStopka">
        <h1>Portal dla wędkarzy</h1>
    </div>
    <div id="lewogora" class="lewy">
        <h3>Ryby zamieszkujące rzeki</h3>
        <ol type="1">
            <?php skrypt1(); ?>
        </ol>
    </div>
    <div id="prawo">
        <img alt="Sum" src="ryba1.jpg"><br>
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </div>
    <div id="lewodol" class="lewy">
        <h3>Ryby drapieżne naszych wód</h3>
        <table>
            <tr>
                <th>L.p</th>
                <th>Gatunek</th>
                <th>Występowanie</th>
            </tr>
            <?php skrypt2(); ?>
        </table>
    </div>
    
    <div class="banerStopka">
        <p>Stronę wykonał: 00000000000</p>
    </div>    
    <?php
        function skrypt1(){
            $polaczenie = mysqli_connect('localhost', 'root', '', 'wedkowanie');

            $zapytanie3 = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby INNER JOIN lowisko ON lowisko.ryby_id = ryby.id WHERE rodzaj = 3";
            $wynikZapytanie3 = mysqli_query($polaczenie, $zapytanie3);

            while($row = mysqli_fetch_array($wynikZapytanie3)){
                echo("<li>".$row['nazwa']." pływa w rzece ".$row['akwen'].", ".$row['wojewodztwo']."</li>");
            }

            mysqli_close($polaczenie);
        }
        
        function skrypt2(){
            $polaczenie = mysqli_connect('localhost', 'root', '', 'wedkowanie');

            $zapytanie1 = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1";
            $wynikZapytanie1 = mysqli_query($polaczenie, $zapytanie1);

            while($row = mysqli_fetch_array($wynikZapytanie1)){
                echo("<tr><td>".$row['id']."</td><td>".$row['nazwa']."</td><td>".$row['wystepowanie']."</td></tr>");
            }

            mysqli_close($polaczenie);
        }   
    ?>
</body>
</html>