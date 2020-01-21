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

if(isset($_GET['address_line1']))
{
    $address_line1 = $_GET['address_line1'];
    $address_line2 = $_GET['address_line2'];
    $city = $_GET['city'];
    $pincode = $_GET['pincode'];
    $district = $_GET['district'];
    $state = $_GET['state'];

    $sql="DELETE FROM `paddress` WHERE id='".$_SESSION['id']."';";
    $conn->query($sql);

    $stmt = $conn->prepare("INSERT INTO `paddress` (`id`, `address_line1`, `address_line2`, `city`, `pincode`, `district`, `state`) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssss", $_SESSION['id'],$address_line1, $address_line2, $city, $pincode, $district, $state);
    $stmt->execute();
}
$sql1 = "SELECT address_line1,address_line2,city,pincode,district,state FROM `paddress` WHERE id='".$_SESSION['id']."';";
$result = $conn->query($sql1);
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
    $address_line11 = $row['address_line1'];
    $address_line21 = $row['address_line2'];
    $city1 = $row['city'];
    $pincode1 = $row['pincode'];
    $district1 = $row['district'];
    $state1 = $row['state'];
	}
}else{
    $address_line11 = NULL;
    $address_line21 = NULL;
    $city1 = NULL;
    $pincode1 = NULL;
    $district1 = NULL;
    $state1 = NULL;
}


?>
<!DOCTYPE html>
<html lang="en" class=" "><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="scroll-viewwport" content="width=device-width, initial-scale=1">

    <title>Permanent Address</title>

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
                                <h3>Permanent Address</h3>
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
                                                    <label for="id_address_line1">Address line1</label>
                                                    <input class="form-control" id="id_address_line1" maxlength="150" name="address_line1" type="text" placeholder="<?php echo htmlspecialchars($address_line11); ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="id_address_line2">Address line2</label>
                                                    <input class="form-control" id="id_address_line2" maxlength="150" name="address_line2" type="text" placeholder="<?php echo htmlspecialchars($address_line21); ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="id_city">City</label>
                                                    <input class="form-control" id="id_city" maxlength="100" name="city" type="text" placeholder="<?php echo htmlspecialchars($city1); ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="id_pincode">Pincode</label>
                                                    <input class="form-control" id="id_pincode" name="pincode" type="number" placeholder="<?php echo htmlspecialchars($pincode1); ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="district">District</label>
                                                    <select class="form-control" id="district" name="district" tabindex="-1" aria-hidden="true" value="<?php echo htmlspecialchars($district1); ?>">
                                                        <option value="Adilabad">Adilabad</option>
                                                        <option value="Agar Malwa">Agar Malwa</option>
                                                        <option value="Agra">Agra</option>
                                                        <option value="Ahmedabad">Ahmedabad</option>
                                                        <option value="Ahmednagar">Ahmednagar</option>
                                                        <option value="Aizawl">Aizawl</option>
                                                        <option value="Ajmer">Ajmer</option>
                                                        <option value="Akola">Akola</option>
                                                        <option value="Alappuzha">Alappuzha</option>
                                                        <option value="Aligarh">Aligarh</option>
                                                        <option value="Alipurduar">Alipurduar</option>
                                                        <option value="Alirajpur">Alirajpur</option>
                                                        <option value="Allahabad">Allahabad</option>
                                                        <option value="Almora">Almora</option>
                                                        <option value="Alwar">Alwar</option>
                                                        <option value="Ambala">Ambala</option>
                                                        <option value="Ambedkar Nagar">Ambedkar Nagar</option>
                                                        <option value="Amethi (Chhatrapati Shahuji Maharaj Nagar)">Amethi (Chhatrapati Shahuji Maharaj Nagar)</option>
                                                        <option value="Amravati">Amravati</option>
                                                        <option value="Amreli">Amreli</option>
                                                        <option value="Amritsar">Amritsar</option>
                                                        <option value="Amroha (Jyotiba Phule Nagar)">Amroha (Jyotiba Phule Nagar)</option>
                                                        <option value="Anand">Anand</option>
                                                        <option value="Anantapur">Anantapur</option>
                                                        <option value="Anantnag">Anantnag</option>
                                                        <option value="Angul">Angul</option>
                                                        <option value="Anjaw">Anjaw</option>
                                                        <option value="Anuppur">Anuppur</option>
                                                        <option value="Araria">Araria</option>
                                                        <option value="Aravalli">Aravalli</option>
                                                        <option value="Ariyalur">Ariyalur</option>
                                                        <option value="Arwal">Arwal</option>
                                                        <option value="Ashok Nagar">Ashok Nagar</option>
                                                        <option value="Auraiya">Auraiya</option>
                                                        <option value="Aurangabad">Aurangabad</option>
                                                        <option value="Aurangabad">Aurangabad</option>
                                                        <option value="Azamgarh">Azamgarh</option>
                                                        <option value="Badgam">Badgam</option>
                                                        <option value="Bagalkot">Bagalkot</option>
                                                        <option value="Bageshwar">Bageshwar</option>
                                                        <option value="Bagpat">Bagpat</option>
                                                        <option value="Bahraich">Bahraich</option>
                                                        <option value="Baksa">Baksa</option>
                                                        <option value="Balaghat">Balaghat</option>
                                                        <option value="Balangir">Balangir</option>
                                                        <option value="Balasore">Balasore</option>
                                                        <option value="Ballia">Ballia</option>
                                                        <option value="Balod">Balod</option>
                                                        <option value="Baloda Bazar">Baloda Bazar</option>
                                                        <option value="Balrampur">Balrampur</option>
                                                        <option value="Balrampur">Balrampur</option>
                                                        <option value="Banaskantha">Banaskantha</option>
                                                        <option value="Banda">Banda</option>
                                                        <option value="Bandipora">Bandipora</option>
                                                        <option value="Bangalore Rural">Bangalore Rural</option>
                                                        <option value="Bangalore Urban">Bangalore Urban</option>
                                                        <option value="Banka">Banka</option>
                                                        <option value="Bankura">Bankura</option>
                                                        <option value="Banswara">Banswara</option>
                                                        <option value="Barabanki">Barabanki</option>
                                                        <option value="Baramulla">Baramulla</option>
                                                        <option value="Baran">Baran</option>
                                                        <option value="Bardhaman">Bardhaman</option>
                                                        <option value="Paschim Bardhaman">Paschim Bardhaman</option>
                                                        <option value="Purba Bardhaman">Purba Bardhaman</option>
                                                        <option value="Bareilly">Bareilly</option>
                                                        <option value="Bargarh (Baragarh)">Bargarh (Baragarh)</option>
                                                        <option value="Barmer">Barmer</option>
                                                        <option value="Barnala">Barnala</option>
                                                        <option value="Barpeta">Barpeta</option>
                                                        <option value="Barwani">Barwani</option>
                                                        <option value="Bastar">Bastar</option>
                                                        <option value="Basti">Basti</option>
                                                        <option value="Bathinda">Bathinda</option>
                                                        <option value="Beed">Beed</option>
                                                        <option value="Begusarai">Begusarai</option>
                                                        <option value="Belgaum">Belgaum</option>
                                                        <option value="Bellary">Bellary</option>
                                                        <option value="Bemetara">Bemetara</option>
                                                        <option value="Betul">Betul</option>
                                                        <option value="Bhadrak">Bhadrak</option>
                                                        <option value="Bhagalpur">Bhagalpur</option>
                                                        <option value="Bhandara">Bhandara</option>
                                                        <option value="Bharatpur">Bharatpur</option>
                                                        <option value="Bharuch">Bharuch</option>
                                                        <option value="Bhavnagar">Bhavnagar</option>
                                                        <option value="Bhilwara">Bhilwara</option>
                                                        <option value="Bhind">Bhind</option>
                                                        <option value="Bhiwani">Bhiwani</option>
                                                        <option value="Bhojpur">Bhojpur</option>
                                                        <option value="Bhopal">Bhopal</option>
                                                        <option value="Bidar">Bidar</option>
                                                        <option value="Bijapur">Bijapur</option>
                                                        <option value="Bijnor">Bijnor</option>
                                                        <option value="Bikaner">Bikaner</option>
                                                        <option value="Bilaspur">Bilaspur</option>
                                                        <option value="Bilaspur">Bilaspur</option>
                                                        <option value="Birbhum">Birbhum</option>
                                                        <option value="Bishnupur">Bishnupur</option>
                                                        <option value="Bishwanath">Bishwanath</option>
                                                        <option value="Bokaro">Bokaro</option>
                                                        <option value="Bongaigaon">Bongaigaon</option>
                                                        <option value="Botad">Botad</option>
                                                        <option value="Boudh (Bauda)">Boudh (Bauda)</option>
                                                        <option value="Budaun">Budaun</option>
                                                        <option value="Bulandshahr">Bulandshahr</option>
                                                        <option value="Buldhana">Buldhana</option>
                                                        <option value="Bundi">Bundi</option>
                                                        <option value="Burhanpur">Burhanpur</option>
                                                        <option value="Buxar">Buxar</option>
                                                        <option value="Cachar">Cachar</option>
                                                        <option value="Chamarajnagar">Chamarajnagar</option>
                                                        <option value="Chamba">Chamba</option>
                                                        <option value="Chamoli">Chamoli</option>
                                                        <option value="Champawat">Champawat</option>
                                                        <option value="Champhai">Champhai</option>
                                                        <option value="Chandauli">Chandauli</option>
                                                        <option value="Chandel">Chandel</option>
                                                        <option value="Chandigarh">Chandigarh</option>
                                                        <option value="Chandrapur">Chandrapur</option>
                                                        <option value="Changlang">Changlang</option>
                                                        <option value="Charaideo">Charaideo</option>
                                                        <option value="Chatra">Chatra</option>
                                                        <option value="Chennai">Chennai</option>
                                                        <option value="Chhatarpur">Chhatarpur</option>
                                                        <option value="Chhindwara">Chhindwara</option>
                                                        <option value="Chhota Udaipur">Chhota Udaipur</option>
                                                        <option value="Chikkaballapur">Chikkaballapur</option>
                                                        <option value="Chikkamagaluru">Chikkamagaluru</option>
                                                        <option value="Chirang">Chirang</option>
                                                        <option value="Chitradurga">Chitradurga</option>
                                                        <option value="Chitrakoot">Chitrakoot</option>
                                                        <option value="Chittoor">Chittoor</option>
                                                        <option value="Chittorgarh">Chittorgarh</option>
                                                        <option value="Churachandpur">Churachandpur</option>
                                                        <option value="Churu">Churu</option>
                                                        <option value="Coimbatore">Coimbatore</option>
                                                        <option value="Cooch Behar">Cooch Behar</option>
                                                        <option value="Cuddalore">Cuddalore</option>
                                                        <option value="Cuttack">Cuttack</option>
                                                        <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                                        <option value="Dahod">Dahod</option>
                                                        <option value="Dakshin Dinajpur">Dakshin Dinajpur</option>
                                                        <option value="Dakshina Kannada">Dakshina Kannada</option>
                                                        <option value="Daman">Daman</option>
                                                        <option value="Damoh">Damoh</option>
                                                        <option value="Dang">Dang</option>
                                                        <option value="Dantewada">Dantewada</option>
                                                        <option value="Darbhanga">Darbhanga</option>
                                                        <option value="Darjeeling">Darjeeling</option>
                                                        <option value="Darrang">Darrang</option>
                                                        <option value="Datia">Datia</option>
                                                        <option value="Dausa">Dausa</option>
                                                        <option value="Davanagere">Davanagere</option>
                                                        <option value="Debagarh (Deogarh)">Debagarh (Deogarh)</option>
                                                        <option value="Dehradun">Dehradun</option>
                                                        <option value="Deoghar">Deoghar</option>
                                                        <option value="Deoria">Deoria</option>
                                                        <option value="Devbhoomi Dwarka">Devbhoomi Dwarka</option>
                                                        <option value="Dewas">Dewas</option>
                                                        <option value="Dhalai">Dhalai</option>
                                                        <option value="Dhamtari">Dhamtari</option>
                                                        <option value="Dhanbad">Dhanbad</option>
                                                        <option value="Dhar">Dhar</option>
                                                        <option value="Dharmapuri">Dharmapuri</option>
                                                        <option value="Dharwad">Dharwad</option>
                                                        <option value="Dhemaji">Dhemaji</option>
                                                        <option value="Dhenkanal">Dhenkanal</option>
                                                        <option value="Dholpur">Dholpur</option>
                                                        <option value="Dhubri">Dhubri</option>
                                                        <option value="Dhule">Dhule</option>
                                                        <option value="Dibang Valley">Dibang Valley</option>
                                                        <option value="Dibrugarh">Dibrugarh</option>
                                                        <option value="Dima Hasao">Dima Hasao</option>
                                                        <option value="Dimapur">Dimapur</option>
                                                        <option value="Dindigul">Dindigul</option>
                                                        <option value="Dindori">Dindori</option>
                                                        <option value="Diu">Diu</option>
                                                        <option value="Doda">Doda</option>
                                                        <option value="Dumka">Dumka</option>
                                                        <option value="Dungapur">Dungapur</option>
                                                        <option value="Durg">Durg</option>
                                                        <option value="East Champaran">East Champaran</option>
                                                        <option value="East Garo Hills">East Garo Hills</option>
                                                        <option value="East Godavari">East Godavari</option>
                                                        <option value="East Jaintia Hills">East Jaintia Hills</option>
                                                        <option value="East Kameng">East Kameng</option>
                                                        <option value="East Kamrup">East Kamrup</option>
                                                        <option value="East Khasi Hills">East Khasi Hills</option>
                                                        <option value="East Siang">East Siang</option>
                                                        <option value="East Sikkim">East Sikkim</option>
                                                        <option value="East Singhbhum">East Singhbhum</option>
                                                        <option value="Ernakulam">Ernakulam</option>
                                                        <option value="Erode">Erode</option>
                                                        <option value="Etah">Etah</option>
                                                        <option value="Etawah">Etawah</option>
                                                        <option value="Faizabad">Faizabad</option>
                                                        <option value="Faridabad">Faridabad</option>
                                                        <option value="Faridkot">Faridkot</option>
                                                        <option value="Farrukhabad">Farrukhabad</option>
                                                        <option value="Fatehabad">Fatehabad</option>
                                                        <option value="Fatehgarh Sahib">Fatehgarh Sahib</option>
                                                        <option value="Fatehpur">Fatehpur</option>
                                                        <option value="Fazilka">Fazilka</option>
                                                        <option value="Firozabad">Firozabad</option>
                                                        <option value="Firozpur">Firozpur</option>
                                                        <option value="Gadag">Gadag</option>
                                                        <option value="Gadchiroli">Gadchiroli</option>
                                                        <option value="Gajapati">Gajapati</option>
                                                        <option value="Ganderbal">Ganderbal</option>
                                                        <option value="Gandhinagar">Gandhinagar</option>
                                                        <option value="Ganganagar">Ganganagar</option>
                                                        <option value="Ganjam">Ganjam</option>
                                                        <option value="Garhwa">Garhwa</option>
                                                        <option value="Gariaband">Gariaband</option>
                                                        <option value="Gautam Buddh Nagar">Gautam Buddh Nagar</option>
                                                        <option value="Gaya">Gaya</option>
                                                        <option value="Ghaziabad">Ghaziabad</option>
                                                        <option value="Ghazipur">Ghazipur</option>
                                                        <option value="Gir Somnath">Gir Somnath</option>
                                                        <option value="Giridih">Giridih</option>
                                                        <option value="Goalpara">Goalpara</option>
                                                        <option value="Godda">Godda</option>
                                                        <option value="Golaghat">Golaghat</option>
                                                        <option value="Gomati">Gomati</option>
                                                        <option value="Gonda">Gonda</option>
                                                        <option value="Gondia">Gondia</option>
                                                        <option value="Gopalganj">Gopalganj</option>
                                                        <option value="Gorakhpur">Gorakhpur</option>
                                                        <option value="Gulbarga">Gulbarga</option>
                                                        <option value="Gumla">Gumla</option>
                                                        <option value="Guna">Guna</option>
                                                        <option value="Guntur">Guntur</option>
                                                        <option value="Gurdaspur">Gurdaspur</option>
                                                        <option value="Gurgaon">Gurgaon</option>
                                                        <option value="Gwalior">Gwalior</option>
                                                        <option value="Hailakandi">Hailakandi</option>
                                                        <option value="Hamirpur">Hamirpur</option>
                                                        <option value="Hamirpur">Hamirpur</option>
                                                        <option value="Hanumangarh">Hanumangarh</option>
                                                        <option value="Hapur (Panchsheel Nagar)">Hapur (Panchsheel Nagar)</option>
                                                        <option value="Harda">Harda</option>
                                                        <option value="Hardoi">Hardoi</option>
                                                        <option value="Haridwar">Haridwar</option>
                                                        <option value="Hassan">Hassan</option>
                                                        <option value="Hathras (Mahamaya Nagar)">Hathras (Mahamaya Nagar)</option>
                                                        <option value="Haveri">Haveri</option>
                                                        <option value="Hazaribag">Hazaribag</option>
                                                        <option value="Hingoli">Hingoli</option>
                                                        <option value="Hissar">Hissar</option>
                                                        <option value="Hojai">Hojai</option>
                                                        <option value="Hooghly">Hooghly</option>
                                                        <option value="Hoshangabad">Hoshangabad</option>
                                                        <option value="Hoshiarpur">Hoshiarpur</option>
                                                        <option value="Howrah">Howrah</option>
                                                        <option value="Hyderabad">Hyderabad</option>
                                                        <option value="Idukki">Idukki</option>
                                                        <option value="Imphal East">Imphal East</option>
                                                        <option value="Imphal West">Imphal West</option>
                                                        <option value="Indore">Indore</option>
                                                        <option value="Jabalpur">Jabalpur</option>
                                                        <option value="Jagatsinghpur">Jagatsinghpur</option>
                                                        <option value="Jaipur">Jaipur</option>
                                                        <option value="Jaisalmer">Jaisalmer</option>
                                                        <option value="Jajpur">Jajpur</option>
                                                        <option value="Jalandhar">Jalandhar</option>
                                                        <option value="Jalaun">Jalaun</option>
                                                        <option value="Jalgaon">Jalgaon</option>
                                                        <option value="Jalna">Jalna</option>
                                                        <option value="Jalore">Jalore</option>
                                                        <option value="Jalpaiguri">Jalpaiguri</option>
                                                        <option value="Jammu">Jammu</option>
                                                        <option value="Jamnagar">Jamnagar</option>
                                                        <option value="Jamtara">Jamtara</option>
                                                        <option value="Jamui">Jamui</option>
                                                        <option value="Janjgir-Champa">Janjgir-Champa</option>
                                                        <option value="Jashpur">Jashpur</option>
                                                        <option value="Jhargram">Jhargram</option>
                                                        <option value="Jaunpur">Jaunpur</option>
                                                        <option value="Jehanabad">Jehanabad</option>
                                                        <option value="Jhabua">Jhabua</option>
                                                        <option value="Jhajjar">Jhajjar</option>
                                                        <option value="Jhalawar">Jhalawar</option>
                                                        <option value="Jhansi">Jhansi</option>
                                                        <option value="Jharsuguda">Jharsuguda</option>
                                                        <option value="Jhunjhunu">Jhunjhunu</option>
                                                        <option value="Jind">Jind</option>
                                                        <option value="Jodhpur">Jodhpur</option>
                                                        <option value="Jorhat">Jorhat</option>
                                                        <option value="Junagadh">Junagadh</option>
                                                        <option value="Kabirdham (formerly Kawardha)">Kabirdham (formerly Kawardha)</option>
                                                        <option value="Kalimpong">Kalimpong</option>
                                                        <option value="Kadapa">Kadapa</option>
                                                        <option value="Kaimur">Kaimur</option>
                                                        <option value="Kaithal">Kaithal</option>
                                                        <option value="Kalahandi">Kalahandi</option>
                                                        <option value="Kamrup">Kamrup</option>
                                                        <option value="Kamrup Metropolitan">Kamrup Metropolitan</option>
                                                        <option value="Kanchipuram">Kanchipuram</option>
                                                        <option value="Kandhamal">Kandhamal</option>
                                                        <option value="Kangra">Kangra</option>
                                                        <option value="Kanker">Kanker</option>
                                                        <option value="Kannauj">Kannauj</option>
                                                        <option value="Kannur">Kannur</option>
                                                        <option value="Kanpur Dehat (Ramabai Nagar)">Kanpur Dehat (Ramabai Nagar)</option>
                                                        <option value="Kanpur Nagar">Kanpur Nagar</option>
                                                        <option value="Kanyakumari">Kanyakumari</option>
                                                        <option value="Kapurthala">Kapurthala</option>
                                                        <option value="Karaikal">Karaikal</option>
                                                        <option value="Karauli">Karauli</option>
                                                        <option value="Karbi Anglong">Karbi Anglong</option>
                                                        <option value="Kargil">Kargil</option>
                                                        <option value="Karimganj">Karimganj</option>
                                                        <option value="Karimnagar">Karimnagar</option>
                                                        <option value="Karnal">Karnal</option>
                                                        <option value="Karur">Karur</option>
                                                        <option value="Kasaragod">Kasaragod</option>
                                                        <option value="Kasganj (Kanshi Ram Nagar)">Kasganj (Kanshi Ram Nagar)</option>
                                                        <option value="Kathua">Kathua</option>
                                                        <option value="Katihar">Katihar</option>
                                                        <option value="Katni">Katni</option>
                                                        <option value="Kaushambi">Kaushambi</option>
                                                        <option value="Kendrapara">Kendrapara</option>
                                                        <option value="Kendujhar (Keonjhar)">Kendujhar (Keonjhar)</option>
                                                        <option value="Khagaria">Khagaria</option>
                                                        <option value="Khammam">Khammam</option>
                                                        <option value="Khandwa (East Nimar)">Khandwa (East Nimar)</option>
                                                        <option value="Khargone (West Nimar)">Khargone (West Nimar)</option>
                                                        <option value="Kheda">Kheda</option>
                                                        <option value="Khordha">Khordha</option>
                                                        <option value="Khowai">Khowai</option>
                                                        <option value="Khunti">Khunti</option>
                                                        <option value="Kinnaur">Kinnaur</option>
                                                        <option value="Kiphire">Kiphire</option>
                                                        <option value="Kishanganj">Kishanganj</option>
                                                        <option value="Kishtwar">Kishtwar</option>
                                                        <option value="Kodagu">Kodagu</option>
                                                        <option value="Koderma">Koderma</option>
                                                        <option value="Kohima">Kohima</option>
                                                        <option value="Kokrajhar">Kokrajhar</option>
                                                        <option value="Kolar">Kolar</option>
                                                        <option value="Kolasib">Kolasib</option>
                                                        <option value="Kolhapur">Kolhapur</option>
                                                        <option value="Kolkata">Kolkata</option>
                                                        <option value="Kollam">Kollam</option>
                                                        <option value="Kondagaon">Kondagaon</option>
                                                        <option value="Koppal">Koppal</option>
                                                        <option value="Koraput">Koraput</option>
                                                        <option value="Korba">Korba</option>
                                                        <option value="Koriya">Koriya</option>
                                                        <option value="Kota">Kota</option>
                                                        <option value="Kottayam">Kottayam</option>
                                                        <option value="Kozhikode">Kozhikode</option>
                                                        <option value="Kra Daadi">Kra Daadi</option>
                                                        <option value="Krishna">Krishna</option>
                                                        <option value="Krishnagiri">Krishnagiri</option>
                                                        <option value="Kulgam">Kulgam</option>
                                                        <option value="Kullu">Kullu</option>
                                                        <option value="Kupwara">Kupwara</option>
                                                        <option value="Kurnool">Kurnool</option>
                                                        <option value="Kurukshetra">Kurukshetra</option>
                                                        <option value="Kurung Kumey">Kurung Kumey</option>
                                                        <option value="Kushinagar">Kushinagar</option>
                                                        <option value="Kutch">Kutch</option>
                                                        <option value="Lahaul and Spiti">Lahaul and Spiti</option>
                                                        <option value="Lakhimpur">Lakhimpur</option>
                                                        <option value="Lakhimpur Kheri">Lakhimpur Kheri</option>
                                                        <option value="Lakhisarai">Lakhisarai</option>
                                                        <option value="Lakshadweep">Lakshadweep</option>
                                                        <option value="Lalitpur">Lalitpur</option>
                                                        <option value="Latehar">Latehar</option>
                                                        <option value="Latur">Latur</option>
                                                        <option value="Lawngtlai">Lawngtlai</option>
                                                        <option value="Leh">Leh</option>
                                                        <option value="Lohardaga">Lohardaga</option>
                                                        <option value="Lohit">Lohit</option>
                                                        <option value="Longding">Longding</option>
                                                        <option value="Longleng">Longleng</option>
                                                        <option value="Lower Dibang Valley">Lower Dibang Valley</option>
                                                        <option value="Lower Subansiri">Lower Subansiri</option>
                                                        <option value="Lucknow">Lucknow</option>
                                                        <option value="Ludhiana">Ludhiana</option>
                                                        <option value="Lunglei">Lunglei</option>
                                                        <option value="Madhepura">Madhepura</option>
                                                        <option value="Madhubani">Madhubani</option>
                                                        <option value="Madurai">Madurai</option>
                                                        <option value="Maharajganj">Maharajganj</option>
                                                        <option value="Mahasamund">Mahasamund</option>
                                                        <option value="Mahbubnagar">Mahbubnagar</option>
                                                        <option value="Mahe">Mahe</option>
                                                        <option value="Mahendragarh">Mahendragarh</option>
                                                        <option value="Mahisagar">Mahisagar</option>
                                                        <option value="Mahoba">Mahoba</option>
                                                        <option value="Mainpuri">Mainpuri</option>
                                                        <option value="Malappuram">Malappuram</option>
                                                        <option value="Maldah">Maldah</option>
                                                        <option value="Malkangiri">Malkangiri</option>
                                                        <option value="Mamit">Mamit</option>
                                                        <option value="Mandi">Mandi</option>
                                                        <option value="Mandla">Mandla</option>
                                                        <option value="Mandsaur">Mandsaur</option>
                                                        <option value="Mandya">Mandya</option>
                                                        <option value="Mansa">Mansa</option>
                                                        <option value="Mathura">Mathura</option>
                                                        <option value="Mau">Mau</option>
                                                        <option value="Mayurbhanj">Mayurbhanj</option>
                                                        <option value="Medak">Medak</option>
                                                        <option value="Meerut">Meerut</option>
                                                        <option value="Mehsana">Mehsana</option>
                                                        <option value="Mewat">Mewat</option>
                                                        <option value="Mirzapur">Mirzapur</option>
                                                        <option value="Moga">Moga</option>
                                                        <option value="Mokokchung">Mokokchung</option>
                                                        <option value="Mon">Mon</option>
                                                        <option value="Moradabad">Moradabad</option>
                                                        <option value="Morbi">Morbi</option>
                                                        <option value="Morena">Morena</option>
                                                        <option value="Morigaon">Morigaon</option>
                                                        <option value="Mumbai City">Mumbai City</option>
                                                        <option value="Mumbai suburban">Mumbai suburban</option>
                                                        <option value="Mungeli">Mungeli</option>
                                                        <option value="Munger">Munger</option>
                                                        <option value="Murshidabad">Murshidabad</option>
                                                        <option value="Muzaffarnagar">Muzaffarnagar</option>
                                                        <option value="Muzaffarpur">Muzaffarpur</option>
                                                        <option value="Mysore">Mysore</option>
                                                        <option value="Nabarangpur">Nabarangpur</option>
                                                        <option value="Nadia">Nadia</option>
                                                        <option value="Nagaon">Nagaon</option>
                                                        <option value="Nagapattinam">Nagapattinam</option>
                                                        <option value="Nagaur">Nagaur</option>
                                                        <option value="Nagpur">Nagpur</option>
                                                        <option value="Nainital">Nainital</option>
                                                        <option value="Nalanda">Nalanda</option>
                                                        <option value="Nalbari">Nalbari</option>
                                                        <option value="Nalgonda">Nalgonda</option>
                                                        <option value="Namakkal">Namakkal</option>
                                                        <option value="Namsai">Namsai</option>
                                                        <option value="Nanded">Nanded</option>
                                                        <option value="Nandurbar">Nandurbar</option>
                                                        <option value="Narayanpur">Narayanpur</option>
                                                        <option value="Narmada">Narmada</option>
                                                        <option value="Narsinghpur">Narsinghpur</option>
                                                        <option value="Nashik">Nashik</option>
                                                        <option value="Navsari">Navsari</option>
                                                        <option value="Nawada">Nawada</option>
                                                        <option value="Nayagarh">Nayagarh</option>
                                                        <option value="Neemuch">Neemuch</option>
                                                        <option value="Nilgiris">Nilgiris</option>
                                                        <option value="Nizamabad">Nizamabad</option>
                                                        <option value="North 24 Parganas">North 24 Parganas</option>
                                                        <option value="North Garo Hills">North Garo Hills</option>
                                                        <option value="North Goa">North Goa</option>
                                                        <option value="North Sikkim">North Sikkim</option>
                                                        <option value="North Tripura">North Tripura</option>
                                                        <option value="Nuapada">Nuapada</option>
                                                        <option value="Osmanabad">Osmanabad</option>
                                                        <option value="Pakur">Pakur</option>
                                                        <option value="Palakkad">Palakkad</option>
                                                        <option value="Palamu">Palamu</option>
                                                        <option value="Palghar">Palghar</option>
                                                        <option value="Pali">Pali</option>
                                                        <option value="Palwal">Palwal</option>
                                                        <option value="Panchkula">Panchkula</option>
                                                        <option value="Panchmahal">Panchmahal</option>
                                                        <option value="Panipat">Panipat</option>
                                                        <option value="Panna">Panna</option>
                                                        <option value="Papum Pare">Papum Pare</option>
                                                        <option value="Parbhani">Parbhani</option>
                                                        <option value="Paschim Medinipur">Paschim Medinipur</option>
                                                        <option value="Patan">Patan</option>
                                                        <option value="Pathanamthitta">Pathanamthitta</option>
                                                        <option value="Pathankot">Pathankot</option>
                                                        <option value="Patiala">Patiala</option>
                                                        <option value="Patna">Patna</option>
                                                        <option value="Pauri Garhwal">Pauri Garhwal</option>
                                                        <option value="Perambalur">Perambalur</option>
                                                        <option value="Peren">Peren</option>
                                                        <option value="Phek">Phek</option>
                                                        <option value="Pilibhit">Pilibhit</option>
                                                        <option value="Pithoragarh">Pithoragarh</option>
                                                        <option value="Pondicherry">Pondicherry</option>
                                                        <option value="Poonch">Poonch</option>
                                                        <option value="Porbandar">Porbandar</option>
                                                        <option value="Prakasam">Prakasam</option>
                                                        <option value="Pratapgarh">Pratapgarh</option>
                                                        <option value="Pratapgarh">Pratapgarh</option>
                                                        <option value="Pudukkottai">Pudukkottai</option>
                                                        <option value="Prayagraj">Prayagraj</option>
                                                        <option value="Pulwama">Pulwama</option>
                                                        <option value="Pune">Pune</option>
                                                        <option value="Purba Medinipur">Purba Medinipur</option>
                                                        <option value="Puri">Puri</option>
                                                        <option value="Purnia">Purnia</option>
                                                        <option value="Purulia">Purulia</option>
                                                        <option value="Raebareli">Raebareli</option>
                                                        <option value="Raichur">Raichur</option>
                                                        <option value="Raigad">Raigad</option>
                                                        <option value="Raigarh">Raigarh</option>
                                                        <option value="Raipur">Raipur</option>
                                                        <option value="Raisen">Raisen</option>
                                                        <option value="Rajgarh">Rajgarh</option>
                                                        <option value="Rajkot">Rajkot</option>
                                                        <option value="Rajnandgaon">Rajnandgaon</option>
                                                        <option value="Rajouri">Rajouri</option>
                                                        <option value="Rajsamand">Rajsamand</option>
                                                        <option value="Ramanagara">Ramanagara</option>
                                                        <option value="Ramanathapuram">Ramanathapuram</option>
                                                        <option value="Ramban">Ramban</option>
                                                        <option value="Ramgarh">Ramgarh</option>
                                                        <option value="Rampur">Rampur</option>
                                                        <option value="Ranchi">Ranchi</option>
                                                        <option value="Ranga Reddy">Ranga Reddy</option>
                                                        <option value="Ratlam">Ratlam</option>
                                                        <option value="Ratnagiri">Ratnagiri</option>
                                                        <option value="Rayagada">Rayagada</option>
                                                        <option value="Reasi">Reasi</option>
                                                        <option value="Rewa">Rewa</option>
                                                        <option value="Rewari">Rewari</option>
                                                        <option value="Ri Bhoi">Ri Bhoi</option>
                                                        <option value="Rohtak">Rohtak</option>
                                                        <option value="Rohtas">Rohtas</option>
                                                        <option value="Rudraprayag">Rudraprayag</option>
                                                        <option value="Rupnagar">Rupnagar</option>
                                                        <option value="Sabarkantha">Sabarkantha</option>
                                                        <option value="Sagar">Sagar</option>
                                                        <option value="Saharanpur">Saharanpur</option>
                                                        <option value="Saharsa">Saharsa</option>
                                                        <option value="Sahibganj">Sahibganj</option>
                                                        <option value="Sahibzada Ajit Singh Nagar">Sahibzada Ajit Singh Nagar</option>
                                                        <option value="Saiha">Saiha</option>
                                                        <option value="Salem">Salem</option>
                                                        <option value="Samastipur">Samastipur</option>
                                                        <option value="Samba">Samba</option>
                                                        <option value="Sambalpur">Sambalpur</option>
                                                        <option value="Sambhal (Bheem Nagar)">Sambhal (Bheem Nagar)</option>
                                                        <option value="Sangli">Sangli</option>
                                                        <option value="Sangrur">Sangrur</option>
                                                        <option value="Sant Kabir Nagar">Sant Kabir Nagar</option>
                                                        <option value="Sant Ravidas Nagar">Sant Ravidas Nagar</option>
                                                        <option value="Saran">Saran</option>
                                                        <option value="Satara">Satara</option>
                                                        <option value="Satna">Satna</option>
                                                        <option value="Sawai Madhopur">Sawai Madhopur</option>
                                                        <option value="Sehore">Sehore</option>
                                                        <option value="Senapati">Senapati</option>
                                                        <option value="Seoni">Seoni</option>
                                                        <option value="Sepahijala">Sepahijala</option>
                                                        <option value="Seraikela Kharsawan">Seraikela Kharsawan</option>
                                                        <option value="Serchhip">Serchhip</option>
                                                        <option value="Shahdol">Shahdol</option>
                                                        <option value="Shahid Bhagat Singh Nagar">Shahid Bhagat Singh Nagar</option>
                                                        <option value="Shahjahanpur">Shahjahanpur</option>
                                                        <option value="Shajapur">Shajapur</option>
                                                        <option value="Shamli">Shamli</option>
                                                        <option value="Sheikhpura">Sheikhpura</option>
                                                        <option value="Sheohar">Sheohar</option>
                                                        <option value="Sheopur">Sheopur</option>
                                                        <option value="Shimla">Shimla</option>
                                                        <option value="Shimoga">Shimoga</option>
                                                        <option value="Shivpuri">Shivpuri</option>
                                                        <option value="Shopian">Shopian</option>
                                                        <option value="Shravasti">Shravasti</option>
                                                        <option value="Siang">Siang</option>
                                                        <option value="Siddharthnagar">Siddharthnagar</option>
                                                        <option value="Sidhi">Sidhi</option>
                                                        <option value="Sikar">Sikar</option>
                                                        <option value="Simdega">Simdega</option>
                                                        <option value="Sindhudurg">Sindhudurg</option>
                                                        <option value="Singrauli">Singrauli</option>
                                                        <option value="Sirmaur">Sirmaur</option>
                                                        <option value="Sirohi">Sirohi</option>
                                                        <option value="Sirsa">Sirsa</option>
                                                        <option value="Sitamarhi">Sitamarhi</option>
                                                        <option value="Sitapur">Sitapur</option>
                                                        <option value="Sivaganga">Sivaganga</option>
                                                        <option value="Sivasagar">Sivasagar</option>
                                                        <option value="Siwan">Siwan</option>
                                                        <option value="Solan">Solan</option>
                                                        <option value="Solapur">Solapur</option>
                                                        <option value="Sonbhadra">Sonbhadra</option>
                                                        <option value="Sonipat">Sonipat</option>
                                                        <option value="Sonitpur">Sonitpur</option>
                                                        <option value="South 24 Parganas">South 24 Parganas</option>
                                                        <option value="South Garo Hills">South Garo Hills</option>
                                                        <option value="South Goa">South Goa</option>
                                                        <option value="South Kamrup">South Kamrup</option>
                                                        <option value="South Salmara-Mankachar">South Salmara-Mankachar</option>
                                                        <option value="South Sikkim">South Sikkim</option>
                                                        <option value="South Tripura">South Tripura</option>
                                                        <option value="South West Garo Hills">South West Garo Hills</option>
                                                        <option value="South West Khasi Hills">South West Khasi Hills</option>
                                                        <option value="Sri Muktsar Sahib">Sri Muktsar Sahib</option>
                                                        <option value="Sri Potti Sriramulu Nellore">Sri Potti Sriramulu Nellore</option>
                                                        <option value="Srikakulam">Srikakulam</option>
                                                        <option value="Srinagar">Srinagar</option>
                                                        <option value="Subarnapur (Sonepur)">Subarnapur (Sonepur)</option>
                                                        <option value="Sukma">Sukma</option>
                                                        <option value="Sultanpur">Sultanpur</option>
                                                        <option value="Sundargarh">Sundargarh</option>
                                                        <option value="Supaul">Supaul</option>
                                                        <option value="Surajpur">Surajpur</option>
                                                        <option value="Surat">Surat</option>
                                                        <option value="Surendranagar">Surendranagar</option>
                                                        <option value="Surguja">Surguja</option>
                                                        <option value="Tamenglong">Tamenglong</option>
                                                        <option value="Tapi">Tapi</option>
                                                        <option value="Tarn Taran">Tarn Taran</option>
                                                        <option value="Tawang">Tawang</option>
                                                        <option value="Tehri Garhwal">Tehri Garhwal</option>
                                                        <option value="Thane">Thane</option>
                                                        <option value="Thanjavur">Thanjavur</option>
                                                        <option value="Theni">Theni</option>
                                                        <option value="Thiruvananthapuram">Thiruvananthapuram</option>
                                                        <option value="Thoothukudi">Thoothukudi</option>
                                                        <option value="Thoubal">Thoubal</option>
                                                        <option value="Thrissur">Thrissur</option>
                                                        <option value="Tikamgarh">Tikamgarh</option>
                                                        <option value="Tinsukia">Tinsukia</option>
                                                        <option value="Tirap">Tirap</option>
                                                        <option value="Tiruchirappalli">Tiruchirappalli</option>
                                                        <option value="Tirunelveli">Tirunelveli</option>
                                                        <option value="Tirupur">Tirupur</option>
                                                        <option value="Tiruvallur">Tiruvallur</option>
                                                        <option value="Tiruvannamalai">Tiruvannamalai</option>
                                                        <option value="Tiruvarur">Tiruvarur</option>
                                                        <option value="Tonk">Tonk</option>
                                                        <option value="Tuensang">Tuensang</option>
                                                        <option value="Tumkur">Tumkur</option>
                                                        <option value="Udaipur">Udaipur</option>
                                                        <option value="Udalguri">Udalguri</option>
                                                        <option value="Udham Singh Nagar">Udham Singh Nagar</option>
                                                        <option value="Udhampur">Udhampur</option>
                                                        <option value="Udupi">Udupi</option>
                                                        <option value="Ujjain">Ujjain</option>
                                                        <option value="Ukhrul">Ukhrul</option>
                                                        <option value="Umaria">Umaria</option>
                                                        <option value="Una">Una</option>
                                                        <option value="Unnao">Unnao</option>
                                                        <option value="Unokoti">Unokoti</option>
                                                        <option value="Upper Siang">Upper Siang</option>
                                                        <option value="Upper Subansiri">Upper Subansiri</option>
                                                        <option value="Uttar Dinajpur">Uttar Dinajpur</option>
                                                        <option value="Uttara Kannada">Uttara Kannada</option>
                                                        <option value="Uttarkashi">Uttarkashi</option>
                                                        <option value="Vadodara">Vadodara</option>
                                                        <option value="Vaishali">Vaishali</option>
                                                        <option value="Valsad">Valsad</option>
                                                        <option value="Varanasi">Varanasi</option>
                                                        <option value="Vellore">Vellore</option>
                                                        <option value="Vidisha">Vidisha</option>
                                                        <option value="Vijayapura">Vijayapura</option>
                                                        <option value="Viluppuram">Viluppuram</option>
                                                        <option value="Virudhunagar">Virudhunagar</option>
                                                        <option value="Visakhapatnam">Visakhapatnam</option>
                                                        <option value="Vizianagaram">Vizianagaram</option>
                                                        <option value="Warangal">Warangal</option>
                                                        <option value="Wardha">Wardha</option>
                                                        <option value="Washim">Washim</option>
                                                        <option value="Wayanad">Wayanad</option>
                                                        <option value="West Champaran">West Champaran</option>
                                                        <option value="West Garo Hills">West Garo Hills</option>
                                                        <option value="West Godavari">West Godavari</option>
                                                        <option value="West Jaintia Hills">West Jaintia Hills</option>
                                                        <option value="West Kameng">West Kameng</option>
                                                        <option value="West Karbi Anglong">West Karbi Anglong</option>
                                                        <option value="West Khasi Hills">West Khasi Hills</option>
                                                        <option value="West Siang">West Siang</option>
                                                        <option value="West Sikkim">West Sikkim</option>
                                                        <option value="West Singhbhum">West Singhbhum</option>
                                                        <option value="West Tripura">West Tripura</option>
                                                        <option value="Wokha">Wokha</option>
                                                        <option value="Yadgir">Yadgir</option>
                                                        <option value="Yamuna Nagar">Yamuna Nagar</option>
                                                        <option value="Yanam">Yanam</option>
                                                        <option value="Yavatmal">Yavatmal</option>
                                                        <option value="Zunheboto">Zunheboto</option>
                                                        <option value="New Delhi">New Delhi</option>
                                                        <option value="North Delhi">North Delhi</option>
                                                        <option value="North West Delhi">North West Delhi</option>
                                                        <option value="West Delhi">West Delhi</option>
                                                        <option value="South West Delhi">South West Delhi</option>
                                                        <option value="South Delhi">South Delhi</option>
                                                        <option value="South East Delhi">South East Delhi</option>
                                                        <option value="Central Delhi">Central Delhi</option>
                                                        <option value="North East Delhi">North East Delhi</option>
                                                        <option value="Shahdara">Shahdara</option>
                                                        <option value="East Delhi">East Delhi</option>
                                                    </select>
                                                </div>



                                                <div class="form-group">
                                                    <label for="id_state">State</label>

                                                    <select class="form-control" id="id_state" name="state" tabindex="-1" aria-hidden="true" value="<?php echo htmlspecialchars($state1); ?>">
                                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                        <option value="Assam">Assam</option>
                                                        <option value="Bihar">Bihar</option>
                                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                                        <option value="Goa">Goa</option>
                                                        <option value="Gujarat">Gujarat</option>
                                                        <option value="Haryana">Haryana</option>
                                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                        <option value="Jharkhand">Jharkhand</option>
                                                        <option value="Karnataka">Karnataka</option>
                                                        <option value="Kerala">Kerala</option>
                                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                        <option value="Maharashtra">Maharashtra</option>
                                                        <option value="Manipur">Manipur</option>
                                                        <option value="Meghalaya">Meghalaya</option>
                                                        <option value="Mizoram">Mizoram</option>
                                                        <option value="Nagaland">Nagaland</option>
                                                        <option value="Odisha">Odisha</option>
                                                        <option value="Punjab">Punjab</option>
                                                        <option value="Rajasthan">Rajasthan</option>
                                                        <option value="Sikkim">Sikkim</option>
                                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                                        <option value="Telangana">Telangana</option>
                                                        <option value="Tripura">Tripura</option>
                                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                        <option value="Uttarakhand">Uttarakhand</option>
                                                        <option value="West Bengal">West Bengal</option>
                                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                        <option value="Chandigarh">Chandigarh</option>
                                                        <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                                        <option value="Daman and Diu">Daman and Diu</option>
                                                        <option value="Delhi">Delhi</option>
                                                        <option value="Lakshadweep">Lakshadweep</option>
                                                        <option value="Puducherry">Puducherry</option>
                                                        <option value="Others">Others</option>
                                                    </select>
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
        <script type="text/javascript">
        </script>
    </body>
</html>