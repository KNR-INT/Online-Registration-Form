<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Oldschool;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class ImageUploadController extends Controller
{
    //Add image
    public function addImage(){
        return view('add_image');
    }
    //Store image privious_details_uploads
    public function storeImage(Request $request)
    {
        $appli_id = $request->input('appli_id');
        $class = $request->input('class');
        $page_type = $request->input('page_type');
        $appli_class = $request->input('appli_class');
        $old_school_value = $request->input('old_school_value');
        
        // Retrieve the student object
        $student = Student::find($appli_id);
        
        if ($student) {
            if($appli_class == "PRE-K" || $appli_class == "Montessori I" || $appli_class == "Montessori II"|| $appli_class == "Montessori III"|| $appli_class == "Kindergarten I"|| $appli_class == "Kindergarten II" || $appli_class == "Grade 1")
            {
                $validator = Validator::make($request->all(), [
                    'file' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:20971520',
                    'file1' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:20971520',
                    'file2' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:20971520',
                    'file3' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:20971520',
                    'file4' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:20971520',
                    'file6' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:20971520',
                ]);
                if ($validator->fails()) {
                    return back()
                        ->withErrors($validator)
                        ->withInput();
                }

                if ($request->file('file')->isValid()) {
                    $imageName = $appli_id . '_student_aadhar.' . $request->file->extension();
                    $request->file->move(public_path('public/'), $imageName);
                    
                    $student->student_adr = $imageName;
                }
                if ($request->file('file1')->isValid()) {
                    $imageName = $appli_id . '_birth_cer.' . $request->file1->extension();
                    $request->file1->move(public_path('public/'), $imageName);
                    
                    $student->birth_cer = $imageName;
                }
                if ($request->file('file2')->isValid()) {
                    $imageName = $appli_id . '_father_aadhar.' . $request->file2->extension();
                    $request->file2->move(public_path('public/'), $imageName);
                    
                    $student->father_aadhar = $imageName;
                }
                if ($request->file('file3')->isValid()) {
                    $imageName = $appli_id . '_mother_aadhar.' . $request->file3->extension();
                    $request->file3->move(public_path('public/'), $imageName);
                    
                    $student->mother_aadhar = $imageName;
                }
                if ($request->file('file4')->isValid()) {
                    $imageName = $appli_id . '_immunization_card.' . $request->file4->extension();
                    $request->file4->move(public_path('public/'), $imageName);
                    
                    $student->immunization_card = $imageName;
                }
                if ($request->file('file6')->isValid()) {
                    $imageName = $appli_id . '_std_image.' . $request->file6->extension();
                    $request->file6->move(public_path('public/'), $imageName);
                    $student->std_image = $imageName;
                }
            }
            else if($appli_class == 'Grade 2' || $appli_class =='Grade 3' || $appli_class =='Grade 4' || $appli_class =='Grade 5' || $appli_class == 'Grade 6' || $appli_class =='Grade 7' || $appli_class =='Grade 8' || $appli_class =='Grade 9' || $appli_class == 'Grade 11')
            {
                $validator = Validator::make($request->all(), [
                    'file' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:20971520',
                    'file1' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:20971520',
                    'file2' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:20971520',
                    'file3' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:20971520',
                    'file6' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:20971520',
                ]);
                if ($validator->fails()) {
                    return back()
                        ->withErrors($validator)
                        ->withInput();
                }
                if ($request->file('file')->isValid()) {
                    $imageName = $appli_id . '_student_aadhar.' . $request->file->extension();
                    $request->file->move(public_path('public/'), $imageName);
                    
                    $student->student_adr = $imageName;
                }
                if ($request->file('file1')->isValid()) {
                    $imageName = $appli_id . '_birth_cer.' . $request->file1->extension();
                    $request->file1->move(public_path('public/'), $imageName);
    
                    $student->birth_cer = $imageName;
                   
                }
                if ($request->file('file2')->isValid()) {
                    $imageName = $appli_id . '_father_aadhar.' . $request->file2->extension();
                    $request->file2->move(public_path('public/'), $imageName);
                    
                    $student->father_aadhar = $imageName;
                   
                    
                }
                if ($request->file('file3')->isValid()) {
                    $imageName = $appli_id . '_mother_aadhar.' . $request->file3->extension();
                    $request->file3->move(public_path('public/'), $imageName);
                    
                    $student->mother_aadhar = $imageName;  
                }

                if ($request->file('file6')->isValid()) {
                    $imageName = $appli_id . '_std_image.' . $request->file6->extension();
                    $request->file6->move(public_path('public/'), $imageName);
                    
                    $student->std_image = $imageName;  
                }
               
            } 
        }
        $student->update();
        if($appli_class == 'Grade 2' || $appli_class =='Grade 3' || $appli_class =='Grade 4' || $appli_class =='Grade 5' || $appli_class == 'Grade 6' || $appli_class =='Grade 7' || $appli_class =='Grade 8' || $appli_class =='Grade 9' || $appli_class == 'Grade 11')
        {
        DB::table('old_school')->where("appli_id",$appli_id)->delete();
        if($old_school_value == "0")
        {
            $academic_1 = $request->input('academic_1');
            $school_name_1 = $request->input('school_name_1');
            $class_1 = $request->input('class_1');
            $board_1 = $request->input('board_1');
            $lang2_name_1 = $request->input('lang2_name_1');
            $eng_marks_1 = $request->input('eng_marks_1');
            $math_marks_1 = $request->input('math_marks_1');
            $science_marks_1 = $request->input('science_marks_1');
            $lang2_marks_1 = $request->input('lang2_marks_1');
          
            $validator = Validator::make($request->all(), [
                'marksheet_1' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:20971520', 
            ]);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            if ($request->file('marksheet_1')->isValid()) {
                $imageName_1 = $appli_id . 'marksheet_1_' . $request->marksheet_1->extension();
                $request->marksheet_1->move(public_path('public/'), $imageName_1);
            }

            $data = array(
                "academic_year" => isset($academic_1) ? $academic_1 : null,
                "rec_id" => "1",
                "old_class" => isset($class_1) ? $class_1 : null,
                "school_name" => isset($school_name_1) ? $school_name_1 : null,
                "board" => isset($board_1) ? $board_1 : null,
                "eng_marks" => isset($eng_marks_1) ? $eng_marks_1 : null,
                "math_marks" => isset($math_marks_1) ? $math_marks_1 : null,
                "science_marks" => isset($science_marks_1) ? $science_marks_1 : null,
                "lang2_name" => isset($lang2_name_1) ? $lang2_name_1 : null,
                "lang2_marks" => isset($lang2_marks_1) ? $lang2_marks_1 : null,
                "appli_id" => $appli_id,
                "privious_details_uploads" => isset($imageName_1) ? $imageName_1 : null
            );
        
            DB::table('old_school')->insert($data);
        }
        else if($old_school_value == "1"){
            $academic_1 = $request->input('academic_1');
            $school_name_1 = $request->input('school_name_1');
            $class_1 = $request->input('class_1');
            $board_1 = $request->input('board_1');
            $lang2_name_1 = $request->input('lang2_name_1');
            $eng_marks_1 = $request->input('eng_marks_1');
            $math_marks_1 = $request->input('math_marks_1');
            $science_marks_1 = $request->input('science_marks_1');
            $lang2_marks_1 = $request->input('lang2_marks_1');
            
            $academic_2 = $request->input('academic_2');
            $school_name_2 = $request->input('school_name_2');
            $class_2 = $request->input('class_2');
            $board_2 = $request->input('board_2');
            $lang2_name_2 = $request->input('lang2_name_2');
            $eng_marks_2 = $request->input('eng_marks_2');
            $math_marks_2 = $request->input('math_marks_2');
            $science_marks_2 = $request->input('science_marks_2');
            $lang2_marks_2 = $request->input('lang2_marks_2');
           
            $validator = Validator::make($request->all(), [
                'marksheet_1' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:20971520', 
                'marksheet_2' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:20971520', 
            ]);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            if ($request->file('marksheet_1')->isValid()) {
                $imageName_1 = $appli_id . 'marksheet_1_' . $request->marksheet_1->extension();
                $request->marksheet_1->move(public_path('public/'), $imageName_1);
            }
            if ($request->file('marksheet_2')->isValid()) {
                $imageName_2 = $appli_id . 'marksheet_2_' . $request->marksheet_2->extension();
                $request->marksheet_2->move(public_path('public/'), $imageName_2);
            }

            $data = array(
                "academic_year" => isset($academic_1) ? $academic_1 : null,
                "rec_id" => "1",
                "old_class" => isset($class_1) ? $class_1 : null,
                "school_name" => isset($school_name_1) ? $school_name_1 : null,
                "board" => isset($board_1) ? $board_1 : null,
                "eng_marks" => isset($eng_marks_1) ? $eng_marks_1 : null,
                "math_marks" => isset($math_marks_1) ? $math_marks_1 : null,
                "science_marks" => isset($science_marks_1) ? $science_marks_1 : null,
                "lang2_name" => isset($lang2_name_1) ? $lang2_name_1 : null,
                "lang2_marks" => isset($lang2_marks_1) ? $lang2_marks_1 : null,
                "appli_id" => $appli_id,
                "privious_details_uploads" => isset($imageName_1) ? $imageName_1 : null
            );
        
            DB::table('old_school')->insert($data);

            $data1 = array(
                "academic_year" => isset($academic_2) ? $academic_2 : null,
                "rec_id" => "2",
                "old_class" => isset($class_2) ? $class_2 : null,
                "school_name" => isset($school_name_2) ? $school_name_2 : null,
                "board" => isset($board_2) ? $board_2 : null,
                "eng_marks" => isset($eng_marks_2) ? $eng_marks_2 : null,
                "math_marks" => isset($math_marks_2) ? $math_marks_2 : null,
                "science_marks" => isset($science_marks_2) ? $science_marks_2 : null,
                "lang2_name" => isset($lang2_name_2) ? $lang2_name_2 : null,
                "lang2_marks" => isset($lang2_marks_2) ? $lang2_marks_2 : null,
                "appli_id" => $appli_id,
                "privious_details_uploads" => isset($imageName_2) ? $imageName_2 : null
            );
        
            DB::table('old_school')->insert($data1);
        }
        else if($old_school_value == "2"){
            $academic_1 = $request->input('academic_1');
            $school_name_1 = $request->input('school_name_1');
            $class_1 = $request->input('class_1');
            $board_1 = $request->input('board_1');
            $lang2_name_1 = $request->input('lang2_name_1');
            $eng_marks_1 = $request->input('eng_marks_1');
            $math_marks_1 = $request->input('math_marks_1');
            $science_marks_1 = $request->input('science_marks_1');
            $lang2_marks_1 = $request->input('lang2_marks_1');
            
            $academic_2 = $request->input('academic_2');
            $school_name_2 = $request->input('school_name_2');
            $class_2 = $request->input('class_2');
            $board_2 = $request->input('board_2');
            $lang2_name_2 = $request->input('lang2_name_2');
            $eng_marks_2 = $request->input('eng_marks_2');
            $math_marks_2 = $request->input('math_marks_2');
            $science_marks_2 = $request->input('science_marks_2');
            $lang2_marks_2 = $request->input('lang2_marks_2');

            $academic_3 = $request->input('academic_3');
            $school_name_3 = $request->input('school_name_3');
            $class_3 = $request->input('class_3');
            $board_3 = $request->input('board_3');
            $lang2_name_3 = $request->input('lang2_name_3');
            $eng_marks_3 = $request->input('eng_marks_3');
            $math_marks_3 = $request->input('math_marks_3');
            $science_marks_3 = $request->input('science_marks_3');
            $lang2_marks_3 = $request->input('lang2_marks_3');

            $validator = Validator::make($request->all(), [
                'marksheet_1' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:20971520', 
                'marksheet_2' => 'mimes:jpeg,png,jpg,gif,pdf|max:20971520', 
                'marksheet_3' => 'mimes:jpeg,png,jpg,gif,pdf|max:20971520', 
            ]);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            if ($request->file('marksheet_1')->isValid()) {
                $imageName_1 = $appli_id . 'marksheet_1_' . $request->marksheet_1->extension();
                $request->marksheet_1->move(public_path('public/'), $imageName_1);
            }
            if ($request->file('marksheet_2')) {
                $imageName_2 = $appli_id . 'marksheet_2_' . $request->marksheet_2->extension();
                $request->marksheet_2->move(public_path('public/'), $imageName_2);
            }
            if ($request->file('marksheet_3')) {
                $imageName_3 = $appli_id . 'marksheet_3_' . $request->marksheet_3->extension();
                $request->marksheet_3->move(public_path('public/'), $imageName_3);
            }

            $data = array(
                "academic_year" => isset($academic_1) ? $academic_1 : null,
                "rec_id" => "1",
                "old_class" => isset($class_1) ? $class_1 : null,
                "school_name" => isset($school_name_1) ? $school_name_1 : null,
                "board" => isset($board_1) ? $board_1 : null,
                "eng_marks" => isset($eng_marks_1) ? $eng_marks_1 : null,
                "math_marks" => isset($math_marks_1) ? $math_marks_1 : null,
                "science_marks" => isset($science_marks_1) ? $science_marks_1 : null,
                "lang2_name" => isset($lang2_name_1) ? $lang2_name_1 : null,
                "lang2_marks" => isset($lang2_marks_1) ? $lang2_marks_1 : null,
                "appli_id" => $appli_id,
                "privious_details_uploads" => isset($imageName_1) ? $imageName_1 : null
            );
        
            DB::table('old_school')->insert($data);

            $data1 = array(
                "academic_year" => isset($academic_2) ? $academic_2 : null,
                "rec_id" => "2",
                "old_class" => isset($class_2) ? $class_2 : null,
                "school_name" => isset($school_name_2) ? $school_name_2 : null,
                "board" => isset($board_2) ? $board_2 : null,
                "eng_marks" => isset($eng_marks_2) ? $eng_marks_2 : null,
                "math_marks" => isset($math_marks_2) ? $math_marks_2 : null,
                "science_marks" => isset($science_marks_2) ? $science_marks_2 : null,
                "lang2_name" => isset($lang2_name_2) ? $lang2_name_2 : null,
                "lang2_marks" => isset($lang2_marks_2) ? $lang2_marks_2 : null,
                "appli_id" => $appli_id,
                "privious_details_uploads" => isset($imageName_2) ? $imageName_2 : null
            );
        
            DB::table('old_school')->insert($data1);

            $data2 = array(
                "academic_year" => isset($academic_3) ? $academic_3 : null,
                "rec_id" => "3",
                "old_class" => isset($class_3) ? $class_3 : null,
                "school_name" => isset($school_name_3) ? $school_name_3 : null,
                "board" => isset($board_3) ? $board_3 : null,
                "eng_marks" => isset($eng_marks_3) ? $eng_marks_3 : null,
                "math_marks" => isset($math_marks_3) ? $math_marks_3 : null,
                "science_marks" => isset($science_marks_3) ? $science_marks_3 : null,
                "lang2_name" => isset($lang2_name_3) ? $lang2_name_3 : null,
                "lang2_marks" => isset($lang2_marks_3) ? $lang2_marks_3 : null,
                "appli_id" => $appli_id,
                "privious_details_uploads" => isset($imageName_3) ? $imageName_3 : null
            );
        
            DB::table('old_school')->insert($data2);
        }
                    }
         return redirect('/application_details/a?class='.$page_type."&appli_id=".$appli_id);
         
        }
        public function upload_doc(){
            $imageData= Image::all();
            return view('application_details');
        }
        public function showImage($imageName)
        {
            $imagePath = public_path('public/') . $imageName;
        
            if (File::exists($imagePath)) {
                $file = file_get_contents($imagePath);
                return response($file, 200)->header('Content-Type', 'image/jpeg'); 
            } else {
                abort(404);
            }

        }
    }