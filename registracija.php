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


      <form action="registracija.php" method= "post">
      Elektroninis paštas: <input type= "text", name="el_pastas">
      <br>
      Slaptazodis: <input type= "text", name="Slaptazodis">
      <br>
      vartotojoVardas: <input type= "text", name="vardas">
      <br>
      vartotojoPavarde :<input type= "text", name="pavarde">
      <br>
      vartotojoTipas :<select name = "vartotojoTipas">
      <option value=administratorius>administratorius</option>
      <option value=vartotojas>vartotojas</option>
     </select>
      <br>

      <input type="submit"> 

     </form>

     <?php

     require "prisijungimasPrieDuombazes.php";

     if ($_SERVER ["REQUEST_METHOD"] == "POST"){

        $pastas = $_POST["el_pastas"];
        $slaptazVart = $_POST["Slaptazodis"];
        $vardas = $_POST["vardas"];
        $pavarde = $_POST["pavarde"];
        $vartTipas = $_POST["vartotojoTipas"];

        $sifruotas_slaptazodis= password_hash($slaptazodis, PASSWORD_DEFAULT);
     echo "Mano sifruotas slaptazodis :" .$sifruotas_slaptazodis;

   try{
    $db = new PDO ("mysql:host=$serverioAdresas; dbname=$duombaze",
    $vartotojoVardas, $slaptazodis);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql="INSERT INTO Vartotojas
(vardas, pavarde, el_pastas ,Slaptazodis,vartotojoTipas )
 VALUES ('$vardas', '$pavarde', '$pastas', '$sifruotas_slaptazodis', '$vartTipas')";

  $db->exec($sql);

  header("Location: prisijungimas.php");


   }catch (PDOException $klaida) {
      echo "Klaida :" . $klaida;

     } 

    }

     ?>
    


</body>