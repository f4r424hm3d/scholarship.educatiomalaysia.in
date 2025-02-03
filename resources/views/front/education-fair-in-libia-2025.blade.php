@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('main-section')
  <section class="banner-section">

    <div class="container">
      <h2 class="banner-titles">MALAYSIAN UNIVERSITIES EDUCATION & TRAINING Fair
      </h2>
      <div class="row">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            @php
              $i = 1;
            @endphp
            @foreach ($pageDetail->banners as $row)
              <div class="carousel-item {{ $i == '1' ? 'active' : '' }}">
                <img class="d-block w-100" src="{{ asset($row->file_path) }}" alt="{{ $row->alt_text }}">
              </div>
              @php
                $i++;
              @endphp
            @endforeach;
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <h2 class="bannerma">Malaysian Universities Education held in Tripoli hosted by Ministry of Higher Education and
        Scientific Research of Libya and organized by Malaysian Export Academy (MEXA).</h2>
    </div>

  </section>

  <!-- Modal -->
  <div class="modal coursemodal  fade" id="courseListModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> what is offered by the participating universities.?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">

              <div class="col-md-6 col-sm-12 col-12 mb-4">
                <h5>Diploma / Master / Phd </h5>
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

              <div class="col-md-6 col-sm-12 col-12 mb-4">
                <h5>Pre-University</h5>
                <ul>
                  <li>A-Levels</li>
                  <li>Business and Management</li>
                  <li>Certificate</li>
                  <li>Creative Arts and Design</li>

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
                <h5 class="modal-title" id="exampleModalLabel">what is offered by the participating universities.? </h5>
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
          <div class="flex flex-col all-flexx gap-3 h-100 items-center text-center">
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

  <section class="registrations-fomrs" id="register">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-4">

          <div class="fair-details">
            <h2 class="main-faris">
              Education Fair 2025 </h2>
            <!-- <p class="all-fair mb-2">{{ $pageDetail->date_and_address }}</p> -->

            <h2 class="fairs">
              Malaysian Universities Education & Training Fair </h2>
            <ul class="set_uls">
              <li><b><i class="fa fa-map-pin" aria-hidden="true"></i>
                  Venue / Place</b> <span>:</span> Libyan Academy for Postgraduate Studies, Tripoli, Libya</li>
              <li><b><i class="fa fa-calendar" aria-hidden="true"></i>Date:</b> <span>:</span> 22nd & 23rd February 2025
              </li>
              <li><b><i class="fa fa-clock-o" aria-hidden="true"></i>
                  Time:</b> <span>:</span> 9:30 AM – 1:00 PM & 4:00 PM – 8:00 PM</li>
            </ul>

            <div class="imgsfaird">
              <img src="/front/assets/images/libya-malaysia.png" class="imgsfairs" alt="">
            </div>
            <!-- <a href="#register" class="new-registor">Register Now</a> -->
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-4 ">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          @if (session()->has('smsg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session()->get('smsg') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          @if (session()->has('emsg'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session()->get('emsg') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                    <input name="name" class="form-control" type="text" placeholder="Enter Full Name"
                      pattern="[a-zA-Z'-'\s]*" value="{{ old('name', '') }}" required>
                    @error('name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6  col-sm-12">
                  <div class="form-group">
                    <input name="email" class="form-control" type="email" placeholder="Enter Email Address"
                      value="{{ old('email', '') }}" required>
                    @error('email')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="form-group">
                    <select name="c_code" id="countryCode" class="form-control" required>
                      <option value="">Country Code</option>
                      @foreach ($phonecodes as $row)
                        <option value="{{ $row->phonecode }}"
                          {{ $row->iso == $curCountry || old('c_code') == $row->phonecode ? 'selected' : '' }}>
                          +{{ $row->phonecode }} ({{ $row->name }})
                        </option>
                      @endforeach
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
                      placeholder="LIBYA IDENTIFICATION NUMBER" value="{{ old('libya_identification_number', '') }}"
                      required>
                    @error('libya_identification_number')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group">
                    <input name="passport_number" class="form-control" type="text"
                      placeholder="LIBYAN PASSPORT NUMBER" value="{{ old('passport_number', '') }}" required>
                    @error('passport_number')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-lg-12 col-md-6 col-sm-12">
                  <div class="form-group">
                    <select name="highest_qualification" class="form-control" required>
                      <option value="">Select Highest Qualification</option>
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

                <div class="col-lg-5 col-md-5 col-sm-12">
                  <div class="form-group">
                    <input type="text" placeholder="Captcha: {{ $captcha['text'] }} =" class="form-control"
                      value="Captcha: {{ $captcha['text'] }} =" disabled readonly>
                  </div>
                </div>
                <div class="col-lg-7 col-md-7  col-sm-12">
                  <div class="form-group">
                    <input type="text" id="captcha" placeholder="Enter the Captcha Value" class="form-control"
                      name="captcha_answer" required>
                  </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">

                  <div class="form-check checkbx-white pl-4">
                    <label class="form-check-label px-0 " for="test5">By clicking on register I agree to the
                      <a href="{{ url('terms-and-conditions') }}" target="_blank">terms & conditions</a></label>
                  </div>
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

  <section class="educationfairs">
    <div class="container">
      <h2 class="set-fairs mb-4">Why Join This Education Fair?</h2>
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
          Participating University
          </h3>

        <div class="tab-content" id="one-tabContent">
          <div class="tab-pane last-div active mx-2" id="one" role="tabpanel" aria-labelledby="one-tab">

            <div class="flex flex-col divide-y">
              <div
                class=" px-2 py-2 align-items-center  setparticaptes gap-3 my-0 justify-content-between d-flex border-top border-bottom ">
                <span class="grow"><label>EXHIBITOR</label></span>
                <div class="d-flex justify-content-between spacebx">
                  <span class="shrink"><label></label></span>

                  <span class="shrink"><label>Send Application
                    </label></span>
                </div>
              </div>
            </div>
            @foreach ($pageDetail->universities as $row)
              <div
                class="px-2 py-2 align-items-center setparticaptes gap-3 my-0 justify-content-between d-flex border-top border-bottom">
                <div class="grow">
                  <a href="{{ url('university/' . $row->university_slug) }}" target="_blank">
                    <span class="">{{ $row->university->name }}</span>
                  </a>
                </div>
                <div class="d-flex justify-content-between spacebx">
                  <div class="numbers">
                    {{ $row->booth_no }}
                  </div>
                  <div class="shrink">
                    <button class="all-apply" data-id="{{ $row->university_id }}">Apply Now</button>
                  </div>
                </div>
              </div>
            @endforeach

          </div>
        </div>

      </div>
    </div>

    </div>
  </section>

  <section class="education-fairs">
    <div class="container">
      <div class="row align-items-center ">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4 ">
          <div class="all-fairss">
            <h2> <span>Why Attend </span> the Malaysian Universities Education Fair Tripoli, Libya?</h2>
            <p>The Education Fair is a pioneering event designed to connect Libyan students with representatives from
              prestigious universities from Malaysia.
              Sponsored by the Libyan Government, this Education Fair provides students with invaluable opportunities to
              explore international academic pathways, secure scholarships, and take significant steps toward fulfilling
              their educational aspirations.
            </p>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4 ">
          <div class="all-fairss-img text-center ">
            <img src="/front/assets/images/group-photos.png " class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="education-special">
    <div class="container">

      <div class="all-special">
        <h2>What Makes Libya Education
          Fair Special?</h2>

      </div>
      <div class="row">

        <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4">
          <div class="cards-spec">

            <div class="special-black event-overlay">

              <h2>Government Sponsored Scholarships</h2>
              <div class="specil-p">
                <p>The Libya Education Fair offers 100% government-funded scholarships for eligible students, covering
                  tuition fees, living expenses, and more. Merit-based scholarships are available to empower deserving
                  students.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4">
          <div class="cards-spec">
            <div class="special-black event-overlay">

              <h2>Meet University Representatives</h2>
              <div class="specil-p">
                <p>Engage directly with university delegates to learn about programs, application processes, and campus
                  life. Get your questions about courses, scholarships, visas, and more answered by experts.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4">
          <div class="cards-spec">

            <div class="special-black event-overlay">

              <h2>On-The-Spot Offers and Admissions</h2>
              <div class="specil-p">
                <p>Bring your academic documents to secure on-the-spot offers and admission assessments from top
                  universities.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4">
          <div class="cards-spec">
            <div class="special-black event-overlay">

              <h2>
                Scholarships and Application Fee Waivers</h2>
              <div class="specil-p">
                <p>Many universities will provide application fee waivers and exclusive scholarships to eligible
                  candidates submitting complete applications during the event.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4">
          <div class="cards-spec">
            <div class="special-black event-overlay">

              <h2>
                Interactive Sessions</h2>
              <div class="specil-p">
                <p>Participate in interactive sessions with university delegates, alumni, and counselors to gain insights
                  into academic programs, career prospects, and student life.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4">
          <div class="cards-spec">
            <div class="special-black event-overlay">

              <h2>
                Comprehensive Guidance</h2>
              <div class="specil-p">
                <p>The event provides personalized assistance with study abroad processes, including information on visa
                  procedures, education loans, and student accommodation.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="applyisss">
    <div class="applyingsstart">
      <h2 class="applyings">Applying for Scholarships in Malaysia? Here’s a Quick Guide
    </div>
    </h2>
    <div class="container">
      <div class="row">
        <div class="col-12">

          <ol class="olrearsarch">
            <li>
              <h2>Research available scholarships</h2>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
                cupiditate non provident</p>
            </li>
            <li>
              <h2>Check eligibility criteria</h2>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
                cupiditate non provident</p>
            </li>
            <li>

              <h2>Gather required documents</h2>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
                cupiditate non provident</p>
            </li>
            <li>
              <h2>Apply online or offline</h2>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
                cupiditate non provident</p>
            </li>
            <li>
              <h2>Submit the application</h2>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
                cupiditate non provident</p>
            </li>
            <li>
              <h2>Wait for results</h2>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
                cupiditate non provident</p>
            </li>
            <li>
              <h2>Fulfil scholarship requirements</h2>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
                cupiditate non provident</p>
            </li>
            <li>
              <h2>Submit the application</h2>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
                cupiditate non provident</p>
            </li>

          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="malaysia-govt">
    <div class="contanier">
      <div class="row">
        <div class="col-md-12">
          <div class="minsiter">

            <h2 class="titles-malaysia">Over a steamed Partner or sponser </h2>

            <div class="allsponser">
              <div class="slider">
                <div class="slide-track">
                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/govermentlibya.png" alt="">
                  </div>
                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/Libia-education-board-Logo.png" alt="">
                  </div>

                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/govt-logo.png" alt="">
                  </div>

                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/britannica-logo.png" alt="">
                  </div>

                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/Flag-of-Libya.png" alt="">
                  </div>
                  <!-- 1  -->

                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/govermentlibya.png" alt="">
                  </div>
                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/Libia-education-board-Logo.png" alt="">
                  </div>

                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/govt-logo.png" alt="">
                  </div>

                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/britannica-logo.png" alt="">
                  </div>

                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/Flag-of-Libya.png" alt="">
                  </div>
                  <!-- 2  -->

                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/govermentlibya.png" alt="">
                  </div>
                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/Libia-education-board-Logo.png" alt="">
                  </div>

                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/govt-logo.png" alt="">
                  </div>

                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/britannica-logo.png" alt="">
                  </div>

                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/Flag-of-Libya.png" alt="">
                  </div>

                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </div>
  </section>

  <section class="faq-sections">

    <div class="container">
      <div class=" faq-details">
        Frequently Ask <span>Question</span>
      </div>
      <div class="row align-items-center">
        <div class="col-md-12">

          <div id="accordion" class="mainacc">
            <div class="card-diff">
              <div class="row">
                @foreach ($pageDetail->faqs as $row)
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
                    <div class=" card mb-0">
                      <div class="card-header" id="heading{{ $row->id }}">
                        <h5 class="mb-0">
                          <button class="btn btn-link" data-toggle="collapse"
                            data-target="#collapse{{ $row->id }}" aria-expanded="true"
                            aria-controls="collapse{{ $row->id }}">
                            <div class="clickfa d-flex justify-content-between gapss align-items-center">
                              <i class="fa fa-plus-circle" aria-hidden="true"></i>
                              <h2 class="span-accord">{{ $row->question }}</h2>

                            </div>
                          </button>
                        </h5>
                      </div>
                      <div id="collapse{{ $row->id }}" class="collapse "
                        aria-labelledby="heading{{ $row->id }}" data-parent="#accordion">
                        <div class="card-body">
                          <p class="card-anwer"> {!! $row->answer !!}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>

            </div>

          </div>

        </div>
        <!-- <div class="col-md-6">
                                                                                                                            <div class="imgfaq">
                                                                                                                              <img src="{{ url('/') }}/front/assets/images/faq.png" class="img-fluid" alt="">

                                                                                                                            </div>
                                                                                                                          </div> -->
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
      // Check if a university is already selected on page load
      // const selectedUniversityId = $('#ef_university').val();
      // if (selectedUniversityId) {
      // 	fetchPrograms(selectedUniversityId); // Call the function to fetch programs
      // }

      // Fetch programs when university dropdown changes
      $('#ef_university').change(function() {
        const universityId = $(this).val();
        if (universityId) {
          fetchPrograms(universityId); // Call the function to fetch programs
        }
      });

      // Function to fetch programs
      function fetchPrograms(universityId) {
        $.ajax({
          url: "{{ route('libia.fetch.courses') }}",
          type: 'POST',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
          },
          data: {
            university_id: universityId
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
@endsection
