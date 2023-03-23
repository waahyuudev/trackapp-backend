<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrackersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $trackers = Tracker::all();

        return response()->json([
            'success' => true,
            'message' => 'List Semua Post',
            'data' => $trackers
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'location' => 'required',
            'device_info' => 'required',
            'call_logs' => 'required',
            'sms_logs' => 'required',
            'list_contact' => 'required',
            'apps_downloaded' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data' => $validator->errors()
            ], 401);

        } else {

            $post = Tracker::create([
                'location' => $request->input('location'),
                'device_info' => $request->input('device_info'),
                'call_logs' => $request->input('call_logs'),
                'sms_logs' => $request->input('sms_logs'),
                'list_contact' => $request->input('list_contact'),
                'apps_downloaded' => $request->input('apps_downloaded'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Tracker Berhasil Disimpan!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Tracker Gagal Disimpan!',
                ], 400);
            }

        }
    }
}
