<?php
session_start();
//check user login or not
if(!isset($_SESSION['id'])){
    header('location: ../login.php');
}

//apply check for admin role (only candidte access candidate dashboard)
if(isset($_SESSION['role']) !='candidate'){
    header('location: ../admin-dashboard.php');
    exit();
}

include '../includes/dashboard-header.php';


?>
 <div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-2 p-0 ">
            <?php include '../includes/candidate-sidebar.php'?>
           </div>
        <div class="col-md-10 mt-5"> 
        <div class="row p-3">
     <div class="col-md-4">
        <div class="card shadow-sm h-100 text-center ">
           <div class="card-body text-center ">
            <h5><i class="fa-solid fa-briefcase"></i></h5>
            <h4>apply for job</h4>
            <p>apply to 6160 job openings in lucknow: 23 in hcl 8, in tech mahindra 4 in l&t & 4 in onicra on naukri </p>
            <a href="browse-job.php" class="btn btn-success">Browe jobs</a>
           </div> 
            </div> 
            </div> 
           
            
           

        
     <div class="col-md-4">
        <div class="card shadow-sm text-center">
           <div class="card-body">
            <h5><i class="fa-regular fa-window-restore"></i></h5>
            <h4>my Application</h4>
            <p>apply to 6160 job openings in lucknow: 23 in hcl 8, in tech mahindra 4 in l&t & 4 in onicra on naukri </p>
            <a href="job.php" class="btn btn-success">view apply jobs</a>
           </div> 
            </div> 
            </div> 
           
     <div class="col-md-4">
        <div class="card shadow-sm text-center">
           <div class="card-body">
            <h5><i class="fa-solid fa-user"></i></h5>
            <h4>my profile</h4>
            <p>apply to 6160 job openings in lucknow: 23 in hcl 8, in tech mahindra 4 in l&t & 4 in onicra on naukri </p>
            <a href="job.php" class="btn btn-success"> view profile</a>
           </div> 
            </div> 
            </div> 
           
</div>
<div class="row mt-5">
    <div class="card px-0">
        <div class="card-header bg-success p-4 text-white fw-bold"> candidate information</div>
        <div class="card-body ">
            <div class="row g-3">
                <div class="col-md-3">
                    <strong class="text-muted">id</strong>
                    <p>CAN-<?php echo $_SESSION['id'];?></p>
                     </div>
                 <div class="col-md-3"> 
                    <strong class="text-muted">name</strong>
                    <p><?php echo $_SESSION['name'];?></p>
                </div>
                  <div class="col-md-3">
                    <strong class="text-muted">email</strong>
                    <p><?php echo $_SESSION['email'];?></p>
                 </div>
                   <div class="col-md-3">
                    <strong class="text-muted">role</strong>
                    <p><?php echo $_SESSION['role'];?></p>
                </div>

            </div>
        </div>

    </div>
</div></div>
    </div>
 </div>
     <!-- dashboard
     -->
  
</div>



