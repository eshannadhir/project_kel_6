
<?php 
//Aktifkan session
session_start();
//Ambil nilai session error
$error = $_SESSION['login_error'] ?? [];
//ambil nilai dari session old untuk ditampilkan pada input
$old=$_SESSION['old'] ?? [];
?>



<!doctype html>
<html lang="en">
  <head>
   <link rel="stylesheet" href="">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
        
        body {
      background-image: url('../img/login.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      margin: 0; /* Hilangkan margin default */
      display: flex; /* Aktifkan Flexbox */
      justify-content: center; /* Pusatkan secara horizontal */
      align-items: center; /* Pusatkan secara vertikal */
    
    }
    
            .login-card {
                background-color: rgba(255, 255, 255, 0.8);
                border-radius: 10px; 
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                
            }

    </style>
  </head>
  <body>

 
  <br>
  <br>
  <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">

            <div class="card login-card shadow p-4">
                    <div class="card-body">
                        <h3 class="text-center">Login</h3>
                        <?php if ($error): ?>
                            <small class="text-danger"><?= $error ?></small>
                            <?php endif; ?>
                        <form action="login_proses.php" method="POST" class="mt-3">

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control"/>
                            </div>

                            <div class="mb-5">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control"/>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>