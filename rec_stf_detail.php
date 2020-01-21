<?php
require 'rec_stf_server.php';
session_start();

$firstname=$_SESSION['name'];
$lastname=$_SESSION['lastname'];
//$img_url = glob ("images/".$_SESSION['id'].".*");
$img_url="images/".$_SESSION['id'].".jpg";
$department=$_SESSION['department'];
$post=$_SESSION['post'];

if(!file_exists($img_url))
{
    $img_url = "images/generic.jpg";
}

if (isset($_POST['placeofbirth']))
{
    $sql="DELETE FROM `personaldetails` WHERE id='".$_SESSION['id']."';";
    $conn->query($sql);
    $placeofbirth = $_POST['placeofbirth'];
    $fhname = $_POST['fhname'];
    $marital_status = $_POST['marital_status'];
    $Nationality = $_POST['Nationality'];
    $handicapped = $_POST['handicapped'];
    $religion = $_POST['religion'];
    $blood = $_POST['blood'];
    $mark = $_POST['mark'];
    $stmt = $conn->prepare("INSERT INTO `personaldetails` (`id`, `placeofbirth`, `fhname`, `marital_status`, `Nationality`, `handicapped`, `religion`, `blood`, `mark`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $_SESSION['id'], $placeofbirth, $fhname, $marital_status, $Nationality, $handicapped, $religion, $blood, $mark);
    $stmt->execute();
    //if (isset($_POST["submit"])){
        // Where the file is going to be stored
        $target_dir = "images/";
        $filename = $_SESSION['id'];

        // $ext = pathinfo($_FILES['photograph']['name'], PATHINFO_EXTENSION);
        $temp_name = $_FILES['photograph']['tmp_name'];
        $file = new SplFileInfo($_FILES['photograph']['name']);
        $ext  = $file->getExtension();
        $path_filename_ext = $target_dir."$filename".".".$ext;
        move_uploaded_file($temp_name, $path_filename_ext);
    //}
}
$sql1 = "SELECT placeofbirth, fhname, marital_status,Nationality, handicapped, religion, blood, mark FROM `personaldetails` WHERE id='".$_SESSION['id']."';";
$result = $conn->query($sql1);
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
    $placeofbirth1 = $row['placeofbirth'];
    $fhname = $row['fhname'];
    $marital_status1 = $row['marital_status'];
    $Nationality1 = $row['Nationality'];
    $handicapped1 = $row['handicapped'];
    $religion1 = $row['religion'];
    $blood1 = $row['blood'];
    $mark1 = $row['mark'];
	}
}else{
    $placeofbirth1 = NULL;
    $fhname = NULL;
    $marital_status1 = NULL;
    $Nationality1 = NULL;
    $handicapped1 = NULL;
    $religion1 = NULL;
    $blood1 = NULL;
    $mark1 = NULL;
}

?>
<!DOCTYPE html>
<html lang="en" class=" "><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="scroll-viewwport" content="width=device-width, initial-scale=1">

	<title>Personal Details</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

	<link href="css/select2.min.css" rel="stylesheet">

	<link href="css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md" cz-shortcut-listen="true">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
				<?php include "./rec_stf_header.shtml" ?>
				<!-- page content -->
				<div class="right_col" role="main" style="min-height: 1087px;">
					<div class="">
						<div class="page-title">
							<div class="title_left">
								<h3>Personal Details</h3>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2>Please provide your latest information for the post of <?php  echo $post."(".$department.")" ?></h2>
										<div class="clearfix"></div>
									</div>
									<div class="x_content">

										<div class="jumbotron">
											<form method="post" action="" enctype="multipart/form-data">
												<div class="form-group">
													<label for="photograph">Photograph</label>
													<input required type="file" class="form-control" id="photograph" name="photograph">
												</div>
												<div class="form-group">
													<label for="placeofbirth">Place of birth</label>
													<input type="text" class="form-control" id="placeofbirth" name="placeofbirth" placeholder="<?php echo htmlspecialchars($placeofbirth1); ?>">
												</div>
												<div class="form-group">
													<label for="fhname">Father/ Husband's Name</label>
													<input type="text" class="form-control" id="fhname" name="fhname" placeholder="<?php echo htmlspecialchars($fhname); ?>">
												</div>
												<div class="form-group">
													<label class="my-1 mr-2" for="marital_status">Martital Status</label>
													<select class="form-control my-1 mr-sm-2" id="marital_status" name="marital_status" value="<?php echo htmlspecialchars($marital_status1); ?>">
														<option value="Married">Married</option>
														<option value="Unmarried">Unmarried</option>
													</select>
												</div>
												<div class="form-group">
													<label class="my-1 mr-2" for="Nationality">Nationality</label>
													<select class="form-control my-1 mr-sm-2" id="Nationality" name="Nationality" value="<?php echo htmlspecialchars($Nationality1); ?>">
														<option value="Indian">Indian</option>
														<option value="Others">Others</option>
													</select>
												</div>
												<div class="form-group">
													<label class="my-1 mr-2" for="handicapped">Physically handicapped</label>
													<select class="form-control my-1 mr-sm-2" id="handicapped" name="handicapped" value="<?php echo htmlspecialchars($handicapped1); ?>">
														<option value="Yes">Yes</option>
														<option value="No">No</option>
													</select>
												</div>
												<div class="form-group">
													<label class="my-1 mr-2" for="religion">Religion</label>
													<select class="form-control my-1 mr-sm-2" id="religion" name="religion" value="<?php echo htmlspecialchars($religion1); ?>">
														<option value="Hindu" selected="selected">Hindu</option>
														<option value="Muslim">Muslim</option>
														<option value="Christian">Christian</option>
														<option value="Sikh">Sikh</option>
														<option value="Buddhist">Buddhist</option>
														<option value="Zorastrian">Zorastrian (Parsi)</option>
														<option value="Jain">Jain</option>
														<option value="Other">Other</option>
														<option value="None">None (Atheist)</option>
													</select>
												</div>
												<div class="form-group">
													<label class="my-1 mr-2" for="blood">Blood Group</label>
													<select class="form-control my-1 mr-sm-2" id="blood" name="blood" value="<?php echo htmlspecialchars($blood1); ?>">
														<option value="A+">A+</option>
														<option value="A-">A-</option>
														<option value="B+" selected="selected">B+</option>
														<option value="B-">B-</option>
														<option value="O+">O+</option>
														<option value="O-">O-</option>
														<option value="AB+">AB+</option>
														<option value="AB-">AB-</option>
														<option value="NA">Not Known</option>
													</select>
												</div>
												<div class="form-group">
													<label for="mark">Distinguishing mark</label>
													<input type="text" class="form-control" id="mark" name="mark" placeholder="<?php echo htmlspecialchars($mark1); ?>">
												</div>
												<button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
											</form>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /page content -->
			</div>
		</div>

		<!-- jQuery -->

		<script src="js/jquery.min.js.download"></script>
		<!-- Bootstrap -->
		<script src="js/bootstrap.min.js.download"></script>
		<!-- FastClick -->
		<script src="js/fastclick.js.download"></script>
		<!-- NProgress -->
		<script src="js/jquery.easypiechart.min.js.download"></script>
		<script src="js/bootstrap-progressbar.min.js.download"></script>

		<script src="js/moment.min.js.download"></script>
		<script src="js/daterangepicker.js.download"></script>
		<script src="js/daterangepicker.js.download"></script>
		<script src="js/select2.full.min.js.download"></script>

		<!-- Custom Theme Scripts -->
		<script src="js/custom.min.js.download"></script>
	</body>
</html>