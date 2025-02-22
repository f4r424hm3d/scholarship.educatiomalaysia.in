@php
  use SimpleSoftwareIO\QrCode\Facades\QrCode;
@endphp
@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('main-section')
  @if (session()->has('QR'))
    <script>
      $(document).ready(function() {
        showQrCodeModal();

        // Push an event to the dataLayer
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
          'event': 'qr_code_shown'
        });
      });
    </script>
    <span id="qrCodeVisible"></span>
  @endif

  <style>
    .contact-forms {
      background-color: rgb(238 202 3);
    }

    .contact-fromss {
      background-color: transparent !important;
      border: transparent !important;
      text-align: center;
    }

    .contact-forms ul {}

    .contact-forms ul li a {
      color: #fff !important;
    }

    .contact-forms {
      background-color: rgb(10 65 145) !important;
    }

    .minsiter .titles-malaysia {
      color: #fff;
      font-weight: 600 !important;
      background-color: #0a4191 !important;
      padding: 22px !important;
    }
  </style>
  <section class="banner-section">
    <div class="googlechanges " id="google_translate_element"></div>

    <div class="container">

      <div class="row">

        <!-- class="carousel slide" data-ride="carousel"   -->
        <video autoplay muted loop class="mb-2">
          <source src="/front/video/videoslider.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
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
      <ul class="malyss">
        <li>Malaysian Universities Education and Training Fair held in Tripoli, Libya</li>
        <li>Hosted by Ministry of Higher Education and Scientific Research of Libya</li>
        <li>Organized by Malaysian Export Academy (MEXA)</li>
        <li>Supported by National Association of Private Educational Institutions, Malaysia (NAPEI)</li>
      </ul>

    </div>

  </section>

  <!-- Modal -->
  <div class="modal  thankyou_popup coursemodal  fade " id="qrCodeModal" tabindex="-1" role="dialog"
    aria-labelledby="qrCodeModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <h5 class="modal-title" id="qrCodeModalLabel"></h5>
          <button type="button" class="close" onclick="hideQrCodeModal()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-12 ">
                @if (session()->has('newId') && $lead)
                  <div class="row align-items-center">

                    {{-- Success Message --}}
                    <div class="col-lg-12 text-center">

                      <h4>Thank You, {{ $lead->name }}!</h4>
                      <p>Please bring this QR code to the **Education Fair** for easy check-in. <br>
                        You can also download this QR code from your email.</p>
                    </div>

                    {{-- QR Code --}}
                    <div class="col-lg-12 text-center">
                      <div class="mcod">

                        <img
                          src="data:image/png;base64,{{ base64_encode(
                              QrCode::format('png')->size(300)->generate(
                                      json_encode([
                                          'Title' => 'Malaysian Universities Education & Training Fair 2025',
                                          'Student Name' => $lead->name,
                                          'Passport Number' => $lead->passport_number,
                                          'Libya National Id' => $lead->identification_number,
                                      ]),
                                  ),
                          ) }}"
                          alt="QR Code">

                      </div>
                    </div>

                    {{-- Download Button --}}
                    <div class="col-lg-12 text-center">
                      <div class="form-group"><br>
                        <a href="{{ route('download.qr') }}" class="btn  btn-success">Download QR
                          Code</a>
                      </div>
                    </div>
                    

                  </div>
                @elseif(session()->has('QR'))
                  <div class="row align-items-center">
                    <div class="col-lg-12 text-center">

                      <h4>Thank You</h4>
                      <p>Please bring this QR code to the **Education Fair** for easy check-in. <br>
                        You can also download this QR code from your email.</p>
                    </div>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="courseListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Faculty </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">

              <div class="col-md-12 col-sm-12 col-12 px-0">
                <!-- <h5> Under Graduate, Post Graduate, Phd </h5> -->
                <ul class="coursesdd">
                  <li>Applied and Pure Sciences</li>
                  <li>Architecture, Construction and Manufacturing</li>
                  <li>Business and Management</li>
                  <li>Computer Science and IT</li>
                  <li>Creative Arts and Design</li>
                  <li>Education and Training</li>
                  <li>Engineering</li>
                  <li>Health, Safety & Medicine</li>
                  <li>Humanities</li>
                  <li>Social Studies and Media</li>
                  <li>Travel and Hospitality</li>
                  <li> Acounting & Finance</li>
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
      <div class="row  justify-content-center">
        <div class="col-12 col-sm-12 col-md-6 col-lg-4  col-xl-3 mb-3 ">
          
            <div class="flex flex-col all-flexx gap-3 items-center text-center h-100 " data-target="#courseListModal" data-toggle="modal" >
              <div class="imgflx">
                <img src="{{ url('/') }}/front/assets/images/courses.png" alt="">
              </div>
              <h2 class="text-xl font-bold">Courses</h2>
              <p>Discover a diverse range of programs from undergraduate to postgraduate degrees, explore options in
                medicine, engineering, business, IT, and more.</p>
            </div>
       
          {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#courseListModal">courses</button> --}}
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4  col-xl-3 mb-3 ">
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
        <div class="col-12 col-sm-12 col-md-6 col-lg-4  col-xl-3 mb-3 ">
          <div class="flex flex-col all-flexx gap-3 h-100 items-center text-center" data-toggle="modal"
            data-target="#exampleModal">
            <div class="imgflx">
              <img src="{{ url('/') }}/front/assets/images/scholarship.png" alt="">
            </div>
            <h2 class="text-xl font-bold">Scholarships</h2>
            <p>Exclusive scholarship opportunities for Libyan students sponsored by the Libyan Government.</p>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4  col-xl-3 mb-3 ">
          <a href="https://exportacademy.net/" target="_blank">
            <div class="flex flex-col all-flexx gap-3 h-100 items-center text-center">
              <div class="imgflx">
                <img src="{{ url('/') }}/front/assets/images/training.png" alt="">
              </div>
              <h2 class="text-xl font-bold">Training</h2>
              <p>Learn global trade, boost exports, master compliance, and grow your business with expert-led courses and
                certifications!"</p>
            </div>
          </a>
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
              prestigious universities from Malaysia. Sponsored by the Libyan Government, this Education Fair provides
              students with invaluable opportunities to explore international academic pathways, secure scholarships, and
              take significant steps toward fulfilling their educational aspirations. <br>
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
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4">
          <div class="fair-details">
            <h2 class="main-faris">
              Malaysian Universities Education <span class="aands">&</span> Training Fair 2025 </h2>

            <ul class="set_uls">
              <li><b><i class="fa fa-map-pin" aria-hidden="true"></i>
                  Venue</b> Libyan Academy for Postgraduate Studies, Tripoli, Libya</li>
              <li><b><i class="fa fa-calendar" aria-hidden="true"></i>Date</b> 22nd & 23rd February 2025
              </li>
              <li><b><i class="fa fa-clock-o" aria-hidden="true"></i>
                  Time</b> 9:00 AM – 1:00 PM & 2:00 PM – 6:00 PM</li>
            </ul>
            <div class="imgsfaird">
              <img src="../front/assets/images/libya-malaysia.png" class="imgsfairs" alt="">
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-4 ">

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
                      pattern="[a-zA-Z'-'\s\u0600-\u06FF]*" value="{{ old('name', '') }}">

                    <span class="text-danger redspan" id="name-err">
                      @error('name')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                </div>

                <div class="col-md-6  col-sm-12">
                  <div class="form-group">
                    <input name="email" class="form-control" type="email" placeholder="Personal Email Address"
                      value="{{ old('email', '') }}">
                    <span class="text-danger redspan" id="email-err">
                      @error('email')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                    <select name="c_code" id="countryCode" class="form-control">
                      <option value="218" {{ old('c_code') == 218 ? 'selected' : '' }}>
                        +218 (State of Libya)
                      </option>
                    </select>
                    <span class="text-danger redspan" id="c_code-err">
                      @error('c_code')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                    <input name="mobile" class="form-control mt-0" type="text" pattern="[0-9]+"
                      placeholder="Phone number" value="{{ old('mobile', '') }}">
                    <span class="text-danger redspan" id="mobile-err">
                      @error('mobile')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                    <select name="nationality" class="form-control">
                      <option value="">Select Nationality</option>
                      <option value="Libyan" {{ old('nationality') == 'Libyan' ? 'selected' : '' }}>Libyan</option>
                      <option value="Non-Libyan" {{ old('nationality') == 'Non-Libyan' ? 'selected' : '' }}>
                        Non-Libyan</option>
                    </select>
                    <span class="text-danger redspan" id="nationality-err">
                      @error('nationality')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group">
                    <input name="libya_identification_number" class="form-control" type="text"
                      placeholder="Libya National Number" value="{{ old('libya_identification_number', '') }}">
                    <span class="text-danger redspan" id="libya_identification_number-err">
                      @error('libya_identification_number')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group">
                    <input name="passport_number" class="form-control" type="text"
                      placeholder="Libyan Passport Number" value="{{ old('passport_number', '') }}">
                    <span class="text-danger redspan" id="pasport_number-err">
                      @error('pasport_number')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                    <select name="highest_qualification" class="form-control">
                      <option value="">Your Highest Qualification</option>
                      <option value="PRE-UNIVERSITY"
                        {{ old('highest_qualification') == 'PRE-UNIVERSITY' ? 'selected' : '' }}>
                        Pre-University
                      </option>
                      <option value="UNDER-GRADUATE"
                        {{ old('highest_qualification') == 'UNDER-GRADUATE' ? 'selected' : '' }}>
                        Under-Graduate
                      </option>
                      <option value="POST-GRADUATE"
                        {{ old('highest_qualification') == 'POST-GRADUATE' ? 'selected' : '' }}>
                        Post-Graduate/Master
                      </option>
                      <option value="PHD" {{ old('highest_qualification') == 'PHD' ? 'selected' : '' }}>
                        PHD
                      </option>
                    </select>
                    <span class="text-danger redspan " id="highest_qualification-err">
                      @error('highest_qualification')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12" id="universityDiv">
                  <div class="form-group">
                    <select name="university" class="form-control" id="university">
                      <option value="">Select Interested University</option>
                      @foreach ($pageDetail->universities as $row)
                        <option value="{{ $row->university_id }}"
                          {{ old('university') == $row->university_id ? 'selected' : '' }}>
                          {{ $row->university->name }}
                        </option>
                      @endforeach
                      <option value="other" {{ old('university') == 'other' ? 'selected' : '' }}>
                        Other Universities
                      </option>
                    </select>
                    <span class="text-danger redspan" id="university-err">
                      @error('university')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12" id="levelDiv">
                  <div class="form-group">
                    <select name="interested_level" id="interested_level" class="form-control">
                      <option value="">Are you interested in</option>
                      @if (old('university') && old('university') != null)
                        @foreach ($intrestedLevels as $key => $value)
                          <option value="{{ $value }}"
                            {{ old('interested_level') == $value ? 'selected' : '' }}>
                            {{ $key }}
                          </option>
                        @endforeach
                      @endif
                    </select>
                    <span class="text-danger redspan" id="interested_level-err">
                      @error('interested_level')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12" id="categoryDiv">
                  <div class="form-group">
                    <select name="interested_course" class="form-control" id="interested_course">
                      <option value="">Select Interested Course</option>
                      @if (old('interested_course') && old('interested_course') != null)
                        @foreach ($categories as $row)
                          <option value="{{ $row->id }}"
                            {{ old('interested_course') == $row->id ? 'selected' : '' }}>
                            {{ $row->name }}</option>
                        @endforeach
                      @endif
                    </select>
                    <span class="text-danger redspan" id="interested_course-err">
                      @error('interested_course')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12" id="programDiv">
                  <div class="form-group">
                    <select name="interested_program" class="form-control" id="interested_program">
                      <option value="">Select Interested Program</option>
                      @if (old('interested_program') && old('interested_program') != null)
                        @foreach ($programs as $row)
                          <option value="{{ $row->course_name }}"
                            {{ old('interested_program') == $row->course_name ? 'selected' : '' }}>
                            {{ $row->course_name }}</option>
                        @endforeach
                      @endif
                    </select>
                    <span class="text-danger redspan" id="interested_program-err">
                      @error('interested_program')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 hide-this" id="manualProgramDiv">
                  <div class="form-group">
                    <input name="interested_program_name" class="form-control" type="text"
                      placeholder="Enter Program Name" value="{{ old('interested_program_name', '') }}">
                    <span class="text-danger redspan" id="interested_program_name-err">
                      @error('interested_program_name')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                </div>

                <div class="col-md-6 col-sm-12">

                  <div class="postion-relative">
                    <label class="gender">Gender</label>
                    <div class=" form-group">
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
                      </div>
                      <span class="text-danger redspan" id="gender-err">
                        @error('gender')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>

                  </div>

                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group dobdd">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" id="dob" placeholder="Date of Birth"
                      class="form-control" value="{{ old('dob') }}">
                    <span class="text-danger redspan" id="dob-err">
                      @error('dob')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                    <input type="text" placeholder="Captcha: {{ $captcha['text'] }} =" class="form-control"
                      value="Captcha: {{ $captcha['text'] }} =" disabled readonly>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6  col-sm-12">
                  <div class="form-group">
                    <input type="text" id="captcha" placeholder="Enter the Captcha Value" class="form-control"
                      name="captcha_answer">
                    <span class="text-danger redspan" id="captcha_answer-err">
                      @error('captcha_answer')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                </div>
              </div>
              <div class="row">
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

        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-4 ">

          <div class="fariul">
            <div class="flspan">
              <span> <img src="/front/assets/images/Opportunities.png " class="img-fluid" alt=""></span>

            </div>
            <div class="fair-us">
              <h2>Post-Study Opportunities
              </h2>
              <p>Discover post-graduation carrier options.</p>
            </div>

          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-4 ">

          <div class="fariul">
            <div class="flspan">
              <span> <img src="/front/assets/images/Dependents.png " class="img-fluid" alt=""></span>

            </div>
            <div class="fair-us">
              <h2>Bring Your Dependents
              </h2>
              <p>Postgraduate students can bring their family.</p>
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

        <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-2 ">
          <div class="all-speci">
            <h2>What Makes Libya Education
              Fair Special?</h2>

            <ul>
              <li> <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                Explore international education opportunities.</li>
              <li> <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                Interact with Malaysian university representatives.</li>
              <li> <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                Compare programs & courses.</li>
              <li> <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                Understand the Malaysian education system.</li>
              <li> <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                Get firsthand course & career info.</li>
              <li> <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                Gain cultural awareness & global exposure.</li>
              <li> <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                Study in Malaysia & adapt to a new culture.</li>
              <li> <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                Receive guidance for the right course & university.</li>
            </ul>

          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-2">
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
                  <!-- <div class="slide">
                                                                                                                                                                                                                                                                                                                                                                                                                                            <img src="{{ url('/') }}/front/assets/images/britannica-logo.png" alt="">
                                                                                                                                                                                                                                                                                                                                                                                                                                          </div> -->
                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/malaysialogo.png" alt="">
                  </div>
                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/napei.png" alt="">
                  </div>
                  <div class="slide">
                    <img src="{{ url('/') }}/front/assets/images/education_11.jpeg" alt="">
                  </div>

                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </div>
  </section>

  <section class="contact-forms">
    <div class="container">
      <h2 class="text-center mb-4 text-white font-bold py-3">PLEASE CONTACT</h2>
      <div class="row" style="text-align: center">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-4 ">
          <div class="contact-froms">
            <h2>Ms. Malathi</h2>
            <ul>
              <li><strong>Project Manager</strong></li>
              <li>Malaysian Export Academy Sdn Bhd</li>
              <li><i class="fa fa-envelope"></i>
                : <a href="mailto:malathi@exportacademy.net">malathi@exportacademy.net</a> / <a
                  href="mailto:malathi@srim.my">malathi@srim.my</a></li>
              <li><i class="fa fa-phone"></i>
                : <a href="tel:+60122631251">+60 012-2631251</a></li>
            </ul>

          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-4">
          <div class="contact-froms">
            <h2>Mr. Parthiban</h2>
            <ul>
              <li><strong>Project Manager</strong></li>
              <li>Malaysian Export Academy Sdn Bhd</li>
              <li><i class="fa fa-envelope"></i>
                : <a href="mailto:parthiban@exportacademy.net">parthiban@exportacademy.net</a> / <a
                  href="mailto:thibanshan@gmail.com">thibanshan@gmail.com</a></li>
              <li><i class="fa fa-phone"></i>
                : <a href="tel:+60122245649">+60 012-2245649</a></li>
            </ul>

          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    $(document).ready(function() {
      function toggleFields() {
        var selectedValue = $('#university').val();

        if (selectedValue === 'other') {
          $('#categoryDiv').hide();
          $('#programDiv').hide();
          $('#manualProgramDiv').show();
        } else {
          $('#categoryDiv').show();
          $('#programDiv').show();
          $('#manualProgramDiv').hide();
        }
      }

      // Run on page load
      toggleFields();

      // Run when university selection changes
      $('#university').change(function() {
        toggleFields();
      });
    });




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
      $('#university').change(function() {
        var selectedUniversity = $(this).val();
        var interestedLevel = $('#interested_level');

        // Clear existing options
        interestedLevel.html('');

        if (selectedUniversity == '3148') {
          // If university is 3148, show only Pre-University
          interestedLevel.append('<option value="">Are you interested in</option>');
          interestedLevel.append('<option value="PRE-UNIVERSITY">Pre-University</option>');
        } else {
          // Otherwise, show other options except Pre-University
          interestedLevel.append('<option value="">Are you interested in</option>');
          interestedLevel.append('<option value="UNDER-GRADUATE">Under-Graduate</option>');
          interestedLevel.append('<option value="POST-GRADUATE">Post-Graduate/Master</option>');
          interestedLevel.append('<option value="PHD">PHD</option>');
        }
      });
    });


    $(document).ready(function() {
      function showError(field, message) {
        $('#' + field + '-err').text(message);
      }

      function clearError(field) {
        $('#' + field + '-err').text('');
      }

      // Reset fields when university changes
      $('#university').change(function() {
        $('#interested_level').val('');
        $('#interested_course').html('<option value="">Select Interested Course</option>');
        $('#interested_program').html('<option value="">Select Interested Program</option>');
      });

      $('#interested_level').focus(function() {
        if (!$('#university').val()) {
          showError('interested_level', 'Please select a university first.');
          $(this).blur();
        } else {
          clearError('interested_level');
        }
      });

      $('#interested_course').focus(function() {
        if (!$('#interested_level').val()) {
          showError('interested_course', 'Please select an interested level first.');
          $(this).blur();
        } else {
          clearError('interested_course');
        }
      });

      $('#interested_program').focus(function() {
        if (!$('#interested_course').val()) {
          showError('interested_program', 'Please select an interested course first.');
          $(this).blur();
        } else {
          clearError('interested_program');
        }
      });

      // Fetch courses based on interested_level
      $('#interested_level').change(function() {
        var universityId = $('#university').val();
        var level = $(this).val();

        if (!universityId) {
          showError('interested_level', 'Please select a university first.');
          return;
        }

        $.ajax({
          url: "{{ route('libia.fetch.courses') }}",
          type: 'POST',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            level: level,
            university_id: universityId,
          },
          success: function(response) {
            $('#interested_course').html(response);
            clearError('interested_level');
          },
          error: function() {
            alert('An error occurred while fetching courses.');
          },
        });
      });

      // Fetch programs based on interested_course
      $('#interested_course').change(function() {
        var universityId = $('#university').val();
        var level = $('#interested_level').val();
        var courseCategoryId = $(this).val();

        if (!level) {
          showError('interested_course', 'Please select an interested level first.');
          return;
        }

        $.ajax({
          url: "{{ route('libia.fetch.program') }}",
          type: 'POST',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            university_id: universityId,
            level: level,
            course_category_id: courseCategoryId
          },
          success: function(response) {
            $('#interested_program').html(response);
            clearError('interested_course');
          },
          error: function() {
            alert('An error occurred while fetching programs.');
          },
        });
      });
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
  <script>
    function hideQrCodeModal() {
      $('#qrCodeModal').removeClass('show');
      $('#qrCodeModal').hide();
    }

    function showQrCodeModal() {
      $('#qrCodeModal').addClass('show');
      $('#qrCodeModal').show();
    }

    function printErrorMsg(msg) {
      $.each(msg, function(key, value) {
        $("#" + key + "-err").text(value);
      });
    }

    $(document).ready(function() {
      $('#dataForm').on('submit', function(event) {
        event.preventDefault();
        $(".errSpan").text('');
        $.ajax({
          url: "{{ route('libia.register') }}",
          method: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            //alert(data);
            if ($.isEmptyObject(data.error)) {
              //alert(data.success);
              if (data.hasOwnProperty('success')) {
                var h = 'Success';
                var msg = data.success;
                var type = 'success';
                $('#dataForm')[0].reset();
              }
            } else {
              //alert(data.error);
              printErrorMsg(data.error);
              var h = 'Failed';
              var msg = 'Some error occured';
              var type = 'danger';
            }
          }
        })
      });


    });
  </script>
  @include('front.js.translate')
@endsection
