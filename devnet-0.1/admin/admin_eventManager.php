<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="admin_css/admin_security.css">

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script type="text/javascript" src="admin_js/admin-security.js"></script>

</head>

<body onload="realtimeClock(), realtimeDate()">
  <div id="header">
   <nav class="navbar sticky-top navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#!">EVE EVENT MANAGER</a>
  </nav>
  </div>
<div class="sidebar">
  <a class="active" href="#home">EVE - EVENTS ADMIN</a>
  <div class="dropdown">
  <button class="dropbtn">Event Diary</button>
    <div class="dropdown-content">
      <a href="#">All Events</a>
      <a href="#">Create Event</a>
      <a href="#">Pending Events</a>
    </div>
  </div>
  <a href="#events">Ticket</a>
  <a href="../index.php">Logout</a>
</div>

<div class="content">
  <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-left">
        <div class="col-xs-12 col-sm-16">
              <br>
              <div class="jumbotron">
                  <a href="#" class="visible-xs" data-toggle="offcanvas"><i class="fa fa-lg fa-reorder"></i></a>
                  <h1>Hello, Admin!</h1>
                  <p>Welcome to your personal security module.</p>
                  <div id="clock"></div>
                  <div id="date"></div>
              </div>

              <div class="row">
                  <div class="col-6 col-sm-6 col-lg-4">
                    <div class="jumbotron">
                        <a href="#" class="visible-xs" data-toggle="offcanvas"><i class="fa fa-lg fa-reorder"></i></a>
                        <h1>Pending Events</h1>

                        <p><a class="btn btn-default" href="#">View details »</a></p>
                    </div>
                  </div>

                  <div class="col-6 col-sm-6 col-lg-4">
                    <div class="jumbotron">
                        <a href="#" class="visible-xs" data-toggle="offcanvas"><i class="fa fa-lg fa-reorder"></i></a>
                        <h1>Pending Events</h1>

                        <p><a class="btn btn-default" href="#">View details »</a></p>
                    </div>
                  </div>

                  <div class="col-6 col-sm-6 col-lg-4">
                    <div class="jumbotron">
                        <a href="#" class="visible-xs" data-toggle="offcanvas"><i class="fa fa-lg fa-reorder"></i></a>
                        <h1>Approved Events</h1>

                        <p><a class="btn btn-default" href="#">View details »</a></p>
                    </div>
                  </div>

                  <div class="col-12 col-sm-12 col-lg-8">
                    <div class="jumbotron">
                        <a href="#" class="visible-xs" data-toggle="offcanvas"><i class="fa fa-lg fa-reorder"></i></a>
                        <h1>Latest Activities</h1>

                        <p><a class="btn btn-default" href="#">View details »</a></p>
                    </div>
                  </div>

              </div>
          </div>
      </div>

      <hr>

      <footer>
          <p style="color:white;">© 2020 Team Otso/SE5</p>
      </footer>

  </div>
</div>

</body>
</html>
