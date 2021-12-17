@include('user.partials.header')

   
     

  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
         
          @if(Route::has('login')) 
          @auth
          <li class="breadcrumb-item"><a href="{{route('redirectohome') }}">Home</a></li>
          @else
          <li class="breadcrumb-item"><a href="{{ route('userindex') }}">Home</a></li>
          @endauth
          @endif
            <li class="breadcrumb-item {{ Request::is('contact_us') ? 'active' : ''}}" aria-current="page">Contact</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Contact</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Get in Touch</h1>

      <form class="contact-form mt-5" method="post" action="{{route('contactusemail') }}">
        
      @csrf
      
      <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="fullName">Name</label>
            <input type="text"  name="name"id="fullName" class="form-control" placeholder="Full name.." value="{{ old('name') }}">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Email</label>
            <input type="text" name= "email" id="emailAddress" class="form-control" placeholder="Email address.." value="{{ old('email') }}">
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="subject">Subject</label>
            <input type="text"  name="subject" id="subject" class="form-control" placeholder="Enter subject.." value="{{ old('subject') }}">
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="message">Message</label>
            <textarea id="message" name="message" class="form-control" rows="8" placeholder="Enter Message..">{{ old('message') }}</textarea>
          </div>
        </div>
       

        <input type="submit" class="btn btn-primary wow zoomIn" value="Send Message" >
      </form>
    </div>
  </div>


  <div class="page-section banner-home bg-image" style="background-image: url(../assets/img/banner-pattern.svg);">
    <div class="container py-5 py-lg-0">
      <div class="row align-items-center">
        <div class="col-lg-4 wow zoomIn">
          <div class="img-banner d-none d-lg-block">
            <img src="../assets/img/mobile_app.png" alt="">
          </div>
        </div>
        <div class="col-lg-8 wow fadeInRight">
          <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
          <a href="#"><img src="../assets/img/google_play.svg" alt=""></a>
          <a href="#" class="ml-2"><img src="../assets/img/app_store.svg" alt=""></a>
        </div>
      </div>
    </div>
  </div> <!-- .banner-home -->


  @include('user.partials.footer')