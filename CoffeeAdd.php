<?php

require 'Controller/CoffeeController.php';
$coffeeController = new CoffeeController();


$title = 'Add a new Coffee';

$content = "<form action ='' method ='POST'>
   <fieldset>
       <legend>Add a new Coffee</legend>
       <hr>
       <label for='name'>Name: </label>
       <input type='text' class='inputField' name='txtName' value=''/><br/>
       <hr>
       <label for='type'>Type: </label>
       <select class='inputField' name='ddlType'>
          <option value='%'>Сонгоно уу</option>".$coffeeController->CreateOptionValues($coffeeController->GetCoffeeTypes())."
       </select>
       <br/>
       <hr>
       <label for='price'>Price: </label>
       <input type='text' class='inputField' name='txtPrice' value=''/><br/>
        <hr>
       <label for='roast'>Roast: </label>
       <input type='text' class='inputField' name='txtRoast' value=''/><br/>
       <hr>
       <label for='country'>Country: </label>
       <input type='text' class='inputField' name='txtCountry' value=''/><br/>
       <hr>
       <label for='image'>Image: </label>
       <select class='inputField' name='ddlImage'>
          ".$coffeeController->GetImages()."
       </select><br/>
       <hr>
       <label for='review'>Review: </label>
       <textarea name='txtReview' rows='8' cols='40'></textarea><br/>
        <hr>
       <input type='submit' id='foo' value='Submit'>
   </fieldset>
</form>";
if(isset($_POST["txtName"]))
{
  
    $coffeeController->InsertCoffee();
}
include 'Template.php';
?>
