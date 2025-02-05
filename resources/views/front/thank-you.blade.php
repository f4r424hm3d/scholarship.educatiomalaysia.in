@php
  use SimpleSoftwareIO\QrCode\Facades\QrCode;
@endphp
@extends('front.layouts.main')

@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('main-section')
  <section class="p-0">
    <div class="log-space">
      <div>
        <div class="row no-gutters position-relative log_rads">
          <div class="col-lg-4 col-md-4 position-static p-2"></div>
          <div class="col-lg-4 col-md-4 position-static p-2">
            <div class="log_wraps booking">
              <div class="row align-items-center">

                {{-- Success Message --}}
                <div class="col-lg-12 text-center">

                  <h4>Thank You, {{ $lead->name }}!</h4>
                  <p>Please bring this QR code to the **Education Fair** for easy check-in.</p>
                </div>

                {{-- QR Code --}}
                <div class="col-lg-12 text-center">
                  <div class="mcod">
                    {{-- <img
                      src="data:image/svg+xml;base64,{{ base64_encode(QrCode::format('svg')->size(200)->generate(json_encode(['id' => $lead->id, 'name' => $lead->name, 'email' => $lead->email]))) }}"
                      alt="QR Code"> --}}

                    <img
                      src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(300)->generate(json_encode(['id' => $lead->id, 'name' => $lead->name, 'email' => $lead->email]))) }}"
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
                {{-- OK Button --}}
                <div class="col-lg-12 text-center">
                  <div class="form-group">
                    <a href="{{ url('/') }}" class="btn btn-sm btn-danger">Go to Home Page</a>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
