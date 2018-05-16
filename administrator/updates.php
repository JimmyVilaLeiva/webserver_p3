<?php


    $id = $_POST['id'];
    //include "../con_p3server.php";    
    include "../connection.php";
    // Connection to database
    $sql = "SELECT *  FROM students_yg_muc WHERE id='". $id ."'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    
    $lastname = $row['lastname'];
    $firstname = $row['firstname'];
    $subCom = $row['subComp'];
    $contract = $row['contract'];
    $startday = $row['startday'];
    $endday = $row['endday'];
    $supervisor = $row['supervisor'];
    $projects = $row['projects'];
    $degree = $row['degree'];
    $subject_study = $row['subject_study']; 
    $skills = $row['skills']; 
    $interest = $row['interest']; 
    $languages = $row['languages'];
    $foto_filename =$row['image_name'];
    

    $fullname = $firstname . " " . $lastname;

function make_subcom_block($subCom){
    
    switch($subCom){
            case "Automotive":
            echo '
            <div  class="border">	
                        <label >Sub Company</label>
                        
                        <div class="check">
                            <input type="radio"  id="subComp" name="subComp" value="Automotive" checked required >Automotive
                        </div>
                        <div class="check">
                            <input type="radio"  id="subComp" name="subComp" value="Enery"  required >Energy
                        </div>
                        <div class="check">
                            <input type="radio"  id="subComp" name="subComp" value="Engineering" required >Engineering
                        </div>
                        <div class="check">
                            <input type="radio"  id="subComp" name="subComp" value="System" required >Systems
                        </div>
                    </div>
            
            
            ';
            break;
            
            case "Energy":
            echo '
            <div  class="border">	
                        <label >Sub Company</label>
                        
                        
                        <div class="check">
                            <input type="radio"  id="subComp" name="subComp" value="Automotive" required >Automotive
                        </div>
                        <div class="check">
                            <input type="radio"  id="subComp" name="subComp" value="Energy"  checked required >Energy
                        </div>
                        <div class="check">
                            <input type="radio"  id="subComp" name="subComp" value="Engineering" required >Engineering
                        </div>
                        <div class="check">
                            <input type="radio"  id="subComp" name="subComp" value="System" required >Systems
                        </div>
                    </div>
            ';
             break;
            
        case "Engineering":
            echo '
            <div  class="border">	
                        <label >Sub Company</label>
                        
                        
                        <div class="check">
                            <input type="radio"  id="subComp" name="subComp" value="Automotive" required >Automotive
                        </div>
                        <div class="check">
                            <input type="radio"  id="subComp" name="subComp" value="Energy"  required >Energy
                        </div>
                        <div class="check">
                            <input type="radio"  id="subComp" name="subComp" value="Engineering" checked  required >Engineering
                        </div>
                        <div class="check">
                            <input type="radio"  id="subComp" name="subComp" value="System" required >Systems
                        </div>
                    </div>
            ';
             break;
        case "System":
        echo '
        <div  class="border">	
                        <label >Sub Company</label>
                        
                        
                        <div class="check">
                            <input type="radio"  id="subComp" name="subComp" value="Automotive" required >Automotive
                        </div>
                        <div class="check">
                            <input type="radio"  id="subComp" name="subComp" value="Energy"  required >Energy
                        </div>
                        <div class="check">
                            <input type="radio"  id="subComp" name="subComp" value="Engineering" required >Engineering
                        </div>
                        <div class="check">
                            <input type="radio"  id="subComp" name="subComp" value="System" checked required >Systems
                        </div>
                    </div>
        
        
        ';
      break;
            
    default:
	       echo "Error loading subcompany";
    }
    
}


function make_contract_block($contract){
    
    switch($contract){
            
        case "Praktikant":
            echo '
                 <div class="border">
                            <label>Type of contract</label>
                            <div class="check">
                                <input type="radio"  id="contract" name="contract" value="Praktikant" checked required>Intern
                            </div>
                            <div class="check">
                                <input type="radio"  id="contract" name="contract" value="Thesis" required>Thesis
                            </div>
                            <div class="check">
                                <input type="radio"  id="contract" name="contract" value="Werkstudent" required>Werkstudent
                            </div>
                        </div>

            ';
            break;
            
        case "Thesis":
            echo '
                 <div class="border">
                        <label>Type of contract</label>
                        <div class="check">
                            <input type="radio"  id="contract" name="contract" value="Praktikant" required>Intern
                        </div>
                        <div class="check">
                            <input type="radio"  id="contract" name="contract" value="Thesis"  checked required>Thesis
                        </div>
                        <div class="check">
                            <input type="radio"  id="contract" name="contract" value="Werkstudent" required>Werkstudent
                        </div>
                    </div>
            
            ';
            break;
            
        case "Werkstudent":
            echo '
                 <div class="border">
                        <label>Type of contract</label>
                        <div class="check">
                            <input type="radio"  id="contract" name="contract" value="Praktikant" required>Intern
                        </div>
                        <div class="check">
                            <input type="radio"  id="contract" name="contract" value="Thesis" required>Thesis
                        </div>
                        <div class="check">
                            <input type="radio"  id="contract" name="contract" value="Werkstudent" checked required>Werkstudent
                        </div>
                    </div>
            
            ';
            break;
        
        default:
            echo "ERROR LOADING THE TYPE OF CONTRACT";     
    }  
}

function make_degree_block($degree){
    
    switch ($degree){
        case "Bachelor":
            echo '
             <input type="radio"  id="degree" name="degree" value="Master" required>Master
             <input type="radio"  id="degree" name="degree" value="Bachelor" checked required>Bachelor
            
            ';
            break;
        case "Master";
            echo '
             <input type="radio"  id="degree" name="degree" value="Master" checked required>Master
             <input type="radio"  id="degree" name="degree" value="Bachelor" required>Bachelor
            ';
            break;
        default:
            echo "ERROR LOADING DEGREE";
            
    }
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admininator Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
                
        <link href="../dash/include/bootstrap.min.css" rel="stylesheet">
        <script src="../dash/include/jquery.min.js" rel="stylesheet"></script>
        <script src="../dash/include/bootstrap.min.js" rel="stylesheet"> </script>
      
        
        <link href="style-admin.css" rel="stylesheet">
        <link href="https://www.p3-group.com/wp-content/uploads/2015/08/P3-Logo-silber-pur-transparenter-Hintergrund-80x80.png" rel="icon" type="image/png"/>
        <link href="https://www.p3-group.com/wp-content/uploads/2015/08/P3-Logo-silber-pur-transparenter-Hintergrund-80x80.png" rel="icon" type="image/png"/>
    </head>
    
    <body>
        <div class="topnav">
            Content Management for YG-Wall 
        </div>

        <form action="update.php" method="post" enctype="multipart/form-data">
            <div style="padding:10px;">
                    <input  type='hidden' name='id' value='<?php echo $id ?>'>
                    <input  type='hidden' name='image_name' value='<?php echo  $foto_filename ?>'>
                    <div  class="container">
                        
                        <h1 class="titel">Update Student Information</h1>
                            <h3> Student: 
                            <?php 
                                echo "<spam >". $fullname ."</spam>";
                            ?>
                            </h3>
                        
                        <aside style="float:right;">
                        
                         <h4>Aktuelles Foto</h4> 
                            
                            <img class="bild_yg img-responsive image-rezise" src="../uploads/<?php echo $foto_filename; ?>" alt="Student" width="140" height="150" >
                            
                            
                            <div >
                            
                              <button type="button" class="btn btn-info btn-sm" style="margin-left:20px;" data-toggle="collapse" data-target="#demo">Foto ändern</button>
                                
                              <div id="demo" class="collapse" style="margin-top:10px;">
                                Select image to upload: <br>
                                <input type="file" name="newpicture" id="newpicture" onchange="GetFileSize()">
                                <button type="reset" onclick="clean_fp()">Cancel</button>
                                <p id="fp"></p>
                                  
                              </div>
                            </div>
                            <!-- Still Working here 
                            change foto section
                            -->
                        </aside>
                        
                        <!-- Personal data -->
                        <div>
                            <div class="block" >
                                <label for="firstname">Vorname</label>
                                <input type="text" id ="firstname" name="firstname" value="<?php echo $firstname; ?>" required>
                            </div>
                            <div class="block" >
                                <label for="">Nachname</label>
                                <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>" required>
                            </div>
                        </div>
                        
                         
                        <!-- Contract Information -->
                        <div>
                            <?php
                                make_subcom_block($subCom);
                                make_contract_block($contract);
                                ?>
                        </div>
                        <!-- Workrelation Start and End -->  
                        <div>
							<div class="block" >
                                <label for="startday">Vertrag gültig ab </label>
                                <input  value="<?php echo $startday; ?>" type="date" id="startday" name="startday" placeholder="YYYY-MM-DD" required pattern="[0-9]{4}.(0[1-9]|1[012]).(0[1-9]|1[0-9]|2[0-9]|3[01])" title="YYYY-MM-DD" >

                            </div>
                            <div class="block" >
                                <label for="endday">Vertrag gültig bis </label>
                                <input  value="<?php echo $endday; ?>" type="date" id="endday" name="endday" placeholder="YYYY-MM-DD" required pattern="[0-9]{4}.(0[1-9]|1[012]).(0[1-9]|1[0-9]|2[0-9]|3[01])" title="YYYY-MM-DD" >

                            </div>
                        </div>
                        <!-- Supervisor and Project --> 
                        <div>
                            <div class="block" >
                                <label for="supervisor">Betreuer</label>
                                <input type="text" id ="supervisor" name="supervisor" value="<?php echo $supervisor; ?>" required >
                            </div>
                            <div class="block" >
                                <label for="projects">Projekte</label>
                                <input type="text" id="projects" name="projects" value="<?php echo $projects; ?>"required >
                            </div>
                        </div>

                        <!-- University Information --> 
                            <div class="block">
                                <label for="subject_study">Studiengang</label>
                                <input type="text" id ="subject_study" name="subject_study" value="<?php echo $subject_study; ?>" required >
                            </div>
                        
                            <div class="block" style="padding-top:30px;">

                                <?php
                                 make_degree_block($degree);

                                ?>

                            </div>
                        
                        <!-- Skills und interest -->
                        <div>
                            <div class="block" >
                                <label for="interest">Interessen</label>
                                <input type="text" id ="interest" name="interest" style="width: 600px;" value="<?php echo $interest; ?>" required>
                            </div>
                            
                        </div>
                        
                        <div>
                            
                            <div class="block" >
                                <label for="skills">Skills</label>
                                <input type="text" id="skills" name="skills" style="width: 600px;" value="<?php echo $skills; ?>" required>
                            </div>
                        </div>
                        
                        <!-- Languages -->
                        <div>
                            <div class="block" >
                                <label for="languages">Sprachen</label>
                                <input type="text" id ="languages" name="languages" value="<?php echo $languages; ?>" required>
                            </div>
                        
                        </div>
                        
                       

                        <input  type="submit" name="update" value="Update Data">
                    </div>

                </div> 
        </form>
        <script>
            function GetFileSize() {
                var fi = document.getElementById('newpicture'); // GET THE FILE INPUT.
                var newfilename = document.getElementById('newpicture').value ;
                var current_picture = "<?php echo $foto_filename; ?>";
                var fileToupload_name = newfilename.replace(/C:\\fakepath\\/i, '');
                
                // CHECK NAME OF FILE TO UPLOAD: fILENAME SHOULD BE NO THE SAME.
                if (fileToupload_name == current_picture){
                    document.getElementById('fp').innerHTML = '';
                    alert ("ACHTUNG: \nDer Filename ist der gleiche wie der alte. Das alte und das neue Foto sollten nicht den gleichen Name haben.\nBitte Datei umbenennen!");
                    document.getElementById('fp').innerHTML = 
                    document.getElementById('fp').innerHTML + '<br /> ' +
                                '<b style="color: red;">' + 'Meldung: Datei soll umbenant werden' + '</b>';
                }else{
                    // clean old Picture upload status
                    document.getElementById('fp').innerHTML = '';  
                    // an put new upload status
                   document.getElementById('fp').innerHTML = 
                    document.getElementById('fp').innerHTML + '<br /> ' +
                                '<b style="color: green;">' + "Status: OK" + '</b>';
                }  
             
            }
            
            // CLEAN INFORMATION STATUS FOR FOTO UPLOADING 
            function clean_fp(){
                document.getElementById('fp').innerHTML = '';  
            }
        </script>
    </body>
</html>
