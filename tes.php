<html>
   <head>
      <title>Connecting MySQL Server</title>
   </head>
   <body>
      <?php
         $dt = strtotime(date("m/d/Y"));
         echo strtoupper(date("l", $dt));
         $dbhost = 'localhost:3306';
         $dbuser = 'root';
         $dbpass = '80d4to0o3';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
         if(! $conn ) {
            die('Could not connect: ' . mysqli_error());
         }
         echo 'Connected successfully';
         mysqli_close($conn);
      ?>
   </body>
</html>