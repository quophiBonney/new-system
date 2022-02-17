<?php
include('staffmembers.html');

if(isset($_POST['register'])) {
    $connection = mysqli_connect("localhost", "root", "", "staff");
    $staffName = $_POST['staffName'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $department = $_POST['department'];

    if($email == $email && $contact == $contact) {
        $isUsernameTaken = "SELECT * FROM members WHERE staffName = '" .$_POST['staffName'] . "'";
        $result = mysqli_query($connection, $isUsernameTaken);
        $num = mysqli_num_rows($result, $connection);
        if($num >0){
        echo '<script>alert("Email or contact has already been takent")</script>';
    }else {
        $sql = "INSERT INTO members(staffName, email, contact, department)
        VALUES('$staffName', '$email', '$contact', '$department')";
        $query = mysqli_query($connection, $sql);
        if($query){
            echo "Staff member has been registered successfully so check the 
            table for validation, Thank you!";
            header("Location: staffmembers.html");
        }else {
            echo '<script>alert("Something went wrong so try again later")</script>';
        }
    }
}
}
?>