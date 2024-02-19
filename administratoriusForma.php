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

        <form action="pridetiNaujakategorija.php" method= "post">
      Knygu kategorija: <input type= "text", name="kategorijosPavadinimas">
      <br>

      <input type="submit"> 

     </form>

     <form action="pridetiNaujaKnyga.php" method= "post">
      Knygos pavadinimas <input type= "text", name="knygosPavadinimas">
      <br>
      santrauka  <input type= "text", name="santrauka ">
      <br>
      ISBN  <input type= "text", name="ISBN">
      <br>
      Nuotrauka <input type= "text", name="nuotrauka">
      <br>
      puslapiuSkaicius  <input type= "text", name="puslapiuSkaicius">
      <br>
      puslapiuSkaicius  <input type= "text", name="puslapiuSkaicius">
      <br>
      



      <input type="submit"> 




   
   



