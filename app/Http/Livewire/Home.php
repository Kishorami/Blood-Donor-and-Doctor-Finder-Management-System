<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Gallery;
use App\Models\Gallery_detail;
use App\Models\Donor;
use App\Models\Content;
use App\Models\Volunteer;
use DB;

class Home extends Component
{

        public $name, $profession, $p_location, $phone, $email, $gender, $fb_link, $viber_link, $imo_link, $whatsapp_link, $blood_group, $referance;

        public $d_name, $d_profession, $d_p_location, $d_phone, $d_email, $d_gender, $d_fb_link, $d_viber_link, $d_imo_link, $d_whatsapp_link, $d_blood_group, $d_referance;
        
        public function EnglishToBangla($v)
        {
                $engArray  = array(
                    1, 2, 3, 4, 5, 6, 7, 8, 9, 0,
                    'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December',
                    'am', 'pm'
                );
                $bangArray = array(
                    '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০',
                    'জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর',
                    'সকাল', 'দুপুর'
                );
                $converted = str_replace($engArray, $bangArray, $v);
                return $converted;
        }


        public function saveVolunteer()
        {
                $data = new Volunteer;
                 
                $data->name = $this->name;
                $data->profession = $this->profession;
                $data->location = $this->p_location;
                $data->mobile = $this->phone;
                $data->email = $this->email;
                $data->gender = $this->gender;
                $data->facebook = $this->fb_link;
                $data->viber = $this->viber_link;
                $data->imo = $this->imo_link;
                $data->whatsapp = $this->whatsapp_link;
                $data->blood_group = $this->blood_group;
                $data->referance = $this->referance;
                $data->status = "Volunteer";
                $data->type = "invite";

                $data->save();
                $this->emit('storeSomething');
                // dd($data);
        }

        public function saveDonor()
        {
                $data = new Volunteer;
                 
                $data->name = $this->d_name;
                $data->profession = $this->d_profession;
                $data->location = $this->d_p_location;
                $data->mobile = $this->d_phone;
                $data->email = $this->d_email;
                $data->gender = $this->d_gender;
                $data->facebook = $this->d_fb_link;
                $data->viber = $this->d_viber_link;
                $data->imo = $this->d_imo_link;
                $data->whatsapp = $this->d_whatsapp_link;
                $data->blood_group = $this->d_blood_group;
                $data->referance = $this->d_referance;
                $data->status = "Donor";
                $data->type = "donation";

                $data->save();
                $this->emit('storeSomething');
                // dd($data);
        }


        public function render()
        {

                $data['gallery_category'] = Gallery::all();

                $data['gallery'] = Gallery_detail::all();



                $data['galleries'] = DB::table('galleries')

                        ->join('gallery_details', 'gallery_details.gallery_id', '=', 'galleries.id')

                        ->take(30)

                        ->orderBy('gallery_details.id', 'desc')

                        ->get();

                 $data['tobeprouds']= DB::table('tobeprouds')
                        ->where('status', 'Approved')
                        ->orderBy('id', 'desc')
                        ->take(12)
                        ->get();

                        



                $data['slider'] = DB::table('galleries')

                        ->join('gallery_details', 'gallery_details.gallery_id', '=', 'galleries.id')

                        ->where('galleries.page_name', 'slider')

                        ->get();





                $data['blood_fighter'] = DB::table('galleries')

                        ->join('gallery_details', 'gallery_details.gallery_id', '=', 'galleries.id') 

                        ->take(8)

                        ->orderBy('gallery_details.id', 'desc')

                        ->get();



                $data['total_donor']= Donor::all()->count(); 

                $data['a_positive'] = Donor::where([['blood_group','A+'],['already_donated',0]])->get()->count();

                $data['a_negative'] = Donor::where([['blood_group','A-'],['already_donated',0]])->get()->count();

                $data['b_positive'] = Donor::where([['blood_group','B+'],['already_donated',0]])->get()->count();

                $data['b_negative'] = Donor::where([['blood_group','B-'],['already_donated',0]])->get()->count();

                $data['ab_positive'] = Donor::where([['blood_group','AB+'],['already_donated',0]])->get()->count();

                $data['ab_negative'] = Donor::where([['blood_group','AB-'],['already_donated',0]])->get()->count();

                $data['o_positive'] = Donor::where([['blood_group','O+'],['already_donated',0]])->get()->count();

                $data['o_negative'] = Donor::where([['blood_group','O-'],['already_donated',0]])->get()->count();



                //-----------

                $data['t_a_positive'] = Donor::where('blood_group','A+')->get()->count();

                $data['t_a_negative'] = Donor::where('blood_group','A-')->get()->count();

                $data['t_b_positive'] = Donor::where('blood_group','B+')->get()->count();

                $data['t_b_negative'] = Donor::where('blood_group','B-')->get()->count();

                $data['t_ab_positive'] = Donor::where('blood_group','AB+')->get()->count();

                $data['t_ab_negative'] = Donor::where('blood_group','AB-')->get()->count();

                $data['t_o_positive'] = Donor::where('blood_group','O+')->get()->count();

                $data['t_o_negative'] = Donor::where('blood_group','O-')->get()->count();







                // $data['recent_donor'] = Donor:: where('already_donated', 1)->orderByDesc('id')->take(12)->get();
                $data['recent_donor'] = Donor::where('last_donation','!=','na')->orderByDesc('last_donation')->take(12)->get();
                // dd($data['recent_donor']);

                $data['upcoming_event'] = Content:: where('content_type', 'Upcoming Event')->orderByDesc('created_at')->take(2)->get();
                $data['recent_event'] = Content:: where('content_type', 'Recent Events')->orderByDesc('created_at')->take(2)->get();
                $data['news3'] = Content:: where('content_type', 'News')->orderByDesc('created_at')->take(3)->get();
                $data['all_blood_info']=Content::where('content_type','More About Blood')->orderByDesc('created_at')->take(4)->get();
                $data['testimonial']=Content::where('content_type','What People Say')->orderByDesc('created_at')->take(10)->get();


                return view('livewire.home', compact('data'))->layout('frontend.livewire_base');
        }
}
