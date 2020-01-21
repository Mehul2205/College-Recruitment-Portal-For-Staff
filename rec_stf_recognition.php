<<?php
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

if (isset($_GET['title']))
{
    $title = $_GET['title'];
    $issuing_agency = $_GET['issuing_agency'];
    $issuing_date = $_GET['issuing_date'];
    $stmt = $conn->prepare("INSERT INTO recognition (id, title, issuing_agency, issuing_date) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $_SESSION['id'], $title, $issuing_agency, $issuing_date);
    $stmt->execute();
}
?>
<!DOCTYPE html>
<html lang="en" class=" "><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="scroll-viewwport" content="width=device-width, initial-scale=1">

    <title>Recognition</title>

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
                                <h3>Recognition</h3>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Please provide your latest information for the post of <?php  echo " ".$post."(".$department.")" ?><br>You can add as many entries as you want.</h2>
                                        <div class="clearfix"></div>
                                    </div>

                                    <?php
                                    $sql = "SELECT i, id, title, issuing_agency, issuing_date FROM recognition   WHERE id=".$_SESSION['id'];
                                    $result = $conn->query($sql);
                                    $i=1;
                                    if ($result->num_rows > 0) {
                                        // output data of each row

                                        while($row = $result->fetch_assoc()) {
                                            echo "<div class='bg-success'>";
                                            echo "<strong>Entry</strong>".$i."<br>";
                                            echo "<strong>title:</strong> ".$row['title'];
                                            echo "&nbsp <strong>issuing_agency:</strong> ".$row['issuing_agency'];
                                            echo "&nbsp <strong>issuing_date:</strong> ".$row['issuing_date'];
                                            echo "</div><br>";
                                            $i=$i+1;
                                        }

                                    }
                                    ?>

                                    <div class="x_content">
                                        <div class="jumbotron">
<form>
            <div class="form-group">
                <label for="id_title">Recognition Title</label>
                        <input class="form-control" id="id_title" maxlength="500" name="title" type="text">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_issuing_agency">Issuing agency</label>
                        <input class="form-control" id="id_issuing_agency" maxlength="200" name="issuing_agency" type="text">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_issuing_date">Date</label>
                        <input class="form-control" id="id_issuing_date" name="issuing_date" type="date" min="1950-01-01" max="2020-01-01">
            </div>
        
    
    <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a class="btn btn-danger" href="rec_stf_clear.php?table=recognition">Clear</a>
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