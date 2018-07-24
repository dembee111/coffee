<?php

require ("Entities/CoffeeEntity.php");

class CoffeeModel{


     function GetCoffeeTypes()
     {
       require 'Credentials.php';
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
       // echo "<pre>";
       // var_dump($types);
     }

     function GetCoffeeByType($type)
     {
       require 'Credentials.php';
       $conn = mysqli_connect($host, $user, $password, $database);

        if(!$conn){
            die("Database connection error");
          }

          $query = "SELECT * FROM coffee where type LIKE '$type'";
          $res = mysqli_query($conn, $query);
          $coffeeArray1 = array();

          // ӨС-с дата авах
          while($row = mysqli_fetch_array($res, MYSQLI_NUM))
          {
            $coffee = new stdClass();

            $coffee->name = $row[1];
            $coffee->type = $row[2];
            $coffee->price = $row[3];
            $coffee->roast = $row[4];
            $coffee->country = $row[5];
            $coffee->image = $row[6];
            $coffee->review = $row[7];
            // // обьект үүсгэх массивт оноох


         array_push($coffeeArray1, $coffee);

          }
          mysqli_free_result($res);
          mysqli_close($conn);
          return $coffeeArray1;
          // echo "<pre>";
          // var_dump($coffeeArray1);


     }

     function GetCoffeeById($id)
     {
       require 'Credentials.php';
       $conn = mysqli_connect($host, $user, $password, $database);

        if(!$conn){
            die("Database connection error");
          }

          $query = "SELECT * FROM coffee where id = $id";
          $res = mysqli_query($conn, $query);
          $coffeeArray = array();

          // ӨС-с дата авах
          while($row = mysqli_fetch_array($res, MYSQLI_NUM))
          {

               $id = $row[0];
               $name = $row[1];
               $type = $row[2];
               $price = $row[3];
               $roast = $row[4];
               $country = $row[5];
               $image = $row[6];
               $review = $row[7];
            // // обьект үүсгэх массивт оноох

             $coffee = new CoffeeEntity($id, $name, $type, $price, $roast, $country, $image, $review);



          }
          mysqli_free_result($res);
          mysqli_close($conn);
          return $coffee;
     }

     function InsertCoffee(CoffeeEntity $coffee)
     {
       require 'Credentials.php';
       $conn = mysqli_connect($host, $user, $password, $database);

        if(!$conn){
            die("Database connection error");
          }
          mysqli_set_charset($conn,"utf8");

          $name = mysqli_real_escape_string($conn, $coffee->name);
          $type = mysqli_real_escape_string($conn, $coffee->type);
          $price = mysqli_real_escape_string($conn, $coffee->price);
          $roast = mysqli_real_escape_string($conn, $coffee->roast);
          $country = mysqli_real_escape_string($conn, $coffee->country);
          $image = mysqli_real_escape_string($conn, "assets/img/coffee/" . $coffee->image);
          $review = mysqli_real_escape_string($conn, $coffee->review);

         $query = "INSERT INTO coffee(name, type, price, roast, country, image, review)
           VALUES('$name','$type','$price','$roast','$country','$image','$review')";

           $res = mysqli_query($conn, $query);
           mysqli_close($conn);

     }

     function UpdateCoffee($id, CoffeeEntity $coffee)
     {
       $query = sprintf("UPDATE coffee
         SET name = '%s', type ='%s', price ='%s', roast ='%s', country ='%s', image ='%s', review ='%s'
         where id=$id",
           mysqli_real_escape_string($coffee->name),
           mysqli_real_escape_string($coffee->type),
           mysqli_real_escape_string($coffee->price),
           mysqli_real_escape_string($coffee->roast),
           mysqli_real_escape_string($coffee->country),
           mysqli_real_escape_string("assets/img/coffee" . $coffee->image),
           mysqli_real_escape_string($coffee->review));

       $this->PerformQuery($query);
     }

     function DeleteCoffee($id)
     {
       $query = "DELETE FROM coffee WHERE id=$id";
       $this->PerformQuery($query);
     }


     //-----DB тэй холбогдох---------

     function PerformQuery($query)
     {
       require 'Credentials.php';
       $conn = mysqli_connect($host, $user, $password, $database);

        if(!$conn){
            die("Database connection error");
          }
          mysqli_set_charset($conn,"utf8");
          $res = mysqli_query($conn, $query);

           mysqli_close($conn);
     }
}

?>
