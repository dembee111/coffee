<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/stylesheet.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>


   <div id="wrapper">
       <div id="banner">

       </div>
       <nav id="navigation">
           <ul id="nav">
             <li><a href="index.php">Эхлэл</a></li>
             <li><a href="Coffee.php">Кофе</a></li>
             <li><a href="#">Дэлгүүр</a></li>
             <li><a href="#">Тухай</a></li>
           </ul>
       </nav>
       <div id="content_area">
            <?php echo $content; ?>
       </div>
       <div id="sidebar">

       </div>
       <footer>
         <p>All rights reserved</p>
       </footer>
   </div>


</body>
</html>
