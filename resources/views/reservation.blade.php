<!DOCTYPE HTML>
<html>
@include('includes.header')
  <body>
    

    <!-- END head -->

    <section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade">
            <h1 class="heading mb-3">Reservation Form</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="index.html">Home</a></li>
              <li>&bullet;</li>
              <li>Reservation</li>
            </ul>
            @if(!Auth::check())
            <div>
      <a href="{{route('viewloginpage')}}" class="button-outline btn-dark btn btn-sm text-light" style="height:30px;padding:5px 20px;">Login</a>
      <span class="text-light"> OR </span>
      <a href="{{route('viewregisterpage')}}" class="button-outline btn-dark btn btn-sm text-light" style="height:30px;padding:5px 20px;">Register</a>
            </div>

      @endif  
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
    <!-- END section -->

    <section class="section contact-section" id="next">
      <div class="container">
        <div class="row">
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            @include('common.alert')
            <form action="{{route('CreateReservation')}}" method="post" class="bg-white p-md-5 p-4 mb-5 border">
              <div class="row">
                @csrf
                <input class="d-none" type="text" name="room_id" value="{{$id}}">
                <div class="col-md-6 form-group">
    <label class="text-black font-weight-bold" for="name">Name</label>
    @guest
        <input type="text" id="name" class="form-control" disabled>
    @else
        <input type="text" id="name" class="form-control" value="{{ Auth::user()->name }}" disabled>
    @endguest
</div>
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="phone">Phone</label>
                  <input type="text" name="phone_no" id="phone" class="form-control ">
                  @if ($errors->has('phone_no'))
                                            <span class="error text-bolder"
                                                style="margin-left: 3%; margin-left: 3%; font-size:12px;">{{ $errors->first('phone_no') }}</span>
                 @endif
                </div>
              </div>
          
              <div class="row">
    <div class="col-md-12 form-group">
        <label class="text-black font-weight-bold" for="email">Email</label>
        @guest
            <input type="email" id="email" class="form-control" disabled>
        @else
            <input type="email" id="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
        @endguest
    </div>
</div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="checkin_date">Date Check In</label>
                  <input type="text" name="checkin_date" id="checkin_date" class="form-control">
                  @if (session()->has('error1'))
                 <span style="margin-left: 3%; margin-left: 3%; font-size:12px;">
                 {{ session()->get('error1') }}
                 </span>
                 @endif
                </div>
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="checkout_date">Date Check Out</label>
                  <input type="text" name="checkout_date" id="checkout_date" class="form-control">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="adults" class="font-weight-bold text-black">Adults</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="persons" id="adults" class="form-control">
                      <option value="">1</option>
                      <option value="">2</option>
                      <option value="">3</option>
                      <option value="">4+</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="submit"  class="btn btn-primary text-white py-3 px-5 font-weight-bold">
                </div>
              </div>
            </form>

          </div>
          <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
              <div class="col-md-10 ml-auto contact-info">
                <p><span class="d-block">Address:</span> <span class="text-black"> 98 West 21th Street, Suite 721 New York NY 10016</span></p>
                <p><span class="d-block">Phone:</span> <span class="text-black"> (+1) 435 3533</span></p>
                <p><span class="d-block">Email:</span> <span class="text-black"> info@yourdomain.com</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section bg-image overlay" style="background-image: url('images/hero_4.jpg');">
        <div class="container" >
          <div class="row align-items-center">
            <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-left" data-aos="fade-up">
              <h2 class="text-white font-weight-bold">A Best Place To Stay. Reserve Now!</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right" data-aos="fade-up" data-aos-delay="200">
              <a href="reservation.html" class="btn btn-outline-white-primary py-3 text-white px-5">Reserve Now</a>
            </div>
          </div>
        </div>
      </section>

    <footer class="section footer-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Terms &amp; Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
             <li><a href="#">Rooms</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">The Rooms &amp; Suites</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Restaurant</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
            <!-- <li>198 West 21th Street, <br> Suite 721 New York NY 10016</li> -->
            <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span> <span> 198 West 21th Street, <br> Suite 721 New York NY 10016</span></p>
            <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span> <span> (+1) 435 3533</span></p>
            <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span> info@domain.com</span></p>
          </div>
          <div class="col-md-3 mb-5">
            <p>Sign up for our newsletter</p>
            <form action="#" class="footer-newsletter">
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email...">
                <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
              </div>
            </form>
          </div>
        </div>
        <div class="row pt-5">
          <p class="col-md-6 text-left">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
            
          <p class="col-md-6 text-right social">
            <a href="#"><span class="fa fa-tripadvisor"></span></a>
            <a href="#"><span class="fa fa-facebook"></span></a>
            <a href="#"><span class="fa fa-twitter"></span></a>
            <a href="#"><span class="fa fa-linkedin"></span></a>
            <a href="#"><span class="fa fa-vimeo"></span></a>
          </p>
        </div>
      </div>
    </footer>
    @include('includes.footer')
  </body>
</html>