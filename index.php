<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Certificate Generator</title>
  </head>
  <body>
    <div class="container mt-5">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-6">
          <h3>Certificate Generator</h3>
          <br>
          <form method="post" action="">
            <div class="form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name Here...">
            </div>
            <button type="submit" name="generate" class="btn btn-primary btn-block mt-3">Generate</button>
          </form>
        </div>
        <div class="col-6">
          <center>
            <?php 
              if (isset($_POST['generate'])) {
                $name = $_POST['name'];
                $name_len = strlen($_POST['name']);
                $occupation = '';
                if ($occupation) {
                  $font_size_occupation = 10;
                }

                if ($name == "") {
                  echo 
                  "
                  <div class='alert alert-danger' role='alert'>
                      Ensure you fill all the fields!
                  </div>
                  ";
                }else{
                  // echo 
                  // "
                  // <div class='alert alert-success' role='alert'>
                  //     Congratulations! $name on your excellent success.
                  // </div>
                  // ";

                  //designed certificate picture
                  $image = "sample.png";

                  $createimage = imagecreatefrompng($image);

                  //this is going to be created once the generate button is clicked
                  $output = "certificate.png";

                  //then we make use of the imagecolorallocate inbuilt php function which i used to set color to the text we are displaying on the image in RGB format
                  $white = imagecolorallocate($createimage, 205, 245, 255);
                  $red = imagecolorallocate($createimage, 246, 43, 65);

                  //Then we make use of the angle since we will also make use of it when calling the imagettftext function below
                  $rotation = 0;

                  //we then set the x and y axis to fix the position of our text name
                  $origin_x = 64;
                  $origin_y=334;

                  //we then set the differnet size range based on the lenght of the text which we have declared when we called values from the form
                  if($name_len<=7){
                    $font_size = 25;
                    $origin_x = 190;
                  }
                  elseif($name_len<=12){
                    $font_size = 30;
                  }
                  elseif($name_len<=15){
                    $font_size = 26;
                  }
                  elseif($name_len<=20){
                    $font_size = 18;
                  }
                  elseif($name_len<=22){
                    $font_size = 15;
                  }
                  elseif($name_len<=33){
                    $font_size=11;
                  }
                  else {
                    $font_size =10;
                  }

                  $certificate_text = $name;

                  //font directory for name
                  $drFont = dirname(__FILE__)."/Montserrat-Bold.otf";

                  // font directory for occupation name
                  $drFont1 = dirname(__FILE__)."/Gotham-black.otf";

                  //function to display name on certificate picture
                  $text1 = imagettftext($createimage, 28, $rotation, $origin_x, $origin_y, $red,$drFont, $certificate_text);

                  //function to display occupation name on certificate picture
                  // $text2 = imagettftext($createimage, $font_size_occupation, $rotation, $origin1_x+2, $origin1_y, $black, $drFont1, $occupation);

                  imagepng($createimage,$output,3);

            ?>
            <img src="<?php echo $output; ?>" class="img img-fluid">
            <a href="<?php echo $output; ?>" class="btn btn-success" target="_blank">Download Certificate</a>
          </center>
        </div>
      </div>
    </div>
<?php 
        }
      }

     ?>


      <!-- <footer>  
          <center><p>Built with &#10084; by <a href="joel-new.netlify.app">Olawanle Joel</a></p></center>
      </footer> -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
