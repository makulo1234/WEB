<?php

if($_POST) {
    //Načítanie údajov z formulára
    $krstnemeno = "";
    $priezvisko = "";
    $email = "";
    $predmet = "";
    $sprava = "";

    if(isset($_POST['krstnemeno'])) {
        $krstnemeno = filter_var($_POST['krstnemeno'], FILTER_SANITIZE_STRING);
    }

    if(isset($_POST['priezvisko'])) {
        $priezvisko = filter_var($_POST['priezvisko'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }
     
    if(isset($_POST['predmet'])) {
        $predmet = filter_var($_POST['predmet'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['sprava'])) {
        $sprava = htmlspecialchars($_POST['sprava']);
    }
       
    $adresat = "martino.coro@gmail.com";


    //PHPMailer API - zasielanie emailu

    require './PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();

    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "martino.coro@gmail.com";
    $mail->Password = "khbkpcnqxleznsts";

    $mail->setFrom($email, $krstnemeno . " " . $priezvisko);
    $mail->addAddress($adresat, 'Martin Corovcak');
    $mail->Subject = $predmet;
    
    $mail->Body = $sprava;

    if ($mail->send()) {
        echo "<p>Ďakujem, že ste ma kontaktovali, $krstnemeno. Pokúsim sa odpísať do 24 hodín.</p>";
    } else {
        echo "<p>Ospravedlňujem sa, ale správu sa nepodarilo odoslať.</p>Chyba: " . $mail->ErrorInfo;
    }
} else {
    echo '<p>Niečo sa pokazilo.</p>';
}

/* Alternativny sposob - post() */
/*
if($_POST) {
    $krstnemeno = "";
    $priezvisko = "";
    $email = "";
    $predmet = "";
    $sprava = "";
     
    if(isset($_POST['krstnemeno'])) {
        $krstnemeno = filter_var($_POST['krstnemeno'], FILTER_SANITIZE_STRING);
    }

    if(isset($_POST['priezvisko'])) {
        $priezvisko = filter_var($_POST['priezvisko'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }
     
    if(isset($_POST['predmet'])) {
        $predmet = filter_var($_POST['predmet'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['sprava'])) {
        $sprava = htmlspecialchars($_POST['sprava']);
    }
       
    $adresat = "contact@martincorovcak.ml";
     
    $hlavicka  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";
     
    if(mail($adresat, $predmet, $sprava, $hlavicka)) {
        echo "<p>Ďakujem, že ste ma kontaktovali, $krstnemeno. Pokúsim sa odpísať do 24 hodín.</p>";
    } else {
        echo '<p>Ospravedlňujem sa, ale správu sa nepodarilo odoslať.</p>';
    }
     
} else {
    echo '<p>Niečo sa pokazilo.</p>';
}
*/

$conn = mysqli_connect("sql201.epizy.com", "epiz_24086461", "7Hhz2irRZg1rHbu", "epiz_24086461_contact") or die("Chyba pripojenia: " . mysqli_error($conn));
mysqli_query($conn, "INSERT INTO tblcontact (krstne_meno, priezvisko, email, predmet, sprava) VALUES ('" . $krstnemeno. "','" . $priezvisko. "','" . $email. "','" . $predmet. "','" . $sprava. "')");

?>