<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

use DB;

class IdCardController extends Controller
{
    public function idCard(){
      // $employee = Employee::all();

      $user_id = session()->get('did');
      $user_info = DB::table('donors')->where('id',$user_id)->first();
      // dd($user_info);

      return view('idcard.idcard',compact('user_info'));
    }

    public function downloadIdCard()
    {
      $user_id = session()->get('did');
      $user_info = DB::table('donors')->where('id',$user_id)->first();
      // share data to view
      // view()->share('employee',$data);
      $pdf = PDF::loadView('idcard.pdf_idcard',compact('user_info'));

      // download PDF file with download method
      return $pdf->download('id_card.pdf');
    }
}
