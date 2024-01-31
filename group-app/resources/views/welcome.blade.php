@extends('layouts.app')

@section('content')
    <body class="antialiased">
        <div class="site-wrap">
        {{-- <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"> --}}

            <div class="row align-items-center">
          
               
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    
                
    
                 
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href=" " class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 pl-0.5">Home</a>

                        <a href=" " class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 pl-0.5">About</a>

                        <a href=" " class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 pl-0.5">Contact</a>


                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 pl-0.5">Log in</a>

                       
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 pl-0.5">Register</a>
                        @endif
                    @endauth

                    
                  
                </div>
            @endif

           
        </div>
    
        <div class="site-blocks-cover overlay" style="background-image: url(frontend/assets/images/hero-1.jpg);" data-aos="fade" id="home-section">


            <div class="container">
              <div class="row align-items-center justify-content-center">
                <div class="col-md-6 mt-lg-5 text-center">
                  <h1>Rent and hire land properties</h1>
                  <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam assumenda ea quo cupiditate facere deleniti fuga officia.</p>
                  
                </div>
              </div>
            </div>
      
            <a href="#howitworks-section" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
          </div>  
      
          
          <div class="py-5 bg-light site-section how-it-works" id="howitworks-section">
            <div class="container">
              <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                  <h2 class="section-title mb-3">How It Works</h2>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 text-center">
                  <div class="pr-5">
                    <span class="custom-icon flaticon-house text-primary"></span>
                    <h3 class="text-dark">Find Property.</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                  </div>
                </div>
      
                <div class="col-md-4 text-center">
                  <div class="pr-5">
                    <span class="custom-icon flaticon-coin text-primary"></span>
                    <h3 class="text-dark">Rent/Hire Property.</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                  </div>
                </div>
      
                <div class="col-md-4 text-center">
                  <div class="pr-5">
                    <span class="custom-icon flaticon-home text-primary"></span>
                    <h3 class="text-dark">Make Investment.</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                  </div>
                </div>
              </div>
            </div>  
          </div>
      
          <div class="site-section" id="properties-section">
            <div class="container">
              <div class="row mb-5 align-items-center">
                <div class="col-md-7 text-left">
                  <h2 class="section-title mb-3">Properties</h2>
                </div>
                <div class="col-md-5 text-left text-md-right">
                  <div class="custom-nav1">
                    <a href="#" class="custom-prev1">Previous</a><span class="mx-3">/</span><a href="#" class="custom-next1">Next</a>
                  </div>
                </div>
              </div>
      
              <div class="owl-carousel nonloop-block-13 mb-5">
      
                <div class="property">
                  <a href="property-single.html">
                    <img src="{{ asset('frontend/assets/images/property_1.jpg') }}" alt="Image" class="img-fluid">
                  </a>
                  <div class="prop-details p-3">
                    <div><strong class="price">10,000/=</strong></div>
                    <div class="mb-2 d-flex justify-content-between">
                      <span class="w border-r">Agricultural</span> 
                      <span class="w border-r">Kisii</span>
                      <span class="w border-r"> 10 acres</span>
                    </div>
                    
                  </div>
                </div>
      
                <div class="property">
                  <a href="property-single.html">
                    <img src="{{ asset('frontend/assets/images/property_2.jpg') }}" alt="Image" class="img-fluid">
                  </a>
                  <div class="prop-details p-3">
                    <div><strong class="price">4,000</strong></div>
                    <div class="mb-2 d-flex justify-content-between">
                      <span class="w border-r">Turkana</span> 
                      <span class="w border-r">Agricultural</span>
                      <span class="w">5 acres.</span>
                    </div>
                   
                  </div>
                </div>
      
                <div class="property">
                  <a href="property-single.html">
                    <img src="{{ asset('frontend/assets/images/property_3.jpg') }}" alt="Image" class="img-fluid">
                  </a>
                  <div class="prop-details p-3">
                    <div><strong class="price">12,000</strong></div>
                    <div class="mb-2 d-flex justify-content-between">
                      <span class="w border-r">Norflock hotel</span> 
                      <span class="w border-r">Weddings</span>
                     
                    </div>
                    <div>480 12th, Unit 14, San Francisco, CA</div>
                  </div>
                </div>
      
                <div class="property">
                  <a href="property-single.html">
                    <img src="{{ asset('frontend/assets/images/property_4.jpg') }}" alt="Image" class="img-fluid">
                  </a>
                  <div class="prop-details p-3">
                    <div><strong class="price">10,000</strong></div>
                    <div class="mb-2 d-flex justify-content-between">
                      <span class="w border-r">Kisii</span> 
                      <span class="w border-r">Commercial</span>
                      <span class="w">8acres</span>
                      
                    </div>
                    
                  </div>
                </div>
      
              </div>
              <div class="row justify-content-center">
                <div class="col-md-4">
                  <a href=" " class="btn btn-primary btn-block">View All Property Listings</a>
                </div>
              </div>
            </div>
          </div>
      
       
      
          <section class="site-section" id="about-section">
            <div class="container">
              
              <div class="row">
                <div class="col-lg-6">
      
                  <div class="owl-carousel slide-one-item-alt">
                    <img src="{{ asset('frontend/assets/images/property_1.jpg') }}" alt="Image" class="img-fluid">
                    <img src="{{ asset('frontend/assets/images/property_2.jpg') }}" alt="Image" class="img-fluid">
                    <img src="{{ asset('frontend/assets/images/property_3.jpg') }}" alt="Image" class="img-fluid">
                    <img src="{{ asset('frontend/assets/images/property_4.jpg') }}" alt="Image" class="img-fluid">
                  </div>
                  <div class="custom-direction">
                    <a href="#" class="custom-prev">Prev</a><a href="#" class="custom-next">Next</a>
                  </div>
      
                </div>
                <div class="col-lg-5 ml-auto">
                  
                  <h2 class="section-title mb-3">The best site to rent and hire land</h2>
                      <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                      <p>Est qui eos quasi ratione nostrum excepturi id recusandae fugit omnis ullam pariatur itaque nisi voluptas impedit  Quo suscipit omnis iste velit maxime.</p>
      
                      <ul class="list-unstyled ul-check success">
                        <li>Placeat maxime animi minus</li>
                        <li>Dolore qui placeat maxime</li>
                        <li>Consectetur adipisicing</li>
                        <li>Lorem ipsum dolor</li>
                        <li>Placeat molestias animi</li>
                      </ul>
      
                      <p><a href="#" class="btn btn-primary mr-2 mb-2">Learn More</a></p>
                  
                </div>
              </div>
            </div>
          </section>
      
          
      
          <section class="site-section border-bottom bg-light" id="services-section">
            <div class="container">
              <div class="row mb-5">
                <div class="col-12 text-center">
                  <h2 class="section-title mb-3">Services</h2>
                </div>
              </div>
              <div class="row align-items-stretch">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
                  <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class="text-primary flaticon-house"></span></div>
                    <div>
                      <h3>Search Property</h3>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                      <p><a href="#">Learn More</a></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
                  <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class="text-primary flaticon-coin"></span></div>
                    <div>
                      <h3>Rent/Hire Property</h3>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                      <p><a href="#">Learn More</a></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
                  <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class="text-primary flaticon-home"></span></div>
                    <div>
                      <h3>Invest</h3>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                      <p><a href="#">Learn More</a></p>
                    </div>
                  </div>
                </div>
      
      
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="300">
                  <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class="text-primary flaticon-flat"></span></div>
                    <div>
                      <h3>Post Properties</h3>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                      <p><a href="#">Learn More</a></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="400">
                  <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class="text-primary flaticon-location"></span></div>
                    <div>
                      <h3>Property Locator</h3>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                      <p><a href="#">Learn More</a></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="500">
                  <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class="text-primary flaticon-mobile-phone"></span></div>
                    <div>
                      <h3>Stated Apps</h3>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                      <p><a href="#">Learn More</a></p>
                    </div>
                  </div>
                </div>
      
              </div>
            </div>
          </section>
      
         
      
         
      
         
      
      
          <section class="site-section bg-light bg-image" id="contact-section">
            <div class="container">
              <div class="row mb-5">
                <div class="col-12 text-center">
                  <!-- <h3 class="section-sub-title">Get</h3> -->
                  <h2 class="section-title mb-3">Contact Us</h2>
                </div>
              </div>
              <div class="row">
                <div class="col-md-7 mb-5">
      
                  
      
                  <form action="#" class="p-5 bg-white">
                    
                    <h2 class="h4 text-black mb-5">Contact Form</h2> 
      
                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">First Name</label>
                        <input type="text" id="fname" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Last Name</label>
                        <input type="text" id="lname" class="form-control">
                      </div>
                    </div>
      
                    <div class="row form-group">
                      
                      <div class="col-md-12">
                        <label class="text-black" for="email">Email</label> 
                        <input type="email" id="email" class="form-control">
                      </div>
                    </div>
      
                    <div class="row form-group">
                      
                      <div class="col-md-12">
                        <label class="text-black" for="subject">Subject</label> 
                        <input type="subject" id="subject" class="form-control">
                      </div>
                    </div>
      
                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="message">Message</label> 
                        <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                      </div>
                    </div>
      
                    <div class="row form-group">
                      <div class="col-md-12">
                        <input type="submit" value="Send Message" class="btn btn-primary btn-md text-white">
                      </div>
                    </div>
      
        
                  </form>
                </div>
                <div class="col-md-5">
                  
                  
                </div>
              </div>
            </div>
          </section>
    </div>
        
    </body>
@endsection
