<?php

$title ="Upload new image";

$content ="<form action='' method='post' enctype='multipart/form-data'>
                <label for='file'>Filename: </label>
                <input type='file' name='file' id='file'><br/>
                <input type='submit' name='submit' value='submit'><br/>
            </form>";
            if(isset($_POST["submit"])){

              $fileType = $_FILES["file"]["type"];
              if(($fileType == "image/gif") ||
                ($fileType == "image/jpeg") ||
                ($fileType == "image/jpg") ||
                ($fileType == "image/png"))
              {
                  if(file_exists("assets/img/coffee/" .$_FILES["file"]["name"]))
                  {
                    echo "File already exists";

                  }
                  else {
                    move_uploaded_file($_FILES["file"]["tmp_name"], "assets/img/coffee/".$_FILES["file"]["name"]);
                    echo "Upload in " . "assets/img/coffee/" . $_FILES["file"]["name"];
                  }
              }

            }

include 'template.php';



 ?>
