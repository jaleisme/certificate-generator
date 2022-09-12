// Global variable
let title = '', copy = '', recipients = []

// Transition Functions
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
      $('#certificate-recipient-step').removeClass('bg-primary text-white')
      $('#certificate-recipient-step').addClass('bg-light border text-muted')
      
      // Showing Form
      $('#certificateDetailForm').removeClass('d-none')
      $('#certificate-detail-step').removeClass('bg-light border text-muted')
      $('#certificate-detail-step').addClass('bg-primary text-white')
    }
  })
}

function certificateRecipientIn(){
  // Hiding Form
  $('#certificateDetailForm').addClass('d-none')
  $('#certificate-detail-step').removeClass('bg-primary text-white')
  $('#certificate-detail-step').addClass('bg-light border text-muted')
  
  // Showing Form
  $('#certificateeDetail').removeClass('d-none')        
  $('#certificate-recipient-step').removeClass('bg-light border text-muted')
  $('#certificate-recipient-step').addClass('bg-primary text-white')
}

function configTemplateIn(){
    // Hiding Form
    $('#certificateeDetail').addClass('d-none')
    $('#certificate-recipient-step').removeClass('bg-primary text-white')
    $('#certificate-recipient-step').addClass('bg-light border text-muted')
    
    // Showing Form
    $('#templateConfigForm').removeClass('d-none')        
    $('#configure-template-step').removeClass('bg-light border text-muted')
    $('#configure-template-step').addClass('bg-primary text-white')
}

function configTemplateOut(){
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
            // Hiding Form
            $('#templateConfigForm').addClass('d-none')
            $('#configure-template-step').removeClass('bg-primary text-white')
            $('#configure-template-step').addClass('bg-light border text-muted')
            
            // Showing Form
            $('#certificateeDetail').removeClass('d-none')        
            $('#certificate-recipient-step').removeClass('bg-light border text-muted')
            $('#certificate-recipient-step').addClass('bg-primary text-white')
        }
      })
}

// Logical/driver Functions
function certificateDetailSubmit(){
  // Getting Form Value
  title = $('#certificateTitle').val()
  copy = $('#numberCopy').val()

  // Form validation
  if(title != '' && copy != ''){
    // Error effect cleaning
    $('#error-title').addClass("d-none")
    $('#error-copy').addClass("d-none")
    $('#certificateTitle').removeClass("border border-danger")
    $('#numberCopy').removeClass("border border-danger")

    // Form Transition
    certificateRecipientIn()
    
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
    // console.log(title, copy);
    $('#certificateTitleDebug').text(title)
    $('#numberCopyDebug').text(copy)
  } else {
    // Field highlighting for form validation
    if(title == ''){
      $('#error-title').removeClass("d-none")
      $('#certificateTitle').addClass("border border-danger")
    }
    if(copy == ''){
      $('#error-copy').removeClass("d-none")
      $('#numberCopy').addClass("border border-danger")
    }
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: "Make sure you've filled all the fields!"
    })
  }

}

function certificateRecipientSubmit(){
    var err = 0;
    for (let loop = 0; loop < copy; loop++) { 
        if($('#certificatee-'+loop).val() == ''){
            err += 1
            $('#certificatee-'+loop).addClass("border border-danger")

            // Debugging
            $('#errVal').text(err)
        }
        else {
            $('#certificatee-'+loop).removeClass("border border-danger")
            recipients.push($('#certificatee-'+loop).val())
        }
    }

    //Alert Error
    if(err > 0){
        recipients = []
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'You have to fill all the fields!',
        })
    } else {
    }
    configTemplateIn()
    console.log(recipients);
    
}

function uploadTemplate(){
  var fd = new FormData();
  var files = $('#file')[0].files[0];
  fd.append('file', files);

  $.ajax({
      url: 'upload.php',
      type: 'post',
      data: fd,
      contentType: false,
      processData: false,
      success: function(response){
          if(response != 0){
              alert('file uploaded');
          }
          else{
              alert('file not uploaded');
          }
      },
  });
}

