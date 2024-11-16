<?php
require 'config.php';
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $text = $_POST['text'];

    $sql = "UPDATE feedback SET fName = '$firstname', lName = '$lastname', Email = '$email', Text = '$text' WHERE Text = '$id'";

    $result = $con->query($sql);
    if($result) 
    {
        echo "<script>
                alert(\"Feedback Edited Successfully\");
                window.location.href = \"feedback.php\"
            </script>";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM feedback WHERE Text = '$id'";

    $result = $con->query($sql);

    if($result->num_rows > 0) {
        $result = $result->fetch_assoc();
            $fname = $result['fName'];
            $lname = $result['lName'];
            $email = $result['Email'];
            $text = $result['Text'];
    }
}
$con->close();
?>


<!DOCTYPE html>
<html>

  <head>
    <title>feedback update form| Nova Constructions</title>
    <link rel="stylesheet" href="../CSS/feedbackupdate.css" media="screen">
     
  </head>

  <body>
    <img src="../images/logo.png" id="logo" alt="company logo">
    <img src="../images/title.png" id="title" alt="company title">
    <img src="../images/profileImage.png" id="pImg" alt="profile image"><br>
    <a href="register.html"><img src="../images/signup.png" id="signup" alt="signup button"></a>
    <a href="Login option.html"><img src="../images/signin.png" id="signin" alt="signin button"></a>

    <div class="navBarDiv">
      <ul class = "nav">
        <li><a href = "home.html">Home</a></li>
        <li><a href = "aboutUs.html">Who we are</a></li>
        <li><a href = "whatWeDo.html">What we do</a></li>
        <li><a href = "contactUs.html">Contact Us</a></li>
        <li><a href = "ourWork.html">Our Work</a></li>
      </ul>

      <div class="search">
        <form style="height: 100%;" onsubmit="return false">
          <input type="search" placeholder="Search in our website..." id="searchBar" onsearch="search()">
          <img src="../images/search.png"> 
          <script src="../JS/searchBar.js"></script>
          <input type="submit" id="searchSubmit">
        </form>
      </div>

      <img src="../images/lightMode.png" alt="sunImage" id="theme">
      <script src="../JS/darkMode.js"></script>

    </div>
	
	
    <div id="fform">
	  <h1>Feedback Update</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
             
                <input type="hidden" name="id" id="name" value="<?php echo $id; ?>"><br><br>

               <label class="structure" for="name"> First Name:</label><br> 
                <input type="text" name="fname"  id="name" value="<?php echo $fname; ?>" required><br><br>

                <label class="structure" for="name"> Last Name:</label><br> 
                <input type="text" name="lname"  id="name" value="<?php echo $lname; ?>" required><br><br>

                <label class="structure" for="email"> Email:</label><br>
                <input type="text" name="email" id="email" value="<?php echo $email; ?>" required><br><br>

                <label class="structure" for="textarea"> Feedback:</label><br>
                <textarea rows="5" name="text" id="textarea" ><?php echo $text; ?></textarea><br><br>

                <input type="submit" value="Save Changes" name="update" id="submit" >
            
        </form>
    </div>
	

    <footer>
      <table width="30%" class="footerTable">
        <tr>
          <td width="20%">Contact Us,</td>
          <td width="10%"><img src="../images/email.png" width="80%"></td>
          <td style="white-space:nowrap; text-align: left;">novaconstructions@gmail.com</td>
        </tr>
        <tr>
          <td></td>
          <td><img src="../images/phone.png" width="55%"></td>
          <td style="text-align: left;">+94 (70) 123 4567</td>
        </tr>
      </table><br>
  
      <table width="30%" class="footerTable footerTableHover">
        <tr>
          <td>Follow Us On,</td>
          <td width="10%"><a href="https://www.facebook.com/" target="_blank"><img src="../images/facebook.png" class="fb"></a></td>
          <td width="10%"><a href="https://www.instagram.com/" target="_blank"><img src="../images/insta.png" class="insta"></a></td>
          <td width="10%"><a href="https://www.youtube.com/" target="_blank"><img src="../images/youtube.png" class="yt"></a></td>
          <td width="10%"><a href="https://www.tiktok.com/en/" target="_blank"><img src="../images/tiktok.png" class="tiktok"></a></td>
          <td width="60%"></td>
        </tr>
      </table><br>
  
      <div class="address">
        <h2>NOVA Constructions (pvt) Ltd</h2>
        <p>Street: 568 Havelock Road,<br>06th Lane, Colombo</p>
      </div>
  
      <div class="hyperLinks">
        <p>
          <a href="aboutUs.html">About Us</a> |
          <a href="contactUs.html">Contact Us</a> |
          <a href="FAQ.html">FAQ</a> |
          <a href="customerSupport.html">Customer Support</a> |
          <a href="feedback.php" class="currentFooter">Customer Feedback</a>
        </p>
      </div>
  
      <div class="bottomLogo">
        <img src="../images/logo.png">
        <p>&copy; 2023 NOVA Constructions. All rights reserved.</p>
      </div>
  
    </footer>
 
  </body>

</html>
