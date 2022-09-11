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
    <div class="container d-flex flex-column justify-content-center" style="height: 100vh;">
      <div class="row mb-3">
        <div class="col-4">
          <div class="w-100 bg-primary text-white p-3">
            <h6>Step 1 - Certificate Detail</h6>
          </div>
        </div>
        <div class="col-4">
          <div class="w-100 bg-light border text-muted p-3">
            <h6>Step 2 - Certificate Recipient(s)</h6>
          </div>
        </div>
        <div class="col-4">
          <div class="w-100 bg-light border text-muted p-3">
            <h6>Step 3 - Template Configuration</h6>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card w-100">
            <div class="card-body">
              <!-- Certificate Detail Form -->
              <div class="row" id="certificateDetailForm">
                <div class="col-8 offset-2">
                  <div class="form-group">
                    <label for="certificateTitle">Certificate Title</label>
                    <input type="text" class="form-control" id="certificateTitle" aria-describedby="certificateTitleHelp">
                    <small id="certificateTitleHelp" class="form-text text-muted">The purpose of certificate (e.g. Event Name, Course Name, etc.)</small>
                  </div>
                  <div class="form-group">
                    <label for="numberCopy" class="form-label">Number of Copy</label>
                    <input type="number" class="form-control" id="numberCopy">
                  </div>
                  <button type="button" class="btn btn-primary float-right" onclick="certificateDetailSubmit()">Next</button>
                </div>
              </div>
  
              <!-- Certificatee Detail -->
              <div class="row d-none" id="certificateeDetail">
                <div class="col-8 offset-2">
                  <div class="form-group" id="certificatee-field-0">
                    <label id="certificatee-label-0" for="certificatee-0"></label>
                    <input type="text" class="form-control" id="certificatee-0">
                  </div>
                  <div class="row">
                    <div class="col-12 d-flex justify-content-between">
                      <button type="button" class="btn btn-secondary" onclick="certificateDetailIn()">Prev</button>
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
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
    <!-- Online JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      let title = '', copy = '';
      function certificateDetailIn(){
        // Alerting previous
        Swal.fire({
          title: 'Are you sure?',
          text: "You have to start this step all over again!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, proceed to return!'
        }).then((result) => {
          if (result.isConfirmed) {
            // Removing Cloned Fields
            for(let i = 1; i <= copy; i++){
              $('#certificatee-field-'+i).remove()
            }

            // Clearing Sample Field
            $('#certificatee-0').val("")

            // Hiding Form
            $('#certificateeDetail').addClass('d-none')
            
            // Showing Form
            $('#certificateDetailForm').removeClass('d-none')
          }
        })
      }

      function certificateDetailOut(){
        // Hiding Form
        $('#certificateDetailForm').addClass('d-none')

        // Showing Form
        $('#certificateeDetail').removeClass('d-none')        
      }

      function certificateDetailSubmit(){
        // Getting Form Value
        title = $('#certificateTitle').val()
        copy = $('#numberCopy').val()

        // Form Transition
        certificateDetailOut()
        
        // Cloning Fields
        $('#certificatee-label-0').text("Name 1")
        let i
        var cloned = $("#certificatee-field-0")
        for (i = 0; i < copy-1; i++) {
          // Cloning Parent
          cloned.clone().removeAttr('id', 'certificatee-field-0').attr('id', 'certificatee-field-'+(i+1)).insertAfter($("#certificatee-field-"+i));

          // Altering Label id, text, and for attribute
          $('#certificatee-field-'+(i+1)).children().first().removeAttr('id', 'certificatee-label-0').attr('id', 'certificatee-label-'+(i+1))
          $('#certificatee-label-'+(i+1)).removeAttr('for', 'certificatee-0').attr('for', 'certificatee-'+(i+1))
          $('#certificatee-label-'+(i+1)).text("Name "+(i+2))

          // Altering field id
          $('#certificatee-field-'+(i+1)).children().last().removeAttr('id', 'certificatee-0').attr('id', 'certificatee-'+(i+1))
        }

        // Debugging
        console.log(title, copy);
        $('#certificateTitleDebug').text(title)
        $('#numberCopyDebug').text(copy)
      }
    </script>
  </body>
</html>
