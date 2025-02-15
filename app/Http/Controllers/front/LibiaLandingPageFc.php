<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\CourseCategory;
use App\Models\LandingPage;
use App\Models\LandingPageUniversity;
use App\Models\Lead;
use App\Models\Level;
use App\Models\University;
use App\Models\UniversityProgram;
use App\Rules\MathCaptchaValidationRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Stichoza\GoogleTranslate\GoogleTranslate;

class LibiaLandingPageFc extends Controller
{
  public function index(Request $request)
  {
    $page_slug = 'education-fair-in-libya-2025';
    $captcha = generateMathQuestion();
    session(['captcha_answer' => $captcha['answer']]);

    $pageDetail = LandingPage::where(['page_slug' => $page_slug])->firstOrFail();

    $universityIds = $pageDetail->universities->pluck('university_id')->toArray();

    $result = [];

    if ($pageDetail) {
      $universityIds = $pageDetail->universities->pluck('university_id')->toArray();

      $universityCourses = UniversityProgram::whereIn('university_id', $universityIds)
        ->with(['category:id,name', 'getSpecialization:id,name']) // Load category and specialization names
        ->get()
        ->groupBy('course_category_id');

      // Prepare structured data for the view
      foreach ($universityCourses as $course_category_id => $specializations) {
        $categoryName = optional($specializations->first()->category)->name;
        $uniqueSpecializations = $specializations->unique('specialization_id')->map(function ($program) {
          return optional($program->getSpecialization)->name;
        })->filter()->toArray(); // Remove null values

        $result[] = [
          'category_name' => $categoryName,
          'specializations' => $uniqueSpecializations,
        ];
      }
    }

    $countries = Country::orderBy('name', 'ASC')->get();
    $phonecodes = Country::orderBy('phonecode', 'ASC')->groupBy('phonecode')->where('phonecode', '!=', 0)->get();
    $levels = Level::all();

    if (old('university') && old('university') != null) {
      $university_id = old('university');
      if ($university_id == '3148') {
        $intrestedLevels = ['Pre-University' => 'PRE-UNIVERSITY'];
      } else {
        $intrestedLevels = ['Under-Graduate' => 'UNDER-GRADUATE', 'Post-Graduate/Master' => 'POST-GRADUATE', 'PHD' => 'PHD'];
      }
    } else {
      $intrestedLevels = null;
    }
    if (old('interested_course') && old('interested_course') != null) {
      $university_id = old('university');
      $level = old('interested_level');
      $categories = CourseCategory::whereHas('programs', function ($query) use ($university_id, $level) {
        $query->where('university_id', $university_id)->where('status', 1)->where('level', $level);
      })->get();
    } else {
      $categories = null;
    }

    if (old('interested_program') && old('interested_program') != null) {
      $university_id = old('university');
      $level = old('interested_level');
      $course_category_id = old('interested_course');

      $programs = UniversityProgram::where('university_id', $university_id)->where('level', $level)->where('course_category_id', $course_category_id)->get();
    } else {
      $programs = null;
    }

    $curCountry = '';

    $lead = null;
    if (session()->has('newId')) {
      $id = session('newId');
      $lead = Lead::find($id);
    }

    $data = compact('captcha', 'pageDetail', 'countries', 'phonecodes', 'levels', 'programs', 'curCountry', 'categories', 'result', 'lead', 'intrestedLevels');
    return view('front.education-fair-in-libia-2025')->with($data);
  }
  public function courses(Request $request)
  {
    return view('front.libya-courses');
  }
  public function institutions(Request $request)
  {
    $page_slug = 'education-fair-in-libya-2025';
    $pageDetail = LandingPage::where(['page_slug' => $page_slug])->first();
    $universities = LandingPageUniversity::where(['landing_page_id' => $pageDetail->id])->get();
    $data = compact('pageDetail', 'universities');
    return view('front.libya-institutions')->with($data);
  }
  public function getProgramsByUniversity(Request $request)
  {
    $university_id = $request->university_id;
    $level = $request->level;
    $course_category_id = $request->course_category_id;
    $output = '<option>Select Program</option>';

    $programs = UniversityProgram::where('university_id', $university_id);
    if ($level) {
      $programs = $programs->where('level', $level);
    }
    if ($course_category_id) {
      $programs = $programs->where('course_category_id', $course_category_id);
    }
    $programs = $programs->get();

    if (!empty($programs)) {
      foreach ($programs as $row) {
        $output .= '<option value="' . $row->course_name . '">' . $row->course_name . '</option>';
      }
    }

    echo $output;
  }
  public function getCoursesByUniversity(Request $request)
  {
    $university_id = $request->university_id;
    $level = $request->level;
    $output = '<option>Select Course</option>';

    $programs = CourseCategory::whereHas('programs', function ($query) use ($university_id, $level) {
      $query->where('university_id', $university_id)->where('status', 1)->where('level', $level);
    })->get();

    if (!empty($programs)) {
      foreach ($programs as $row) {
        $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
      }
    }
    echo $output;
  }

  public function register(Request $request)
  {
    $request->validate(
      [
        'captcha_answer' => ['required', 'numeric', new MathCaptchaValidationRule()],
        'name' => 'required|regex:/^[a-zA-Z\s\x{0600}-\x{06FF}\'-]*$/u',
        'email' => [
          'required',
          'email',
          Rule::unique('leads', 'email')->where('website', site_var),
        ],
        'c_code' => 'required|numeric',
        'mobile' => 'required|numeric',
        'nationality' => 'required',
        'libya_identification_number' => 'required',
        'highest_qualification' => 'required',
        'university' => 'required',
        'interested_level' => 'required',
        'interested_course' => 'required',
        'interested_program' => 'required',
        'gender' => 'required',
        'dob' => 'required',
      ]
    );

    $password = Str::random(10);

    // Detect and translate Arabic input to English
    $translator = new GoogleTranslate('en'); // Translate to English
    $name = $translator->translate($request->input('name'));

    $university = University::find($request->university);
    $courseCategory = CourseCategory::find($request->interested_course);
    $field = new Lead();
    $field->name = $name;
    $field->email = $request['email'];
    $field->c_code = $request['c_code'];
    $field->mobile = $request['mobile'];
    $field->highest_qualification = $request['highest_qualification'];
    $field->intrested_subject = $courseCategory->name;
    $field->interested_level = $courseCategory->interested_level;
    $field->interested_program = $request->interested_program;
    $field->intrested_university = $university->name;
    $field->university_id = $university->id;
    $field->nationality = $request['nationality'];
    $field->identification_number = $request['libya_identification_number'];
    $field->passport_number = $request['passport_number'];
    $field->gender = $request['gender'];
    $field->dob = $request['dob'];
    $field->password = $password;
    $field->source = $request->source;
    $field->source_path = $request->source_path;

    $field->status = 1;
    $field->registered = 1;
    $field->website = site_var;
    $field->save();

    // Generate QR Code
    $qrData = json_encode([
      'Title' => 'Malaysian Universities Education & Training Fair 2025',
      'Student Name' => $field->name,
      'Passport Number' => $field->passport_number,
      'Libya National Id' => $field->identification_number,
    ]);
    $qrCode = QrCode::format('png')->size(300)->generate($qrData);

    // Path to store the QR code
    $qrCodeDirectory = storage_path('app/public/qr-codes');

    // Check if the directory exists, and create it if it doesn't
    if (!is_dir($qrCodeDirectory)) {
      mkdir($qrCodeDirectory, 0777, true); // Create the directory with proper permissions
    }

    // Now, you can generate and save the QR code
    $qrFilePath = $qrCodeDirectory . '/' . $field->id . '-qr.png';
    file_put_contents($qrFilePath, $qrCode);

    // Prepare the email data
    $emaildata = ['name' => $field['name']];
    $dd = [
      'to' => $field['email'],
      'to_name' => $field['name'],
      'subject' => 'Registration Confirmed – Malaysian Universities Education & Training Fair 2025',
    ];

    // Send the email with the QR code as attachment
    Mail::send(
      'mails.student-welcome-mail',
      $emaildata,
      function ($message) use ($dd, $qrFilePath) {
        $message->to($dd['to'], $dd['to_name']);
        $message->subject($dd['subject']);
        $message->priority(1);

        // Attach the QR Code to the email
        $message->attach($qrFilePath, [
          'as' => 'education-fair-qr.png',
          'mime' => 'image/png',
        ]);
      }
    );

    // Delete the temporary QR code file after sending the email
    unlink($qrFilePath);

    session()->flash('smsg', 'Thank you for registering! Please bring this QR code to the Education Fair.');
    session()->flash('QR', true);
    session()->put('newId', $field->id, 10);
    //return response()->json(['success' => 'Thank you for registering! Please bring this QR code to the Education Fair.']);
    //return redirect()->route('thank.you');
    return redirect()->route('libia.page');
  }
  public function registerAjax(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'captcha_answer' => ['required', 'numeric', new MathCaptchaValidationRule()],
      'name' => 'required|regex:/^[a-zA-Z\s\x{0600}-\x{06FF}\'-]*$/u',
      'email' => [
        'required',
        'email',
        Rule::unique('leads', 'email')->where('website', site_var),
      ],
      'c_code' => 'required|numeric',
      'mobile' => 'required|numeric',
      'nationality' => 'required',
      'libya_identification_number' => 'required',
      'highest_qualification' => 'required',
      'university' => 'required',
      'interested_level' => 'required',
      'interested_course' => 'required',
      'interested_program' => 'required',
      'gender' => 'required',
      'dob' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $password = Str::random(10);

    // Detect and translate Arabic input to English
    $translator = new GoogleTranslate('en'); // Translate to English
    $name = $translator->translate($request->input('name'));

    $university = University::find($request->university);
    $courseCategory = CourseCategory::find($request->interested_course);
    $field = new Lead();
    $field->name = $name;
    $field->email = $request['email'];
    $field->c_code = $request['c_code'];
    $field->mobile = $request['mobile'];
    $field->highest_qualification = $request['highest_qualification'];
    $field->intrested_subject = $courseCategory->name;
    $field->interested_level = $courseCategory->interested_level;
    $field->interested_program = $request->interested_program;
    $field->intrested_university = $university->name;
    $field->university_id = $university->id;
    $field->nationality = $request['nationality'];
    $field->identification_number = $request['libya_identification_number'];
    $field->passport_number = $request['passport_number'];
    $field->gender = $request['gender'];
    $field->dob = $request['dob'];
    $field->password = $password;
    $field->source = $request->source;
    $field->source_path = $request->source_path;

    $field->status = 1;
    $field->registered = 1;
    $field->website = site_var;
    $field->save();

    // Generate QR Code
    $qrData = json_encode([
      'id' => $field->id,
      'name' => $field->name,
      'email' => $field->email
    ]);
    $qrCode = QrCode::format('png')->size(300)->generate($qrData);

    // Path to store the QR code
    $qrCodeDirectory = storage_path('app/public/qr-codes');

    // Check if the directory exists, and create it if it doesn't
    if (!is_dir($qrCodeDirectory)) {
      mkdir($qrCodeDirectory, 0777, true); // Create the directory with proper permissions
    }

    // Now, you can generate and save the QR code
    $qrFilePath = $qrCodeDirectory . '/' . $field->id . '-qr.png';
    file_put_contents($qrFilePath, $qrCode);

    // Prepare the email data
    $emaildata = ['name' => $field['name']];
    $dd = [
      'to' => $field['email'],
      'to_name' => $field['name'],
      'subject' => 'Successfully registered on Education Malaysia.',
    ];

    // Send the email with the QR code as attachment
    Mail::send(
      'mails.student-welcome-mail',
      $emaildata,
      function ($message) use ($dd, $qrFilePath) {
        $message->to($dd['to'], $dd['to_name']);
        $message->subject($dd['subject']);
        $message->priority(1);

        // Attach the QR Code to the email
        $message->attach($qrFilePath, [
          'as' => 'education-fair-qr.png',
          'mime' => 'image/png',
        ]);
      }
    );

    // Delete the temporary QR code file after sending the email
    unlink($qrFilePath);

    session()->flash('smsg', 'Thank you for registering! Please bring this QR code to the Education Fair.');
    session()->put('newId', $field->id);
    return response()->json(['success' => 'Thank you for registering! Please bring this QR code to the Education Fair.']);
    //return redirect()->route('thank.you');
  }
  public function thankYou()
  {
    $id = session('newId');
    $lead = Lead::findOrFail($id);
    return view('front.thank-you', compact('lead'));
  }
  public function downloadQR()
  {
    $id = session('newId');
    $lead = Lead::findOrFail($id);

    // Encode user details
    $data = json_encode([
      'Title' => 'Malaysian Universities Education & Training Fair 2025',
      'Student Name' => $lead->name,
      'Passport Number' => $lead->passport_number,
      'Libya National Id' => $lead->identification_number,
    ]);

    // Generate PNG QR Code (No Imagick Required)
    $qrCode = QrCode::format('png')->size(300)->generate($data);

    // Set the filename with lead ID
    $filename = 'education-fair-qr-' . $lead->id . '.png';

    return Response::make($qrCode, 200, [
      'Content-Type' => 'image/png',
      'Content-Disposition' => 'attachment; filename="' . $filename . '"',
    ]);
  }
}
