<?php
require 'rec_stf_server.php';
session_start();
$firstname=$_SESSION['name'];
$lastname=$_SESSION['lastname'];
$department=$_SESSION['department'];
$post=$_SESSION['post'];
$id=$_SESSION['id'];
$img_url="images/".$_SESSION['id'].".jpg";
if(!file_exists($img_url))
{
    $img_url = "images/generic.jpg";
}


if(isset($_GET['employer']))
{
$sql="INSERT INTO `workexperience` (`id`, `employer`, `address`, `designation`, `employment_type`, `govt`, `nagpur`, `joind`, `leaved`, `nature`, `last_salary`, `basic_pay`, `gp`, `level`) VALUES ('".$_SESSION['id']."', '".$_GET['employer']."', '".$_GET['address']."', '".$_GET['designation']."', '".$_GET['employment_type']."', '".$_GET['govt_servant']."', '".$_GET['iiitn_employee']."', '".$_GET['joining_date']."', '".$_GET['leaving_date']."', '".$_GET['nature_of_work']."', '".$_GET['last_salary_drawn']."', '".$_GET['basic_pay']."', '".$_GET['gp']."', '".$_GET['level']."')";
if ($conn->query($sql) === TRUE)
    {
        $location="rec_stf_wrok_experience.php";
        echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL='.$location.'">';
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en" class=" "><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="scroll-viewwport" content="width=device-width, initial-scale=1">

    <title>Work Experience </title>

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
                                <h3>Work Experience</h3>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Please provide your latest information for the post of <?php  echo " ".$post."(".$department.")" ?><br> You can add as many entries as you want.</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <?php
                                        $sql = "SELECT i,id,employer,address,designation,employment_type,govt,nagpur,joind,leaved,nature,last_salary,basic_pay,gp,level FROM workexperience WHERE id=".$_SESSION['id'];
                                        $result = $conn->query($sql);
                                        $i=1;
                                        if ($result->num_rows > 0) {
                                            // output data of each row

                                            while($row = $result->fetch_assoc()) {
                                                echo "<div class='bg-success'>";
                                                echo "<strong>Entry</strong>".$i."<br>";
                                                echo "<strong>Employer:</strong> ".$row['employer'];
                                                echo "&nbsp <strong>Address:</strong> ".$row['address'];
                                                echo "&nbsp <strong>Designation:</strong> ".$row['designation'];
                                                echo "&nbsp <strong>Employed in Govt. Sector:</strong> ".$row['govt'];
                                                echo "&nbsp <strong>Employed in IIIT Nagpur: </strong>".$row['nagpur'];
                                                echo "&nbsp <strong>Joining Date:</strong> ".$row['joind'];
                                                echo "&nbsp <strong>Leaving Date:</strong> ".$row['leaved'];
                                                echo "&nbsp <strong>Nature of work:</strong> ".$row['nature'];
                                                echo "&nbsp <strong>Last salary drawn:</strong> ".$row['last_salary'];
                                                echo "&nbsp <strong>Basic pay:</strong> ".$row['basic_pay'];
                                                echo "&nbsp <strong>GP:</strong> ".$row['gp'];
                                                echo "&nbsp <strong>Level:</strong> ".$row['level'];
                                                echo "</div><br>";
                                                $i=$i+1;
                                            }

                                        }
                                    ?>



                                    <div class="x_content">
                                        <div class="jumbotron">
<form action="" method="GET">
        
            <div class="form-group">
                <labelfor="id_employer">Employer<span class="required">*</span></label>
                    
                        <input class="form-control" id="id_employer" maxlength="500" name="employer" type="text">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_address">Address</label>
                    
                        <textarea class="form-control" cols="40" id="id_address" name="address" rows="10"></textarea>

                    
                        <p class="help-block"><small>Kindly provide full address of Employer</small></p>
            </div>
        
    
        
            <div class="form-group">
                <label for="id_designation">Designation<span class="required">*</span></label>
                    
                        <input class="form-control" id="id_designation" maxlength="100" name="designation" type="text">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_employment_type">Employment type</label>
                    
                        <select class="form-control" id="id_employment_type" name="employment_type" tabindex="-1" aria-hidden="true">
<option value="Regular" selected="selected">Regular</option>
<option value="Temporary">Temporary</option>
<option value="Contractual">Contractual</option>
</select>
            </div>
        
    
        
            <div class="form-group">
                <label for="id_govt_servant">Employed in Govt. Sector</label>
                    
                        <input checked="checked" class="form-control" id="id_govt_servant" name="govt_servant" type="checkbox">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_iiita_employee">Employed in IIIT Nagpur</label>
                    
                        <input checked="checked" class="form-control" id="id_iiitn_employee" name="iiitn_employee" type="checkbox">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_joining_date">Joining date<span class="required">*</span></label>
                    
                        <input class="form-control" id="id_joining_date" name="joining_date" type="date" min="1950-01-01" max="2020-01-01">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_leaving_date">Leaving date</label>
                    
                        <input class="form-control" id="id_leaving_date" name="leaving_date" type="date" min="1950-01-01" max="2020-01-01">
                    
                    
                        <p class="help-block"><small>Provide date of application if still working</small></p>
            </div>
        
            <div class="form-group">
                <label for="id_nature_of_work">Nature of work<span class="required">*</span></label>
                    
                        <select class="form-control my-1 mr-sm-2" id="id_nature_of_work" name="nature_of_work" >
                            <option value="Accounting" selected="selected">Accounting</option>
                            <option value="Administrative">Administrative</option>
                            <option value="Assistant Eng.">Assistant Eng.</option>
                            <option value="Computer Prog.">Computer Prog.</option>
                            <option value="Deputy Registrar">Deputy Registrar</option>
                            <option value="Edu. Administrative">Edu. Administrative</option>
                            <option value="Engineer">Engineer</option>
                            <option value="superintendent">superintendent</option>
                            <option value="Jr. Engineer">Jr. Engineer</option>
                            <option value="Management">Management</option>
                            <option value="Research">Research</option>
                            <option value="Teaching">Teaching</option>
                            <option value="Technical">Technical</option>
                            <option value="Warden">Warden</option>
                            <option value="Other">Other</option>
                            
                        </select>
            </div>
                
            <div class="form-group">
                <label for="id_last_salary_drawn">Last salary drawn<span class="required">*</span></label>
                    
                        <input class="form-control" id="id_last_salary_drawn" maxlength="200" name="last_salary_drawn" type="text">
            </div>
        
    
        
            <div class="form-group">
                <label for="id_basic_pay">Basic pay</label>
                    
                        <input class="form-control" id="id_basic_pay" name="basic_pay" type="number">
                    
                    
                        <p class="help-block"><small>Applicable only for Govt Employee. Basic Pay should not include GP/AGP(if applicable)</small></p>
                    
            </div>
        
    
        
            <div class="form-group">
                <label for="id_gp">Gp</label>
                    
                        <input class="form-control" id="id_gp" name="gp" type="number">
                    
                    
                        <p class="help-block"><small>Applicable only for Govt Employee. Provide GP/AGP, if 6 CPC is followed</small></p>
                    
            </div>
        
    
        
            <div class="form-group">
                <label for="id_level">Level</label>
                    
                        <input class="form-control" id="id_level" name="level" type="number">

                        <p class="help-block"><small>Applicable only for Govt Employee. Provide level, if 7 CPC is followed</small></p>
            </div>
        
    
    <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a class="btn btn-danger" href="rec_stf_clear.php?table=workexperience">Clear</a>
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