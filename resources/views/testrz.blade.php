<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Pay Now</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('./public/school')}}/images/favicon.png">
    <link href="{{asset('./public/school')}}/css/style.css" rel="stylesheet">



    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

</head>

<body class="h-100">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-11">
                    <div class="error-content">
                        <div class="card mb-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body text-center">
                                        <lottie-player src="https://assets3.lottiefiles.com/private_files/lf30_kga8p5sd.json" background="transparent" speed="1" style="width: 100%; height: 400px;" loop autoplay></lottie-player>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body  pt-5">
                                    <!-- <div class="card-body text-center pt-5"> -->
                                        <!-- <h1 class="error-text text-primary">404</h1>
                                        <h4 class="mt-4"><i class="fa fa-thumbs-down text-danger"></i> Bad Request</h4> -->
                                        <h4>About Me</h4>

                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam nihil doloremque rerum dicta obcaecati possimus, necessitatibus, rem similique veniam accusamus distinctio reiciendis voluptatibus? Magni nobis debitis ad assumenda harum perspiciatis!</p>





                                        <ul class="card-profile__info">
                                    <li class="mb-1"><strong class="text-dark mr-4">Mobile</strong> <span>01793931609</span></li>
                                    <li><strong class="text-dark mr-4">Email</strong> <span>name@domain.com</span></li>
                                </ul>



                                        <form class="mt-5 mb-5">

                                            <div class=" mb-4 mt-4"><button id="rzp-button1" class="btn btn-primary form-control">Pay Now</button>
                                            <!-- <div class="text-center mb-4 mt-4"><button id="rzp-button1" class="btn btn-primary">Pay Now</button> -->
                                                <!-- <a href="index.html" >Go to Homepage</a> -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('./public/school')}}/plugins/common/common.min.js"></script>
    <script src="{{asset('./public/school')}}/js/custom.min.js"></script>
    <script src="{{asset('./public/school')}}/js/settings.js"></script>
    <script src="{{asset('./public/school')}}/js/gleek.js"></script>
    <script src="{{asset('./public/school')}}/js/styleSwitcher.js"></script>




    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "{{ env('RAZORPAY_KEY') }}", // Enter the Key ID generated from the Dashboard
            "amount": "{{$ezorder->amount}}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "{{$ezorder->currency}}",
            "name": "My Website name",
            "description": "my web info test",
            "image": "",
            "order_id": "{{$ezorder->id}}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "handler": function(response) {
                alert(response.razorpay_payment_id);
                alert(response.razorpay_order_id);
                alert(response.razorpay_signature);
                jQuery.ajax({
                    type: 'post',
                    url: '',
                    data: "payment_id=" + response.razorpay_payment_id,
                    success: function(result) {
                        window.location.href = "";
                    }
                });
            },
            "prefill": {
                "name": "{{$user_info['name']}}",
                "email": "{{$user_info['email']}}",
                "contact": "{{$user_info['mobile']}}"
            },
            "notes": {
                "address": "Razorpay Corporate Office"
            },
            "theme": {
                "color": "#7571f9"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function(response) {
            alert(response.error.code);
            alert(response.error.description);
            alert(response.error.source);
            alert(response.error.step);
            alert(response.error.reason);
            alert(response.error.metadata.order_id);
            alert(response.error.metadata.payment_id);
        });
        document.getElementById('rzp-button1').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
        }
    </script>
</body>

</html>
