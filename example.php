<?php

class TestClass{
  private $var1;
  private $var2;

  private function TestClass($var1, $var2){
    // $this->var1 = $var1;
    // $this->var2 = $var2;

  }

  public static function  create($var1, $var2)
  {
    if(is_numeric($var2)){
      return new TestClass($var1, $var2);
    }
    else return NULL;
  }
}
$myArray = array();
$myArray[] = TestClass::create(15, "2560");
$myArray[] = TestClass::create(20, "haha");
$myArray[] = TestClass::create(15, "abcd");

print_r($myArray);
$myArray = array_filter($myArray, function($e)
{
  return !is_null($e);
});
echo "<pre>";
print_r($myArray);

?>
