<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../../config/app.php';
include_once '../controllers/StudentController.php';


//update student
if (isset($_POST['update_student'])){
    $id = validateInput($db->conn,$_POST['student_id']);
    $inputData =[
    'fullname' => validateInput($db->conn, $_POST['fullname']),
    'email' => validateInput($db->conn, $_POST['email']),
    'phone' => validateInput($db->conn, $_POST['phone']),
    'course' => validateInput($db->conn, $_POST['course']),
    ];
    $student = new StudentController;
    $result = $student->update($inputData, $id);
    if($result){
        redirect('Student updated successfully', 'admi/student-view.php');
    } else {
        redirect('Failed to update student', 'admi/student-view.php');
    }
}


//delete Student
if (isset($_POST['deleteStudent'])){
    $id = validateInput($db->conn,$_POST['deleteStudent']);
    $student = new StudentController;
    $result = $student->delete($id);
    if($result){
        redirect('Student deleted successfully', 'admi/student-view.php');
    } else {
        redirect('Failed to delete student', 'admi/student-view.php');
    }
}


//create a new student
if(isset($_POST['save_student'])){
    $inputData =[
        'fullname' => validateInput($db->conn, $_POST['fullname']),
    'email' => validateInput($db->conn, $_POST['email']),
    'phone' => validateInput($db->conn, $_POST['phone']),
    'course' => validateInput($db->conn, $_POST['course']),
    ];
    $student = new StudentController;
    $result = $student->create($inputData);
    if($result){
        redirect('Student added successfully', 'admi/student-add.php');
    } else {
        redirect('Failed to add student', 'admi/student-add.php');
    }
}