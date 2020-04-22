<?php
    //connection settings
    //we use the "$conn variable from connection.php"
   include_once 'connection.php';


      echo "$generatekey";
      // login Function
      if(isset($_POST['submit'])){
        // header("Location:welcome.php");

          //we use "mysqli_real_escape_string" to prevent any SQL Injection Attacks. not Required
          //but neccessary

          //Executing this function without a valid MySQLi connection passed in will return NULL
          //and emit E_WARNING level errors.
          $username = mysqli_real_escape_string($conn,$_POST['username']);
          $password= mysqli_real_escape_string($conn,$_POST['password']);

          if($username!="" && $password!=""){
            $sql = "SELECT * FROM users WHERE username ='$username' AND password = '$password'";
            $result = mysqli_query($conn,$sql);
            // results must be >1
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

                if ($count==1) {
                  header("Location:welcome.php?login=success#");
                } else {
                  header("Location:error.php");
                }
          }

      }







 ?>

<!doctype html>
<html lang="en">
  <head>
    <link rel="icon" href="img\devnet_logo.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- jquery CDN -->

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- PT SANS CDN -->
    <script src="https://kit.fontawesome.com/e1bff3e01e.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/ihub_index.css">

    <script
      src="https://code.jquery.com/jquery-3.5.0.js"
      integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
      crossorigin="anonymous"></script>

<title>.devnet</title>

  </head>
  <body>



      <div class="code-border" id="logindiv">
        <div class="login-text p-5 mt-3 text-center">

              <h1 class="header-code">WELCOME!</h1>

                  <h5><?php echo "$firstname $middlename $lastname" ?></h5>
            </div>
      </div>







    <!-- Optional JavaScript -->

    <!--===============================================================================================-->
    	<script src="js/login_jquery.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
