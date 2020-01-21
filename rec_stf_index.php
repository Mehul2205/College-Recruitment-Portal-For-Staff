<?php
$email_error="";
    require 'rec_stf_server.php';
    if(isset($_POST['fname']))
    {

        $sql="SELECT email from details WHERE email='".$_POST['email']."';";
        $result = $conn->query($sql);

        $a=$result->fetch_assoc();
        if($a)
        {
            $email_error="Email already exists";
        }
        else{
        	$regno = "FAC".date('Y').strtoupper(date('M'));

        	if($_POST['department']=="CSE")
        		$regno = $regno."01";
        	elseif ($_POST['department']=="ECE") {
        		$regno = $regno."02";
        	}
        	elseif ($_POST['department']) {
        		$regno = $regno."03";
        	}

        	if ($_POST['post']=="Assistant Professor 6000") {
        		$regno = $regno."01";
        	}
        	elseif ($_POST['post']=="Assistant Professor 7000") {
        		$regno = $regno."02";
        	}
        	elseif ($_POST['post']=="Assistant Professor 8000") {
        		$regno = $regno."03";
        	}
        	elseif ($_POST['post']=="Assistant Professor") {
        		$regno = $regno."04";
        	}
        	elseif ($_POST['post']=="Professor") {
        		$regno = $regno."05";
        	}

        	$sql = "SELECT id FROM details ORDER BY id DESC LIMIT 1;";
        	$result = $conn->query($sql);
        	$a=$result->fetch_assoc();
        	if($a)
        	{
        		$newid = sprintf('%03d',$a['id'] + 1);
        		$regno = $regno.$newid;
        	}
        	else {
        		$regno = $regno."001";
        	}
			$password = $_POST['pass'];
			$password_hash = md5($_POST['pass']);
          $sql="INSERT INTO details (firstname, middlename, lastname, dob, gender, category, res_category, email, phone, password,department,post,reg_no) VALUES ( '".$_POST['fname']."','".$_POST['mname']."','".$_POST['lname']."','".$_POST['dob']."','".$_POST['gender']."','".$_POST['cat']."','".$_POST['res_cat']."','".$_POST['email']."','".$_POST['phone']."','".$password_hash."','".$_POST['department']."','".$_POST['post']."','".$regno."');";
//        echo $sql;
            if ($conn->query($sql) === FALSE)
            {
                echo "Database error". $conn->error;
            }
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login/Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container">
		<img src="iiitn.jpg" class="img-responsive img-thumbnail" style="border:0;">
		<hr class="my-4">

		<div class="container">
			<div class="row">
			<div class="col-sm jumbotron border">
                    <h1 class="display-6">New Application(New User)</h1>
                    <p class="lead">Fill in the form below:</p>
                    <p style="background-color: #ff0010;"><?php echo $email_error?></p>
                    <hr class="my-4">
					<form method="post" action="">
						<div class="form-group">
							<label for="fname">First Name*</label>
							<input type="text" class="form-control" id="fname" name="fname" required>
						</div>
						<div class="form-group">
							<label for="mname">Middle Name</label>
							<input type="text" class="form-control" id="mname" name="mname">
						</div>
						<div class="form-group">
							<label for="lname">Last Name*</label>
							<input type="text" class="form-control" id="lname" name="lname" required>
						</div>
						<div class="form-group">
							<label for="dob">Date of birth*</label>
							<input type="date" class="form-control" id="dob" name="dob" required min="1950-01-01" max="2000-01-01">
						</div>
						<div class="form-group">
							<label class="my-1 mr-2" for="gender">Your Gender*</label>
							<select class="custom-select my-1 mr-sm-2" id="gender" name="gender" required>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Other">Other</option>
							</select>
						</div>
						<div class="form-group">
							<label class="my-1 mr-2" for="cat">Your Category*</label>
							<select class="custom-select my-1 mr-sm-2" id="cat" name="cat" required>
								<option value="GEN">General</option>
								<option value="SC">SC</option>
								<option value="ST">ST</option>
								<option value="OBC">OBC - Creamy Layer</option>
								<option value="OBCNC">OBC - Non Creamy Layer</option>
								<option value="GEN-PH">General (Person with Disabilities)</option>
								<option value="SC-PH">SC (Person with Disabilities)</option>
								<option value="ST-PH">ST (Person with Disabilities)</option>
								<option value="OBC-PH">OBC - Creamy Layer (Person with Disabilities)</option>
								<option value="OBCNC-PH">OBC - Non Creamy Layer (Person with Disabilities)</option>
							</select>
						</div>
						<div class="form-group">
							<label class="my-1 mr-2" for="res_cat">Reservation Category*</label>
							<select class="custom-select my-1 mr-sm-2" id="res_cat" name="res_cat" required>
								<option value="NIL">NONE</option>
								<option value="SC">SC</option>
								<option value="ST">ST</option>
								<option value="OBCNC">OBC - Non Creamy Layer</option>
								<option value="PH">Person with Disabilities</option>
								<option value="EXSM">Ex-Servicemen</option>
								<option value="EWS">Economically Weaker Section</option>
							</select>
						</div>
						<div class="form-group">
							<label for="email">Email Address*</label>
							<input type="email" class="form-control" id="email" name="email" required>
						</div>
						<div class="form-group">
							<label for="phone">Phone Number*</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="phone">+91-</span>
								</div>
								<input type="text" class="form-control" id="phone" name="phone" required>
								<div class="invalid-feedback">
									Please provide your phone number.
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="my-1 mr-2" for="department">Department*</label>
							<select class="custom-select my-1 mr-sm-2" id="department" name="department" required>
								<option value="CSE">Computer Science and Engineering</option>
								<option value="ECE">Electronics and Communication Engineering</option>
								<option value="BSE">Basic Science & Engineering</option>
								<option value="Administration">Administration</option>
							</select>
						</div>
						<div class="form-group">
							<label class="my-1 mr-2" for="post">Post*</label>
							<select class="custom-select my-1 mr-sm-2" id="post" name="post" required>
								<option value="Assistant Professor 6000">Assistant Professor (contract agp-6000) </option>
								<option value="Assistant Professor 7000">Assistant Professor (contract agp-7000)</option>
								<option value="Assistant Professor 8000">Assistant Professor (agp-8000)</option>
								<option value="Assistant Professor">Associate Professor</option>
								<option value="Professor">Professor</option>
							</select>
						</div>
                        <div class="form-group">
                            <label for="pass">Password*</label>
                            <input type="password" class="form-control" id="pass"  name="pass" required>
                        </div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
				<div class="col-sm jumbotron border">
                    <h1 class="display-6">Login to our Application Portal</h1>
                    <p class="lead">Enter email id and password to log in:</p>
                    <hr class="my-4">
					<form action="rec_stf_login.php" method="post">
						<div class="form-group">
							<label for="lemail">Email ID</label>
							<input type="email" class="form-control" id="lemail" name="lemail" placeholder="Enter email">
						</div>
						<div class="form-group">
							<label for="lpass">Password</label>
							<input type="password" class="form-control" id="lpass" name="lpass" placeholder="Password">
						</div>
						<?php
							$class = '';
							if(isset($_GET['invalid'])) {
								if($_GET['invalid'] == True) {
									$class = 'Invalid Email-Id or Password';
								}
							}
						?>
						<p class=""><?php echo $class;?></p>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>