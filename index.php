<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Halaman Login</title>
<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.min.css"/>
<link rel="stylesheet" href="style.css"/>
<link rel="shortcut icon" href="images/logo-01.png"/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4 login-from">
            <h4><em class="glyphicon glyphicon-log-in"></em>  Halaman Login</h4>
            <form>
                <div class="form-group">
                    <label for="">Username</label>
                    <input id="username" type="text" class="form-control" name="username" placeholder="Username"/>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" />
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-primary" id="login" data-toggle="modal" data-target="#myModal">Login</button>
                </div>
            </form>
            <br />     
        </div>
    </div>
</div> 
<!-- End container -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Notifikasi</h4>
      </div>
      <div class="modal-body">
        <p id="notifLogin"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

    <!-- Script js -->
    <script src="jquery/jquery.js"></script>
    <script src="act.js"></script>
    <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <!-- End Script -->
</body>
</html>