<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '' ,'crud');


$id = 0;
$update = false;
$name = '';
$location = '';



if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $location = $_POST['location'];
            $mysqli->query ("INSERT INTO data(name,location) VALUES ('$name','$location')");
             
             $_SESSION['message'] = "Record has been saved";
             $_SESSION['msg_type'] = "success";
             header("location:index.php");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE from data WHERE id=$id"); 

    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";

    header("location:index.php");
}
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id");
    

    if(count(array($result))==1){
        $row = $result->fetch_array();
        $name = $row['name'];
        $location = $row['location'];
    }
}

if (isset($_POST['update'])) {

	$id = $_POST['id'];
	$name = $_POST['name'];
	$location = $_POST['location'];
	$result = $mysqli->query("UPDATE data SET name='$name', location='$location' WHERE id=$id");
    header("location:index.php");

}


?>