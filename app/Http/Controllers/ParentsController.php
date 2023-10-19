<?php

namespace App\Http\Controllers;
use App\Models\Parent1;

use Illuminate\Http\Request;

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