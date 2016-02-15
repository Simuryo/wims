<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Patient;
use App\PersonalInformation;
use App\Referral;
use App\UserReferral;

use Auth;
use DB;

class ReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Auth::user());
        //$received_referrals = User::find(Auth::user()->id)->received_referrals;
        $received_referrals = DB::table('user_referrals')
                                ->where('receiver_id', '=', Auth::user()->hospital_id)
                                ->join('users',     'user_referrals.user_id',     '=', 'users.id')
                                ->join('hospitals', 'users.hospital_id',          '=', 'hospitals.id')
                                ->join('referrals', 'user_referrals.referral_id', '=', 'referrals.id')
                                ->select('user_referrals.*', 'hospitals.name', 'referrals.reason', 'referrals.chief_complaint')
                                ->orderBy('created_at', 'desc')
                                ->get();
        //dd($received_referrals);
        return view('hhway.referrals.index', compact('received_referrals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hhway.referrals.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function created()
    {
        $created_referrals = DB::table('user_referrals')
                                ->where('user_id', '=', Auth::user()->id)
                                ->join('hospitals',  'user_referrals.receiver_id',   '=', 'hospitals.id')
                                ->join('referrals', 'user_referrals.referral_id', '=', 'referrals.id')
                                ->select('user_referrals.*', 'hospitals.name', 'referrals.reason', 'referrals.chief_complaint')
                                ->orderBy('created_at', 'desc')
                                ->get();
        //dd($created_referrals);
        return view('hhway.referrals.created', compact('created_referrals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $patient = new Patient([]);
        $patient->save();

        $patient_info = new PersonalInformation([

            'patient_id'    => $patient->id,
            'last_name'     => $request->get('last_name'),
            'first_name'    => $request->get('first_name'),
            'middle_name'   => $request->get('middle_name'),
            'birth_date'    => $request->get('birth_date'),
            'gender'        => $request->get('gender'),
            'civil_status'  => $request->get('civil_status'),
            'house_no'      => $request->get('address'),
            'street'        => $request->get('address'),
            'barangay'      => $request->get('address'),
            'municipality'  => $request->get('address'),
            'province'      => $request->get('address'),
        ]);

        $patient_info->save();

        $referral = new Referral([

            'urgent'                => $request->get('urgent'),
            'reason'                => $request->get('referral_reason'),
            'patient_id'            => $patient->id,
            'chief_complaint'       => $request->get('chief_complaint'),
            'history'               => $request->get('history'),
            'exams_performed'       => $request->get('exams_performed'),
            'treatment_medication'  => 'treatment_medication',
            'operation_performed'   => $request->get('operation_performed'),
            'diagnosis'             => $request->get('diagnosis'),
            'remarks'               => $request->get('remarks')
        ]);

        $referral->save();
        //dd($referral);
        $user_referral = new UserReferral([

            'referral_id'       => $referral->id,
            'user_id'           => Auth::user()->id,
            'placeholder_id'    => 1,
            'is_read'           => 0,
            'is_important'      => $referral->urgent,
            'receiver_id'       => $request->get('referred_to')
        ]);
        //dd($user_referral);
        $user_referral->save();

        return redirect('hhway/referrals');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function read($id)
    {
        $referral = DB::table('user_referrals')
                        ->join('referrals', 'user_referrals.referral_id', '=', 'referrals.id')
                        ->join('personal_information', 'referrals.patient_id', '=', 'personal_information.patient_id')
                        ->join('hospitals', 'user_referrals.receiver_id', '=', 'hospitals.id')
                        ->where('user_referrals.referral_id', '=', $id)
                        ->first();
        //dd($referral);
        return view('hhway.referrals.read', compact('referral'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
    public function get_receivers(Request $request)
    {
        if($request->has('q')){

            $queryString = $request->input('q');

            $receiver_results = DB::table('hospitals')
                                    ->where('name', 'like', '%'. $queryString .'%')
                                    ->get();

            return response()->json($receiver_results);
        }
        
    }
}
