<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Online CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    
    <!-- Local CSS -->
    <link rel="stylesheet" href="components/css/dropbox.css">
    <title>Jaleisme's Certificate Generator</title>
  </head>
  <body>
    <div class="container mt-5">
      <div class="row d-flex align-items-center" style="height: 80vh;">
        <div class="col-6">
          <h3 class="fw-bold" >Certificate Generator</h3>
          <br>

          <!-- <form method="post" action="">
            <div class="form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name Here...">
            </div>
            <button type="submit" name="generate" class="btn btn-primary btn-block mt-3">Generate</button>
          </form> -->
        </div>
        <div class="col-6">
          <center>
          <div class="drag-image">
            <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
            <h6>Drag & Drop File Here</h6>
            <span>OR</span>
            <button>Browse File</button>
            <input type="file" hidden>
          </div>
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

    <!-- Online JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <!-- Local JS -->
    <script src="components/js/dropbox.js"></script>
  </body>
</html>
