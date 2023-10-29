<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Donor;
use App\Models\BloodRequest;
use App\Models\Content;
use App\Models\Division;
use App\Models\District;
use App\Models\Location;
use App\Models\Doctor;
use App\Models\Doctor_speciality;
use App\Models\Faq;
use App\Models\Hospital;
use App\Models\Volunteer;
use App\Models\Blog;
use App\Models\TobeProud;

use App\Models\emergencyinfo\emergencynumberinfo_table;
use App\Models\emergencyinfo\ambulance_table;
use App\Models\emergencyinfo\bloodbank_table;
use App\Models\emergencyinfo\funeralinfo_table;
use App\Models\emergencyinfo\graveyardinfo_table;
use App\Models\emergencyinfo\socialinfo_table;
use App\Models\emergencyinfo\theraphycenterinfo_table;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;

class DonorController extends Controller
{

    public $thana;


    //Register API
    public function donorRegister(Request $request)
    {
        // validation
        $request->validate([
            "phone" => "required|unique:donors",
            "email" => "required|email|unique:donors",
            "password" =>"required|confirmed",
            "fname" =>"required",
            "blood_group" =>"required",
            "division" =>"required",
            "district" =>"required",
            "upazila" =>"required",
            "birth_date" =>"required",
            "address" =>"required",
            "post_code" =>"required",
        ]);

        $verification_code = Str::random(6);

        // Mobile otp-------------------------------------
        $sender_id='831';
        $apiKey='TElGRUNZQ0xFQkQ6TGlmZTQ4'; 
        $mobileNo=$request->phone;
        $message='This Varification code is from LifecycleBD for Donor Registration. Varification Code: '.$verification_code;
        $send_sms=self::techno_bulk_sms($sender_id,$apiKey,$mobileNo,$message);
        
        // Mobile otp-------------------------------------

        return response()->json([
                    "status" => 1,
                    "message" =>"Data received successfully",
                    "Verification code" => $verification_code,
                    "data" => $request->all()
                ]);

    }


    function techno_bulk_sms($sender_id,$apiKey,$mobileNo,$message){
        $url = 'https://otpsmsbd.com/api/bulkSmsApi';
        $data = array('sender_id' => $sender_id,
         'apiKey' => $apiKey,
         'mobileNo' => $mobileNo,
         'message' =>$message   
         );

         $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);     
            $output = curl_exec($curl);
            curl_close($curl);

            // echo $output;
            return $output;
    }


    //Verify API
    public function VerifyDonor(Request $request)
    {

        // validation
        $request->validate([
            "phone" => "required|unique:donors",
            "email" => "required|email|unique:donors",
            "password" =>"required|confirmed",
            "fname" =>"required",
            "blood_group" =>"required",
            "division" =>"required",
            "district" =>"required",
            "upazila" =>"required",
            "birth_date" =>"required",
            "address" =>"required",
            "post_code" =>"required",
            "verification_code" =>"required",
            "code_to_verify" =>"required",
        ]);

        if ($request->verification_code === $request->code_to_verify) {

            $newDonor = new Donor();

            $dateOfBirth = $request->birth_date;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dateOfBirth), date_create($today));
            $age = $diff->format('%y');


            $newDonor->phone = $request->phone;
            $newDonor->email = $request->email;
            $newDonor->password = $request->password;
            $newDonor->fname = $request->fname;
            $newDonor->lname = $request->lname;
            $newDonor->blood_group = $request->blood_group;
            $newDonor->division = $request->division;
            $newDonor->district = $request->district;
            $newDonor->upazila = $request->upazila;
            $newDonor->birth_date = $request->birth_date;
            $newDonor->address = $request->address;
            $newDonor->post_code = $request->post_code;
            $newDonor->age = $age;

            $newDonor->save();

            return response()->json([
                    "status" => 1,
                    "message" =>"Donor registration successfully",
                    "data" => $newDonor
                ]);

        } else {
            return response()->json([
                    "status" => 0,
                    "message" =>"Wrong Verification Code is Given."
                ]);
        }
        

        
    }

    //Login API
    public function login(Request $request)
    {
        // validation
        $request->validate([
            "email" => "required",
            "password" =>"required"
        ]);

        //check user
        $donor_info = Donor::where("email", "=", $request->email)->orWhere("phone", "=", $request->email)->first();
        // $donor_info_m = Donor::where("phone", "=", $request->email)->first();

        if (isset($donor_info->id)) {
            
            if ($request->password == $donor_info->password) {
                
                $token = $donor_info->createToken("donor_token")->plainTextToken;


                return response()->json([
                    "status" => 1,
                    "message" =>"Donor logged in successfully",
                    "access_token" => $token
                ]);

            }else{

                return response()->json([
                    "status" => 0,
                    "message" =>"password did not match"
                ],404);
            }
        }else{
            return response()->json([
                "status" => 0,
                "message" =>"Donor Not Found"
            ],404);
        }

    }

    //profile API
    public function profile()
    {
        return response()->json([
                "status" => 1,
                "message" =>"Donor Profile Information",
                "data" =>auth()->user()
            ]);
    }

    //logout API
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
                "status" => 1,
                "message" =>"Donor logged out successfully"
            ]);
    }



    //update profile API
    public function updateProfile(Request $request)
    {

        $data = Donor::find(auth()->user()->id);

        $dateOfBirth = $request->birth_date;
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        $age = $diff->format('%y');

        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->fname = $request->fname;
        $data->lname = $request->lname;
        $data->blood_group = $request->blood_group;
        $data->division = $request->division;
        $data->district = $request->district;
        $data->upazila = $request->upazila;
        $data->birth_date = $request->birth_date;
        $data->address = $request->address;
        $data->post_code = $request->post_code;
        $data->age = $age;

        if ($request->image_code) {
            // ----------------------------------------------------------------------
                $image_64 = $request->image_code; //your base64 encoded data

                $extension = 'png';   // .jpg .png .pdf
                $imageName = Carbon::now()->timestamp.'.'.$extension;

                Storage::disk('user_image')->put($imageName, base64_decode($image_64));
            // -------------------------------------------------------------------------

            $data->pic_path = "uploads/donors/".$imageName;
        }

        $data->save();

        return response()->json([
                "status" => 1,
                "message" =>"Your Information is Updated."
            ]);
    }


    public function bloodRequest(Request $request)
    {
        $data = new BloodRequest;

        //-------------------For BloodRequest Table--------------------------

        $data->request_blood_group = $request->blood_group;

        $data->patient_name = $request->patient_name;

        $data->patient_hospital = $request->patient_place;

        $data->patient_phone = $request->patient_phone;

        $data->patient_place = $request->patient_place;

        $data->blood_send = 'no';
        $data->pending_blood = 'yes';

        $data->number_blood_bag = $request->no_of_blood_bag;

        $data->disease = $request->disease;

        
        $data->relation = "not taken";

        $data->message = $request->message;

        $data->opration_time = $request->time_of_need;

        

        $data->sender_type =  'donor';

        $data->receiver_type =  'admin';

        $data->receiver_email =  'admin@lifecycle.org';

        $data->new_request = 1;


        $data->save();


        return response()->json([
                "status" => 1,
                "message" =>"We Got Your Blood Request. We Will Contact you Soon."
            ]);
    }


    public function healthNews()
    {
        $data = Content::where('content_type','News')->get();

        return response()->json([
                "status" => 1,
                "message" =>"Health News.",
                "data" => $data
            ]);
    }


    public function newsDetails(Request $request)
    {


        // validation
        $request->validate([
            "news_id" => "required",
        ]);

        $data = Content::find($request->news_id);

        return response()->json([
                "status" => 1,
                "message" =>"News Details",
                "data" => $data
            ]);

    }


    public function getDivision()
    {
        $data = Division::all();

        return response()->json([
                "status" => 1,
                "message" =>"Division list",
                "data" => $data
            ]);
    }

    public function getDistricts(Request $request)
    {


        // validation
        $request->validate([
            "division_id" => "required",
        ]);

        $data = District::where('division_row_id', $request->division_id)->get();

        return response()->json([
                "status" => 1,
                "message" =>"District List",
                "data" => $data
            ]);

    }

    public function getThana(Request $request)
    {


        // validation
        $request->validate([
            "district" => "required",
        ]);

        $data = Location::where('district', $request->district)->get();

        return response()->json([
                "status" => 1,
                "message" =>"Thana List",
                "data" => $data
            ]);

    }



    //forgotPassword API
    public function forgetPassword(Request $request)
    {
        // validation
        $request->validate([
            "email" => "required|email"
        ]);

        $donor_info = Donor::where('email',$request->email)->first();

        if ($donor_info) {
        $verification_code = Str::random(6);

        // Mobile otp-------------------------------------
        $sender_id='831';
        $apiKey='TElGRUNZQ0xFQkQ6TGlmZTQ4'; 
        $mobileNo=$donor_info->phone;
        $message='Password Reset Code for LifecycleBD: '.$verification_code;
        $send_sms=self::techno_bulk_sms($sender_id,$apiKey,$mobileNo,$message);
        
        // Mobile otp-------------------------------------

        return response()->json([
                    "status" => 1,
                    "message" =>"Data received successfully",
                    "Verification code" => $verification_code,
                    "data" => $request->all()
                ]);
        } else {
            return response()->json([
                    "status" => 0,
                    "message" =>"Your Given Phone is Not Found In Our Database.",
                    "data" => $request->all()
                ]);
        }
    }

    public function updateForgetPassword(Request $request)
    {
        // validation
        $request->validate([
            "email" => "required|email",
            "password" =>"required|confirmed",
            "verification_code" =>"required",
            "code_to_verify" =>"required"
        ]);

        $donor_info = Donor::where('email',$request->email)->first();


        if ($request->verification_code === $request->code_to_verify) {
            
        
            if ($donor_info) {
                
                $donor_info->password = $request->password;

                $donor_info->save();

                 return response()->json([
                        "status" => 1,
                        "message" =>"Your Password Reset is Successful.",
                        "data" => $request->all()
                    ]);

            }
            else{
                return response()->json([
                        "status" => 0,
                        "message" =>"Your Given Passwords are Different. Insert Same Password",
                        "data" => $request->all()
                    ]);
            }

        }
        else{
            return response()->json([
                        "status" => 0,
                        "message" =>"Your Given Verification Code is Wrong.",
                        "data" => $request->all()
                    ]);
        }
    }


    public function getFaq()
    {
        $faqs = Faq::all();

        return response()->json([
                        "status" => 1,
                        "message" =>"all Faqs",
                        "data" => $faqs
                    ]);
    }



    public function doctorSpeciality()
    {
        $Speciality =Doctor_speciality::all();

        return response()->json([
                        "status" => 1,
                        "message" =>"all Speciality",
                        "data" => $Speciality
                    ]);
    }


    public function findDoctor(Request $request)
    {
        // validation
        $request->validate([
            "doctor_speciality_name" => "required"
        ]);


        $requested_doctors = Doctor::where([

                                            ['specialist', '=', $request->doctor_speciality_name],

                                        ])->get();

        $this->thana = $request->thana;

        if ($request->division_name != null && $request->district !=null && $request->thana != null) {

            $requested_doctors = $requested_doctors
                                        ->where('division',$request->division_name)
                                        ->where('district',$request->district)
                                        ->filter(function ($item){
                                            return strtolower($item['upazila']) == strtolower($this->thana);
                                        });

                                        // ->where('upazila',$thana);
        }
        elseif ($request->division_name != null && $request->district != null) {
            $requested_doctors = $requested_doctors->where('division',$request->division_name)->where('district',$request->district);
        }
        elseif ($request->division_name != null) {
            $requested_doctors = $requested_doctors->where('division',$request->division_name);
        }


        $this->thana = null;

        return response()->json([
                        "status" => 1,
                        "message" =>"Searched Doctors",
                        "data" => $requested_doctors
                    ]);

    }



    public function findHospital(Request $request)
    {
        // validation
        $request->validate([
            "division_name" => "required"
        ]);

        $requested_hospital = Hospital::where([

                                            ['division', '=', $request->division_name],

                                        ])->get();


        $this->thana = $request->thana;

        if ($request->division_name != null && $request->district !=null && $request->thana != null) {

            $requested_hospital = $requested_hospital
                                        ->where('division',$request->division_name)
                                        ->where('district',$request->district)
                                        ->filter(function ($item){
                                            return strtolower($item['upazila']) == strtolower($this->thana);
                                        });
        }
        elseif ($request->division_name != null && $request->district != null) {
            $requested_hospital = $requested_hospital->where('division',$request->division_name)->where('district',$request->district);
        }
        elseif ($request->division_name != null) {
            $requested_hospital = $requested_hospital->where('division',$request->division_name);
        }


        $this->thana = null;

        return response()->json([
                        "status" => 1,
                        "message" =>"Searched Hospitals",
                        "count" =>$requested_hospital->count(),
                        "data" => $requested_hospital
                    ]);

    }


    public function emergencyNumbers()
    {
        $description_info = emergencynumberinfo_table::find(1);

        return response()->json([
                        "status" => 1,
                        "message" =>"Emergency Number Informations",
                        "data" => $description_info
                    ]);
    }



    public function findAmbulance(Request $request)
    {
        // validation
        $request->validate([
            "division_name" => "required"
        ]);

        $requested_hospital = ambulance_table::where([

                                            ['division', '=', $request->division_name],

                                        ])->get();


        $this->thana = $request->thana;

        if ($request->division_name != null && $request->district !=null && $request->thana != null) {

            $requested_hospital = $requested_hospital
                                        ->where('division',$request->division_name)
                                        ->where('district',$request->district)
                                        ->filter(function ($item){
                                            return strtolower($item['upazila']) == strtolower($this->thana);
                                        });
        }
        elseif ($request->division_name != null && $request->district != null) {
            $requested_hospital = $requested_hospital->where('division',$request->division_name)->where('district',$request->district);
        }
        elseif ($request->division_name != null) {
            $requested_hospital = $requested_hospital->where('division',$request->division_name);
        }


        $this->thana = null;

        return response()->json([
                        "status" => 1,
                        "message" =>"Searched Ambulance",
                        "count" =>$requested_hospital->count(),
                        "data" => $requested_hospital
                    ]);
    }


    public function findBloodBank(Request $request)
    {
        // validation
        $request->validate([
            "division_name" => "required"
        ]);

        $requested_hospital = bloodbank_table::where([

                                            ['division', '=', $request->division_name],

                                        ])->get();


        $this->thana = $request->thana;

        if ($request->division_name != null && $request->district !=null && $request->thana != null) {

            $requested_hospital = $requested_hospital
                                        ->where('division',$request->division_name)
                                        ->where('district',$request->district)
                                        ->filter(function ($item){
                                            return strtolower($item['upazila']) == strtolower($this->thana);
                                        });
        }
        elseif ($request->division_name != null && $request->district != null) {
            $requested_hospital = $requested_hospital->where('division',$request->division_name)->where('district',$request->district);
        }
        elseif ($request->division_name != null) {
            $requested_hospital = $requested_hospital->where('division',$request->division_name);
        }


        $this->thana = null;

        return response()->json([
                        "status" => 1,
                        "message" =>"Searched Blood Bank",
                        "count" =>$requested_hospital->count(),
                        "data" => $requested_hospital
                    ]);
    }


    public function findFuneralinfo(Request $request)
    {
        // validation
        $request->validate([
            "division_name" => "required"
        ]);

        $requested_hospital = funeralinfo_table::where([

                                            ['division', '=', $request->division_name],

                                        ])->get();


        $this->thana = $request->thana;

        if ($request->division_name != null && $request->district !=null && $request->thana != null) {

            $requested_hospital = $requested_hospital
                                        ->where('division',$request->division_name)
                                        ->where('district',$request->district)
                                        ->filter(function ($item){
                                            return strtolower($item['upazila']) == strtolower($this->thana);
                                        });
        }
        elseif ($request->division_name != null && $request->district != null) {
            $requested_hospital = $requested_hospital->where('division',$request->division_name)->where('district',$request->district);
        }
        elseif ($request->division_name != null) {
            $requested_hospital = $requested_hospital->where('division',$request->division_name);
        }


        $this->thana = null;

        return response()->json([
                        "status" => 1,
                        "message" =>"Searched Funeralinfo",
                        "count" =>$requested_hospital->count(),
                        "data" => $requested_hospital
                    ]);
    }

    public function findGraveyardinfo(Request $request)
    {
        // validation
        $request->validate([
            "division_name" => "required"
        ]);

        $requested_hospital = graveyardinfo_table::where([

                                            ['division', '=', $request->division_name],

                                        ])->get();


        $this->thana = $request->thana;

        if ($request->division_name != null && $request->district !=null && $request->thana != null) {

            $requested_hospital = $requested_hospital
                                        ->where('division',$request->division_name)
                                        ->where('district',$request->district)
                                        ->filter(function ($item){
                                            return strtolower($item['upazila']) == strtolower($this->thana);
                                        });
        }
        elseif ($request->division_name != null && $request->district != null) {
            $requested_hospital = $requested_hospital->where('division',$request->division_name)->where('district',$request->district);
        }
        elseif ($request->division_name != null) {
            $requested_hospital = $requested_hospital->where('division',$request->division_name);
        }


        $this->thana = null;

        return response()->json([
                        "status" => 1,
                        "message" =>"Searched Graveyardinfo",
                        "count" =>$requested_hospital->count(),
                        "data" => $requested_hospital
                    ]);
    }


    public function findSocialinfo(Request $request)
    {
        // validation
        $request->validate([
            "division_name" => "required"
        ]);

        $requested_hospital = socialinfo_table::where([

                                            ['division', '=', $request->division_name],

                                        ])->get();


        $this->thana = $request->thana;

        if ($request->division_name != null && $request->district !=null && $request->thana != null) {

            $requested_hospital = $requested_hospital
                                        ->where('division',$request->division_name)
                                        ->where('district',$request->district)
                                        ->filter(function ($item){
                                            return strtolower($item['upazila']) == strtolower($this->thana);
                                        });
        }
        elseif ($request->division_name != null && $request->district != null) {
            $requested_hospital = $requested_hospital->where('division',$request->division_name)->where('district',$request->district);
        }
        elseif ($request->division_name != null) {
            $requested_hospital = $requested_hospital->where('division',$request->division_name);
        }


        $this->thana = null;

        return response()->json([
                        "status" => 1,
                        "message" =>"Searched Socialinfo",
                        "count" =>$requested_hospital->count(),
                        "data" => $requested_hospital
                    ]);
    }


    public function findTheraphyCenterinfo(Request $request)
    {
        // validation
        $request->validate([
            "division_name" => "required"
        ]);

        $requested_hospital = theraphycenterinfo_table::where([

                                            ['division', '=', $request->division_name],

                                        ])->get();


        $this->thana = $request->thana;

        if ($request->division_name != null && $request->district !=null && $request->thana != null) {

            $requested_hospital = $requested_hospital
                                        ->where('division',$request->division_name)
                                        ->where('district',$request->district)
                                        ->filter(function ($item){
                                            return strtolower($item['upazila']) == strtolower($this->thana);
                                        });
        }
        elseif ($request->division_name != null && $request->district != null) {
            $requested_hospital = $requested_hospital->where('division',$request->division_name)->where('district',$request->district);
        }
        elseif ($request->division_name != null) {
            $requested_hospital = $requested_hospital->where('division',$request->division_name);
        }


        $this->thana = null;

        return response()->json([
                        "status" => 1,
                        "message" =>"Searched TheraphyCenterinfo",
                        "count" =>$requested_hospital->count(),
                        "data" => $requested_hospital
                    ]);
    }


    public function getAboutUs()
    {
        $aboutUs = DB::table('about_u_s')->where('id',1)->first();

        return response()->json([
                        "status" => 1,
                        "message" =>"About us Informations",
                        "data" => $aboutUs
                    ]);
    }


    public function addVolunteer(Request $request)
    {

        // validation
        $request->validate([
            "name" => "required",
            "profession" => "required",
            "preferred_location" => "required",
            "gender" => "required",
            "blood_group" => "required",
            "phone" => "required"
        ]);

        $data = new Volunteer;
         
        $data->name = $request->name;
        $data->profession = $request->profession;
        $data->location = $request->preferred_location;
        $data->mobile = $request->phone;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->facebook = $request->fb_link;
        $data->whatsapp = $request->whatsapp_link;
        $data->blood_group = $request->blood_group;
        $data->referance = $request->reference;
        $data->status = "Volunteer";
        $data->type = "invite";

        $data->save();
            
        return response()->json([
                    "status" => 1,
                    "message" =>"Volunteer Added.",
                    "data" => $data
                ]); 
    }

    public function addDonor(Request $request)
    {

        // validation
        $request->validate([
            "name" => "required",
            "profession" => "required",
            "preferred_location" => "required",
            "gender" => "required",
            "blood_group" => "required",
            "phone" => "required"
        ]);

        $data = new Volunteer;
         
        $data->name = $request->name;
        $data->profession = $request->profession;
        $data->location = $request->preferred_location;
        $data->mobile = $request->phone;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->facebook = $request->fb_link;
        $data->whatsapp = $request->whatsapp_link;
        $data->blood_group = $request->blood_group;
        $data->referance = $request->reference;
        $data->status = "Donor";
        $data->type = "donation";

        $data->save();
            
        return response()->json([
                    "status" => 1,
                    "message" =>"Donor Added.",
                    "data" => $data
                ]); 
    }


    public function donorBlog(Request $request)
    {
        $request->validate([
            'blog_title' => 'required',
            'description' => 'required'
        ]);
        
        $user_id = session()->get('did');

        $blog_info = new Blog();

        $blog_info->userId = $user_id;
        $blog_info->title = $request->blog_title;
        $blog_info->description = $request->description;
        $blog_info->status = "Not Approved";

        if ($request->image_code) {

            // ----------------------------------------------------------------------
                $image_64 = $request->image_code; //your base64 encoded data

                $extension = 'png';   // .jpg .png .pdf
                $imageName = Carbon::now()->timestamp.'.'.$extension;

                Storage::disk('user_blog_image')->put($imageName, base64_decode($image_64));
            // -------------------------------------------------------------------------


            $blog_info->pic_path = "uploads/blog/".$imageName;
        }
        

        $blog_info->save();


        return response()->json([
                    "status" => 1,
                    "message" =>"Your Blog is submitted. Wait for Approval.",
                    "data" => $blog_info
                ]); 

    }


    public function shareFeelings(Request $request)
    {
        $request->validate([
            'donate_date' => 'required',
            'donate_place' => 'required',
            'reason_of_proud' => 'required'
        ]);

        $user_id = session()->get('did');

        $message_info = new TobeProud();

        // $message_info->userId = $user_id;
        $message_info->donate_date = $request->donate_date;
        $message_info->donate_place = $request->donate_place;
        $message_info->reason_of_proud = $request->reason_of_proud;

        if($request->image_code){


            // ----------------------------------------------------------------------
                $image_64 = $request->image_code; //your base64 encoded data

                $extension = 'png';   // .jpg .png .pdf
                $imageName = Carbon::now()->timestamp.'.'.$extension;

                Storage::disk('user_fillings_image')->put($imageName, base64_decode($image_64));
            // -------------------------------------------------------------------------


            $message_info->pic_path = "uploads/proudmessage/".$imageName;
        }

        $message_info->save();

        return response()->json([
                    "status" => 1,
                    "message" =>"Your Message is submitted.",
                    "data" => $message_info
                ]);
    }



    public function bloodInfo()
    {
        $data = Content::where('content_type','More About Blood')->get();

        return response()->json([
                "status" => 1,
                "message" =>"Blood Info.",
                "data" => $data
            ]);
    }


    public function bloodInfoDetails(Request $request)
    {
         // validation
        $request->validate([
            "blood_info_id" => "required",
        ]);

        $data = Content::find($request->blood_info_id);

        return response()->json([
                "status" => 1,
                "message" =>"Blood Info Details",
                "data" => $data
            ]);
    }

}
