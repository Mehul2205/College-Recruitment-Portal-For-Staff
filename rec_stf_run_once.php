<?php
require 'rec_stf_server.php';

$sql="CREATE TABLE `db1`.`personaldetails` ( `id` INT NOT NULL , `placeofbirth` VARCHAR(100) NOT NULL , `fhname` VARCHAR(100) NOT NULL , `marital_status` VARCHAR(100) NOT NULL , `Nationality` VARCHAR(100) NOT NULL , `handicapped` VARCHAR(100) NOT NULL , `religion` VARCHAR(100) NOT NULL , `blood` VARCHAR(100) NOT NULL , `mark` VARCHAR(150) NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";
 if ($conn->query($sql) === FALSE)
 {
     echo "Database error 2". $conn->error;
 }

$sql="CREATE TABLE `db1`.`contact` ( `id` INT NOT NULL , `emergency_phone_number` VARCHAR(200) NOT NULL , `alternate_email` VARCHAR(200) NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";
 if ($conn->query($sql) === FALSE)
 {
     echo "Database error 2". $conn->error;
 }
$sql="CREATE TABLE `db1`.`details` ( `id` INT NOT NULL AUTO_INCREMENT , `firstname` TEXT NOT NULL , `middlename` TEXT NULL , `lastname` TEXT NOT NULL , `dob` DATE NOT NULL , `gender` VARCHAR(50) NOT NULL , `category` VARCHAR(150) NOT NULL , `res_category` VARCHAR(150) NOT NULL , `email` VARCHAR(150) NOT NULL , `phone` VARCHAR(20) NOT NULL , `password` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
 {
     echo "Database error 3". $conn->error;
 }

$sql="ALTER TABLE `details` ADD `department` VARCHAR(200) NOT NULL AFTER `password`;";

 if ($conn->query($sql) === FALSE)
 {
     echo "Database error 3". $conn->error;
 }
 $sql="ALTER TABLE `details` ADD `post` VARCHAR(200) NOT NULL AFTER `department`;";
  if ($conn->query($sql) === FALSE)
 {
     echo "Database error 3". $conn->error;
 }

 $sql="CREATE TABLE `db1`.`paddress` ( `id` INT NOT NULL , `address_line1` VARCHAR(200) NOT NULL , `address_line2` VARCHAR(200) NOT NULL , `city` VARCHAR(200) NOT NULL , `pincode` VARCHAR(200) NOT NULL , `district` VARCHAR(200) NOT NULL , `state` VARCHAR(200) NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";

if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `db1`.`caddress` ( `id` INT NOT NULL , `address_line1` VARCHAR(200) NOT NULL , `address_line2` VARCHAR(200) NOT NULL , `city` VARCHAR(200) NOT NULL , `pincode` VARCHAR(200) NOT NULL , `district` VARCHAR(200) NOT NULL , `state` VARCHAR(200) NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";

if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `db1`.`secondary` ( `id` INT NOT NULL , `degree` VARCHAR(200) NOT NULL , `discipline` VARCHAR(200) NOT NULL , `institute` VARCHAR(200) NOT NULL , `university` VARCHAR(200) NOT NULL , `year_passed` VARCHAR(200) NOT NULL , `date_of_result` VARCHAR(200) NOT NULL , `marks` VARCHAR(200) NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}
$sql="CREATE TABLE `db1`.`hsecondary` ( `id` INT NOT NULL , `degree` VARCHAR(200) NOT NULL , `discipline` VARCHAR(200) NOT NULL , `institute` VARCHAR(200) NOT NULL , `university` VARCHAR(200) NOT NULL , `year_passed` VARCHAR(200) NOT NULL , `date_of_result` VARCHAR(200) NOT NULL , `marks` VARCHAR(200) NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}
$sql="CREATE TABLE `db1`.`bachelor` ( `id` INT NOT NULL , `degree` VARCHAR(200) NOT NULL , `discipline` VARCHAR(200) NOT NULL , `institute` VARCHAR(200) NOT NULL , `university` VARCHAR(200) NOT NULL , `year_passed` VARCHAR(200) NOT NULL , `date_of_result` VARCHAR(200) NOT NULL , `marks` VARCHAR(200) NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}
$sql="CREATE TABLE `db1`.`masters` ( `id` INT NOT NULL , `degree` VARCHAR(200) NOT NULL , `discipline` VARCHAR(200) NOT NULL , `institute` VARCHAR(200) NOT NULL , `university` VARCHAR(200) NOT NULL , `year_passed` VARCHAR(200) NOT NULL , `date_of_result` VARCHAR(200) NOT NULL , `marks` VARCHAR(200) NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `db1`.`phd` ( `id` INT NOT NULL , `degree` VARCHAR(200) NOT NULL , `discipline` VARCHAR(200) NOT NULL , `institute` VARCHAR(200) NOT NULL , `university` VARCHAR(200) NOT NULL , `date_of_enrollment` VARCHAR(200) NOT NULL , `date_of_defense` VARCHAR(200) , `marks` VARCHAR(200) NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `db1`.`other` (`id` INT NOT NULL , `degree` VARCHAR(200) NOT NULL , `discipline` VARCHAR(200) NOT NULL , `institute` VARCHAR(200) NOT NULL , `university` VARCHAR(200) NOT NULL , `year_passed` VARCHAR(200) , `date_of_result` VARCHAR(200), `marks` VARCHAR(200) ) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}
$sql="ALTER TABLE `other` ADD `i` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`i`);";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}
$sql="CREATE TABLE `db1`.`workexperience` ( `id` INT NOT NULL , `employer` VARCHAR(1000) NOT NULL , `address` VARCHAR(2000) NOT NULL , `designation` VARCHAR(1000) NOT NULL , `govt` VARCHAR(1000) NOT NULL , `nagpur` VARCHAR(1000) NOT NULL , `joind` VARCHAR(1000) NOT NULL , `leaved` VARCHAR(1000) NOT NULL , `nature` VARCHAR(1000) NOT NULL , `last_salary` VARCHAR(1000) NOT NULL , `basic_pay` VARCHAR(1000) NOT NULL , `gp` VARCHAR(1000) NOT NULL , `level` VARCHAR(1000) NOT NULL ) ENGINE = InnoDB;";

if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}
$sql="ALTER TABLE `workexperience` ADD `employment_type` VARCHAR(100) NOT NULL AFTER `designation`;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}
$sql="ALTER TABLE `workexperience` ADD `i` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`i`);";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `db1`.`awards` ( `i` INT NOT NULL AUTO_INCREMENT , `id` INT NOT NULL , `title` VARCHAR(1000) NOT NULL , `issuing_agency` VARCHAR(1000) NOT NULL , `issuing_date` VARCHAR(100) NOT NULL , PRIMARY KEY (`i`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `db1`.`scholarships` ( `i` INT NOT NULL AUTO_INCREMENT , `id` INT NOT NULL , `title` VARCHAR(1000) NOT NULL , `issuing_agency` VARCHAR(1000) NOT NULL , `issuing_date` VARCHAR(100) NOT NULL , PRIMARY KEY (`i`)) ENGINE = InnoDB;";

if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `db1`.`Recognition` ( `i` INT NOT NULL AUTO_INCREMENT , `id` INT NOT NULL , `title` VARCHAR(1000) NOT NULL , `issuing_agency` VARCHAR(1000) NOT NULL , `issuing_date` VARCHAR(100) NOT NULL , PRIMARY KEY (`i`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `db1`.`outreach` ( `i` INT NOT NULL AUTO_INCREMENT , `id` INT NOT NULL , `name` VARCHAR(500) NOT NULL , `short_description` VARCHAR(1000) NOT NULL , `start_date` VARCHAR(100) NOT NULL , `end_date` VARCHAR(100) NOT NULL , PRIMARY KEY (`i`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `db1`.`add_details` ( `id` INT NOT NULL , `description` INT NOT NULL , `specialization1` VARCHAR(100) NOT NULL , `specialization2` VARCHAR(100) NOT NULL , `specialization3` VARCHAR(100) NOT NULL , UNIQUE (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql = "ALTER TABLE `add_details` CHANGE `description` `description` VARCHAR(2500) NOT NULL;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `db1`.`expsummary` ( `id` INT NOT NULL , `description` VARCHAR(2500) NOT NULL , UNIQUE (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql="CREATE TABLE `db1`.`references` ( `i` INT NOT NULL AUTO_INCREMENT , `id` INT NOT NULL , `name` VARCHAR(200) NOT NULL , `phone_number` VARCHAR(100) NOT NULL , `email` VARCHAR(100) NOT NULL , `address` VARCHAR(1000) NOT NULL , PRIMARY KEY (`i`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}

$sql = "ALTER TABLE `details` ADD `reg_no` VARCHAR(100) NOT NULL AFTER `post`";
if ($conn->query($sql) === FALSE)
{
    echo "Database error lololol". $conn->error;
}

$sql="CREATE TABLE `db1`.`instactivity` ( `id` INT NOT NULL , `responsibility` VARCHAR(200) NOT NULL , `organisation` VARCHAR(200) NOT NULL ,  `start_date` DATE NOT NULL ,  `end_date` DATE NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}
$sql="CREATE TABLE `db1`.`deprtactivity` ( `id` INT NOT NULL , `responsibility` VARCHAR(200) NOT NULL , `organisation` VARCHAR(200) NOT NULL ,  `start_date` DATE NOT NULL ,  `end_date` DATE NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;";
if ($conn->query($sql) === FALSE)
{
    echo "Database error 3". $conn->error;
}


echo date('YM');