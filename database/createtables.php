<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require_once $path . "/attendanceapp/database/database.php";
function clearTable($dbo, $tabName)
{
  $c = "delete from ".$tabName;
  $s = $dbo->conn->prepare($c);
  try {
    $s->execute();
    echo($tabName." cleared");
  } catch (PDOException $oo) {
    echo($oo->getMessage());
  }
}
$dbo = new Database();
$c = "create table student_details
(
    id int auto_increment primary key,
    roll_no varchar(20) unique,
    name varchar(50),
    email_id varchar(100)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>student_details created");
} catch (PDOException $o) {
  echo ("<br>student_details not created");
}

$c = "create table course_details
(
    id int auto_increment primary key,
    code varchar(20) unique,
    title varchar(50),
    credit int
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>course_details created");
} catch (PDOException $o) {
  echo ("<br>course_details not created");
}


$c = "create table faculty_details
(
    id int auto_increment primary key,
    user_name varchar(20) unique,
    name varchar(100),
    password varchar(50)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>faculty_details created");
} catch (PDOException $o) {
  echo ("<br>faculty_details not created");
}


$c = "create table session_details
(
    id int auto_increment primary key,
    year int,
    term varchar(50),
    unique (year,term)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>session_details created");
} catch (PDOException $o) {
  echo ("<br>session_details not created");
}



$c = "create table course_registration
(
    student_id int,
    course_id int,
    session_id int,
    primary key (student_id,course_id,session_id)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>course_registration created");
} catch (PDOException $o) {
  echo ("<br>course_registration not created");
}
clearTable($dbo, "course_registration");

$c = "create table course_allotment
(
    faculty_id int,
    course_id int,
    session_id int,
    primary key (faculty_id,course_id,session_id)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>course_allotment created");
} catch (PDOException $o) {
  echo ("<br>course_allotment not created");
}
clearTable($dbo, "course_allotment");

$c = "create table attendance_details
(
    faculty_id int,
    course_id int,
    session_id int,
    student_id int,
    on_date date,
    status varchar(10),
    primary key (faculty_id,course_id,session_id,student_id,on_date)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>attendance_details created");
} catch (PDOException $o) {
  echo ("<br>attendance_details not created");
}
clearTable($dbo, "attendance_details");

$c = "create table sent_email_details
(
    faculty_id int,
    course_id int,
    session_id int,
    student_id int,
    on_date date,
    id int auto_increment primary key,
    message varchar(200),
    to_email varchar(100)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>sent_email_details created");
} catch (PDOException $o) {
  echo ("<br>sent_email_details not created");
}
clearTable($dbo, "sent_email_details");

clearTable($dbo, "student_details");
$c = "insert into student_details
(id,roll_no,name,email_id)
values
(1,'CS202301','Abhishek Upadhyay','mugiwarasaan12345@gmail.com'),
(2,'CS202302','Aditya Patwal','mugiwarasaan12345@gmail.com'),
(3,'CS202303','Agastya Joshi','mugiwarasaan12345@gmail.com'),
(4,'CS202304','Anamika Kothari','mugiwarasaan12345@gmail.com'),
(5,'CS202305','Anant Sharma','mugiwarasaan12345@gmail.com'),
(6,'CS202306','Anushka Tyagi','mugiwarasaan12345@gmail.com'),
(7,'CS202307','Aparna Kothari','mugiwarasaan12345@gmail.com'),
(8,'CS202308','Ayush Nautiyal','mugiwarasaan12345@gmail.com'),
(9,'CS202309','Bhupal Singh Danu','mugiwarasaan12345@gmail.com'),
(10,'CS202310','Daksh Rawat','mugiwarasaan12345@gmail.com'),
(11,'CS202311','Devansh Khetarpal','mugiwarasaan12345@gmail.com'),
(12,'CS202312','Dikshant Negi','mugiwarasaan12345@gmail.com'),
(13,'CS202313','Gaurav Pandey','mugiwarasaan12345@gmail.com'),
(14,'CS202314','Gunjan Pandey','mugiwarasaan12345@gmail.com'),
(15,'CS202315','Kashish Sachdeva','mugiwarasaan12345@gmail.com'),
(16,'CS202316','Keya Parmar','mugiwarasaan12345@gmail.com'),
(17,'CS202317','Mridul Mehra','mugiwarasaan12345@gmail.com'),
(18,'CS202318','Naman Gusain','mugiwarasaan12345@gmail.com'),
(19,'CS202319','Pranay Pawan Gupta','mugiwarasaan12345@gmail.com'),
(20,'CS202320','Priyanshu Gusain','mugiwarasaan12345@gmail.com'),
(21,'CS202321','Satwik Negi','mugiwarasaan12345@gmail.com'),
(22,'CS202322','Shivang Bisht','mugiwarasaan12345@gmail.com'),
(23,'CS202323','Tushar Rawat','mugiwarasaan12345@gmail.com'),
(24,'CS202324','Vivek Kumar Singh','mugiwarasaan12345@gmail.com')
";

$s = $dbo->conn->prepare($c);
try {
  $s->execute();
} catch (PDOException $o) {
  echo ("<br>duplicate entry");
}

clearTable($dbo, "faculty_details");
$c = "insert into faculty_details
(id,user_name,password,name)
values
(1,'rcb','123','Ram Charan Baishya'),
(2,'arindam','123','Arindam Karmakar'),
(3,'pal','123','Pallabi'),
(4,'anuj','123','Anuj Agarwal'),
(5,'mriganka','123','Mriganka Sekhar'),
(6,'manooj','123','Manooj Hazarika')";

$s = $dbo->conn->prepare($c);
try {
  $s->execute();
} catch (PDOException $o) {
  echo ("<br>duplicate entry");
}

clearTable($dbo, "session_details");
$c = "insert into session_details
(id,year,term)
values
(1,2023,'SPRING SEMESTER'),
(2,2023,'AUTUMN SEMESTER'),
(3,2024,'SPRING SEMESTER')";

$s = $dbo->conn->prepare($c);
try {
  $s->execute();
} catch (PDOException $o) {
  echo ("<br>duplicate entry");
}

clearTable($dbo, "course_details");
$c = "insert into course_details
(id,title,code,credit)
values
(1,'Database Management System','TCS201',3),
(2,'Operating System','TCS202',3),
(3,'Artificial Intelligence','TCS203',4),
(4,'Computer Organisation','TCS204',2),
(5,'Digital Logic','TCS205',3),
(6,'Cloud Computing','TCS206',4)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
} catch (PDOException $o) {
  echo ("<br>duplicate entry");
}

//if any record already there in the table delete them
clearTable($dbo, "course_registration");
$c = "insert into course_registration
  (student_id,course_id,session_id)
  values
  (:sid,:cid,:sessid)";
$s = $dbo->conn->prepare($c);
//iterate over all the 24 students
//for each of them chose max 3 random courses, from 1 to 6

for ($i = 1; $i <= 24; $i++) {
  for ($j = 0; $j < 3; $j++) {
    $cid = rand(1, 6);
    //insert the selected course into course_registration table for 
    //session 1 and student_id $i
    try {
      $s->execute([":sid" => $i, ":cid" => $cid, ":sessid" => 1]);
    } catch (PDOException $pe) {
    }

    //repeat for session 2
    $cid = rand(1, 6);
    //insert the selected course into course_registration table for 
    //session 2 and student_id $i
    try {
      $s->execute([":sid" => $i, ":cid" => $cid, ":sessid" => 2]);
    } catch (PDOException $pe) {
    }

    //repeat for session 3
    $cid = rand(1, 6);
    //insert the selected course into course_registration table for 
    //session 2 and student_id $i
    try {
      $s->execute([":sid" => $i, ":cid" => $cid, ":sessid" => 3]);
    } catch (PDOException $pe) {
    }
  }
}


//if any record already there in the table delete them
clearTable($dbo, "course_allotment");
$c = "insert into course_allotment
  (faculty_id,course_id,session_id)
  values
  (:fid,:cid,:sessid)";
$s = $dbo->conn->prepare($c);
//iterate over all the 6 teachers
//for each of them chose max 2 random courses, from 1 to 6

for ($i = 1; $i <= 6; $i++) {
  for ($j = 0; $j < 2; $j++) {
    $cid = rand(1, 6);
    //insert the selected course into course_allotment table for 
    //session 1 and fac_id $i
    try {
      $s->execute([":fid" => $i, ":cid" => $cid, ":sessid" => 1]);
    } catch (PDOException $pe) {
    }

    //repeat for session 2
    $cid = rand(1, 6);
    //insert the selected course into course_allotment table for 
    //session 2 and student_id $i
    try {
      $s->execute([":fid" => $i, ":cid" => $cid, ":sessid" => 2]);
    } catch (PDOException $pe) {
    }

    //repeat for session 3
    $cid = rand(1, 6);
    //insert the selected course into course_allotment table for 
    //session 2 and student_id $i
    try {
      $s->execute([":fid" => $i, ":cid" => $cid, ":sessid" => 3]);
    } catch (PDOException $pe) {
    }
  }
}
