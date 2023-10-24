<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>The Crew Project</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
              <h1>Hello Mr./Mrs. <?php echo $_SESSION['username']??'' ?></h1>
              <h3>Welcome to Our Crew Project</h3><br /><hr /><br /><br />
 
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <?php
                  if(isset($_SESSION["username"])){ ?>

                    <a class="btn btn-warning" href="./logout.php">Log Out</a><br /><br />

                  <?php }else {
                  ?>
                    <a class="btn btn-primary" href="./login.php">Log In</a><br /><br />
                    <p>Don't have an account. please, click here for <a href="./registration.php" class="btn btn-link">Registration</a></p>
                <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>