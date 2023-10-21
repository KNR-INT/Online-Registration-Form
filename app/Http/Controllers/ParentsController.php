<?php

namespace App\Http\Controllers;
use App\Models\Parent1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ParentsController extends Controller
{
    function parents_details()
    {
        return view('parents_details');
    }
    public function store(Request $request)
    {
        $appli_id = $request->input('appli_id');
        $parent = Parent1::find($appli_id);

        $validator = Validator::make($request->all(), [
            'father_name' => 'required|string|max:70',
            'father_mob' => 'required|max:14',
            'father_email_verified_at' => 'required|max:50',
            'father_mother_tongue' => 'required|string',
            'father_graduation' => 'required',
            'father_residential_address' => 'required|max:150',
            'father_area' => 'required|max:100',
            'father_district' => 'required|max:100',
            'father_state' => 'required|max:100',
            'father_country' => 'required',
            'father_pincode' => 'required|max:8',
            'father_residential_no' => 'max:11',
            // 'father_organization' => 'max:70',
            'father_profession' => 'max:100',
            'father_company' => 'max:100',
            'father_designation' => 'max:50',
            'father_company_address' => 'max:150',
            'father_office_number' => 'max:11',
            'father_annual_income' => 'required|max:15',
            'mother_name' => 'required|string|max:70',
            'mother_mob' => 'required|max:14',
            'mother_email_verified_at' => 'required|max:50',
            'mother_mother_tongue' => 'required|string',
            'mother_graduation' => 'required',
            'mother_residential_address' => 'required|max:150',
            'mother_area' => 'required|max:100',
            'mother_district' => 'required|max:100',
            'mother_state' => 'required|max:100',
            'mother_country' => 'required',
            'mother_pincode' => 'required|max:8',
            'mother_residential_no' => 'max:11',
            // 'mother_organization' => 'required',
            'mother_profession' => 'max:100',
            'mother_company' => 'max:100',
            'mother_designation' => 'max:50',
            'mother_company_address' => 'max:150',
            'mother_office_number' => 'max:11',
            'mother_annual_income' => 'required|max:15',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $parent->father_name = strtoupper($request->input('father_name'));
        $parent->father_mob = $request->input('father_mob');
        $parent->father_email_verified_at = $request->input('father_email_verified_at');
        $parent->father_mother_tongue = $request->input('father_mother_tongue');
        $parent->father_graduation = $request->input('father_graduation');
        // $parent->father_qualification = $request->input('father_qualification');
        $parent->father_residential_address = $request->input('father_residential_address');
        $parent->father_area = $request->input('father_area');
        $parent->father_district = $request->input('father_district');
        $parent->father_state = $request->input('father_state');
        $parent->father_country = $request->input('father_country');
        $parent->father_pincode = $request->input('father_pincode');
        $parent->father_residential_no = $request->input('father_residential_no');
        $parent->father_organization = $request->input('father_organization');
        $parent->father_profession = $request->input('father_profession');
        $parent->father_company = $request->input('father_company');
        $parent->father_designation = $request->input('father_designation');
        $parent->father_company_address = $request->input('father_company_address');
        $parent->father_office_number = $request->input('father_office_number');
        $parent->father_annual_income = $request->input('father_annual_income');
        $parent->mother_name = strtoupper($request->input('mother_name'));
        $parent->mother_mob = $request->input('mother_mob');
        $parent->mother_email_verified_at = $request->input('mother_email_verified_at');
        $parent->mother_mother_tongue = $request->input('mother_mother_tongue');
        $parent->mother_graduation = $request->input('mother_graduation');
        // $parent->mother_qualification = $request->input('mother_qualification');
        $parent->mother_residential_address = $request->input('mother_residential_address');
        $parent->mother_area = $request->input('mother_area');
        $parent->mother_district = $request->input('mother_district');
        $parent->mother_state = $request->input('mother_state');
        $parent->mother_country = $request->input('mother_country');
        $parent->mother_pincode = $request->input('mother_pincode');
        $parent->mother_residential_no = $request->input('mother_residential_no');
        $parent->mother_organization = $request->input('mother_organization');
        $parent->mother_profession = $request->input('mother_profession');
        $parent->mother_company = $request->input('mother_company');
        $parent->mother_designation = $request->input('mother_designation');
        $parent->mother_company_address = $request->input('mother_company_address');
        $parent->mother_office_number = $request->input('mother_office_number');
        $parent->mother_annual_income = $request->input('mother_annual_income');
        $class = $request->input('page_type');
        // $student->link_class = $request->input('page_type');
        $parent->update();
        return redirect('/upload_doc/a?class='.$class.'&appli_id='.$appli_id);    
    } 
    public function edit($id)
    {
        // $parent->update();
        return redirect('/upload_doc');
    }
    
}