<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Role;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function home()
    {
        $roles = Role::latest()->get();
        $location = Location::where('parent_id', 0)->orderBy('location_name', 'asc')->get();
        $data['roles'] = $roles;
        $data['location'] = $location;
        return view('home', compact('data'));
    }
    function upzilaList(Request $request)
    {
        if ($request->ajax()) {
            if ($request->district_id) {
                $upazilas = Location::where('parent_id', $request->district_id)->get();
                $output = '';
                if (!$upazilas->isEmpty()) {
                    foreach ($upazilas as $upazila) {

                        $output .= '<option value="' . $upazila->id . '">' . $upazila->location_name . '</option>';
                    }
                }
                return response()->json($output);
            }
        }
    }
}
