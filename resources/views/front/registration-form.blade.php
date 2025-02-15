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

  <!-- Modal -->
  <div class="modal  thankyou_popup coursemodal  fade " id="qrCodeModal" tabindex="-1" role="dialog"
    aria-labelledby="qrCodeModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="qrCodeModalLabel"></h5>
          <button type="button" class="close" onclick="hideQrCodeModal()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-12 mb-4">
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
                      <div class="form-group"><br><br>
                        <a href="{{ route('download.qr') }}" class="btn btn-sm btn-success">Download QR
                          Code</a>
                      </div>
                    </div>
                    <br>

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
  <section class="registrations-fomrs" id="register">
    <div class="container">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-4"></div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-4 ">
              <div class="all-forms main-modals">
                <h2 class="new-regist">Register Now</h2>
                <form class="s12 f" action="{{ route('registration') }}" method="post">
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
                        <input type="text" id="captcha" placeholder="Enter the Captcha Value"
                          class="form-control" name="captcha_answer">
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
  </script>
  @include('front.js.translate')
@endsection
