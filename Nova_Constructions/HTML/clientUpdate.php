<?php
require 'config.php';
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $gender = $_POST['gender'];
    $bio = $_POST['bio'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE register SET fName = '$firstname', lName = '$lastname', gender = '$gender', bio = '$bio', address = '$address', country = '$country', mobileNo = '$phone', email = '$email', password = '$password' WHERE no = '$id'";

    $result = $con->query($sql);
    if($result) 
    {
        echo "<script>
                alert(\"Client Information Edited Successfully\");
                window.location.href = \"manageClients.php\"
            </script>";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM register WHERE no = '$id'";

    $result = $con->query($sql);

    if($result->num_rows > 0) {
        $result = $result->fetch_assoc();
            $fname = $result['fName'];
            $lname = $result['lName'];
            $gender = $result['gender'];
            $bio = $result['bio'];
            $address = $result['address'];
            $country = $result['country'];
            $phone = $result['mobileNo'];
            $email = $result['email'];
            $pw = $result['password'];
    }
}
$con->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Client infomation update form</title>
        <link rel="stylesheet" href="../CSS/clientUpdate.css">
    </head>
</html>
    <body>
        <h1>Client infomation Update</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <fieldset>
                <input type="hidden" name="id" value="<?php echo $id; ?>"><br><br>

                First Name:<br>
                <input type="text" name="fname" value="<?php echo $fname; ?>" required><br><br>

                Last Name:<br>
                <input type="text" name="lname" value="<?php echo $lname; ?>" required><br><br>

                Gender:<br>
                <label><input type="radio" name="gender" value="Male" required>Male</label><br>
                <label><input type="radio" name="gender" value="Female" required>Female</label><br><br>

                Bio:<br>
                <textarea rows="5" name="bio"><?php echo $bio; ?></textarea><br><br>

                Address:<br>
                <textarea rows="5" name="address"><?php echo $address; ?></textarea><br><br>

                Country:<br>
                <textarea rows="5" name="country"><?php echo $country; ?></textarea><br><br>

                Contact Number:<br>
                <input type="text" name="phone" value="<?php echo $phone; ?>" pattern="\d{10}" title="Phone number should have 10 digits." required><br><br>

                Email:<br>
                <input type="text" name="email" value="<?php echo $email; ?>" required><br><br>

                Password:<br>
                <input type="text" name="password" value="<?php echo $pw; ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br><br>

                <input type="submit" value="Save Changes" name="update">
            </fieldset>
        </form>

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
          <a href="feedback.php">Customer Feedback</a>
        </p>
      </div>
  
      <div class="bottomLogo">
        <img src="../images/logo.png">
        <p>&copy; 2023 NOVA Constructions. All rights reserved.</p>
      </div>
  
    </footer>
    </body>
</html>
