<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IdCardController;


use App\Http\Livewire\Home;
use App\Http\Livewire\FindDoctor;
use App\Http\Livewire\WriteToDoctor;
use App\Http\Livewire\FindHospital;
use App\Http\Livewire\ContactUs;
use App\Http\Livewire\DonorRegister;
use App\Http\Livewire\DonorLogin;
use App\Http\Livewire\DonorProfile;
use App\Http\Livewire\MakeBloodRequest;
use App\Http\Livewire\BloodInfo;
use App\Http\Livewire\BloodInfoDetails;
use App\Http\Livewire\News;
use App\Http\Livewire\NewsDetails;
use App\Http\Livewire\AllBlog;
use App\Http\Livewire\BlogDetails;
use App\Http\Livewire\Events;
use App\Http\Livewire\EventDetails;
use App\Http\Livewire\DonorForgotPassword;
use App\Http\Livewire\DonorChangePassword;
use App\Http\Livewire\DonorWriteBlog;
use App\Http\Livewire\DonorReasonOfProud;
use App\Http\Livewire\Fundraiser;
use App\Http\Livewire\VolunteerComponent;
use App\Http\Livewire\EmergencyInformation;
use App\Http\Livewire\FaqComponent;

use App\Http\Livewire\Emergencyinfo\EnergencyComponent;
use App\Http\Livewire\Emergencyinfo\EmergencyNumberComponent;

use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\AdminBloodRequest;
use App\Http\Livewire\Admin\AdminContents;
use App\Http\Livewire\Admin\AdminDoctors;
use App\Http\Livewire\Admin\AdminDonors;
use App\Http\Livewire\Admin\AdminSearchDonors;
use App\Http\Livewire\Admin\AdminHospitals;
use App\Http\Livewire\Admin\AdminContactUs;
use App\Http\Livewire\Admin\AdminTobeprouds;
use App\Http\Livewire\Admin\AdminVolunteers;
use App\Http\Livewire\Admin\AdminUserBlog;
use App\Http\Livewire\Admin\AdminFindSolution;
use App\Http\Livewire\Admin\AddVolunteer;
use App\Http\Livewire\Admin\EditVolunteer;
use App\Http\Livewire\Admin\AdminFaq;
use App\Http\Livewire\Admin\AdminProfiles;
use App\Http\Livewire\Admin\AddDonor;
use App\Http\Livewire\Admin\EditDonor;
use App\Http\Livewire\Admin\ReceiverProfile;
use App\Http\Livewire\Admin\AddReceiverProfile;
use App\Http\Livewire\Admin\EditReceiverProfile;
use App\Http\Livewire\Admin\DonorImportExcel;
use App\Http\Livewire\Admin\DonorProfileView;

use App\Http\Livewire\Admin\AdminWhatPeopleSay;

use App\Http\Livewire\Admin\EmergencyInfoSettings;

use App\Http\Livewire\Admin\Settings\SiteSettings;

use App\Http\Livewire\Admin\Settings\SliderComponent;



use App\Http\Livewire\Admin\Emergency\AmbulanceInfo;
use App\Http\Livewire\Admin\Emergency\BloodBankInfo;
use App\Http\Livewire\Admin\Emergency\FuneralInfo;
use App\Http\Livewire\Admin\Emergency\GraveyardInfo;
use App\Http\Livewire\Admin\Emergency\SocialInfo;
use App\Http\Livewire\Admin\Emergency\TheraphyCenterInfo;
use App\Http\Livewire\Admin\Emergency\EmergencyNumberInfo;

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

// Route::get('/', function () {
//     return view('frontend.home');
// });

Route::get('/aout_us', function () {
    return view('frontend.aboutUs');
});

Route::get('/ambulance_info', function () {
    return view('frontend.ambulance_info');
});

Route::any('/donor_logout', function () {

    session_unset();
    session()->flush();

    return redirect('/donor_login');
});


Route::get('/id_card', [IdCardController::class, 'idCard']);
Route::get('/idcard/pdf', [IdCardController::class, 'downloadIdCard']);

//Livewire Classes---------------------------------------------------------------------------

Route::get('/',Home::class);
Route::get('/find_doctor',FindDoctor::class);
Route::get('/write_to_doctor',WriteToDoctor::class);
Route::get('/find_hospital',FindHospital::class);
Route::get('/contact_us',ContactUs::class)->name('contact_us');
Route::get('/donor_register',DonorRegister::class);
Route::get('/donor_login',DonorLogin::class);
Route::get('/donor_profile',DonorProfile::class);
Route::get('/request_blood',MakeBloodRequest::class);
Route::get('/blood_info',BloodInfo::class);
Route::get('/blood_info_details/{id}',BloodInfoDetails::class)->name('blood_info.details');
Route::get('/news',News::class);
Route::get('/news_details/{id}',NewsDetails::class)->name('news.details');
Route::get('/blog',AllBlog::class);
Route::get('/blog_details/{id}',BlogDetails::class)->name('blog.details');
Route::get('/events',Events::class);
Route::get('/event_details/{id}',EventDetails::class)->name('event.details');
Route::get('/forgot_password',DonorForgotPassword::class);
Route::get('/change_password',DonorChangePassword::class);
Route::get('/donor_write_blog',DonorWriteBlog::class);
Route::get('/donor_reason_of_proud',DonorReasonOfProud::class);
Route::get('/fundraiser',Fundraiser::class);
Route::get('/volunteer_component',VolunteerComponent::class);
Route::get('/emergency_info',EmergencyInformation::class);
Route::get('/faq_info',FaqComponent::class);

Route::get('/emergency_component/{id}',EnergencyComponent::class)->name('emergency_component');
Route::get('/emergency_number_component',EmergencyNumberComponent::class)->name('emergency_number_component');

//Livewire Classes---------------------------------------------------------------------------


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // return view('dashboard');
    return redirect()->route('blood_requests');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function(){
    //Admin Livewire Classes---------------------------------------------------------------------------
    Route::get('/admin/dashboard',AdminDashboard::class)->name('dashboard');
    Route::get('/admin/blood_requests',AdminBloodRequest::class)->name('blood_requests');
    Route::get('/admin/admin_contents',AdminContents::class)->name('admin_contents');
    Route::get('/admin/admin_doctors',AdminDoctors::class)->name('admin_doctors');
    Route::get('/admin/admin_donors',AdminDonors::class)->name('admin_donors');
    Route::get('/admin/admin_search_donors',AdminSearchDonors::class)->name('admin_search_donors');
    Route::get('/admin/admin_hospitals',AdminHospitals::class)->name('admin_hospitals');
    Route::get('/admin/admin_contact_us',AdminContactUs::class)->name('admin_contact_us');
    Route::get('/admin/admin_to_be_proud',AdminTobeprouds::class)->name('admin_to_be_proud');
    Route::get('/admin/admin_volunteers',AdminVolunteers::class)->name('admin_volunteers');
    Route::get('/admin/admin_user_blog',AdminUserBlog::class)->name('admin_user_blog');
    Route::get('/admin/admin_find_solution',AdminFindSolution::class)->name('admin_find_solution');

    Route::get('/admin/admin_site_settings',SiteSettings::class)->name('admin_site_settings');
    Route::get('/admin/admin_add_volunteer',AddVolunteer::class)->name('admin_add_volunteer');
    Route::get('/admin/admin_edit_volunteer/{id}',EditVolunteer::class)->name('admin_edit_volunteer');

    Route::get('/admin/admin_slider',SliderComponent::class)->name('admin_slider');

    Route::get('/admin/admin_faq',AdminFaq::class)->name('admin_faq');
    Route::get('/admin/admin_profiles',AdminProfiles::class)->name('admin_profiles');

    Route::get('/admin/add_donor',AddDonor::class)->name('add_donor');
    Route::get('/admin/edit_donor/{id}',EditDonor::class)->name('edit_donor');

    Route::get('/admin/receiver_profile',ReceiverProfile::class)->name('receiver_profile');
    Route::get('/admin/add_receiver_profiler',AddReceiverProfile::class)->name('add_receiver_profile');
    Route::get('/admin/edit_receiver_profile/{id}',EditReceiverProfile::class)->name('edit_receiver_profile');


    Route::get('/admin/import_donor_excel',DonorImportExcel::class)->name('import_donor_excel');

    Route::get('/admin/donor_profile/{id}',DonorProfileView::class)->name('donor_profile');



    Route::get('/admin/emergency_info_settings',EmergencyInfoSettings::class)->name('emergency_info_settings');

    Route::get('/admin/admin_what_people_say',AdminWhatPeopleSay::class)->name('admin_what_people_say');




    Route::get('/admin/ambulance_info_settings',AmbulanceInfo::class)->name('ambulance_info_settings');
    Route::get('/admin/bloodbank_info_settings',BloodBankInfo::class)->name('bloodbank_info_settings');
    Route::get('/admin/funeral_info_settings',FuneralInfo::class)->name('funeral_info_settings');
    Route::get('/admin/graveyard_info_settings',GraveyardInfo::class)->name('graveyard_info_settings');
    Route::get('/admin/social_info_settings',SocialInfo::class)->name('social_info_settings');
    Route::get('/admin/theraphycenter_info_settings',TheraphyCenterInfo::class)->name('theraphycenter_info_settings');

    Route::get('/admin/emergencynumber_info_settings',EmergencyNumberInfo::class)->name('emergencynumber_info_settings');

    //Admin Livewire Classes---------------------------------------------------------------------------
});





