<?php

require ("Entities/CoffeeEntity.php");

class CoffeeModel{


     function getCoffeeTypes()
     {
       require 'Crendentials.php';
       $conn = mysqli_connect($host, $user, $password, $database);

        if(!$conn){
            die("Database connection error");
          }
       mysqli_set_charset($conn,"utf8");
       $query = "SELECT DISTINCT type FROM coffee";
       $res = mysqli_query($conn, $query);
       $types = array();

       //get data from db

       while($row = mysqli_fetch_array($res))
       {
         array_push($types, $row[0]);
       }
       mysqli_close($conn);
       return $types;
     }

     function GetCoffeeByType($type)
     {
       require 'Crendentials.php';
       $conn = mysqli_connect($host, $user, $password, $database);

        if(!$conn){
            die("Database connection error");
          }
          mysqli_set_charset($conn,"utf8");
          $query = "SELECT * FROM coffee where type LIKE '$type'";
          $res = mysqli_query($conn, $query);
          $coffeeArray = array();
          // ӨС-с дата авах
          while($row = mysqli_fetch_array($res))
          {
            $name = $row['name'];
            $type = $row['type'];
            $price = $row['price'];
            $roast = $row['roast'];
            $country = $row['country'];
            $image = $row['image'];
            $review = $row['review'];
            // обьект үүсгэх массивт оноох
            $coffee = new CoffeeEntity(-1,$name,$type,$price,$roast,$country,$image,$review);
            array_push($coffeeArray, $coffee);


          }
          mysqli_close($conn);
          return $coffeeArray;

     }
}

?>
