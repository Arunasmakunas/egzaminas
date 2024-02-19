<?php

require "prisijungimasPrieDuombazes.php";

if ($_SERVER ["REQUEST_METHOD"] == "POST"){

    $kategorPavadinimas= $_POST["kategorijosPavadinimas"];


   try{
 

    $db = new PDO ("mysql:host=$serverioAdresas; dbname=$duombaze",
    $vartotojoVardas, $slaptazodis);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql="INSERT INTO KnyguKategorija (kategorijosPavadinimas,)
     VALUES ('$kategorPavadinimas')";
     $db->exec($sql);


   

   header("Location: administratorius.Matyti.Kategorijas.php");

     }catch (PDOException $klaida) {
    echo "Klaida :" . $klaida;

   } 

}



?>