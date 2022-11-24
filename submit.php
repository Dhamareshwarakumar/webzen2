<?php

if ((!isset($_POST['reg_no'])) || (!isset($_POST['name'])) || (!isset($_POST['email'])) || (!isset($_POST['ph_no'])) || (!isset($_POST['college'])) || (!isset($_POST['dept'])) || (!isset($_POST['section'])) || (!isset($_POST['gender'])) || (!isset($_POST['event']))) {
    header("Location: ./index.html?error=Please Fill All Fields1");
    exit();
}

require "./config/db.php";
date_default_timezone_set("Asia/Calcutta");
$time = date("Y-m-d H:i:s");


$reg_no = $_POST['reg_no'];
$name = $_POST['name'];
$email = $_POST['email'];
$ph_no = $_POST['ph_no'];
$college = $_POST['college'];
$dept = $_POST['dept'];
$section = $_POST['section'];
$gender = $_POST['gender'];
$year = $_POST['year'];
$event = $_POST['event'];


if ((empty($reg_no)) || (empty($name)) || (empty($email)) || (empty($ph_no)) || (empty($college)) || (empty($dept)) || (empty($section)) || (empty($gender)) || (empty($year)) || (empty($event))) {
    header("Location: ./index.html?error=Please Fill All Fields2");
    exit();
}

// ============ Validating Email ==========================//
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ./index.html?error=invalid emial");
    exit();
}
// ============ /Validating Email =========================//

// ============ Validating Firstname ======================//
else if (!preg_match("/^[a-zA-Z0-9 ]+$/", $name)) {
    header("Location: ./index.html?error=invalid name");
    exit();
}
// ============ /Validating Firstname =====================//


// ============ Validating PhoneNumber ====================//
// else if (!preg_match("/^[0-9]{10}$/", $phone)) {
//     header("Location: ./index.html?error=invalid ph_no");
//     exit();
// }
// ============ /Validating PhoneNumber ===================//


$sql = "INSERT INTO webzen2(time,reg_no,name,email,ph_no,college,dept,section,gender,year,event) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
$stmt = mysqli_stmt_init($con);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ./index.html?error=SqlError1");
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "sssssssssis", $time, $reg_no, $name, $email, $ph_no, $college, $dept, $section, $gender, $year, $event);
    mysqli_stmt_execute($stmt);
    header("Location: ./index.html?signup=success");
}
exit();
