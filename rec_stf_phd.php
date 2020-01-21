<?php
require 'rec_stf_server.php';
session_start();

$firstname=$_SESSION['name'];
$lastname=$_SESSION['lastname'];
$img_url="images/".$_SESSION['id'].".jpg";
$department=$_SESSION['department'];
$post=$_SESSION['post'];
if(!file_exists($img_url))
{
    $img_url = "images/generic.jpg";
}

if(isset($_GET['degree']))
{
    $degree = $_GET['degree'];
    $discipline = $_GET['discipline'];
    $institute = $_GET['institute'];
    $university = $_GET['university'];
    $date_of_enrollment = $_GET['date_of_enrollment'];
    $date_of_defense = $_GET['date_of_defense'];
    $marks = $_GET['marks'];

    $sql="DELETE FROM `phd` WHERE id='".$_SESSION['id']."';";
    $conn->query($sql);

    $stmt = $conn->prepare("INSERT INTO `phd` (`id`, `degree`, `discipline`, `institute`, `university`, `date_of_enrollment`, `date_of_defense`, `marks`) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssss", $_SESSION['id'], $degree, $discipline, $institute, $university, $date_of_enrollment, $date_of_defense, $marks);
    $stmt->execute();
}

$sql1 = "SELECT degree,discipline,institute,university,date_of_enrollment,date_of_defense,marks FROM `phd` WHERE id='".$_SESSION['id']."';";
$result = $conn->query($sql1);
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
    $degree1 = $row['degree'];
    $discipline1 = $row['discipline'];
    $institute1 = $row['institute'];
    $university1 = $row['university'];
    $date_of_result1 = $row['date_of_enrollment'];
	    $date_of_defense = $row['date_of_defense'];
    $marks1 = $row['marks'];
	}
}else{
    $degree1 = NULL;
    $discipline1 = NULL;
    $institute1 = NULL;
    $university1 =NULL;
    $year_passed1 = NULL;
    $date_of_result1 = NULL;
	    $date_of_defense = NULL;
    $marks1 = NULL;
}

?>
<!DOCTYPE html>
<html lang="en" class=" "><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="scroll-viewwport" content="width=device-width, initial-scale=1">

    <title>PhD</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    
    <link href="css/select2.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
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
                                <h3>PhD</h3>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Please provide your latest information for the post of <?php  echo " ".$post."(".$department.")" ?></h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="jumbotron">
<form method="get" action="">    
        
            <div class="form-group">
                <label for="id_degree">Thesis Title</label>
                    
                        <input class="form-control" id="id_degree" maxlength="150" name="degree" type="text" placeholder="<?php echo htmlspecialchars($degree1); ?>">
                    
                    
            </div>
        
    
        
            <div class="form-group">
                <label for="id_discipline">Major Research Area</label>
                    
                        <input class="form-control" id="id_discipline" maxlength="150" name="discipline" type="text" placeholder="<?php echo htmlspecialchars($discipline1); ?>">
                    
                    
            </div>
        
    
        
            <div class="form-group">
                <label for="id_institute">Institution</label>
                    
                        <input class="form-control" id="id_institute" maxlength="250" name="institute" type="text" placeholder="<?php echo htmlspecialchars($institute1); ?>">
                    
                    
                        <p class="help-block"><small>If you have directly enrolled in an university, kindly provide name of the university here</small></p>
                    
            </div>
        
    
        
            <div class="form-group">
                <label for="id_university">University</label>
                    
                        <input class="form-control" id="id_university" maxlength="250" name="university" type="text" placeholder="<?php echo htmlspecialchars($university1); ?>">
                    
                    
            </div>
    
	
        
            <div class="form-group">
                <label for="id_date_of_enrollment">Date of enrollment</label>
                    
                        <input class="form-control" id="id_date_of_enrollment" name="date_of_enrollment" type="date" min="1950-01-01" max="2020-01-01" value="<?php echo htmlspecialchars($date_of_result1); ?>">
                    
                    
                        <p class="help-block"><small>Provide PhD Enrollment Date</small></p>
                    
            </div>
        
    
        
            <div class="form-group">
                <label for="id_date_of_defense">Date of defense</label>
                    
                        <input class="form-control" id="id_date_of_defense" name="date_of_defense" type="date" min="1950-01-01" max="2020-01-01" value="<?php echo htmlspecialchars($date_of_defense1); ?>">
                    
                    
                        <p class="help-block"><small>Provide PhD Defense Date</small></p>
                    
            </div>
        
    
        
            <div class="form-group">
                <label for="id_marks">Percentage Score</label>
                    
                        <input class="form-control" id="id_marks" name="marks" step="0.01" type="number" placeholder="<?php echo htmlspecialchars($marks1); ?>">
                    
                    
                        <p class="help-block"><small>Provide Marks obtained in the Course Work(if applicable) in Percentage. In case CGPA/DGPA is awarded please change it to percentage using norms of the awarding university</small></p>
                    
            </div>
        
    
    <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
            
    </div>
</form>                                        </div>


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
            <script src="js/nprogress.js.download"></script>
            <script src="js/jquery.easypiechart.min.js.download"></script>
            <script src="js/bootstrap-progressbar.min.js.download"></script>

            <script src="js/moment.min.js.download"></script>
            <script src="js/daterangepicker.js.download"></script>
            <script src="js/daterangepicker.js.download"></script>
            <script src="js/select2.full.min.js.download"></script>

            <!-- Custom Theme Scripts -->
            <script src="js/custom.min.js.download"></script>
            <script type="text/javascript">
            </script>
        </body>
        </html>