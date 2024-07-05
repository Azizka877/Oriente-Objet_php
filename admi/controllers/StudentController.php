<?php


class StudentController{
    private $conn;
    public function __construct(){
        $db= new DatabaseConnexion();
    $this->conn = $db->conn;
    }
//get data
    public function getData(){
        $studentQuery = "SELECT * FROM students";
        $result = $this->conn->query($studentQuery);
        if($result->num_rows > 0){
            return $result;
        } else{
            return false;
        }   
    }


 public function create($inputData){
$data = "'"  . implode("','",$inputData ). "'";
// echo $data;
 $query = "INSERT INTO students (fullname, email, phone, course) VALUES ( $data)";
 $result = $this->conn->query($query);
 if($result){
     return true;
 }else{
     return false;
 }
 }

public function editStudent($id){
$student_id = validateInput($this->conn, $id);
 $query = "SELECT * FROM students WHERE id = '$student_id' LIMIT 1";
 $result = $this->conn->query($query);
 if($result->num_rows == 1){
     return $result->fetch_assoc();
 } else{
     return false;
 }
}

public function update($inputData, $id){
    $fullname = $inputData['fullname'];
    $email = $inputData['email'];
    $phone = $inputData['phone'];
    $course = $inputData['course'];
    $student_id = validateInput($this->conn, $id);
    $studentUpdatequery = "UPDATE students SET  fullname = '$fullname', email= '$email',phone='$phone', course = '$course' WHERE id='$student_id' LIMIT 1";
    $result = $this->conn->query($studentUpdatequery);
    if($result){
        return true;
    } else{
        return false;
    }
}

public function delete($id){
    $student_id = validateInput($this->conn, $id);
    $studentDeletequery = "DELETE FROM students WHERE id='$student_id' LIMIT 1";
    $result = $this->conn->query($studentDeletequery);
    if($result){
        return true;
    } else{
        return false;
    }
}


}