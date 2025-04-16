<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeFc extends Controller
{
  public function privacyPolicy(Request $request)
  {
    return view('front.privacy-policy');
  }
  public function termsConditions(Request $request)
  {
    return view('front.terms-conditions');
  }
  public function testPopup(Request $request)
  {
    session()->flash('QR', true);
    return redirect()->route('libia.page');
  }
}
