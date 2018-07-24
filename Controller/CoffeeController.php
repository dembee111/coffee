<?php

require ("Model/CoffeeModel.php");

class CoffeeController
{
        function CreateCoffeeDropdownList()
        {
            $coffeeModel = new CoffeeModel();
            $result = "<form action ='' method ='POST' width='200px'>
            Сонголт оо хийнэ үү <select name = 'types'>
              <option value ='%'>All</option>
              ".$this->CreateOptionValues($coffeeModel->GetCoffeeTypes())."</select>
              <input type = 'submit' value = 'Search'/>
              </form>";
              return $result;
        }

        function CreateOptionValues(array $valueArray)
        {
          $result = "";
          foreach($valueArray as $value)
          {
            $result = $result . "<option value='$value'>$value</option>";
          }
          return $result;
        }

        function CreateCoffeeTables($types){

          $coffeeModel = new CoffeeModel();
          $coffeeArray = $coffeeModel->GetCoffeeByType($types);
          $result = "";
          // echo "<pre>";
          // var_dump($coffeeArray);
          foreach ($coffeeArray as $key => $coffee)
        {

            $result = $result .
                    "<table class = 'coffeeTable' >
                        <tr style='text-align: :left;padding:0px 5px 0 5px;'>
                            <th rowspan='6' width = '150px' ><img runat = 'server' style='padding: 0px 10px 10px 10px;
                            height: 250px;
                            width: 250px;' src = '$coffee->image' /></th>
                            <th width = '75px' style='text-align: :left;padding:0px 5px 0 5px;' >Name: </th>
                            <td style='text-align: :left;padding:0px 5px 0 5px;'>$coffee->name</td>
                        </tr>

                        <tr style='text-align: :left;padding:0px 5px 0 5px;'>
                            <th>Type: </th>
                            <td>$coffee->type</td>
                        </tr>

                        <tr style='text-align: :left;padding:0px 5px 0 5px;'>
                            <th>Price: </th>
                            <td>$coffee->price</td>
                        </tr>

                        <tr style='text-align: :left;padding:0px 5px 0 5px;'>
                            <th>Roast: </th>
                            <td>$coffee->roast</td>
                        </tr>

                        <tr style='text-align: :left;padding:0px 5px 0 5px;'>
                            <th>Origin: </th>
                            <td>$coffee->country</td>
                        </tr>

                        <tr style='text-align: :left;padding:0px 5px 0 5px;'>
                            <td colspan='2' >$coffee->review</td>
                        </tr>
                     </table>";
        }
          return $result;
        }
        function GetImages()
        {
          //---зургийг хадагалах фолдерыг сонгох---

          $handle = opendir("assets/img/coffee");
          //--Файлыг ачааллаад нэр өгөн массив хэлбэрт хадгалнаа---
          while($image = readdir($handle))
          {
            $images[] = $image;

          }
          closedir($handle);

          //---
          $imageArray = array();
          foreach($images as $image)
          {
            if(strlen($image) > 2 )
            {
              array_push($imageArray, $image);
            }
          }
          //---create <select><option> values and return result
          $result = $this->CreateOptionValues($imageArray);
          return $result;


        }
         //---editr fol--desc="Set Methods"---------------
        function InsertCoffee(){



            $name = $_POST["txtName"];
            $type = $_POST["ddlType"];
            $price = $_POST["txtPrice"];
            $roast = $_POST["txtRoast"];
            $country = $_POST["txtCountry"];
            $image = $_POST["ddlImage"];
            $review = $_POST["txtReview"];


            $coffee = new CoffeeEntity(-1, $name, $type, $price, $roast, $country, $image, $review);
          
            $coffeeModel = new CoffeeModel();
            $coffeeModel->InsertCoffee($coffee);


        }

        function UpdateCoffee($id){

        }

        function DeleteCoffee($id){

        }
         //---editr fol--desc="Get Methods"---------------
        function GetCoffeeById($id){
           $coffeeModel =new CoffeeModel();
           return $coffeeModel->GetCoffeeById($id);
        }
        function GetCoffeeByType($type){
           $coffeeModel =new CoffeeModel();
           return $coffeeModel->GetCoffeeByType($type);
        }

        function GetCoffeeTypes(){
           $coffeeModel =new CoffeeModel();
           return $coffeeModel->GetCoffeeTypes();
        }
        //-----editor fold-------------------
}

?>
