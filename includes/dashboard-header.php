<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

     <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
     <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>
    <div class="container-fluid ">
        <div class="row">
            <!-- <div class="col-md-2 candidate-head p-3 "> -->
                
   
<button class="btn btn-primary sidebar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
 open
</button>
 

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
    </div>
    <div class="dropdown mt-3">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
        Dropdown button
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </div>
  </div>
</div>
  </div>
  <div class="col-md-12 header-flxed w-100 ">
    <div class=" bg-white">
  <div class=" align-items-center ">
   
    <h5 class="mb-0 fw-bold"><?php echo $_SESSION['role']; ?>Dashboard</h5>
    <p class="mb-0">Welcome, <strong><?php echo $_SESSION['name']; ?></strong> (<?php echo $_SESSION['email']; ?>)</p>
  </div>
  
</div>

</div>
    
    </div>
    
