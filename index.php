<?php


include 'includes/db.php';
$message="";
if(isset($_POST['register'])){
    $name=trim($_POST['name']);
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);
    $role="candidate";

     if(empty($name)){
              $message="user name should be not empty !";
            }elseif (!preg_match("/^[A-Za-z. ]{3,}$/", $name)) {
           $message="Invalid name format ";
             
           }elseif(empty($email)){
             $message=" email not should be empty";
           }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $message="invalid email format ! please currect it  ";
             }elseif (!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/", $email)) {
              $message="Invalid email format";
             }elseif(empty($password)){
            $message=" password not empty ";

           }elseif(strlen($password)<=8 && strlen($password)>=10){
             $message="password length should not be 8 to 10 ";
          }else{
              $checkEmail="select* from users where email='$email'";
    $checkresult=mysqli_query($connect,$checkEmail);
     if(mysqli_num_rows($checkresult)>0){
        $message="Email Already Register";

    }else{
        //hash password
       $hashedpassword=password_hash($password,PASSWORD_DEFAULT);
       $query="insert into users (name,email,password,role) values('$name','$email','$hashedpassword','$role')";
       $res=mysqli_query($connect,$query);
      if($res){
        $message="Registration sucessfuly !";
      //  header('location:login.php');
       // exit();

       }else{
        $message="failed !,you can try again";
       }

    }
          }
    //chek email alread exist or not in user table
  

}
include 'includes/header.php';
?>
<?php
 if($message !=""){
    ?>
    <div class='msg'>
        <?php echo $message;?>
        
    </div>
    <?php
    
 }?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="assets/css/style.css">
    
</head>
<body>


<!-- Home Section Start -->
<section class="home-section">
    <div class="container">
        <div class="row align-items-center">
           
            <div class="col-lg-6 col-md-7">
                <div class="home-content">
                    <h1>Your Next  Career Starts Here <br>Exciting<br>Startup Jobs</h1>
                    <p>Find your dream job and start your career with the right opportunity.</p>
                    <form action="view.php" method="GET" class="job-search">
                        <input type="text" name="keyword" placeholder="Job Title Or Keyword">
                        <button type="submit">Find Job</button>
                    </form>
                </div>
            </div>
            
            <div class="col-lg-6 col-md-5">
                <div class="home-image">
                    <img src="assets/images/images.jpg" alt="Job seeker">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="steps-section">
  <div class="container">
    <h2 class="steps-title">Easy Steps To Get Your Dream Job<br>With Our Platform</h2>
    
    <div class="row g-4">
     
      <div class="col-lg-3 col-md-6 col-12">
        <div class="step-box">
          <div class="icon-box"><i class="fa-solid fa-users"></i></div>
          <h5>Create Account</h5>
          <p>Contrary to popular belief. Lorem Ipsu is not simply random text. It has roots in a piece of classical Latin</p>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6 col-12">
        <div class="step-box">
          <div class="icon-box"><i class="fa-solid fa-file-arrow-up"></i></div>
          <h5>Upload Your Resume</h5>
          <p>Contrary to popular belief. Lorem Ipsu is not simply random text. It has roots in a piece of classical Latin</p>
        </div>
      </div>
     
      <div class="col-lg-3 col-md-6 col-12">
        <div class="step-box">
          <div class="icon-box"><i class="fa-solid fa-magnifying-glass"></i></div>
          <h5>Search Job</h5>
          <p>Contrary to popular belief. Lorem Ipsu is not simply random text. It has roots in a piece of classical Latin</p>
        </div>
      </div>
    
      <div class="col-lg-3 col-md-6 col-12">
        <div class="step-box">
          <div class="icon-box"><i class="fa-solid fa-id-badge"></i></div>
          <h5>Apply Your Dream Job</h5>
          <p>Contrary to popular belief. Lorem Ipsu is not simply random text. It has roots in a piece of classical Latin</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section>

<div class="container text-contect-center ">
  <div class="free-card">
    <h3>Yes, It's Completely Free.</h3>
    <p class="sub-text">No trials. No credit card. Just powerful AI tools built to help you get hired faster.</p>
    
    <div class="container p-20">
      <div class="row">
        <div class="col-md-6 col-12 ">
          <ul type="none" class="features-list" >
            <li><i class="fa-solid fa-check"></i> No credit card required</li>
            <li><i class="fa-solid fa-check"></i> Full access to all core features</li>
          </ul>
        </div>
        <div class="col-md-6 col-12">
          <ul type="none" class="features-list" >
            <li><i class="fa-solid fa-check"></i> Unlimited usage</li>
            <li><i class="fa-solid fa-check"></i> No hidden charges, ever</li>
          </ul>
        </div>
        <div  type="none" class="col-12">
          <ul class="features-list d-flex justify-content-center">
            <li><i class="fa-solid fa-check"></i> Free to use forever</li>
          </ul>
        </div>
      </div>
    </div>

    <button class="btn-free">Sign Up For Free →</button>
  </div>
</div>

</section>

<section class="articles-section">
  <div class="container">
    <h2 class="sec-title">Read Our Articles That Will Help<br>You To Secure A Great Job</h2>

    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="article-card">
          <img src="assets/images/job.jpg" alt="">
          <small><i class="fa-regular fa-clock"></i> Posted 22 Jan, 2022</small>
          <h6>A big challenge for Social Media Marketer in coming days - 01</h6>
          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
          <button class="btn-read btn-blue">Read More</button>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="article-card">
          <img src="assets/images/photo3.jpg"alt="">
          <small><i class="fa-regular fa-clock"></i> Posted 22 Jan, 2022</small>
          <h6>A big challenge for Social Media Marketer in coming days - 02</h6>
          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
          <button class="btn-read btn-blue">Read More</button>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="article-card">
          <img src="assets/images/photo11jpg.avif" alt="">
          <small><i class="fa-regular fa-clock"></i> Posted 22 Jan, 2022</small>
          <h6>Guide to secure a well paid job as Web design & developer</h6>
          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
           <button class="btn-read btn-blue">Read More</button>
        </div>
      </div>
    </div>

    
    <div class="subscribe-box">
         <img src="assets/images/photo2.jpg"alt="">
      <div class="subscribe-content">
        <h4>Subscribe Our <span>Newsletter</span><br>To Get Daily Job Alert</h4>
        <div class="subscribe-form">
          <input type="email" placeholder="Enter your email">
          <button>Subscribe</button>
        </div>
      
       </div>

    </div>
</section>
<?php
include 'includes/footer.php';
?>
</body>

</html>

