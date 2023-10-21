<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    //
    function onlinereg()
    {
        return view('onlinereg');
    }

    public function store(Request $request)
    {
       
        $appli_id = $request->input('appli_id');
        $class = $request->input('class');
        $student = Student::find($appli_id) ;

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:70',
            'gender' => 'required|in:Boy,Girl',
            'dob' => 'required|date',
            'class' => 'required|string',
            'birth_place' => 'required|string|max:70',
            'nationality' => 'required',
            'religion' => 'required',
            'mother_tongue' => 'required',
            'caste' => 'required',
            'sibling_change' => 'required',
            'sib1_name' => 'max:70',
            'sib1_cls_sec' => 'max:50',
            'sib2_name' => 'max:70',
            'sib2_cls_sec' => 'max:50',
            'phy_clg' => 'required',
            'slp_need' => 'required',
            'transport' => 'required',
            // 'sec_language' => 'required',
            // 'third_language' => 'required',
            // 'electives' => 'required',

        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else {
            if ($request->input('sibling_change') == 'Yes') {
                if (!$request->input('sib1_name') && !$request->input('sib1_cls_sec')) {
                    $validator->errors()->add('sib1_name', 'Sibling 1 name & class is required');
                }
                if (!$request->input('sib1_name') && $request->input('sib1_cls_sec')) {
                    $validator->errors()->add('sib1_name', 'Sibling 1 name is required');
                }
                if ($request->input('sib1_name') && !$request->input('sib1_cls_sec')) {
                    $validator->errors()->add('sib1_cls_sec', 'Sibling 1 class and section are required');
                }
            }
            if ($validator->errors()->any()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
        }

        $acadamic_year_online= DB::connection('secondary')
        ->table('academic_year')
        ->where('set_application_year', '=', 'Yes') 
        ->first();

        $student_acdamic_yaer =  $acadamic_year_online->academic_year;        
        $student->name = strtoupper($request->input('name'));
        $student->gender = $request->input('gender');
        $student->dob = $request->input('dob');
        $student->class = $request->input('class');
        $student->academic_year = $student_acdamic_yaer;
        $student->birth_place = $request->input('birth_place');
        $student->nationality = $request->input('nationality');
        $student->religion = $request->input('religion');
        $student->mother_tongue = $request->input('mother_tongue');
        $student->caste = $request->input('caste');
        $student->blood_group = $request->input('blood_group');
        $student->sib1_name = $request->input('sib1_name');
        $student->sib1_cls_sec = $request->input('sib1_cls_sec');
        $student->sib2_name = $request->input('sib2_name');
        $student->sib2_cls_sec = $request->input('sib2_cls_sec');
        $student->sibling_change = $request->input('sibling_change');
        $student->phy_clg = $request->input('phy_clg');
        $student->slp_need = $request->input('slp_need');
        $student->aadhar = $request->input('aadhar');
        $student->transport = $request->input('transport');
        $student->link_class = $request->input('page_type');
        if($class == "Grade 11")
        {
            $student->electives = $request->input('sec_language');
        }
        else
        {
            $student->sec_language = $request->input('sec_language');
        }
        $student->third_language = $request->input('third_language');
        
        // if ($request->hasFile('image') && $request->file('image')->isValid()) {
        //     $request->validate([
        //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,pdf|max:20971520',
        //     ]);
        
        //     $imageName = $appli_id . '_image.' . $request->image->extension();
        //     $request->image->move(public_path('public/Image'), $imageName);
        //     $student->image = $imageName;
        // }

        $student->update();
        
        $class = $request->input('page_type');
        return redirect('/parents_details/a?class='.$class."&appli_id=".$appli_id);
    }   
    public function updateapplino(Request $request)
    {
       
        $appli_id = $request->input('appli_id');
        $student = Student::find($appli_id) ;
        $student->application_no = $request->input('application_no');
        $student->update();
             
        $class = $request->input('page_type');
        return redirect('/payment/a?class='.$class."&appli_id=".$appli_id);
    }
    public function updateadmitted(Request $request)
    {
       
        $appli_id = $request->input('appli_id');
        $student = Student::find($appli_id) ;
        $student->application_no = $request->input('application_no');
        $student->update();
             
        $class = $request->input('page_type');
        return redirect('/paytm_appli/a?appli_id='.$appli_id);
    }
    public function updatestudentimage()
    {
      echo"aaaaaaaaaaaaaaaaaaaaa";
    }
}