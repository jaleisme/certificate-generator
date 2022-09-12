<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- Local CSS (Static) -->
    <link rel="stylesheet" href="template/assets/css/bd-wizard.css">
    <title>Jaleisme's Certificate Generator</title>
  </head>
  <body>
    <!-- The Header goes here -->
    <!-- <header>
      <nav class="navbar navbar-expand-sm navbar-light bg-white mb-lg-3">
        <div class="container">
          <a class="navbar-brand logo" href="/">Jaleisme's Certificate Generator</a>
          <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Find Certificate</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header> -->

    <!-- The Main wizard goes here -->
    <main class="mt-5">
      <div class="container">
          <div id="wizard">
            <!-- Choose Type -->
            <h3>Step 1 Select Certificate type</h3>
            <section>
              <h5 class="bd-wizard-step-title">Step 1</h5>
              <h2 class="section-heading">Select Certificate Type </h2>
              <p>Choose different certificate type where you can pick between name only, name with role, or name with grade certificate.</p>
              <div class="purpose-radios-wrapper">
                  <div class="purpose-radio">
                      <input type="radio" name="purpose" id="branding" class="purpose-radio-input" value="Branding" checked>
                    <label for="branding" class="purpose-radio-label">
                      <span class="label-icon">
                        <img src="template/assets/images/icon_branding.svg" alt="branding" class="label-icon-default">
                        <img src="template/assets/images/icon_branding_green.svg" alt="branding" class="label-icon-active">
                      </span>
                      <span class="label-text">Name Only</span>
                    </label>
                    </div>
                    <div class="purpose-radio">
                      <input type="radio" name="purpose" id="mobile-design" class="purpose-radio-input" value="Moile Design">
                      <label for="mobile-design" class="purpose-radio-label">
                        <span class="label-icon">
                          <img src="template/assets/images/icon_mobile_design.svg" alt="branding" class="label-icon-default">
                          <img src="template/assets/images/icon_mobile_design_green.svg" alt="branding" class="label-icon-active">
                        </span>
                        <span class="label-text">Name with Role</span>
                      </label>
                    </div>
                    <div class="purpose-radio">
                        <input type="radio" name="purpose" id="web-design" class="purpose-radio-input" value="Web Design">
                        <label for="web-design" class="purpose-radio-label">
                          <span class="label-icon">
                            <img src="template/assets/images/icon_web_design.svg" alt="branding" class="label-icon-default">
                            <img src="template/assets/images/icon_web_design_green.svg" alt="branding" class="label-icon-active">
                          </span>
                          <span class="label-text">Name with Grade</span>
                        </label>
                      </div>
              </div>
            </section>

            <h3>Step 2 Customize Template</h3>
            <section>
              <h5 class="bd-wizard-step-title">Step 2</h5>
              <h2 class="section-heading">Customize Template</h2>
              <p>Upload your template and customize the position of the picked element(s).</p>
              <div class="row">
                <!-- Form Column -->
                <div class="col-6">
                  <div class="form-group">
                    <label for="firstName" class="sr-only">First Name</label>
                    <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name">
                  </div>
                </div>
                <div class="col-6">

                </div>
              </div>
              <div class="form-group">
                <label for="firstName" class="sr-only">First Name</label>
                <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name">
              </div>
              <div class="form-group">
                <label for="lastName" class="sr-only">Last Name</label>
                <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name">
              </div>
              <div class="form-group">
                <label for="phoneNumber" class="sr-only">Phone Number</label>
                <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" placeholder="Phone Number">
              </div>
              <div class="form-group">
                <label for="emailAddress" class="sr-only">Email Address</label>
                <input type="email" name="emailAddress" id="emailAddress" class="form-control" placeholder="Email Address">
              </div>
            </section>
            <h3>Step 3 Title</h3>
            <section>
                <h5 class="bd-wizard-step-title">Step 3</h5>
                <h2 class="section-heading mb-5">Review your Details and Submit</h2>
                <h6 class="font-weight-bold">Select business type</h6>
                <p class="mb-4" id="business-type">Branding</p>
                <h6 class="font-weight-bold">Enter your Account Details</h6>
                <p class="mb-4"><span id="enteredFirstName">Cha</span> <span id="enteredLastName">Ji-Hun C</span> <br>
                    Phone: <span id="enteredPhoneNumber">+230-582-6609</span> <br>
                    Email: <span id="enteredEmailAddress">willms_abby@gmail.com</span></p>

            </section>
          </div>
      </div>
    </main>

      <footer>  
          <center><p>Built with <span class="text-danger">&#10084;</span> by <a href="jaleisme.github.io">Jaleisme</a></p></center>
      </footer>

    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS (CDN) -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- Local JS (STATIC) -->
    <script src="template/assets/js/jquery.steps.min.js"></script>
    <script src="template/assets/js/bd-wizard.js"></script>
  </body>
</html>
