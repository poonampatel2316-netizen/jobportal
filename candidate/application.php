<?php
session_start();
include '../includes/db.php';

if(!isset($_SESSION['id'])){
    header('location: ../login.php');
    exit();
}

$candidate_id = $_SESSION['id'];

$query = "select job_application.*,  jobs.title, jobs.company, jobs.job_type, jobs.technology, jobs.experience, jobs.location, jobs.salary, job_application.status 
      FROM jobs 
      INNER JOIN job_application ON jobs.id = job_application.job_id 
      WHERE job_application.user_id = '$candidate_id'";

$res = mysqli_query($connect, $query);
?>
<html>
<head>
<title>My Applications</title>
</head>
<body>
<div class="custom-blog-card" style="height:70px; width:100%; background: #160534; line-height:70px; color:white; ">
<h2 style="text-align:center;">My Applied Jobs</h2>
</div>

<?php
if($res && mysqli_num_rows($res) > 0){
    while($row = mysqli_fetch_assoc($res)){
?>
<div class="card-hover" style="height:350px; width:300px; background:  rgb(21, 147, 147); float:left; margin:20px; padding:15px; color:white;">
    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
    <p><?php echo htmlspecialchars($row['company']); ?></p>
    <hr>
    <p><b>Job Type :</b> <?php echo htmlspecialchars($row['job_type']); ?></p>
    <p><b>Required Technology :</b> <?php echo htmlspecialchars($row['technology']); ?></p>
    <p><b>Experience :</b> <?php echo htmlspecialchars($row['experience']); ?></p>
    <p><b>Location :</b> <?php echo htmlspecialchars($row['location']); ?></p>
    <p><b>Salary :</b> <?php echo htmlspecialchars($row['salary']); ?></p>
    <p><b>Status :</b> <?php echo htmlspecialchars($row['status']); ?></p>
    <a href="<?php echo htmlspecialchars($row['resume']); ?>">Resume</a>
    
    <button style="padding:10px 20px; float:right; background:  #2e2611; outline:none; border:none; border-radius:5px; color:white;">Applied</button>
</div>
<?php
    }
} else {
    echo "No jobs applied";
}
?>

</body>
</html>