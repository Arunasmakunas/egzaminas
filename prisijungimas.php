<?php

session_start();
?>

<html>
    <body>
        <head>
            <style>

input[type=text], select {
  width: 100%;
   padding: 12px 20px;
  margin: 8px 0;
   display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
   width: 100%;
   background-color: #4CAF50;
   color: white;
   padding: 14px 20px;
   margin: 8px 0;
   border: none;
    border-radius: 4px;
   cursor: pointer;
}
input[type=submit]:hover {
  background-color: #45a049;
}
div {
  border-radius: 5px;
   background-color: #f2f2f2;
   padding: 20px;
}

            </style>
        </head>
        <body>

        <form action="prisijungimas.php" method= "post">
      Elektroninis paštas: <input type= "text", name="el_pastas">
      <br>
      Slaptazodis: <input type= "text", name="Slaptazodis">
      <br>

      <input type="submit"> 

     </form>
     <?php

     require "prisijungimasPrieDuombazes.php";

     if ($_SERVER ["REQUEST_METHOD"] == "POST"){

        $pastas = $_POST["el_pastas"];
        $slapVart = $_POST["Slaptazodis"];
        
        try{
            $db = new PDO ("mysql:host=$serverioAdresas; dbname=$duombaze",
            $vartotojoVardas, $slaptazodis);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql ="SELECT Slaptazodis ,ID_vartotojas,vartotojoTipas from
         Vartotojas
         WHERE el_pastas='$pastas'";

$atsakymas = $db->query($sql);
 $rezultatas = $atsakymas->fetchAll(PDO:: FETCH_ASSOC);
    if(count($rezultatas)>0) {
           
        $gautasSlapt =$rezultatas [0]['Slaptazodis'];

        $id=$rezultatas [0]['ID_vartotojas'];
        $vartTipas=$rezultatas [0]['vartotojoTipas'];
       
        if(password_verify($slapVart, $gautasSlapt)){

            $_SESSION["ID_vartotojas"] =$id ;
           $_SESSION["vartotojoTipas"] =$vartTipas ;

           if( $_SESSION["vartotojoTipas"] =="administratorius"){
            header("Location:administratoriusForma.php");

        } else {
            header("Location:vartotojoPagrindinis.php");
        } 
       }else {
        echo "netinkamas slaptazodis";
        }

     }


    } catch (PDOException $klaida) {
        echo "Klaida :" . $klaida;
  
       } 
     }


     ?>




     </body>




