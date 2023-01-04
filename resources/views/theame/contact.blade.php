<!-- CONTACT -->
<style>
    .captcha span img{
        width: 80% !important;
    }
</style>
<section class="contact py-5" id="contact">
      <div class="container">
        <div class="row">

          <div class="col-lg-5 mr-lg-5 col-12">
            <div class="google-map w-100">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3695.2717149620016!2d87.92531471541383!3d22.153726853796694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a02eb6bf45710cd%3A0x66ce2be95685043e!2sWrong%20Code!5e0!3m2!1sen!2sin!4v1672835379401!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="contact-info d-flex justify-content-between align-items-center py-4 px-lg-5">
                <div class="contact-info-item">
                  <h3 class="mb-3 text-white">Contact Now</h3>
                  <!-- <p class="footer-text mb-0">+918927276802</p> -->
                  <p class="footer-text mb-0"><a href="tel:+918927276802">+918927276802</a></p>
                  <p><a href="mailto:hello@company.co">hello@company.co</a></p>
                </div>

                <!-- <ul class="social-links">
                     <li><a href="#" class="uil uil-dribbble" data-toggle="tooltip" data-placement="left" title="Dribbble"></a></li>
                     <li><a href="#" class="uil uil-instagram" data-toggle="tooltip" data-placement="left" title="Instagram"></a></li>
                     <li><a href="#" class="uil uil-youtube" data-toggle="tooltip" data-placement="left" title="Youtube"></a></li>
                </ul> -->
            </div>
          </div>

          <div class="col-lg-6 col-12">
            <div class="contact-form">
              <h2 class="mb-4">Let's have a conversation</h2>

              <form action="{{route('contactForm')}}" method="post" >
                @csrf
                <div class="row">
                  <div class="col-lg-6 col-12">
                    <input type="text" class="form-control" name="name" placeholder="Your Name" id="name">
                  </div>

                  <div class="col-lg-6 col-12">
                    <input type="email" class="form-control" name="email" placeholder="Email" id="email">
                  </div>
                  <div class="col-lg-12 col-12">
                    <input type="phone_number" class="form-control" name="phone_number" placeholder="Mobile NO" id="mobile">
                  </div>

                  <div class="col-12">
                    <textarea name="message" rows="2" class="form-control" id="message" placeholder="Message"></textarea>
                  </div>



                  <div class="col-lg-6 col-12">
                    <div class="captcha" style="width: 100% !important;">
                        <span>{!! captcha_img() !!}</span>
                        <button type="button" class="btn btn-danger" class="reload" id="reload">↻</button>
                    </div>
                </div>

                    <div class="col-lg-6 col-12">
                        <input type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                    </div>

                  <div class="ml-lg-auto col-lg-5 col-12">
                    <input type="submit" class="form-control submit-btn" value="Send Button">
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </section>


    @section('theameScript')




    <script>
        $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: '{{route("reloadcaptcha")}}',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>


@endsection
