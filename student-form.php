<!DOCTYPE html>
<html lang="en">
<head>
    <title>Result of Formular</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://www.p3-group.com/wp-content/uploads/2015/08/P3-Logo-silber-pur-transparenter-Hintergrund-80x80.png" rel="icon" type="image/png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
    <body>
        <div class="container">
        <h2>Notification:</h2>

<?php

// Database connection 
            
include "connection.php";
$table = "students_yg_muc";           
// Check connection

// id will be autoincremented
$id = "0";

// get data from formular-YoungGuns
$firstname  = $_POST["firstname"];
$lastname  = $_POST["lastname"];
$abbreviation  = make_str_UPPERcase($_POST["abbreviation"]);
$p3_subsidiary = $_POST["p3_subsidiary"];
$type_contract = $_POST["type_contract"];
$contract_date_from = $_POST["contract_date_from"];
$contract_date_till = $_POST["contract_date_till"];
$degree = $_POST["degree"];
$study_subject = $_POST["study_subject"];
$supervisor = $_POST["supervisor"];
$projects = $_POST["projects"];
$skills  = $_POST["skills"];
$interest = $_POST["interest"];    
$languages = implode(', ', $_POST["languages"]);


            
// image  settings   
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$filename = basename( $_FILES["fileToUpload"]["name"]);    

$uploadOk = 1;

// test check on the database
            
$check_existing_filename = test_NOexist_filename($filename);
$check_existing_abbr = test_isNOT_doublette($abbreviation);
$chech_exist_filename = 0;

// chech uploadfilename
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
if(isset($_POST["fileToUpload"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
   echo '<div class="alert alert-danger">
            <strong>Alert!</strong> file already exist. Please reame your file!
          </div>';
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo '<div class="alert alert-danger">
            <strong>Warning!</strong>Sorry, only JPG, JPEG, PNG & GIF files are allowed.<div>';
    $uploadOk = 0;
}
            
            
// check all test
$table = "students_yg_muc";              

if ($uploadOk == 1 && $check_existing_filename == TRUE && $check_existing_abbr== TRUE ) {

     $sql = "INSERT INTO ".$table. " VALUES ('".$id."', '".        
                    $firstname ."', '".
                    $lastname ."', '".  
                    $abbreviation ."', '".
                    $p3_subsidiary ."', '".
                    $type_contract ."', '".
                    $contract_date_from ."', '".
                    $contract_date_till ."', '".
                    $supervisor ."', '".
                    $projects ."', '".
                    $degree ."', '".
                    $study_subject ."', '".
                    $skills  ."', '".
                    $interest ."', '".
                    $languages ."', '".
                    $filename . 
                    "')";

    if ($con->query($sql) === TRUE) {
    echo '<div class="alert alert-success">
            <strong>Success!</strong> Your data was uploaded to our database. You may close this page!.
          </div>';
    } else {

        echo '<div class="alert alert-warning">
                <strong>Warning!</strong> Error'. $sql .' <br> '. $con->error .'
              </div>';
        
    }


     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo '<div class="alert alert-success">
                <strong> File Success! </strong> The file '. basename( $_FILES["fileToUpload"]["name"]). ' has been uploaded.</div>';

        } else {
            echo '<div class="alert alert-warning">
                <strong>Warning!</strong>Sorry, there was an error uploading your file.</div>';
        }

// if everything is ok, try to upload file
} else {

 echo '<div class="alert alert-warning">
            <strong>Warning!</strong> Error on Upload file
          </div>';
}

            
/*** function in Programm ***/
            
function make_str_UPPERcase($string){

    return strtoupper($string);
}

function make_firstLetter_Uppercase($string){

    // make str Lower

    // split put it into array and make
    // foreach elem in list = > make firs up and return 

    /***
            $foo = 'hallo welt!';
    $foo = ucfirst($foo);             // Hallo welt!

    $bar = 'HALLO WELT!';
    $bar = ucfirst($bar);             // HALLO WELT!
    $bar = ucfirst(strtolower($bar)); // Hallo welt!

    // split
    $pizza  = "Teil1 Teil2 Teil3 Teil4 Teil5 Teil6";
    $teile = explode(" ", $pizza);
    echo $teile[0]; // Teil1
    echo $teile[1]; // Teil2
    ***/
}
            
function check_all_errors(){
    return 0;

    // check if all errors are made
}
    
function test_isNOT_doublette($given_abbr){
   // return true , if the person does not exist in the database

    include "connection.php";
    $table = "students_yg_muc";  

    $sql_check = "SELECT * FROM ". $table . " WHERE abbreviation='". $given_abbr."'";

    $result_check = $con->query($sql_check);
    if ($result_check->num_rows > 0 ) {
        echo '<div class="alert alert-danger">
            <strong>Warning!</strong>Sorry, there is another Person with your Abbreviation</div>';
        return FALSE;

    }else{

        return TRUE;
    }

}
  
function test_NOexist_filename($given_filename){
    // return true, if the given filename does not exist in the database
    include "connection.php";
    $table = "students_yg_muc";  
   
    
    $sql_check = "SELECT * FROM ". $table . " WHERE 'image-name'='". $given_filename."'";

    $result_check = $con->query($sql_check);
    
    if ($result_check->num_rows > 0 ) {

    echo '<div class="alert alert-danger">
        <strong>Warning!</strong>Sorry, there is another Person with the same filename, Please rename your file</div>';
        return FALSE;
    }else{

        return TRUE;
    }

}          
    function test_to_large_file(){   
        return 1;
    }        
    $con->close();
    
?> 
            
</div>
</body>
</html>