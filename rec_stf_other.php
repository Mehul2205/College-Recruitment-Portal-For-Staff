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
    $year_passed = $_GET['year_passed'];
    $date_of_result = $_GET['date_of_result'];
    $marks = $_GET['marks'];

    $stmt = $conn->prepare("INSERT INTO `other` (`id`, `degree`, `discipline`, `institute`, `university`, `year_passed`, `date_of_result`, `marks`) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssss", $_SESSION['id'], $degree, $discipline, $institute, $university, $year_passed, $date_of_result, $marks);
    $stmt->execute();
}

$sql1 = "SELECT degree,discipline,institute,university,year_passed,date_of_result,marks FROM `other` WHERE id='".$_SESSION['id']."';";
$result = $conn->query($sql1);
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
    $degree1 = $row['degree'];
    $discipline1 = $row['discipline'];
    $institute1 = $row['institute'];
    $university1 = $row['university'];
    $year_passed1 = $row['year_passed'];
    $date_of_result1 = $row['date_of_result'];
    $marks1 = $row['marks'];
	}
}else{
    $degree1 = NULL;
    $discipline1 = NULL;
    $institute1 = NULL;
    $university1 =NULL;
    $year_passed1 = NULL;
    $date_of_result1 = NULL;
    $marks1 = NULL;
}

?>
<!DOCTYPE html>
<html lang="en" class=" "><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="scroll-viewwport" content="width=device-width, initial-scale=1">

    <title>Other Degree/Diploma</title>

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
                                <h3>Other Degree/Diploma</h3>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Please provide your latest information for the post of <?php  echo " ".$post."(".$department.")" ?></h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <?php
                                    $sql = "SELECT i, id, degree, discipline, institute, university, year_passed, date_of_result, marks FROM other WHERE id=".$_SESSION['id'];
                                    $result = $conn->query($sql);
                                    $i=1;
                                    if ($result->num_rows > 0) {
                                        // output data of each row

                                        while($row = $result->fetch_assoc()) {
                                            echo "<div class='bg-success'>";
                                            echo "<strong>Entry</strong>".$i."<br>";
                                            echo "<strong>degree:</strong> ".$row['degree'];
                                            echo "&nbsp <strong>discipline:</strong> ".$row['discipline'];
                                            echo "&nbsp <strong>institute:</strong> ".$row['institute'];
                                            echo "&nbsp <strong>university:</strong> ".$row['university'];
                                            echo "&nbsp <strong>year_passed: </strong>".$row['year_passed'];
                                            echo "&nbsp <strong>date_of_result:</strong> ".$row['date_of_result'];
                                            echo "&nbsp <strong>marks:</strong> ".$row['marks'];
                                            echo "</div><br>";
                                            $i=$i+1;
                                        }

                                    }
                                    ?>
                                    <div class="x_content">
                                        <div class="jumbotron">
<form>
    
        
            <div class="form-group">
                <label  for="id_degree">Degree/Programme</label>
                <div >
                    
                        <input class="form-control" id="id_degree" maxlength="250" name="degree" type="text" placeholder="<?php echo htmlspecialchars($degree1); ?>">
                    
                    
                </div>
            </div>
        
    
        
            <div class="form-group">
                <label  for="id_discipline">Discipline/Major</label>
                <div >
                    
                        <input class="form-control" id="id_discipline" maxlength="150" name="discipline" type="text" placeholder="<?php echo htmlspecialchars($discipline1); ?>">
                    
                    
                </div>
            </div>
        
    
        
            <div class="form-group">
                <label  for="id_institute">Institution</label>
                <div >
                    
                        <input class="form-control" id="id_institute" maxlength="250" name="institute" type="text" placeholder="<?php echo htmlspecialchars($institute1); ?>">
                    
                    
                        <p class="help-block"><small>If you have directly enrolled in an university, kindly provide name of the university here</small></p>
                    
                </div>
            </div>
        
    
        
            <div class="form-group">
                <label  for="id_university">University</label>
                <div >
                    
                        <input class="form-control" id="id_university" maxlength="250" name="university" type="text" placeholder="<?php echo htmlspecialchars($university1); ?>">
                    
                    
                </div>
            </div>
        
    
        
            <div class="form-group">
                <label  for="id_year_passed">Year passed</label>
                <div>
                    
                        <select class="form-control" id="id_year_passed" name="year_passed" tabindex="-1" aria-hidden="true" value="<?php echo htmlspecialchars($year_passed1); ?>">
<option value="1950">1950</option>
<option value="1951">1951</option>
<option value="1952">1952</option>
<option value="1953">1953</option>
<option value="1954">1954</option>
<option value="1955">1955</option>
<option value="1956">1956</option>
<option value="1957">1957</option>
<option value="1958">1958</option>
<option value="1959">1959</option>
<option value="1960">1960</option>
<option value="1961">1961</option>
<option value="1962">1962</option>
<option value="1963">1963</option>
<option value="1964">1964</option>
<option value="1965">1965</option>
<option value="1966">1966</option>
<option value="1967">1967</option>
<option value="1968">1968</option>
<option value="1969">1969</option>
<option value="1970">1970</option>
<option value="1971">1971</option>
<option value="1972">1972</option>
<option value="1973">1973</option>
<option value="1974">1974</option>
<option value="1975">1975</option>
<option value="1976">1976</option>
<option value="1977">1977</option>
<option value="1978">1978</option>
<option value="1979">1979</option>
<option value="1980">1980</option>
<option value="1981">1981</option>
<option value="1982">1982</option>
<option value="1983">1983</option>
<option value="1984">1984</option>
<option value="1985">1985</option>
<option value="1986">1986</option>
<option value="1987">1987</option>
<option value="1988">1988</option>
<option value="1989">1989</option>
<option value="1990">1990</option>
<option value="1991">1991</option>
<option value="1992">1992</option>
<option value="1993">1993</option>
<option value="1994">1994</option>
<option value="1995">1995</option>
<option value="1996">1996</option>
<option value="1997">1997</option>
<option value="1998">1998</option>
<option value="1999">1999</option>
<option value="2000">2000</option>
<option value="2001">2001</option>
<option value="2002">2002</option>
<option value="2003">2003</option>
<option value="2004">2004</option>
<option value="2005">2005</option>
<option value="2006">2006</option>
<option value="2007">2007</option>
<option value="2008">2008</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
<option value="2021">2021</option>
</select>
                    
                </div>
            </div>
        
    
        
            <div class="form-group">
                <label  for="id_date_of_result">Date of result</label>
                    
                        <input class="form-control" id="id_date_of_result" name="date_of_result" type="date" min="1950-01-01" max="2020-01-01" value="<?php echo htmlspecialchars($date_of_result1); ?>">
                    
                    
                        <p class="help-block"><small>Only provide if your final result is not published yet.</small></p>
                    
            </div>
        
    
        
            <div class="form-group">
                <label  for="id_marks">Percentage Score</label>
                    
                        <input class="form-control" id="id_marks" name="marks" step="0.01" type="number" placeholder="<?php echo htmlspecialchars($marks1); ?>">
                    
                    
                        <p class="help-block"><small>In case CGPA/DGPA is awarded please change it to percentage using norms of the awarding university. In case final result is not published yet, provide percentage score upto current semester.</small></p>
                    
            </div>
        
    
    <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a class="btn btn-danger" href="rec_stf_clear.php?table=other">Clear</a>
    </div>
</form>                          </div>


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