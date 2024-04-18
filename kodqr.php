<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wygeneruj kod QR</title>
</head>
<body>

<h2>Generowanie kodu QR</h2>
    <form action="kodqr.php" method="POST">
        <input type="text" name="r"> <br>
        <input type="file" name="plik"> <br><br>
        <input type="submit" value="sprawdź">
    </form>

<?php

$text = $_POST["r"];
$plik = $_POST["plik"];

require_once("phpqrcode\qrlib.php");

// move_uploaded_file($_FILES['plik'],"C:\xampp\htdocs\mk\plik.txt".$_FILES["plik"]);



if(!Empty($text)){
    $qr = "qr.png";
    QRcode::png($text,$qr);
    echo(" <img src='qr.png' alt='kod qr'> ");

} else{ 
    if(!Empty($plik)){
        $otw = fopen($plik, 'r');
        $wyswietl = fread($otw , filesize($plik));
        fclose($otw);

        $qr = "qr.png";
        QRcode::png($wyswietl,$qr);
        echo(" <img src='qr.png' alt='kod qr'> ");
}else{
    echo("no sie ni da");
}
}


?>
    
</body>
</html>