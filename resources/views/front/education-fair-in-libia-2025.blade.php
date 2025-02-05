@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('main-section')
  <section class="banner-section">
    <div id="google_translate_element"></div>
    <div class="container">
      <h2 class="banner-titles">Where Ambitions Meet Opportunities: Malaysian Universities Education & Training Fair 2025
      </h2>
      <div class="row">
        <!-- class="carousel slide" data-ride="carousel" -->
        <div id="carouselExampleControls">
          <div class="carousel-inner">
            @php
              $i = 1;
            @endphp
            @foreach ($pageDetail->banners as $row)
              <div class="carousel-item {{ $i == '1' ? 'active' : '' }}">
                <!-- <img class="d-block w-100" src="{{ asset($row->file_path) }}" alt="{{ $row->alt_text }}"> -->
                <video autoplay muted loop>
                  <source src="/front/video/videoflag.mp4" type="video/mp4">
                  Your browser does not support the video tag.
                </video>

              </div>
              @php
                $i++;
              @endphp
            @endforeach;
          </div>

        </div>
      </div>
      <h2 class="bannerma">
        malaysian universities education and training fair held in tripoli, libya
        hosted by ministry of higher education and scientific research of libya
        organized by malaysian export academy (mexa)
        supported by national association of private educational institutions, malaysia (napei)

      </h2>
    </div>

  </section>

  <!-- Modal -->
  <div class="modal courses-modal  fade" id="courseListModaldfdf" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Participating Universities</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <footer class="dark-footer skin-dark-footer pt-3 rounded">
            <div class="container-fluid">
              <div class="row">

                @foreach ($result as $data)
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-4">
                    <div class="footer-widget">
                      <span class="widget-title">{{ $data['category_name'] }}</span>
                      <ul class="footer-menu">
                        @foreach ($data['specializations'] as $specialization_name)
                          <li> <i class="ti-arrow-right"></i> {{ $specialization_name }}</li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                @endforeach

              </div>
            </div>

          </footer>
        </div>

      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal coursemodal  fade" id="courseListModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Participating Universities</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">

              <div class="col-md-6 col-sm-12 col-12 mb-4">
                <h5> under graduate, post graduate, phd </h5>
                <ul>
                  <li>Applied and Pure Sciences</li>
                  <li>Architecture and Construction</li>
                  <li>Business and Management</li>
                  <li>Computer Science and IT</li>
                  <li>Creative Arts and Design</li>
                  <li>Education and Training</li>
                  <li>Engineering</li>
                  <li>Health and Medicine</li>
                  <li>Humanities</li>
                  <li>Law</li>
                  <li>Personal Care and Fitness</li>
                  <li>Social Studies and Media</li>
                  <li>Travel and Hospitality</li>
                </ul>
              </div>
              <div class="col-md-6 col-sm-12 col-12 mb-4">
                <h5>Engineering</h5>
                <ul>
                  <li>ROBOTIC</li>
                  <li>Aeronautical Engineering</li>
                  <li>Aeronautics and Astronautics</li>
                  <li>Air Conditioning and Refrigeration</li>
                  <li>Aircraft Engineering</li>
                  <li>Automation Engineering</li>
                  <li>Automotive</li>
                  <li>Aviation and Aircraft Maintenance</li>
                  <li>Aviation Management</li>
                  <li>Biomedical Engineering</li>
                  <li>Bioprocess Engineering</li>
                  <li>Chemical Engineering</li>
                  <li>Civil Engineering</li>
                  <li>Computer Engineering</li>
                  <li>Computer Systems</li>
                  <li>Data Engineering</li>
                  <li>Electrical and Electronics Engineering</li>
                  <li>Electrical Engineering</li>
                  <li>Electronic Engineering</li>
                  <li>Energy</li>
                  <li>Engineering</li>
                  <li>Environmental Engineering</li>
                  <li>Financial Engineering</li>
                  <li>Forensic Engineering</li>
                  <li>General Engineering and Technology</li>
                  <li>Geomatic</li>
                  <li>Industrial Automation And Robotics</li>
                  <li>Industrial Engineering</li>
                  <li>Industrial Logistic</li>
                  <li>Industrial Management</li>
                  <li>Industrial Power</li>
                  <li>Informatics Engineering</li>
                  <li>Infrastructure Management</li>
                  <li>Instrumentation and Control Engineering</li>
                  <li>Manufacturing and Production</li>
                  <li>Marine Engineering</li>
                  <li>Materials</li>
                  <li>Materials Engineering</li>
                  <li>Mechanical Engineering</li>
                  <li>Mechatronics Engineering</li>
                  <li>Medical Engineering</li>
                  <li>Metallurgy</li>
                  <li>Nanotechnology</li>
                  <li>Nautical Engineering</li>
                  <li>Nuclear Engineering</li>
                  <li>Petroleum Engineering</li>
                  <li>Petroleum Geoscience</li>
                  <li>Polymer Engineering</li>
                  <li>Power & Machine</li>
                  <li>Quality Control</li>
                  <li>Quantity Surveying</li>
                  <li>Railway Technology</li>
                  <li>Software Engineering</li>
                  <li>Structural Engineering</li>
                  <li>Sustainable Energy</li>
                  <li>Telecommunications</li>
                  <li>Vehicle Engineering</li>
                  <li>Water and Wastewater System</li>
                  <li>Water Engineering and Energy</li>
                  <li>Welding</li>
                </ul>
              </div>

              <div class="col-md-6 col-sm-12 col-12 mb-4">
                <h5>Health and Medicine</h5>
                <ul>
                  <li>Acupuncture</li>
                  <li>Anaesthesiology</li>
                  <li>Anatomy</li>
                  <li>Chinese Medicine</li>
                  <li>Chiropractic</li>
                  <li>Cosmetics</li>
                  <li>Counselling</li>
                  <li>Dentistry</li>
                  <li>Environment Health</li>
                  <li>Gynaecology</li>
                  <li>Health and Safety</li>
                  <li>Health Science</li>
                  <li>Health Studies</li>
                  <li>Homeopathic</li>
                  <li>Internal Medicine</li>
                  <li>Laboratory Technology</li>
                  <li>Medical Imaging</li>
                  <li>Medical Imaging & Radiotherapy</li>
                  <li>Medical Science</li>
                  <li>Medicine</li>
                  <li>Midwifery</li>
                  <li>Nursing</li>
                  <li>Nutrition and Health</li>
                  <li>Nutrition With Wellness</li>
                  <li>Occupational Therapy</li>
                  <li>Ophthalmology</li>
                  <li>Optometry</li>
                  <li>Orthopaedic</li>
                  <li>Otorhinolaryngology-Head and Neck Surgery</li>
                  <li>Paramedical</li>
                  <li>Pharmaceutical Chemistry</li>
                  <li>Pharmaceutical Sciences</li>
                  <li>Pharmaceuticals Technology</li>
                  <li>Pharmacy</li>
                  <li>Physics</li>
                  <li>Physiology</li>
                  <li>Physiotherapy</li>
                  <li>Polygraph Examiner's Course</li>
                  <li>Psychiatry</li>
                  <li>Psychology</li>
                  <li>Public Health</li>
                  <li>Radiology</li>
                  <li>Surgery</li>
                  <li>Ultrasound</li>
                </ul>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <section class="Sureworks">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4 ">
          <a href="#" data-toggle="modal" data-target="#courseListModal">
            <div class="flex flex-col all-flexx gap-3 items-center text-center h-100 ">
              <div class="imgflx">
                <img src="{{ url('/') }}/front/assets/images/courses.png" alt="">
              </div>
              <h2 class="text-xl font-bold">Courses</h2>
              <p>Discover a diverse range of programs from undergraduate to postgraduate degrees, explore options in
                medicine, engineering, business, IT, and more.</p>
            </div>
          </a>
          {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#courseListModal">courses</button> --}}
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4 ">
          <!-- <a href="{{ url(url()->current() . '/institutions') }}"> -->
          <div class="flex flex-col all-flexx gap-3 h-100 items-center text-center" data-toggle="modal"
            data-target=".bd-example-modal-lg">
            <div class="imgflx">
              <img src="{{ url('/') }}/front/assets/images/institution.png" alt="">
            </div>
            <h2 class="text-xl font-bold">Institutions</h2>
            <p>Connect with globally recognized Malaysian universities and institutions renowned for academic
              excellence.
            </p>
          </div>
          <!-- </a> -->

        </div>
        <!-- ------------------------------------- -->

        <!-- Large modal -->

        <div class="modal institution-modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
          aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Participating Universities </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row-institutes">
                  <div class="row align-items-center">
                    @foreach ($pageDetail->universities as $row)
                      <div class="col-12 col-sm-6 col-md-6 mb-4">
                        <div class="d-flex  align-items-center flex-column istitue-gap">
                          <div class="institues-img">
                            <img src="{{ asset($row->university->logo_path) }}" class="img-fluid"
                              alt="{{ $row->university->name }}">
                          </div>
                          <div class="universitynames">
                            <h2>{{ $row->university->name }}</h2>

                          </div>
                        </div>

                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- -------------------------------  -->
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4 ">
          <div class="flex flex-col all-flexx gap-3 h-100 items-center text-center" data-toggle="modal"
            data-target="#exampleModal">
            <div class="imgflx">
              <img src="{{ url('/') }}/front/assets/images/scholarship.png" alt="">
            </div>
            <h2 class="text-xl font-bold">Scholarships</h2>
            <p>Exclusive scholarship opportunities for Libyan students sponsored by the Libyan Government.</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal scholarship-modal  fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <button type="button" class="close whencloses " data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="scholarship-body">
            <img src="/front/assets/images/scholarship-modal.png" class="imagesfront" alt="">
            <p>The Education Fair is a pioneering event designed to connect Libyan students with representatives from
              prestigious universities from Malaysia.
              Sponsored by the Libyan Government, this Education Fair provides students with invaluable opportunities to
              explore international academic pathways, secure scholarships, and take significant steps toward fulfilling
              their educational aspirations.
              <br>
              The Education Fair is a great way for students to make well-informed decisions about studying abroad while
              gaining direct access to important resources and experts.
            </p>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <section class="registrations-fomrs" id="register">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-4">
          <div class="fair-details">
            <h2 class="main-faris">
              Malaysian Universities Education & Training Fair 2025 </h2>

            <ul class="set_uls">
              <li><b><i class="fa fa-map-pin" aria-hidden="true"></i>
                  Venue</b> <span>:</span> Libyan Academy for Postgraduate Studies, Tripoli, Libya</li>
              <li><b><i class="fa fa-calendar" aria-hidden="true"></i>Date</b> <span>:</span> 22nd & 23rd February 2025
              </li>
              <li><b><i class="fa fa-clock-o" aria-hidden="true"></i>
                  Time</b> <span>:</span> 9:30 AM – 1:00 PM & 4:00 PM – 8:00 PM</li>
            </ul>
            <div class="imgsfaird">
              <img src="/front/assets/images/libya-malaysia.png" class="imgsfairs" alt="">
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-4 ">

          @if (session()->has('smsg'))
            <div
              class="alert alert-success alert-dismissible d-flex justify-content-between align-items-center errorshow"
              role="alert">
              <h6 class="mb-0">{{ session()->get('smsg') }}</h6>
              <button type="button" class="btn-close alert alert-success mb-0 p-0 " data-bs-dismiss="alert"
                aria-label="Close">
                <i class="fa fa-times cclose" aria-hidden="true"></i>

              </button>

            </div>
          @endif
          @if (session()->has('emsg'))
            <div class="alert alert-danger alert-dismissible d-flex justify-content-between align-items-center errorshow"
              role="alert">
              <h6 class="mb-0">{{ session()->get('smsg') }}</h6>
              <button type="button" class="btn-close alert alert-danger mb-0 p-0" data-bs-dismiss="alert"
                aria-label="Close">

                <i class="fa fa-times cclose" aria-hidden="true"></i>

              </button>
            </div>
          @endif
          <div class="all-forms main-modals">
            <h2 class="new-regist">Register Now</h2>
            <form class="s12 f" action="{{ route('libia.register') }}" method="post">
              @csrf
              <input class="mt-0" type="hidden" name="source" value="Education Malaysia - Libia Landing Page">
              <input class="mt-0" type="hidden" name="source_path" value="{{ url()->current() }}">
              <input class="mt-0" type="hidden" name="return_path" value="{{ url()->current() }}">

              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <input name="name" class="form-control" type="text" placeholder="Full Name"
                      pattern="[a-zA-Z'-'\s\u0600-\u06FF]*" value="{{ old('name', '') }}" required>

                    @error('name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6  col-sm-12">
                  <div class="form-group">
                    <input name="email" class="form-control" type="email" placeholder="Personal Email Address"
                      value="{{ old('email', '') }}" required>
                    @error('email')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="form-group">
                    <select name="c_code" id="countryCode" class="form-control" required>
                      <option value="218" {{ old('c_code') == 218 ? 'selected' : '' }}>
                        +218 (State of Libya)
                      </option>
                    </select>
                    @error('c_code')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-12">
                  <div class="form-group">
                    <input name="mobile" class="form-control mt-0" required type="text" pattern="[0-9]+"
                      placeholder="Phone number" value="{{ old('mobile', '') }}">
                    @error('mobile')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-lg-12 col-md-6 col-sm-12">
                  <div class="form-group">
                    <select name="nationality" class="form-control" required>
                      <option value="">Select Nationality</option>
                      <option value="Libyan" {{ old('nationality') == 'Libyan' ? 'selected' : '' }}>Libyan</option>
                      <option value="Non-Libyan" {{ old('nationality') == 'Non-Libyan' ? 'selected' : '' }}>
                        Non-Libyan</option>
                    </select>
                    @error('nationality')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group">
                    <input name="libya_identification_number" class="form-control" type="text"
                      placeholder="Libya National Number" value="{{ old('libya_identification_number', '') }}"
                      required>
                    @error('libya_identification_number')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group">
                    <input name="passport_number" class="form-control" type="text"
                      placeholder="Libyan Passport Number" value="{{ old('passport_number', '') }}">
                    @error('passport_number')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                    <select name="highest_qualification" class="form-control" required>
                      <option value="">Your Highest Qualification</option>
                      @foreach ($levels as $row)
                        <option value="{{ $row->level }}"
                          {{ old('highest_qualification') == $row->level ? 'selected' : '' }}>
                          {{ $row->level }}
                        </option>
                      @endforeach
                    </select>
                    @error('highest_qualification')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                    <select name="interested_level" class="form-control" required>
                      <option value="">Are you interested in</option>
                      <option value="UNDER-GRADUATE"
                        {{ old('interested_level') == 'UNDER-GRADUATE' ? 'selected' : '' }}>
                        UNDER-GRADUATE
                      </option>
                      <option value="POST-GRADUATE" {{ old('interested_level') == 'POST-GRADUATE' ? 'selected' : '' }}>
                        POST-GRADUATE
                      </option>
                      <option value="PHD" {{ old('interested_level') == 'PHD' ? 'selected' : '' }}>
                        PHD
                      </option>
                    </select>
                    @error('interested_level')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                    <select name="university" class="form-control" id="ef_university" required>
                      <option value="">Select Interested University</option>
                      @foreach ($pageDetail->universities as $row)
                        <option value="{{ $row->university_id }}"
                          {{ old('university') == $row->university_id ? 'selected' : '' }}>
                          {{ $row->university->name }}
                        </option>
                      @endforeach
                    </select>
                    @error('university')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                    <select name="program" class="form-control" id="ef_program" required>
                      <option value="">Select Interested Course</option>
                      @foreach ($categories as $row)
                        <option value="{{ $row->name }}" {{ old('program') == $row->name ? 'selected' : '' }}>
                          {{ $row->name }}
                        </option>
                      @endforeach
                    </select>
                    @error('program')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">

                  <label>Gender</label>
                  <div class="d-flex align-items-center justify-content-around addsd">
                    <div class="form-check mb-0">
                      <input class="form-check-input" type="radio" name="gender" id="exampleRadios1"
                        value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }}>
                      <label class="form-check-label" for="exampleRadios1">
                        male
                      </label>
                    </div>
                    <div class="form-check mb-0 ">
                      <input class="form-check-input" type="radio" name="gender" id="exampleRadios2"
                        value="Female"{{ old('gender') == 'Female' ? 'checked' : '' }}>
                      <label class="form-check-label" for="exampleRadios2">
                        female
                      </label>
                    </div>
                    @error('gender')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" id="dob" placeholder="Date of Birth"
                      class="form-control" value="{{ old('dob') }}" required>
                  </div>
                  @error('dob')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="form-group">
                    <input type="text" placeholder="Captcha: {{ $captcha['text'] }} =" class="form-control"
                      value="Captcha: {{ $captcha['text'] }} =" disabled readonly>
                  </div>
                </div>

                <div class="col-lg-8 col-md-8  col-sm-12">
                  <div class="form-group">
                    <input type="text" id="captcha" placeholder="Enter the Captcha Value" class="form-control"
                      name="captcha_answer" required>
                  </div>
                  @error('captcha_answer')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="input-field s4 d-flex justify-content-center align-items-center">
                    <button type="submit" class="blue-register mar5 w-50">Register</button>
                  </div>
                </div>
              </div>
            </form>

          </div>

        </div>
      </div>
    </div>
  </section>
  <section class="contact-forms">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-4 ">
          <div class="contact-fromss">
            <h2>Ms. Malathi</h2>
            <ul>
              <li><strong>Project Manager</strong></li>
              <li>Malaysian Export Academy Sdn Bhd</li>
              <li>Email: <a href="mailto:malathi@exportacademy.net">malathi@exportacademy.net</a> / <a
                  href="mailto:malathi@srim.my">malathi@srim.my</a></li>
              <li>Contact Number: <a href="tel:+60122631251">012-2631251</a></li>
            </ul>

          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-4">
          <div class="contact-fromss">
            <h2>Mr. Parthiban</h2>
            <ul>
              <li><strong>Project Manager</strong></li>
              <li>Malaysian Export Academy Sdn Bhd</li>
              <li>Email: <a href="mailto:parthiban@exportacademy.net">parthiban@exportacademy.net</a> / <a
                  href="mailto:thibanshan@gmail.com">thibanshan@gmail.com</a></li>
              <li>Contact Number: <a href="tel:+60122245649">012-2245649</a></li>
            </ul>

          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="educationfairs">
    <div class="container">
      <p class="universties mb-4">Why Join This Education Fair ?</p>
      <div class="row align-items-center  justify-content-center  ">

        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-4 ">

          <div class="fariul">
            <div class="flspan">
              <span> <img src="/front/assets/images/top-universities.png " class="img-fluid" alt=""></span>

            </div>
            <div class="fair-us">
              <h2>Meet Top Universities</h2>
              <p>Connect with Malaysia’s leading institutions in one place.</p>
            </div>

          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-4 ">
          <div class="fariul">
            <div class="flspan">
              <span> <img src="/front/assets/images/Exclusive-Scholarship.png " class="img-fluid"
                  alt=""></span>

            </div>
            <div class="fair-us">
              <h2>Exclusive Scholarships</h2>
              <p>Learn about scholarships for Libyan students.</p>
            </div>

          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-4 ">
          <div class="fariul">
            <div class="flspan">
              <span> <img src="/front/assets/images/Spot-Admissions.png " class="img-fluid" alt=""></span>

            </div>
            <div class="fair-us">
              <h2>Spot Admissions</h2>
              <p>Apply on the spot for eligible programs.</p>
            </div>

          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-4 ">
          <div class="fariul">
            <div class="flspan">
              <span> <img src="/front/assets/images/Visa-travel.png " class="img-fluid" alt=""></span>

            </div>
            <div class="fair-us">
              <h2>Visa & Travel Support</h2>
              <p>Get step-by-step guidance on studying in Malaysia.</p>
            </div>

          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-4 ">
          <div class="fariul">
            <div class="flspan">
              <span> <img src="/front/assets/images/Work-Internships.png " class="img-fluid" alt=""></span>
            </div>
            <div class="fair-us">
              <h2>Work & Internships</h2>
              <p>Explore part-time work and internship options.</p>
            </div>

          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-4 ">
          <div class="fariul">
            <div class="flspan">
              <span> <img src="/front/assets/images/Cultural-Insights.png " class="img-fluid" alt=""></span>

            </div>
            <div class="fair-us">
              <h2>Cultural Insights</h2>
              <p>Learn about life and student support in Malaysia.</p>
            </div>

          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-4 ">
          <div class="fariul">
            <div class="flspan">
              <span> <img src="/front/assets/images/save-time.png " class="img-fluid" alt=""></span>

            </div>
            <div class="fair-us">
              <h2>Save Time and Effort</h2>
              <p>Access all the information you need about studying in Malaysia.</p>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>

  <section class="particaptes-universties">
    <div class="container">
      <div class="particaptes">
        <P class="universties   px-2 py-3 align-items-center gap-3 my-0 justify-content-between d-flex ">
          Participating Universities
          </h3>

        <div class="tab-content" id="one-tabContent">
          <div class="tab-pane last-div active mx-2" id="one" role="tabpanel" aria-labelledby="one-tab">

            @foreach ($pageDetail->universities as $row)
              <div
                class="px-2 py-2 align-items-center setparticaptes gap-3 my-0 justify-content-between d-flex border-top border-bottom">
                <div class="grow">
                  <a href="https://educationmalaysia.in/university/{{ $row->university->uname }}" target="_blank">
                    <span class="">{{ $row->university->name }}</span>
                  </a>
                </div>
                <div class="shrink">
                  <button class="all-apply" data-id="{{ $row->university_id }}">Apply Now</button>
                </div>
              </div>
            @endforeach

          </div>
        </div>

      </div>
    </div>

    </div>
  </section>

  <section class="education-special">
    <div class="container">

      <div class="row align-items-center flex-column-reverse flex-lg-row  ">

        <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-4 ">
          <div class="all-speci">
            <h2>What Makes Libya Education
              Fair Special?</h2>

            <ul>
              <li>Explore international education opportunities.</li>
              <li>Interact with Malaysian university representatives.</li>
              <li>Compare programs & courses.</li>
              <li>Understand the Malaysian education system.</li>
              <li>Get firsthand course & career info.</li>
              <li>Gain cultural awareness & global exposure.</li>
              <li>Study in Malaysia & adapt to a new culture.</li>
              <li>Receive guidance for the right course & university.</li>
            </ul>

          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-4">
          <div class="allimags">
            <img src="/front/assets/images/libya.jpeg" class="imdd" alt="">
          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="malaysia-govt">
    <div class="contanier">
      <div class="row">
        <div class="col-md-12">
          <div class="minsiter">

            <h2 class="titles-malaysia">OUR ESTEEMED PARTNERS </h2>

            <div class="allsponser">
              <div class="slider">
                <div class="slide-track">

                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/libian-logo.jpg" alt="">
                  </div>
                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/export-logo.png" alt="">
                  </div>
                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/britannica-logo.png" alt="">
                  </div>
                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/malaysialogo.png" alt="">
                  </div>

                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </div>
  </section>

  <script>
    $(document).ready(function() {
      // Wrap the table in a div with class 'table-responsive'
      $('table').before('<div class="table-responsive"></div>');

      // Move the table inside the newly created div
      $('table').prev('.table-responsive').append($('table'));
    });
  </script>
  <script>
    function showPassword(id) {
      $("#" + id).attr('type', 'text');
      $("#" + id + '_icon_show').hide();
      $("#" + id + '_icon_hide').show();
    }

    function hidePassword(id) {
      $("#" + id).attr('type', 'password');
      $("#" + id + '_icon_show').show();
      $("#" + id + '_icon_hide').hide();
    }
  </script>
  <script>
    $(document).ready(function() {


      // Fetch programs when university dropdown changes
      $('#ef_university').change(function() {
        const universityId = $(this).val();
        if (universityId) {
          fetchPrograms(universityId); // Call the function to fetch programs
        }
      });

      // Function to fetch programs
      function fetchPrograms(universityId) {
        var level = $('#interested_level').val();
        $.ajax({
          url: "{{ route('libia.fetch.courses') }}",
          type: 'POST',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
          },
          data: {
            university_id: universityId,
          },
          success: function(response) {
            $('#ef_program').html(response);
          },
          error: function() {
            alert('An error occurred while fetching programs.');
          },
        });
      }
    });

    $(document).ready(function() {
      // Handle the click event on the "Apply Now" button
      $('.all-apply').on('click', function() {
        // Get the university ID from the data-id attribute of the clicked button
        const universityId = $(this).data('id');

        // Scroll smoothly to the register section
        $('html, body').animate({
          scrollTop: $('#register').offset().top
        }, 500);

        // Set the value of the university dropdown to the selected university ID
        $('#ef_university').val(universityId);

        // Trigger change event to ensure any dependent functionality updates
        $('#ef_university').trigger('change');
      });
    });
  </script>
  @include('front.js.translate')
@endsection
