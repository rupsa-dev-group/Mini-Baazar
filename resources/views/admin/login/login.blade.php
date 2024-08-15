<!doctype html>
<html lang="en">

<head>
    <!-- RequiBlack meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('admin_assets/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('admin_assets/plugins/notifications/css/lobibox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!--plugins-->

    <link href="{{ asset('admin_assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />

    <!-- loader-->
    <link href="{{ asset('admin_assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('admin_assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('admin_assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_assets/css/header-colors.css') }}" />
    <title>Amdash - Bootstrap 5 Admin Template</title>
    <style>
        .height-100 {
            height: 100vh
        }

        /* .card {
            width: 400px;
            border: none;
            height: 300px;
            box-shadow: 0px 5px 20px 0px #d2dae3;
            z-index: 1;
            display: flex;
            justify-content: center;
            align-items: center
        } */

        .card h6 {
            color: Black;
            font-size: 20px
        }

        .inputs input {
            width: 40px;
            height: 40px
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0
        }


        .form-control:focus {
            box-shadow: none;
            border: 2px solid Black
        }

        .validate {
            border-radius: 20px;
            height: 40px;
            background-color: Black;
            border: 1px solid Black;
            width: 140px
        }
    </style>
</head>

<body>

    <div class="wrapper">

        <div class="">
            <div class="page-content">

                <div class="row">
                    <div class="col-xl-5 mx-auto">

                        <div class="card border-top border-0 border-4 border-dark">
                            <div class="card-body p-5">
                                <div class="card-title text-center"><i class="bx bxs-user-circle text-dark font-50"></i>
                                    <h5 class="mb-5 mt-2 text-dark">Admin Login</h5>
                                </div>
                                <hr>
                                {{-- <div id="otp_requst">
                                    <form id="opt_request_from" class="row g-3">
                                        <div class="col-12">
                                            <label for="inputLastEnterUsername" class="form-label">Enter Phone</label>
                                            <div class="input-group input-group-lg"> <span
                                                    class="input-group-text bg-transparent"><i
                                                        class='bx bxs-phone'></i></span>
                                                <input type="text" class="form-control border-start-0"
                                                    id="inputLastEnterUsername" placeholder="Enter Phone Number" />
                                            </div>
                                        </div>



                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-dark btn-lg px-5"><i
                                                        class='bx bxs-lock-open'></i>Requst OTP</button>
                                            </div>
                                        </div>

                                    </form>
                                </div> --}}

                                <div class="otp_verify">
                                    <form id="opt_request_from" class="row g-3">
                                        <div class="col-12">
                                            <label for="inputLastEnterUsername" class="form-label">Phone Number</label>
                                            <div class="input-group input-group-lg"> <span
                                                    class="input-group-text bg-transparent"><i
                                                        class='bx bxs-phone'></i></span>
                                                <input type="text" class="form-control border-start-0"
                                                    placeholder="898989833" @disabled(true) />
                                            </div>
                                        </div>
                                        <div class="col-12">

                                            <div id="otp"
                                                class="inputs d-flex flex-row justify-content-center mt-2">
                                                <input class="m-2 text-center form-control rounded" type="text"
                                                    id="first" maxlength="1" /> <input
                                                    class="m-2 text-center form-control rounded" type="text"
                                                    id="second" maxlength="1" /> <input
                                                    class="m-2 text-center form-control rounded" type="text"
                                                    id="third" maxlength="1" /> <input
                                                    class="m-2 text-center form-control rounded" type="text"
                                                    id="fourth" maxlength="1" /> <input
                                                    class="m-2 text-center form-control rounded" type="text"
                                                    id="fifth" maxlength="1" /> <input
                                                    class="m-2 text-center form-control rounded" type="text"
                                                    id="sixth" maxlength="1" />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <div class="container">
                                                <div id="countdown">
                                                    <ul>
                                                      <li><span id="days"></span>days</li>
                                                      <li><span id="hours"></span>Hours</li>
                                                      <li><span id="minutes"></span>Minutes</li>
                                                      <li><span id="seconds"></span>Seconds</li>
                                                    </ul>
                                                  </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-end">	<a href="javascript:;">Re Send 
                                            <i class="text-primary " data-feather="refresh-ccw"></i>
                                        
                                        </a>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-dark btn-lg px-5"><i
                                                        class='bx bxs-lock-open'></i>Sing Up</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>


    </div>


    <!--end switcher-->
    <!-- Bootstrap JS -->
    <script src="{{ asset('admin_assets/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('admin_assets/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!--app JS-->
    <script src="{{ asset('admin_assets/assets/js/app.js') }}"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
		feather.replace()
	</script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {

            function OTPInput() {
                const inputs = document.querySelectorAll('#otp > *[id]');
                for (let i = 0; i < inputs.length; i++) {
                    inputs[i].addEventListener('keydown', function(event) {
                        if (event.key === "Backspace") {
                            inputs[i].value = '';
                            if (i !== 0) inputs[i - 1].focus();
                        } else {
                            if (i === inputs.length - 1 && inputs[i].value !== '') {
                                return true;
                            } else if (event.keyCode > 47 && event.keyCode < 58) {
                                inputs[i].value = event.key;
                                if (i !== inputs.length - 1) inputs[i + 1].focus();
                                event.preventDefault();
                            } else if (event.keyCode > 64 && event.keyCode < 91) {
                                inputs[i].value = String.fromCharCode(event.keyCode);
                                if (i !== inputs.length - 1) inputs[i + 1].focus();
                                event.preventDefault();
                            }
                        }
                    });
                }
            }
            OTPInput();
        });
    </script>

    <script>(function () {
        const second = 1000,
              minute = second * 60,
              hour = minute * 60,
              day = hour * 24;
      
        //I'm adding this section so I don't have to keep updating this pen every year :-)
        //remove this if you don't need it
        let today = new Date(),
            dd = String(today.getDate()).padStart(2, "0"),
            mm = String(today.getMonth() + 1).padStart(2, "0"),
            yyyy = today.getFullYear(),
            nextYear = yyyy + 1,
            dayMonth = "09/30/",
            birthday = dayMonth + yyyy;
        
        today = mm + "/" + dd + "/" + yyyy;
        if (today > birthday) {
          birthday = dayMonth + nextYear;
        }
        //end
        
        const countDown = new Date(birthday).getTime(),
            x = setInterval(function() {    
      
              const now = new Date().getTime(),
                    distance = countDown - now;
      
              document.getElementById("days").innerText = Math.floor(distance / (day)),
                document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);
      
              //do something later when date is reached
              if (distance < 0) {
                document.getElementById("headline").innerText = "It's my birthday!";
                document.getElementById("countdown").style.display = "none";
                document.getElementById("content").style.display = "block";
                clearInterval(x);
              }
              //seconds
            }, 0)
        }());</script>
</body>

</html>
