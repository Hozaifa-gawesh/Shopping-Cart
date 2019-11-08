<?php

namespace App\Http\Controllers;

use App\Model\Cities;
use App\Model\Districts;
use Illuminate\Http\Request;
use Validator;

class CitiesController extends Controller
{


    /**
     * Get all districts
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function districts(Request $request)
    {
        if($request->ajax()) {
            $validation = Validator::make($request->all(), [
                'city' => 'required|numeric'
            ]);

            if($validation->fails()) {
                return response(['status' => false, 'message' => $validation->errors()]);

            } else {
                // Get Data City
                $city = Cities::find($request->input('city'));
                // if get data city return true
                if($city) {
                    // Get All Districts Related to City ID
                    $districts = Districts::where('city_id', $city->id)->get();

                    return response(['status' => true, 'districts' => $districts]);

                } else {

                    return response(['status' => false, 'massage' => 'Please enter correct data']);
                }
            }
        }
    }



}
