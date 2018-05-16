<!DOCTYPE html>
<html lang="en">
<head>
   
    <metta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link href="https://www.p3-group.com/wp-content/uploads/2015/08/P3-Logo-silber-pur-transparenter-Hintergrund-80x80.png" rel="icon" type="image/png"/>
  
    <link rel="stylesheet" href="include/bootstrap.min.css"> 
    <script src="include/jquery.min.js"></script>
    <script src="include/popper.min.js"></script>
    <script src="include/bootstrap.min.js"></script>
    <link href="youngguns.css" rel="stylesheet"  type="text/css">
  
</head>
<body>
    
    <?php
        // Logo p3 header: header_page.php for YG-wand website 
        include "header_page.php";
    ?>
    

<div class="row">
    
    <?php
    
    // file con_p3server.php has all credential to connect into the Mysql database
    //include "../con_p3server.php";
    include "../connection.php";
    // use query to select only the current active students from the database. enday(yyyy-mm-dd) is the date of the termination of contract with p3
    $sql = "SELECT * FROM students_yg_muc WHERE endday > date(now()) ORDER BY RAND()";
    
    $result = mysqli_query($con, $sql);
    $num_valid_records = mysqli_num_rows($result);
    
    $sizeCards_ValidData = resize_records($num_valid_records);
    
    
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            
            make_section_img(
                     $row['id'],
                     $row['lastname'],
                     $row['firstname'],
                     $row['abbreviation'],
                     $row['subComp'],
                     $row['contract'],
                     $row['startday'],
                     $row['endday'],
                     $row['supervisor'],
                     $row['projects'],
                     $row['degree'],
                     $row['subject_study'],
                     $row['interest'],
                     $row['skills'],
                     $row['languages'],
                     $row['image_name']
                            );
            //echo "id: " . $row["id"]. " - >" . $row["firstname"]. " ," . $row["lastname"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    
    
    //  close Button for Modalbox - Put it on modalbox-header
    //<button type="button" class="modal-title close" data-dismiss="modal"><i class="fa fa-close" style="font-size:24px; color:white"></i></button> 
    
    function make_section_img(
                     $id_, 
                     $lastname_, 
                     $firstname_,
                     $abbreviation_,
                     $subcom_,                               
                     $contract_,
                     $startday_,          
                     $endday_,
                     $supervisor_,
                     $projects_,
                     $degree_,
                     $subject_study_,
                     $interest_,
                     $skills_,          
                     $languages_,
                     $filename_
                             ){
            
        $fullName =  $firstname_ . ' '.  $lastname_;
        $education = $degree_ . ' - '. $subject_study_ ;
        $contract_time = ' von '.  date("d.m.Y", strtotime($startday_)) .' bis ' . date("d.m.Y", strtotime($endday_)) ;
        //$set_icons_flags =  make_flagIcons($languages_);
        // make Label "new" for new students
        $student_tagger = addTag_newStudents($startday_);
        // make a rezise of the cards
        $size_cards = resize_records($num_valid_records);
        
        
        $str_section_img = '
                            <div class="column" data-toggle="modal" data-target="#myModal_'. $id_ .'">
                                <div class="card" >
                                  <img class="bild_yg img-responsive image-rezise" src="../uploads/'. $filename_ .'" alt="Student" width="135" height="140" >
                                  <div class="container">
                                    <div class="name"><b>'. $fullName  .'</b></div>
                                    <div>  
                                      <div class="subcompany">'. $subcom_ .'</div>
                                       '.   $student_tagger .'
                                    </div>
                                  </div>
                                </div>
                            </div>';

       
        $popup_output =  '
            <div class="modal fade" id="myModal_'. $id_. '" >
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header" >
                  
                   <img  class="logoP3" src="https://azeu1-sys-webcareer1.azurewebsites.net/wp-content/uploads/2017/12/P3_only_RGB_klein.jpg"  alt="P3 Karriere"   >
                 
                </div>

                <!-- Modal body -->
                <div class="modal-body row mdl-box">
                    <div class="col-sm-3 img-content">
                      <img class="bild_yg_modalbox img-responsive image-rezise" src="../uploads/'. $filename_.'" class="img-box" alt="Student" width="170" height="180" > 
                      <div>
                            <h4 class ="modalbox_boddy_fotoSec_textColor" >'. $fullName. ' ('.$abbreviation_ .')<br>
                            <spam class="subcompany_inModalbox">'. $subcom_.'</spam></h4>
                
                      </div>
                    </div>       
                    <div class="col-sm-9 text-content" >
                        <div>
                        <h3 class="contractTypeStyle_inModalbox">  <img src="icons/P3 book_gray.png" alt="icon" class="set_iconP3"/> <b>'. $contract_ .'</b></h3>
                        <br>
                        
                        <table >
                            <tr>
                                <td>
                                    <img src="icons/academic cap_blue.png" alt="icon" class="set_iconP3"/>
                                </td>
                                <td>
                                    <h4 class ="modalbox_boddytextColor size_modal_table" > <b>Studium </b></h4>
                                </td>
                                <td >
                                    <h4 class ="modalbox_boddytextColor" > '. $education.'</h4>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <img src="icons/person with tie_blue.png" alt="icon" class="set_iconP3"/>
                                </td>
                                <td>
                                    <h4 class ="modalbox_boddytextColor" > <b>Betreuer </b></h4>
                                </td>
                                <td>
                                    <h4 class ="modalbox_boddytextColor">'. $supervisor_ . '</h4>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <img src="icons/project management services_blue.png" alt="icon" class="set_iconP3"/>
                                </td>
                                <td>
                                    <h4 class ="modalbox_boddytextColor" > <b> Projekte </b></h4>
                                </td>
                                <td>
                                    <h4 class ="modalbox_boddytextColor">'.  $projects_ .'</h4> 
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <img src="icons/calender_blue.png" alt="icon" class="set_iconP3"/>
                                </td>
                                <td>
                                    <h4 class ="modalbox_boddytextColor" > <b>Bei P3</b> </h4>
                                </td>
                                <td>
                                    <h4 class ="modalbox_boddytextColor">'.  $contract_time .'</h4>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                   <img src="icons/computer screen with gear-wheel and software code_blue.png" alt="icon" class="set_iconP3"/>
                                </td>
                                
                                <td>
                                    <h4 class ="modalbox_boddytextColor" > <b>Skills</b></h4>
                                </td>
                                
                                <td>
                                    <h4 class ="modalbox_boddytextColor">'. $skills_  .'</h4>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                  <img src="icons/target with arrow_blue.png" alt="icon" class="set_iconP3"/>
                                </td>
                                <td>
                                    <h4 class ="modalbox_boddytextColor" > <b>Interessen </b></h4>
                                </td>
                                <td>
                                    <h4 class ="modalbox_boddytextColor">'. $interest_  . ' </h4>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <img src="icons/persons with speech balloons_blue.png" alt="icon" class="set_iconP3"/>
                                </td>
                                
                                <td>
                                    <h4 class ="modalbox_boddytextColor" > <b>Sprachen</b></h4>
                                </td>
                                
                                <td>
                                    <h4 class ="modalbox_boddytextColor">'. $languages_.'</h4>
                                    
                                </td>
                            </tr>
                            
                        </table> 
                           
                        </div>     
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn" data-dismiss="modal">Close</button>
                </div>

              </div>
            </div>
          </div>
        
        ';
        
        // for each Student insert html code to show picture and Name in homepage
        echo $str_section_img;
        // for each Student insert a popup section with information of the Student
        echo $popup_output;
    }
        
    // no used     
    function make_first_letter_uppercase( $string ){
        
        // in case a string comes in lowercase
        return $string;
    }
    
    // Feature: Show  a small New text if the student is new at P3
    function addTag_newStudents($firstday_date){
        
        $add_intoHTML = "";
        // calculate worked days
        $firstday_contract = new DateTime($firstday_date);
        $current_date = new DateTime("now");
        $interval = date_diff($firstday_contract, $current_date);
        $worked_days = $interval->days;
        
        if($worked_days < 31){
            
            $add_intoHTML = "<tag>NEW</tag>";
            return $add_intoHTML;
            
        }else{
            
            return $add_intoHTML;
        }
        
    }
    
    
    function resize_records($totalNum_recordsDB){
        
        if ($totalNum_recordsDB <= 14){
            return 'width="170" height="180"';
            
        }else{
            
            return 'width="130" height="122"';
        }
        
    }
    
    
    mysqli_close($con);
        
    ?>

</div>

</body>
 
</html>
