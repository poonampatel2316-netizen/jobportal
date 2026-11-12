<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min copy.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
<header class="header" id="header">
<nav class="navbar navbar-expand-lg  p-3 ">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="assets/images/jobcon.png" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav w-100 d-flex justify-content-center mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Job</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Compines</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Serivces</a>
        </li>
       </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        </form>
        <!-- model open -->
         <!-- Button trigger modal -->
        <button type="button" class="btn btn-success reg text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Register</button>
    </div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-center w-100" id="staticBackdropLabel">Create Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
              <div class="input-group mb-3">
             <span class="input-group-text" id="fullname"><i class="fa-solid fa-circle-user"></i></span>
                <input type="text" name="name" class="form-control" placeholder="Fullname" aria-label="Username" aria-describedby="Fullname">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="email"><i class="fa-duotone fa-regular fa-envelope"></i></span>
                <input type="text" name="email" class="form-control" placeholder="email" aria-label="Username" aria-describedby="Email">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="pwd"><i class="fa-solid fa-unlock-keyhole"></i></span>
                <input type="text" name="password" class="form-control" placeholder="pwd" aria-label="Username" aria-describedby="Password">
             </div>
             <button class="btn reg w-100" type="submit" name="register">Register</button>
                <p class="text-center pt-3">Alread hane an account ?<a href="login.php">login</a></p>
            </form>
      </div>
      
    </div>
  </div>
  <!-- modal close -->
</div>
  </div>
</nav>
</header>
