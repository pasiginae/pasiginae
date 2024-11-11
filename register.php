<?php
session_start();

if(isset($_SESSION['auth']))
{
  $_SESSION['message'] = "You are already logged In";
  header("Location: index.php");
  exit(0);
}

include "includes/header.php";


echo "<body style='background-image:url(assets/img/pasig.png);
                  background-size: cover;
                  background-position: top center;
                  position: relative;
                  z-index: 1;'>";
?>

<div class="container py-5">

    <?php include('message.php'); ?>

    <div class="row">
        <div class="container-fluid mx-auto border shadow p-4" style="background-color: white;">
            <h2 class="text-center mb-4">Register</h2>
            <hr />
            <form action="registercode.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">First Name*</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="first_name" placeholder="Enter First Name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Middle Name*</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="middle_name" placeholder="Enter Middle Name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Surname*</label>
                            <div class="col-md-8">
                                <input required type="text" class="form-control" name="surname" placeholder="Enter Surname">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Suffix*</label>
                            <div class="col-md-8">
                                <input required type="text" class="form-control" name="suffix" placeholder="Enter Suffix">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Sex*</label>
                            <div class="col-md-8">
                                <label for="">Male</label>
                                <input type="checkbox" name="sex" value="0" width="70px" height="70px" />
                                <label for="">Female</label>
                                <input type="checkbox" name="sex" value="1" width="70px" height="70px" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Username*</label>
                            <div class="col-md-8">
                                <input required type="text" class="form-control" name="username" placeholder="Enter Username">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Email*</label>
                            <div class="col-md-8">
                                <input required type="email" class="form-control" name="email" placeholder="Enter Email Address">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Phone*</label>
                            <div class="col-md-8">
                                <input required type="text" class="form-control" name="mobile_no" placeholder="Enter Phone Number">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-sm-4 col-form-label">Parish*</label>
                            <div class="col-md-8">
                                <select name="parish" placeholder="Enter Parish" required class="form-control">
                                    <option value="">--Select Parish--</option>
                                    <option value="0">St. Ignatius of Loyola Parish (Ususan, Taguig)</option>
                                    <option value="1">St. Michael the Archangel Parish (BGC, Taguig)</option>
                                    <option value="2">Sto. Rosario de Pasig Parish (Rosario, Pasig)</option>
                                    <option value="3">Sta. Rosa de Lima Parish (Bagong Ilog, Pasig)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row mb-3">
                            <label class="col-12">Address*</label>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Left Column -->
                                <div class="mb-3">
                                    <label class="form-label">Region *</label>
                                    <select name="region" class="form-control form-control-md" id="region"></select>
                                    <input type="hidden" class="form-control form-control-md" name="region_text" id="region-text" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Province *</label>
                                    <select name="province" class="form-control form-control-md" id="province"></select>
                                    <input type="hidden" class="form-control form-control-md" name="province_text" id="province-text" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Street (Required)</label>
                                    <input type="text" class="form-control form-control-md" name="street_text" id="street-text">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Right Column -->
                                <div class="mb-3">
                                    <label class="form-label">City / Municipality *</label>
                                    <select name="city" class="form-control form-control-md" id="city"></select>
                                    <input type="hidden" class="form-control form-control-md" name="city_text" id="city-text" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Barangay *</label>
                                    <select name="barangay" class="form-control form-control-md" id="barangay"></select>
                                    <input type="hidden" class="form-control form-control-md" name="barangay_text" id="barangay-text" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Zip Code*</label>
                                    <input required type="text" class="form-control" name="zip" placeholder="Enter Zip Code">
                                </div>
                            </div>
                        </div>

                        <!-- Password fields -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Password*</label>
                                <input required type="password" class="form-control" name="password" placeholder="Enter Password">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Confirm Password*</label>
                                <input required type="password" class="form-control" name="confirm_password" placeholder="Enter Confirm Password">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 offset-md-3 d-flex justify-content-between">
                        <button type="submit" name="register_btn" class="btn btn-primary">Register</button>
                        <a href="index.html" class="btn btn-outline-primary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function populate(s1,s2)
    {
        var s1 = document.getElementById(s1);
        var s2 = document.getElementById(s2);

        s2.innerHTML = "";

        if(s1.value == "metro_manila")
        {
            var optionArray = ['caloocan|Caloocan','las-pinas|Las-Pinas','makati|Makati','malabon|Malabon','mandaluyong|Mandaluyong','marikina|Marikina','muntilupa|Muntilupa','navotas|Navotas','paranaque|Paranaque','pasay|Pasay','pasig|Pasig','pateros|Pateros','quezon_city|Quezon_City','san_juan|San_Juan','taguig|Taguig','valenzuela|Valenzuela'];
        }
        else if(s1.value == 'abra')
        {
            var optionArray = ['bangued|Bangued','boliney|Boliney','bucay|Bucay','bucloc|Bucloc','daguioman|Daguioman','danglas|Danglas','dolores|Dolores','la_paz|La_Paz','lacub|Lacub','lagangilang|Lagangilang','lagayan|Lagayan','langiden|Langiden','licuan-baay|Licuan-Baay','luba|Luba','malibcong|Malibcong','manabo|Manabo','penarrubia|Penarrubia','pidigan|Pidigan','pilar|Pilar','sallapadan|Sallapadan','san_isidro|San_Isidro','san_juan|San_Juan','san_quintin|San_Quintin','tayum|Tayum','tineg|Tineg','tubo|Tubo','villaviciosa|Villaviciosa'];
        }
        for(var option in optionArray)
        {
            var pair = optionArray[option].split("|");
            var newoption = document.createElement("option");
            
            newoption.value = pair[0];
            newoption.innerHTML = pair[1];
            s2.options.add(newoption);
        }
        
    }
</script>

<?php
include "includes/footer.php";
?>