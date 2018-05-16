<!DOCTYPE html>
<html>
    <head>
    <title> Admininator Page</title>
    <meta charset="UTF-8">
    <link href="https://www.p3-group.com/wp-content/uploads/2015/08/P3-Logo-silber-pur-transparenter-Hintergrund-80x80.png" rel="icon" type="image/png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    </head>
    
    <body>
        <div class="topnav">
            Content Management for YG-Wall 
        </div>

        <!-- Student Table with Searchfield -->
        <form action="updates.php" method="post">
        <div class="main">
        <!-- Searchfield Input -->
        <div style="padding:15px;">
            
         <input class="search" type="text" id="myInput" onkeyup="myFunction()" style="width:850px;" placeholder="Name or Abbreviation" title="Type in a name">
            
        </div>
        
            <table  id="myTable" class="table_students"> 
                <!-- Table Header -->
                <thead >
                    <tr>
                        <th>Edit</th>
                        <th>Abbr</th>
                        <th>Name</th>
                        <th>Lastname</th>
                        <th>Sub Company</th>
                        <th>Contract</th>
                        <th>Start date</th>
                        <th>Due date</th>
                        <th>Supervisor</th>
                        <th>Projects</th>
                        <th>Degree</th>
                        <th>Major</th>
                    </tr>
                </thead>
                <tbody>
             
                    <!--- Start Form for Data Update -->
                   
                    <?php
                    // php code to List data from mysql database Table
                    //include "../con_p3server.php";
                    include "../connection.php";               
                        // Connection to database
                        $sql = "SELECT *  FROM students_yg_muc";
                        $result = $con->query($sql);
            

                        //list all rows
                        while($row = $result->fetch_assoc()) { 
                           
                        ?>
                            	
                            <tr>
                                <!-- Checkbox: When clicked  the current row is the one to be Updated -->
                                <td>
                                    <label class="containercheck">
                                    <input type="radio"  name="id" value="<?php echo $row['id']; ?>"  required >
                                    <span class="checkmark"></span>
                                    </label>
                                </td>
                                <!-- All the important variables -->
                                <td><?php echo $row['abbreviation']; ?></td>
                                <td><?php echo $row['firstname']; ?></td>
                                <td><?php echo $row['lastname']; ?></td>
                                <td><?php echo $row['subComp']; ?></td>
                                <td><?php echo $row['contract']; ?></td>
                                <td><?php echo $row['startday']; ?></td>
                                <td><?php echo $row['endday']; ?></td>
                                <td><?php echo $row['supervisor']; ?></td>
                                <td><?php echo $row['projects']; ?></td>
                                <td><?php echo $row['degree']; ?></td>
                                <td><?php echo $row['subject_study']; ?></td>
                            </tr>

                            <?php } ?>
                </tbody>
            </table> 
            
            
            <div style="padding-top: 20px;">
            
                <input  type="submit" name="submit" value="Edit">  

            </div>
        </div>
        
        </form>
        <!-- SCRIPT For the filtering of the Table  --> 
        <script>
            function filterTable(event) {
                var filter = event.target.value.toUpperCase();
                var rows = document.querySelector("#myTable tbody").rows;

                for (var i = 0; i < rows.length; i++) {
                    var firstCol = rows[i].cells[3].textContent.toUpperCase();
                    var secondCol = rows[i].cells[1].textContent.toUpperCase();
                    var thirdCol = rows[i].cells[2].textContent.toUpperCase();


                    if (firstCol.indexOf(filter) > -1 || secondCol.indexOf(filter) > -1 || thirdCol.indexOf(filter) > -1) {
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }      
                }
            }

            document.querySelector('#myInput').addEventListener('keyup', filterTable, false);
            
            
            function alerta(){
                
                var id_nummer = document.getElementById('id').value;
                alert (id_nummer);
            }
            </script>
    </body>
</html>

