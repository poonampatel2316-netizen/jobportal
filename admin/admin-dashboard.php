<?php
session_start();
if(!isset($_SESSION['id'])|| !isset($_SESSION['name']) || !isset($_SESSION['role']) || $_SESSION['role'] !=='admin'){
    header('location: ../login.php');
    exit();
}
include '../includes/dashboard-header.php';
?>
    <div class="row">
    <div class="col-md-2 ">
    <?php include '../includes/admin-sidebar.php'?>
   

        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6 g-5">
                <div class="card stat-card p-3 ms-auto w-75 ">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Total Jobs</p>
                        <h3 class="fw-bold">248</h3>
                    </div>
                    <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-3"><i class="fa-solid fa-briefcase fs-4"></i></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 g-5">
            <div class="card stat-card p-3 ms-auto w-75  ">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Applications</p>
                        <h3 class="fw-bold">1,420</h3>
                    </div>
                    <div class="bg-success bg-opacity-10 text-success p-3 rounded-3"><i class="fa-solid fa-users fs-4"></i></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 g-5">
            <div class="card stat-card p-3  ms-auto w-75 ">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Companies</p>
                        <h3 class="fw-bold">86</h3>
                    </div>
                    <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-3"><i class="fa-solid fa-building fs-4"></i></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 g-5">
            <div class="card stat-card p-3  ms-auto w-75">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Hired</p>
                        <h3 class="fw-bold">32</h3>
                    </div>
                    <div class="bg-info bg-opacity-10 text-info p-3 rounded-3"><i class="fa-solid fa-trophy fs-4"></i></div>
                </div>
            </div>
        </div>
            </div>
       
 
         
     
     
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card p-4 shadow-sm">
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="fw-bold">Recent Jobs</h5>
                    <button class="btn btn-primary btn-sm">+ Add Job</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr><th>Job Title</th><th>Company</th><th>Location</th><th>Status</th><th>Action</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>Frontend Developer</td><td>Infosys</td><td>Chennai</td><td><span class="badge bg-success">Active</span></td><td><button class="btn btn-sm btn-primary">View</button></td></tr>
                            <tr><td>PHP Developer</td><td>TCS</td><td>Bangalore</td><td><span class="badge bg-warning">Pending</span></td><td><button class="btn btn-sm btn-primary">View</button></td></tr>
                            <tr><td>UI/UX Designer</td><td>Wipro</td><td>Remote</td><td><span class="badge bg-success">Active</span></td><td><button class="btn btn-sm btn-primary">View</button></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
     </div>

 

<!-- <script src="assets/js/bootstrap.bundle.min.js"></script> -->
