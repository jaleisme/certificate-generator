<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Online CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Jaleisme's Certificate Generator</title>
  </head>
  <body>
    <div class="container py-5" style="height: 100vh;">
    <!-- <div class="container d-flex flex-column justify-content-center" style="height: 100vh;"> -->
      <div class="row mb-3">
        <div class="col-4">
          <div class="w-100 bg-primary text-white p-3" id="certificate-detail-step">
            <h6>Step 1 - Certificate Detail</h6>
          </div>
        </div>
        <div class="col-4">
          <div class="w-100 bg-light border text-muted p-3" id="certificate-recipient-step">
            <h6>Step 2 - Certificate Recipient(s)</h6>
          </div>
        </div>
        <div class="col-4">
          <div class="w-100 bg-light border text-muted p-3" id="configure-template-step">
            <h6>Step 3 - Template Configuration</h6>
          </div>
        </div>
      </div>

      <div class="row pb-5">
        <div class="col-12">
          <div class="card w-100">
            <div class="card-body">
              <!-- Certificate Detail Form -->
              <div class="row" id="certificateDetailForm">
                <div class="col-12">
                  <div class="form-group">
                    <label for="certificateTitle">Certificate Title</label>
                    <input type="text" class="form-control" id="certificateTitle" aria-describedby="certificateTitleHelp">
                    <small id="certificateTitleHelp" class="form-text text-muted">The purpose of certificate (e.g. Event Name, Course Name, etc.)</small>
                    <small class="form-text text-danger d-none" id="error-title">Title field can't be empty!</small>
                  </div>
                  <div class="form-group">
                    <label for="numberCopy" class="form-label">Number of Copy</label>
                    <input type="number" class="form-control" id="numberCopy">
                    <small class="form-text text-danger d-none" id="error-copy">Copy field can't be empty!</small>
                  </div>
                  <button type="button" class="btn btn-primary float-right" onclick="certificateDetailSubmit()">Next</button>
                </div>
              </div>
  
              <!-- Certificate Recipient Form -->
              <div class="row d-none" id="certificateeDetail">
                <div class="col-12">
                  <div class="form-group" id="certificatee-field-0">
                    <label id="certificatee-label-0" for="certificatee-0"></label>
                    <input type="text" class="form-control" id="certificatee-0">
                  </div>
                  <div class="row">
                    <div class="col-12 d-flex justify-content-between">
                      <button type="button" class="btn btn-secondary" onclick="certificateDetailIn()">Prev</button>
                      <button type="button" class="btn btn-primary" onclick="certificateRecipientSubmit()">Next</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Template Configuration Form -->
              <div class="row d-none" id="templateConfigForm">
                <div class="col-6">
                  <div class="wrapper d-flex justify-content-center align-items-center bg-light border border-secondary h-100">
                    <img src="" alt="" class="w-100 d-none" id="img-preview">
                  </div>
                </div>
                <div class="col-6 d-flex align-items-center">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="">Upload Template</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="file-upload" aria-describedby="inputGroupFileAddon01">
                          <label class="custom-file-label" for="file-upload">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group"><label for="">X</label><input type="number" class="form-control"></div>
                    </div>
                    <div class="col-6">
                      <div class="form-group"><label for="">Y</label><input type="number" class="form-control"></div>
                    </div>
                    <div class="col-12 d-flex justify-content-between">
                      <button type="button" class="btn btn-secondary" onclick="configTemplateOut()">Prev</button>
                      <button type="button" class="btn btn-primary">Next</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="d-flex flex-row justify-content-start align-items-center" id="debugger">
                <span class="text-secondary mr-3 border-right border-secondary pr-3">Debugger Status</span>
                <small class="text-secondary mr-3">Title: <span id="certificateTitleDebug">n/a</span></small>
                <small class="text-secondary mr-3">Copy: <span id="numberCopyDebug">n/a</span></small>
                <small class="text-secondary mr-3">Error Validation Count: <span id="errVal">n/a</span></small>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
    <!-- Online JS -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="app/js/main-logic.js"></script>
    <script>
      document.querySelector('.custom-file-input').addEventListener('change',function(e){
        var fileName = document.getElementById("file-upload").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
      })
      $("#file-upload").change(function() {
          var fd = new FormData();
          var files = $('#file-upload')[0].files[0];
          fd.append('file', files);

          $.ajax({
              url: 'upload.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                  if(response != 0){
                    Swal.fire(
                      'Uploaded!',
                      'Your file has been uploaded.',
                      'success'
                    )
                    $('#img-preview').removeClass("d-none").attr('src', response)
                  }
                  else{
                    Swal.fire(
                      'Upload Failed!',
                      'Your file upload has been failed.',
                      'warning'
                    )
                  }
              },
          });
      });
    </script>
  </body>
</html>
