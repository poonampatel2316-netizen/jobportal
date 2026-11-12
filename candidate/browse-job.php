<?php
session_start();
include '../includes/db.php';
if(!isset($_SESSION['id'])|| $_SESSION['role'] !='candidate'){
    header('location: ../login.php');
    exit();
}
 $query = "SELECT * FROM jobs ORDER BY id ASC";
 $result = mysqli_query($connect, $query);
//apply job functionality
if(isset($_POST['apply_job'])){
    $user_id=$_SESSION['id'];
   $job_id=$_POST['job_id'];

    //check resume uploaded or not
if(!isset($_FILES['resume'])|| $_FILES['resume']['error']!=0){
    echo "please upload your resume";
    exit();
}
// check job exist or not
$job_query="select id from jobs where id='$job_id' AND STATUS='open'";
$res=mysqli_query($connect,$job_query);
if(mysqli_num_rows($res)==0){
    echo "job not available !";
    exit();
}
//check duplicate job
$job_duplicate="select id from job_application where user_id='$user_id' AND job_id='$job_id'";
$result=mysqli_query($connect,$job_duplicate);
if(mysqli_num_rows($result)>0){
    echo "you have already applied for this job";
    exit();
}
//resume check
$resume_name=$_FILES['resume']['name'];//resme.pdf
$resume_tmp=$_FILES['resume']['tmp_name'];
$resume_size=$_FILES['resume']['size'];
//find extention
$fileExtention=pathinfo($resume_name,PATHINFO_EXTENSION);
$allow_extension=["pdf","doc","docx"];

if(!in_array($fileExtention,$allow_extension)){
    echo "only PDF,DOC,DOCX,file are allowed";
    exit();

}
//maximun file size 2MB=2*1024*1024
if($resume_size>2*1024*1024){
    echo "Resume size should be upload less then 2MB";
    exit();
}
//create upload folder
$upload_folder="../upload/resumes/";
if(!is_dir($upload_folder)){
    mkdir($upload_folder,0755,true);

}
//generate unique file name 
$new_resume_name=uniqid('resume_',true).'.'.$fileExtention;
$_resume_path=$upload_folder.$new_resume_name;

if(move_uploaded_file($resume_tmp,$_resume_path)){
    //save resume in databade
    $resume_db_path="upload/resume/".$new_resume_name;
    $insert_query="insert into job_application(user_id,job_id,resume) values(' $user_id','$job_id','$resume_db_path')";
    $insert_result=mysqli_query($connect,$insert_query);
    if($insert_result){
        echo "<script>
        alert('job application submitted successfuly!');
        window.location.href='browse-job.php';
        </script>";

    }else{
        echo"Application not submitted,please try again.";
}
}else{
    echo "Resume upload failed";
    }

}
include '../includes/dashboard-header.php';

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 candidate-sidebar sidebar-toggle  ">
            <?php include '../includes/candidate-sidebar.php'?>
           </div>
          <div class="col-md-10 mt-5">
            <h2 class="mt-4 text-center">Avaliable jobs</h2>
            <p class="text-muted text-center ">you can apply job relataed to you profile </p>
            <div class="row g-4">
                <?php
                if(mysqli_num_rows($result)>0){
                    while($job=mysqli_fetch_assoc($result)){
                        ?>
                        <div class="col-md-4 ">
                        <div class="card">
                        <div class="card-body">
                            <h4><?php echo $job['title'];?></h4><hr>
                            <p><i class="fa-solid fa-building"></i><?php echo $job['company'];?></p>
                            <P><i class="fa-solid fa-briefcase"></i><strong>job type:</strong><?php echo $job['job_type'];?></P>
                             <P><i class="fa-duotone fa-solid fa-laptop"></i><strong> Required technology:</strong><?php echo $job['technology'];?></P>

                              <P><i class="fa-light fa-flask-gear"></i><strong>Experience:</strong><?php echo $job['experience'];?></P>
                               <P><i class="fa-solid fa-location-dot"></i><strong>Location:</strong><?php echo $job['location'];?></P>
                                <P><i class="fa-solid fa-sack-dollar"></i><strong>Salary:</strong><?php echo $job['salary'];?></P>
                                <div class="d-flex justify-content-end">
                                    
                         <button class="btn btn-info" type="button" data-bs-toggle="offcanvas" data-bs-target="#appliedjob<?php echo $job['id'];?>" aria-controls="offcanvasRight">Apply</button>
            
            </div>
                            
                    </div>
                        </div>
                        </div>
                         <div class="offcanvas offcanvas-end" tabindex="-1" id="appliedjob<?php echo $job['id'];?>" aria-labelledby="offcanvasRightLabel">
             <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel">job Apply</h5>
               <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div>
                        <input type="hidden" name="job_id" value="<?php echo $job['id'];?>">
                    </div>
                    <div class="md-3">
                        <label for="" class="form-lable">Resume</label>
                        <input type="file" name="resume"class="form-control" accept=".pdf,.doc,.docx" require>
         
                     </div>
                <button class="btn btn-success" type="submit" name="apply_job">submit</button>
                    
                </form>
    
            </div>
             </div>
                        <?php
                    }

                }
                ?>

</div>
<?php
include "../includes/dashboard-footer.php"
?>
        </div>
</div>
<div>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/script.js"></script>





