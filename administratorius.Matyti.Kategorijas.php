<html>
  <head>
      <style>
         table{
           background: #fff;
        border:1px solid #000;
        width: 100%;
        }
     th{
          background:#555;
          color:#FFFFFF;
        }
       td, th {
        border:1px solid #666;
        padding: 8px; }
       tr:hover{ background:#CCC;}
   </style>
</head>
  <body>

  <?php

  require "prisijungimasPrieDuombazes.php";

  try{
    $db = new PDO ("mysql:host=$serverioAdresas; dbname=$duombaze",
    $vartotojoVardas, $slaptazodis);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql="SELECT ID_knyguKategorija,kategorijosPavadinimas 
        FROM KnyguKategorija";

      $db->query($sql);

      $atsakym= $db->query($sql);

      $rezultat = $atsakym->fetchAll(PDO::FETCH_ASSOC);

      echo "<table>";
      echo "<tr>";
      echo "<th>.ID_knyguKategorija. </th>";
      echo "<th>.kategorijosPavadinimas .</th>";
      echo " </tr >";
      foreach($rezultat as $eilute) {
        echo "<tr>";
        echo "<td>". $eilute ['ID_knyguKategorija'] . "<td>";
        echo "<td>". $eilute ['kategorijosPavadinimas'] . "<td>";
        echo "</tr>";
        echo "a href= 'adminRedaguotiKategorija.php?id={$eilute ['kategorijosPavadinimas']}>redaguoti</a> ";
      }

      echo "</table>";







  } catch (PDOException $klaida) {
    echo "Klaida :" . $klaida;

   } 

   

  ?>

  </body>

</html>

