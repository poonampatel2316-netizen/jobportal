<?php
session_start();
include '../includes/db.php';
$id = $_GET['edit_id'] ?? "";
$editData = null;

//when old data id is available in url
if($id != ""){
    $selectQuery = "SELECT * FROM jobs WHERE id='$id'";
    $selectResult = mysqli_query($connect, $selectQuery);
    $editData = mysqli_fetch_assoc($selectResult);
}

if(!isset($_SESSION['id']) || !isset($_SESSION['name']) || !isset($_SESSION['role']) || $_SESSION['role']!=='admin'){
    header('location:../login.php');
    exit();
}
$message="";

if(isset($_POST['create_job'])){
    $title=trim($_POST['title']);
    $company=trim($_POST['company']);
    $job_type=trim($_POST['job_type']);
    $technology=trim($_POST['technology']);
    $experience=trim($_POST['experience']);
    $location=trim($_POST['location']);
    $salary=trim($_POST['salary']);
    $description=trim($_POST['description']);
    $status="open";
    
    if($title=="" || $company=="" || $job_type=="" || $experience==""){
        $message= "please fill all required field !";
    }else{
         $query="INSERT INTO jobs(title, company, job_type, technology, experience, location, salary, description, status) values('$title','$company','$job_type', '$technology', '$experience', '$location', '$salary', '$description','$status')";
         $result=mysqli_query($connect,$query);
         if($result){
            $message= "Job created successfully !";
         }else{
            $message= "Something went wrong !"; 
         }
    }
}

// update....
if(isset($_POST['Update'])){
    $id = $_POST['hidden_id'];  
    $title=trim($_POST['title']);
    $company=trim($_POST['company']);
    $job_type=trim($_POST['job_type']);
    $technology=trim($_POST['technology']);
    $experience=trim($_POST['experience']); 
    $location=trim($_POST['location']);
    $salary=trim($_POST['salary']);
    $description=trim($_POST['description']);
    $updatedata = "UPDATE jobs SET title='$title', company='$company', job_type='$job_type', technology='$technology', experience='$experience', location='$location', salary='$salary', description='$description' WHERE id='$id'";
    $innerresult=mysqli_query($connect, $updatedata);
    if($innerresult){
        $message= "update created successfully";
        header("location:create-job.php");
       exit();
    }else{
        $message= "something went wrong ! ";
    }
}

//delete ....
if(isset($_GET['id'])){
    $delete_id=$_GET['id'] ?? "";
    $delete="delete from jobs where id='$delete_id'";
    $res=mysqli_query($connect,$delete);
    if($res){
       $message= "deleted successfully!";
       header("location:create-job.php");
       exit();
    }
}

include '../includes/dashboard-header.php';
?>
<?php
 if($message !=""){
    ?>
    <div class="msg">
        <?php echo $message;?>
        
    </div>
    <?php
    
 }?>

<div class="container-fluid">
<div class="row">
   <div class="col-md-2 candidate-sidebar sidebar-toggle ">
    <?php include '../includes/admin-sidebar.php'?>
   </div>
   <div class="col-md-10">
    <h2 class="text-success"><?php echo $editData ? "Update Job" : "Create New Job"; ?></h2>
    <div class="row d-flex justify-content-center">
         <div class="col-md-6 border p-4 rounded" style="background:#92abe2; box-shadow: 0 0 15px rgba(93, 87,0.4);">
        <form action="" method="POST">
        <?php if($editData){ ?>
            <input type="hidden" name="hidden_id" value="<?php echo $editData['id']; ?>">
        <?php } ?>
        <div class="mb-3">
            <label class="form-lable">Job title</label>
            <input type="text" placeholder="Enter Job Title.." name='title' class="form-control" value="<?php echo htmlspecialchars($editData['title'] ?? ''); ?>">
        </div>
        <div class="mb-3">
            <label class="form-lable">Company Name</label>
            <input type="text" placeholder="Enter Company name.." name="company" class="form-control" value="<?php echo htmlspecialchars($editData['company'] ?? ''); ?>">
        </div>
        <div class="mb-3">
            <label class="form-lable">Job Type</label>
             <select name="job_type" class="form-control">
                <option value="">Select job type</option>
                <option value="Full Time" <?php if(($editData['job_type'] ?? '')=='Full Time') echo 'selected'; ?>>Full Time</option>
                <option value="Part Time" <?php if(($editData['job_type'] ?? '')=='Part Time') echo 'selected'; ?>>Part Time</option>
                <option value="Internship" <?php if(($editData['job_type'] ?? '')=='Internship') echo 'selected'; ?>>Internship</option>
                <option value="Remote" <?php if(($editData['job_type'] ?? '')=='Remote') echo 'selected'; ?>>Remote</option>
             </select>
        </div>
        <div class="mb-3">
            <label class="form-lable">Technology</label>
            <input type="text" placeholder="Enter Technology.." name="technology" class="form-control" value="<?php echo htmlspecialchars($editData['technology'] ?? ''); ?>">
        </div>
        <div class="mb-3">
          <label class="form-lable">Experience</label>
          <select name="experience" class="form-control">
            <option value="">Select Experience</option>
            <option value="Fresher" <?php if(($editData['experience'] ?? '')=='Fresher') echo 'selected'; ?>>Fresher</option>
            <option value="0-1 year" <?php if(($editData['experience'] ?? '')=='0-1 year') echo 'selected'; ?>>0-1 year</option>
            <option value="1-2 year" <?php if(($editData['experience'] ?? '')=='1-2 year') echo 'selected'; ?>>1-2 year</option>
            <option value="2-3 year" <?php if(($editData['experience'] ?? '')=='2-3 year') echo 'selected'; ?>>2-3 year</option>
            <option value="3-4 year" <?php if(($editData['experience'] ?? '')=='3-4 year') echo 'selected'; ?>>3-4 year</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-lable">Location</label>
          <input type="text" placeholder="Enter job location.." name="location" class="form-control" value="<?php echo htmlspecialchars($editData['location'] ?? ''); ?>">
        </div>
        <div class="mb-3">
            <label class="form-lable">Salary</label>
            <input type="text" placeholder="Example. 4LPA - 7LPA" name="salary" class="form-control" value="<?php echo htmlspecialchars($editData['salary'] ?? ''); ?>">
        </div>
        <div class="mb-3">
            <label class="form-lable">Description</label>
            <textarea name="description" class="form-control" rows="5"><?php echo htmlspecialchars($editData['description'] ?? ''); ?></textarea>
        </div>
        <div class="mb-3">
            <?php if($editData){ ?>
                <button type="submit" name="Update" class="btn btn-warning w-100 ">Update</button>
            <?php }else{ ?>
                <button type="submit" name="create_job" class="btn btn-success w-100">create_job</button>
            <?php } ?>
        </div>
    </form>
    </div>
    </div>
   </div>
</div>
</div>

<!-- table start -->
<div class="row mt-5 mb-5">
    <div class="col-md-12">
        <div class="card shadow-sm p-3">
            <h4 class="mb-3 text-primary text-center">All Created Jobs List</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Sr No.</th><th>Title</th><th>Company</th><th>Job Type</th><th>Technology</th><th>Experience</th><th>Location</th><th>Salary</th><th>Description</th><th>Status</th><th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sr = 1;
                        $query = "SELECT * FROM jobs ORDER BY id ASC";
                        $result = mysqli_query($connect, $query);
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $sr++; ?></td>
                                    <td class="fw-bold"><?php echo htmlspecialchars($row['title']); ?></td>
                                    <td><?php echo htmlspecialchars($row['company']); ?></td>
                                    <td><span class="badge bg-info text-dark"><?php echo htmlspecialchars($row['job_type']); ?></span></td>
                                    <td><?php echo htmlspecialchars($row['technology']); ?></td>
                                    <td><?php echo htmlspecialchars($row['experience']); ?></td>
                                    <td><?php echo htmlspecialchars($row['location']); ?></td>
                                    <td><?php echo htmlspecialchars($row['salary']); ?></td>
                                    <td><?php echo htmlspecialchars(substr($row['description'], 0, 40)); ?>...</td>
                                    <td><span class="badge bg-success"><?php echo htmlspecialchars($row['status']); ?></span></td>
                                    <td>
                                        <a href="create-job.php?edit_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary mb-1">Edit</a>
                                        <a href="create-job.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger mb-1" onclick="return confirm('Are you sure?')">Delete</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>