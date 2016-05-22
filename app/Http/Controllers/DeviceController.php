<?php

namespace App\Http\Controllers;

class DeviceController extends Controller
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

    public function bind(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sn' => 'required',
        ]);
        if ($validator->fails()) {
            throw new \E(1001, $validator->errors());
        }

        return ;
    }

    public function unbind(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sn' => 'required',
        ]);
        if ($validator->fails()) {
            throw new \E();
        }

        return ;
    }

    public function wearerView(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // ''
        ]);
        if ($validator->fails()) {
            throw new \E();
        }

        return ;
    }
}
