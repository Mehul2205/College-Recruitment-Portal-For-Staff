<?php
require 'rec_stf_server.php';
session_start();

$firstname=$_SESSION['name'];
$lastname=$_SESSION['lastname'];
$department=$_SESSION['department'];
$post=$_SESSION['post'];
$img_url="images/".$_SESSION['id'].".jpg";
if(!file_exists($img_url))
{
    $img_url = "images/generic.jpg";
}
if(isset($_GET['description']))
{
    $specialization1 = $_GET['specialization1'];
    $specialization2 = $_GET['specialization2'];
    $specialization3 = $_GET['specialization3'];

    $sql="DELETE FROM `add_details` WHERE id='".$_SESSION['id']."';";
    $conn->query($sql);
    $description = $_GET['description'];
    $stmt = $conn->prepare("INSERT INTO add_details (`id`,`description`,`specialization1`,`specialization2`,`specialization3`) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $_SESSION['id'], $description,$specialization1, $specialization2, $specialization3);
    $stmt->execute();
}
$sql1 = "SELECT description, specialization1, specialization2, specialization3 FROM `add_details` WHERE id='".$_SESSION['id']."';";
$result = $conn->query($sql1);
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
        $description1 = $row["description"];
        $specialization1 = $row['specialization1'];
        $specialization2 = $row['specialization2'];
        $specialization3 = $row['specialization3'];
    
	}
}else{
    $description1 = "";
    $specialization1 = NULL;
    $specialization2 = NULL;
    $specialization3 = NULL;

}

?>
<!DOCTYPE html>
<html lang="en" class=" "><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="scroll-viewwport" content="width=device-width, initial-scale=1">

    <title>Additional Details</title>

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
                                <h3>Additional Details</h3>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Please provide your latest information for the post of <?php  echo " ".$post."(".$department.")" ?><br>You can add as many entries as you want.</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="jumbotron">
                                            <form>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="id_description">Description</label>
                                                    <textarea class="form-control" cols="40" id="id_description" name="description" rows="10" placeholder="<?php echo htmlspecialchars($description1); ?>"></textarea>									
                                                    <p class="help-block"><small>This field must be within 2000 characters. In case you want to add more details add details in a separate page and attach it with application form</small></p>
                                                </div>		
                                                
                                                <div class="form-group">
                                                    <label for="speciaization1">1. Area of Specialization</label>
                                                    <input class="form-control" id="specialization1" maxlength="50" name="specialization1" type="text" placeholder="<?php echo htmlspecialchars($specialization1); ?>">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="speciaization2">2. Area of Specialization</label>
                                                    <input class="form-control" id="specialization2" maxlength="50" name="specialization2" type="text" placeholder="<?php echo htmlspecialchars($specialization2); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="speciaization3">3. Area of Specialization</label>
                                                    <input class="form-control" id="specialization3" maxlength="50" name="specialization3" type="text" placeholder="<?php echo htmlspecialchars($specialization3); ?>">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
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
    <script src="js/nprogress.js.download"></script>
    <script src="js/jquery.easypiechart.min.js.download"></script>
    <script src="js/bootstrap-progressbar.min.js.download"></script>

    <script src="js/moment.min.js.download"></script>
    <script src="js/daterangepicker.js.download"></script>
    <script src="js/daterangepicker.js.download"></script>
    <script src="js/select2.full.min.js.download"></script>

    <!-- Custom Theme Scripts -->
    <script src="js/custom.min.js.download"></script>
    <script type="text/javascript"></script>
</body>
</html>