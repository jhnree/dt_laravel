<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\TimeEntry;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TimeEntriesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reports(){
        return view("reports");
    }

    public function index()
    {
        //
        $now = Carbon::now();
        $date = date('M d, y');
        $day = date('englishDayOfWeek');
        $hours = date('h:i');
        $seconds = date('s');
        return view("home", compact('date', 'hours', 'seconds', 'day', 'now'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datetime = Carbon::now('Asia/Manila')->format('Y-m-d H:i:s');
        $date = date("Y-m-d", strtotime($request->datepicker));
        $validation = Validator::make($request->all(),[
            'client' => 'required',
            'location' => 'required',
        ]);
        if($validation->fails()){
            return 0;
        }

        $timeEntry = TimeEntry::create([
            'user_id' => Auth::id(),
            'client' => e($request->client),
            'location' => $request->location,
            'ip_address' => e($request->ip()),
            'location_address' => '',
            'device_type' => 'web',
            'latitude' => '0',
            'longitude' => '0',
            'is_synced' => '',
            'time' => $datetime,
            'type' => 'in',
            'synced_date' => $datetime,
            'date_modified'=> $datetime,
        ]);

        return 1;
        // return $date;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $from = date("Y-m-d" , strtotime( $request->from ));
        $to = date("Y-m-d" , strtotime( $request->to ));
        $userid = Auth::id();
        $query = "SELECT
                    tu.id user_id,
                    timein.location time_in_loc,
                    timein.client time_in_client,
                    TIME(timein.time) time_in,
                    DATE(timein.time) time_in_date,
                    timein.synced_date time_in_sync,
                    timeout.location time_out_loc,
                    timeout.client time_out_client,
                    TIME(timeout.time) time_out,
                    DATE(timeout.time) time_out_date,
                    timeout.synced_date time_put_sync
                FROM
                    tbl_user tu
                INNER JOIN(
                    SELECT
                        user_id,
                        DATE(time) date
                    FROM
                        tbl_time_entries
                    WHERE
                        user_id = $userid
                    AND
                        DATE(time) >= '$from' && DATE(time) <= '$to'
                    GROUP BY
                        DATE(time)
                ) dateTrans
                ON dateTrans.user_id = tu.id 
                INNER JOIN
                (
                    SELECT
                        *
                    FROM
                        tbl_time_entries
                    WHERE
                        type = 'in'
                ) timein
                ON dateTrans.date = DATE(timein.time) AND timein.user_id = dateTrans.user_id
                LEFT JOIN
                (
                    SELECT
                        *
                    FROM
                        tbl_time_entries
                    WHERE
                        type = 'out'
                ) timeout
                ON dateTrans.date = DATE(timeout.time) AND timeout.user_id = dateTrans.user_id";

        $c = DB::select(DB::raw($query));

        return $c;
        
        // if(Auth::check()){
        //     $currentUser = Auth::id();
        //     $timeEntries = TimeEntry::where('user_id', $currentUser)->get();
        //     return view('reports', compact('timeEntries'));
        // }
        // return redirect('/');
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
}
