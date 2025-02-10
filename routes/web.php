<?php

use App\Http\Controllers\admin\AdminDashboard;
use App\Http\Controllers\admin\AdminLogin;
use App\Http\Controllers\admin\AuthorC;
use App\Http\Controllers\admin\BlogC;
use App\Http\Controllers\admin\BlogCategoryC;
use App\Http\Controllers\admin\CareerC;
use App\Http\Controllers\admin\CourseCategoryC;
use App\Http\Controllers\admin\CourseCategoryContentC;
use App\Http\Controllers\admin\CourseCategoryFaqC;
use App\Http\Controllers\admin\CourseModeC;
use App\Http\Controllers\admin\CourseSpecializationC;
use App\Http\Controllers\admin\CourseSpecializationContentC;
use App\Http\Controllers\admin\CourseSpecializationFaqC;
use App\Http\Controllers\admin\CourseSpecializationLevelContentC;
use App\Http\Controllers\admin\DefaultOgImageC;
use App\Http\Controllers\admin\DestinationArticleC;
use App\Http\Controllers\admin\DestinationArticleContentC;
use App\Http\Controllers\admin\DestinationArticleFaqsC;
use App\Http\Controllers\admin\DestinationC;
use App\Http\Controllers\admin\DestinationFaqC;
use App\Http\Controllers\admin\DynamicPageSeoC;
use App\Http\Controllers\admin\EmployeeC;
use App\Http\Controllers\admin\EmployeeStatusC;
use App\Http\Controllers\admin\ExamC;
use App\Http\Controllers\admin\ExamContentC;
use App\Http\Controllers\admin\ExamFaqC;
use App\Http\Controllers\admin\ExamPageTabC;
use App\Http\Controllers\admin\ExamPageTabContentC;
use App\Http\Controllers\admin\ExamTabFaqC;
use App\Http\Controllers\admin\FaqC;
use App\Http\Controllers\admin\FaqCategoryC;
use App\Http\Controllers\admin\FeesAndDeadlineC;
use App\Http\Controllers\admin\InstituteTypeC;
use App\Http\Controllers\admin\JobApplicationC;
use App\Http\Controllers\admin\JobPageC;
use App\Http\Controllers\admin\JobPageTabC;
use App\Http\Controllers\admin\JobPageTabContentC;
use App\Http\Controllers\admin\LandingPageBannerC;
use App\Http\Controllers\admin\LandingPageC;
use App\Http\Controllers\admin\LandingPageFaqC;
use App\Http\Controllers\admin\LandingPageUniversityC;
use App\Http\Controllers\admin\LevelC;
use App\Http\Controllers\admin\ProgramC;
use App\Http\Controllers\admin\StaticPageSeoC;
use App\Http\Controllers\admin\ServiceC;
use App\Http\Controllers\admin\ServiceContentC;
use App\Http\Controllers\admin\StudentC;
use App\Http\Controllers\admin\StudyModeC;
use App\Http\Controllers\admin\TestimonialC;
use App\Http\Controllers\admin\UniversityC;
use App\Http\Controllers\admin\UniversityFacilityC;
use App\Http\Controllers\admin\UniversityGalleryC;
use App\Http\Controllers\admin\UniversityOtherContentC;
use App\Http\Controllers\admin\UniversityOverviewC;
use App\Http\Controllers\admin\UniversityProgramC;
use App\Http\Controllers\admin\UniversityProgramContentC;
use App\Http\Controllers\admin\UniversityReviewC;
use App\Http\Controllers\admin\UniversityScholarshipC;
use App\Http\Controllers\admin\UniversityScholarshipContentC;
use App\Http\Controllers\admin\UniversityVideoGalleryC;
use App\Http\Controllers\admin\UploadFilesC;
use App\Http\Controllers\admin\UserC;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\front\AuthorFc;
use App\Http\Controllers\front\BlogFc;
use App\Http\Controllers\front\CompareFc;
use App\Http\Controllers\front\ContactFc;
use App\Http\Controllers\front\CourseCategoryFc;
use App\Http\Controllers\front\ExamFc;
use App\Http\Controllers\front\FaqFc;
use App\Http\Controllers\front\HomeFc;
use App\Http\Controllers\front\InquiryController;
use App\Http\Controllers\front\LibiaLandingPageFc;
use App\Http\Controllers\front\OfferLandingPageFc;
use App\Http\Controllers\front\ReviewFc;
use App\Http\Controllers\front\ServiceFc;
use App\Http\Controllers\front\SpecializationFc;
use App\Http\Controllers\front\UniversityProgramListFc;
use App\Http\Controllers\front\UniversityListFc;
use App\Http\Controllers\front\UniversityProfileCoursesFc;
use App\Http\Controllers\front\UniversityProfileFc;
use App\Http\Controllers\sitemap\SitemapController;
use App\Http\Controllers\student\ApplyProgramFc;
use App\Http\Controllers\student\StudentFc;
use App\Http\Controllers\student\StudentLoginFc;
use App\Http\Middleware\AdminLoggedIn;
use App\Http\Middleware\AdminLoggedOut;
use App\Http\Middleware\StudentLoggedIn;
use App\Http\Middleware\StudentLoggedOut;
use App\Models\Blog;
use App\Models\CourseCategory;
use App\Models\CourseSpecialization;
use App\Models\Exam;
use App\Models\Service;
use App\Models\University;
use App\Models\UniversityProgram;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Reoptimized class loader:
Route::get('/optimize', function () {
  $exitCode = Artisan::call('optimize');
  return '<h1>Reoptimized class loader</h1>';
});
Route::get('/f/optimize', function () {
  $exitCode = Artisan::call('optimize');
  return true;
});


//For MIgrate:
Route::get('/migrate', function () {
  $exitCode = Artisan::call('migrate');
  return '<h1>Migrated</h1>';
});
Route::get('/f/migrate', function () {
  $exitCode = Artisan::call('migrate');
  return true;
});


/* FRONT ROUTES */
//Route::get('/', [LibiaLandingPageFc::class, 'index'])->name('libia.page');
Route::get('/', function () {
  return redirect()->route('libia.page');
});

Route::get('/education-fair-in-libya-2025', [LibiaLandingPageFc::class, 'index'])->name('libia.page');
Route::get('/education-fair-in-libya-2025/courses', [LibiaLandingPageFc::class, 'courses'])->name('libia.courses');
Route::get('/education-fair-in-libya-2025/institutions', [LibiaLandingPageFc::class, 'institutions'])->name('libia.institutions');

Route::post('/libia/register', [LibiaLandingPageFc::class, 'register'])->name('libia.register');
Route::get('registration-complete', [LibiaLandingPageFc::class, 'thankYou'])->name('thank.you');
Route::get('/download-qr', [LibiaLandingPageFc::class, 'downloadQR'])->name('download.qr');

Route::post('/libia/fetch-program', [LibiaLandingPageFc::class, 'getProgramsByUniversity'])->name('libia.fetch.program');
Route::post('/libia/fetch-courses', [LibiaLandingPageFc::class, 'getCoursesByUniversity'])->name('libia.fetch.courses');

Route::get('privacy-policy', [HomeFc::class, 'privacyPolicy'])->name('pp');
Route::get('terms-and-conditions', [HomeFc::class, 'termsConditions'])->name('tc');
Route::get('test-popup', [HomeFc::class, 'testPopup']);
// COURSES IN MALAYSIA ROUTES END
