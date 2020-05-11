<?php
    //connection settings
    //we use the "$conn variable from connection.php"
   include_once 'process/connection.php';
   include 'process/gencode.php';


      $_SESSION['isRegistered'] = 0;

      //echo "$generatekey";
      // login Function
      if(isset($_POST['submit'])){


        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        if($username!="" && $password!=""){
          //sql statment to be queried
          $sql = "SELECT * FROM users WHERE username ='$username' AND password = '$password'";
          //mysqli_query is a mysql function that sends a query request to the database
          //it requires two parameters,
          //@1. the mysqli_connect status which is stored in $conn variable found on "connections.php".
          //@2. the sql statement  which is a string stored on the $sql variable
          $result = mysqli_query($conn,$sql);
          //the query result is stored in the $result variable.

          //The fetch_array() / mysqli_fetch_array() function fetches a result row as an associative array, a numeric array,.
          //it requires the query result status and the MYSQLI_ASSOC "MYSQLI_ASSOC = Array items will use the column name as an index key."
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
          //after fetching row it returns an integer value in which identifies how many matches were found.
          //a match of "1" means a record that matches the input parameter is present marking a correct login
          $count = mysqli_num_rows($result);

          echo $count;

              //standard href redireton
              if ($count==1) {
                $token = token_keygen(17,7);
                $_SESSION['username'] = $username;
                $_SESSION['token'] = $token;

                echo $_SESSION['username'];
                echo $_SESSION['token'];

                $token = $_SESSION['token'];

                $sql = "SELECT count(*) AS allcount FROM user_token WHERE username='$username'";
                $result_token = mysqli_query($conn,$sql);
                $row_token = mysqli_fetch_assoc($result_token);
                if($row_token['allcount'] > 0){
                 mysqli_query($conn,"UPDATE user_token set token='$token' where username='$username'");
                }else{
                 mysqli_query($conn,"INSERT into user_token(username,token) values('$username','$token')");
                }
                header('Location: student-login\welcome.php');

              } else {
                echo "error";
              }
        }
      }

 ?>

<!doctype html>
<html lang="en">
            <!-- HEAD -->
              <head>
                <!-- LOGO -->
                <link rel="icon" href="img\eve_logo.png">
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <!-- BOOTSTRAP -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
                <!-- FONTAWESOME -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <!-- PT SANS CDN -->
                <script src="https://kit.fontawesome.com/e1bff3e01e.js" crossorigin="anonymous"></script>
                <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
                <link rel="stylesheet" type="text/css" href="css/main.css">

                <script
                  src="https://code.jquery.com/jquery-3.5.0.js"
                  integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
                  crossorigin="anonymous"></script>

                  <title>EVE</title>

              </head>


  <!-- BODY -->
  <body>


<!-- navbar -->



<nav class="navbar navbar-expand-md navbar-dark  navbar-custom shadow rounded row fixed-top mb-5">
  <div class="col-xl-3">

  </div>
    <div class=" col-xl-4">
      <a href="index.php" class="navbar-brand nav-title"><span class="purple">.</span>EVE</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar6">
              <span class="navbar-toggler-icon"></span>
          </button>
    </div>

        <div class="navbar-collapse collapse justify-content-stretch navright col-xl-3 ml-5" id="navbar6">
            <!-- <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Link <span class="sr-only">Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul> -->
            <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-text navlink" href="changelog.php">Changelog</a>
              </li
              <li class="nav-item">
                  <a class="nav-text navlink" href="register.php">Guest</a>
              </li>
                <li class="nav-item">
                    <a class="nav-text navlink" data-toggle="modal" data-target="#exampleModal" href="#">Login</a>
                </li>
            </ul>
        </div>


</nav>

<!-- <nav class="navbar fixed-bottom navbar-dark  navbar-custom">
  <small class="navbar-brand mx-auto d-block text-center w-100 nav-bottom">©team-osto</small>

</nav> -->

<!-- nav -->

<div class="jumbotron jumbotron-fluid mt-5 ">
  <div class="container p-5 jumbocontatiner shadow ">
    <h1 class="display-4 font-weight-bold">What is <span class="purple">EVE</span>?</h1>
  <p class="lead jumbolead">it is a web-based <span class="purple">Visitor Management System</span> (VMS) designed to
    track and manage visitors and events. It is a digitized system used to create
    an automated and secure sign-in process while presenting authentic data which
    can be used as an analysis in optimizing visitor registration, safeguarding
    establishment, and even organizing events. </p>
    <span class="purple"></span>
    <p class="lead jumbolead">The system is a <span class="purple">comprehensive</span> and <span class="purple">exceptional</span>
      that embodies efficiency in multiple ways. It makes visiting campus, participating in events,
      or even creating events an easy and trouble-free activity. This system smoothens front desk
      operations by transforming complex and <span class="purple">long waiting registration times</span> into a simple
      and hassle-free action. This system increases the level of security enforced inside a
      premise. It also provides data management in order to make retrieval of data efficient.
 </p>

  </div>
</div>

<div class="jumbotron jumbotron-fluid">
  <div class="container p-5 jumbocontatiner shadow">
    <div class="blog-post">
      <h2 class="blog-post-title display-4">Our System</h2>
      <p class="blog-post-meta">May 8, 2020 by <span class="purple font-weight-bold">OTSO</span> </p>

      <p><span class="purple font-weight-bold">EVE</span> features two different functionalities for visitors that provides ease and comfort
        that can be rarely seen when using a traditional log book system.
        In <span class="purple font-weight-bold">EVE's</span> system, visitors may choose between visiting the school or participating in
        an event, and they even have the choice to register on-site or to pre-register.
        This feature allows valued guests, customers, and clients to save time and resources.
      </p>

      <h2>Types of Users</h2>
      <hr>
      <p><span class="purple font-weight-bold">EVE</span> categorizes its users into two types. The first type of user is known as <span class="purple">Visitor</span>
        which describes any outsider who is not enrolled in iACADEMY. Meanwhile, the second type of
        user is known as <span class="purple font-weight-bold">Gamechanger</span> which could be further classified into two. It could either
        denote to a person who is enrolled in iACADEMY or a certain staff of the institution that
        plays a role as an admin of the system.</p>
      <h3>Visitor</h3>
      <p><span class="purple font-weight-bold">EVE</span> features two different functionalities for visitors that provides ease and
        comfort that can be rarely seen when using a traditional log book system.
        In <span class="purple font-weight-bold">EVE's</span> system, visitors may choose between visiting the school or
        participating in an event, and they even have the choice to register on-site
        or to pre-register. This feature allows valued guests, customers, and clients
         to save time and resources.
</p>

      <h3>Gamechanger</h3>
      <p>Users of the system who are either currently enrolled in iACADEMY or a
        staff of the institution that is given a role as an admin of the system is
        labelled as “<span class="purple font-weight-bold">Gamechanger</span>”, and aside from the two different functionalities of a visitor,
        gamechangers have the ability to create events.</p>

      <p>Before making a selection,
        they are asked to log-in the system and to input their respective iACADEMY email and password.
        The visit school selection prompts the user to input their respective details,
        and it would still follow the same procedure done by the visitors. Meanwhile,
        if the user opts to select events.</p>

        <blockquote>
        <p>The user may choose from the following</p>
      <ol>
        <li>Create Event.</li>
        <li>See Events.</li>
        <li>Participate Event.</li>
      </ol>
      </blockquote>
      <h3>Admins</h3>

      <p>The admins of iHub are collectively called as “<span class="purple font-weight-bold">Gamechanger</span>”
        that is classified into three different types with various roles and
        permissions depending on their department.</p>

        <ul>
          <li><span class="purple font-weight-bold">Office of Student Experience and Advancement</span> (OSEA) as <span class="purple font-weight-bold">Event Manager</span></li>
          <p>As one of the admins of iHub, the Office of Student Experience and Advancement also
            known as OSEA, has the ability to regulate the event features of the application.
            Their task is to check the events that are created in the application, and they hold the
            capability on whether to approve or decline these events. Some events are organized by the
            department, so they are also given the ability to create events.</p>
            <li> <span class="purple font-weight-bold">Security Officer</span> as  <span class="purple font-weight-bold">Groundskeeper</span></li>
            <p>As one of the admins of iHub, the Office of Student Experience and Advancement also
              known as OSEA, has the ability to regulate the event features of the application.
              Their task is to check the events that are created in the application, and they hold the
              capability on whether to approve or decline these events. Some events are organized by the
              department, so they are also given the ability to create events.</p>
              <li><span class="purple font-weight-bold">I.T. department</span> as  <span class="purple font-weight-bold">Supervisor</span></li>
              <p>As one of the admins of iHub, the Office of Student Experience and Advancement also
                known as OSEA, has the ability to regulate the event features of the application.
                Their task is to check the events that are created in the application, and they hold the
                capability on whether to approve or decline these events. Some events are organized by the
                department, so they are also given the ability to create events.</p>
        </ul>
    </div>
  </div>
</div>




<!-- LOGIN MODAL -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h3 class="modal-title w-100"><span class="purple">.</span>EVE</h3>
          </div>
        <div class="modal-body">
          <form class="loginform" action="" method="post">
              <!-- HEADER -->

              <!-- FIRST INPUT DIV // USERNAME -->
            <div class="container mt-4">
                <div class="row">
                  <!-- USER ICON -->
                  <div class="col-1">
                    <span style="font-size: 25px;">
                      <i class="fas fa-user icon"></i>
                    </span>
                  </div>
                  <div class="col-11">
                    <input type="text" class="form-control" id="user" name="username"placeholder="Username" required >
                  </div>
                </div>
            </div>
  <div class="container mt-3">
    <div class="row">

        <!-- PASSWORD ICON -->
        <div class="col-1">
        <span style="font-size: 25px;">
          <i class="fas fa-key icon"></i>
        </span>
        </div>

      <div class="col-11">
        <input type="password" class="form-control" id="pass" name="password"placeholder="Password" required >

            </div>
            <div class="container mt-3">
              <div class="row">
                <div class="col text-center">
            </div>
              </div>
            </div>
            <div class="container text-center ">
              <div class="row ">
                <div class="notstudent col w-100">
                  <a id="" href="switch\switch_register.php">Not a student?</a>
                </div>
              </div>

            </div>


        </div>
        <div class="modal-footer mt-3">
          <button type="button" class="btn btn-custom-purple"  data-dismiss="modal" style="width: 100px;">CLOSE</button>
          <input class="btn btn-custom-purple" id="submit"type="submit" name="submit" value="LOGIN"style="width: 100px;">
        </form>

        </div>
      </div>
    </div>
</div>







    <!-- Optional JavaScript -->

    <!--===============================================================================================-->
    	<script src="js/login_jquery.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
