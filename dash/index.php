<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    
    
    <?php
        $dirname = "slices/";
        $images = glob($dirname."*.jpg");
        $anz_imgs = count(glob($dirname."*.jpg"));
    
    ?>
 <div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators"> 
            <?php
            for ($x = 0; $x <= $anz_imgs; $x++) {
                if ($x == 0){  
                    echo '<li data-target="#myCarousel" data-slide-to="'. $x .'" class="active"></li>';   
                }else{   
                  echo '<li data-target="#myCarousel" data-slide-to="'. $x .'"></li>';     
                }
            }
            ?>
        </ol>
        
    <div class="carousel-inner">
        <?php
        foreach($images as $image) {
            echo '<div class="carousel-inner"><div class="item active"><img src="'.$image.'" /></div>';
        }
        ?> 
    </div>
        
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>

  </div>
</div>
</body>
</html>
