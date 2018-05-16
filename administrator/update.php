<!DOCTYPE html>
<!-- Include Style file -->
<link href="style-admin.css" rel="stylesheet"> 
<link href="https://www.p3-group.com/wp-content/uploads/2015/08/P3-Logo-silber-pur-transparenter-Hintergrund-80x80.png" rel="icon" type="image/png"/>

<?php


//Connection to Database
   //include "../con_p3server.php";
    include "../connection.php";
   
   
   // get values from form input
      
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $p3_subsidiary = $_POST['subComp'];
    $type_contract = $_POST['contract'];
    $contract_date_from = $_POST['startday'];
    $contract_date_till = $_POST['endday'];
    $supervisor = $_POST['supervisor'];
    $projects = $_POST['projects'];
    $degree = $_POST['degree'];
    $study_subject = $_POST['subject_study'];
    $skills = $_POST['skills'];
    $interest = $_POST['interest'];
    $filename = $_POST['image_name'];
    $Upload_pictureInfo = "";

    // Ckeck if there is a new picture to upload; 
    if(basename($_FILES["newpicture"]["name"])== ""){
        // Do notthing
        $TmpFotoFileName = $filename;
        
    }else{
        
        // make foto upload
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["newpicture"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["newpicture"]["tmp_name"]);
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
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["newpicture"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Error !!";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["newpicture"]["tmp_name"], $target_file)) {
                $TmpFotoFileName = basename( $_FILES["newpicture"]["name"]);
                
                $Upload_pictureInfo =  "The file ". basename( $_FILES["newpicture"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } 
        unlink($target_dir . $filename);
    }
    /// ende upload 
   // mysql query to Update data
   $query = "UPDATE `students_yg_muc` SET 
            `firstname`='".$firstname."',
            `lastname`='".$lastname."',
            `subComp`='".$p3_subsidiary."',
            `contract`='".$type_contract."', 
            `startday`='".$contract_date_from."', 
            `endday`='".$contract_date_till."', 
            `supervisor`='".$supervisor."', 
            `projects`='".$projects."', 
            `subject_study`='".$study_subject."', 
            `skills`='".$skills."', 
            `interest`='".$interest."', 
            `image_name`='".$TmpFotoFileName."', 
            `degree`='".$degree."'  WHERE `id` = $id";
    
   $result = mysqli_query($con, $query);
   
    //Relink to Admin Page when Updatet !!!!When Changing filename please change also this action
   if($result)
   {
      ?>
        <div style="padding:20px;">
            
            <h1><?php echo  $Upload_pictureInfo; ?></h1>
            <h1>Data Updated</h1>
            <form action="admin-youngguns.php"> 
                <input  type="submit" name="return" value="Return">
            </form> 

        </div>
       
    <?php   
   }else{
       ?> <h1>Data Not Updated</h1><?php
   }
   mysqli_close($con);


?>