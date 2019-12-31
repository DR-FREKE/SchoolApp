<?php

namespace App\Http\Controllers;
use App;

use Illuminate\Http\Request;

class TeachersController extends Controller
{
    //
    public function viewTeachers(){
        $Uname = request()->session()->get('credentials')[1];
        $teacher = App\Teacher::where('SchoolName', '=', $Uname)->get();

        if($teacher->count() > 0){
            $teachers = array('teach'=>$teacher);
            return view('viewteachers', $teachers);
        }else{
            return view('nullTeachers');
        }
        
    }

    public function addTeachers(){
        return view('addteachers');
    }

    public function info_Teachers(Request $request){
        $data = $request->editData;
        $editTeachers = App\Teacher::where('id', $data)->first();
        return response()->json([
            'Id'=>$editTeachers->id,
            'Fname'=>$editTeachers->teacher_Fname,
            'Lname'=>$editTeachers->teacher_Lname,
            'Email'=>$editTeachers->teacher_Email,
            'Reg_num'=>$editTeachers->Reg_Num,
            'SSN'=>$editTeachers->SSN,
            'staffID'=>$editTeachers->StaffID,
            'DOFA'=>$editTeachers->DOFA,
            'DOB'=>$editTeachers->DOB,
            'teacher_CR'=>$editTeachers->teacher_Current_Rank,
            'Gender'=>$editTeachers->teacher_Gender,
            'schoolName'=>$editTeachers->SchoolName
        ]);
    }

    //this is function is actually to add teachers....this is was done for testing purpose
    public function addMultiTeachers(){
        $var = 0;
        while($var < request()->num){
            $val = request()->items[$var];
            $mItems[] = array(    
                'teacher_Fname'=>$val['FirstName'],
                'teacher_Lname'=>$val['LastName'],
                'teacher_Email'=>$val['Email'],
                'Reg_Num'=>$val['RegNum'],
                'SSN'=>$val['SSN'],
                'StaffID'=>$val['StaffId'],
                'DOFA'=>$val['DOFA'],
                'DOB'=>$val['DOB'],
                'teacher_Current_Rank'=>$val['teacher_CR'],
                'teacher_Gender'=>$val['Gender'],
                'SchoolName'=>$val['SchoolName'],
            );
            $var++;
        }
        if(App\Teacher::insert($mItems)){
            return response()->json(['con'=>'success']);
        }else{
            return response()->json(['con'=>'unsuccessful']);
        }
    }

    public function deleteTeachers($id){
        $data = App\Teacher::find($id);
        $data->delete();
        if($data->trashed()){
            return response()->json(['deletemsg'=>'deleted']);
        }
        //App\Teacher::destroy($id);
        //
    }
    public function updateTeacher($id){
        $data = App\Teacher::find($id);
        $edit = request()->edit_item;
        //$data->teacher_Fname = $edit[0];
        $data->update([
            'teacher_Fname'=>$edit[0], 
            'teacher_Lname'=>$edit[1], 
            'teacher_Email'=>$edit[2],
            'Reg_Num'=>$edit[3],
            'SSN'=>$edit[4],
            'StaffID'=>$edit[8],
            'DOFA'=>$edit[6],
            'DOB'=>$edit[9],
            'teacher_Current_Rank'=>$edit[5],
            'teacher_Gender'=>$edit[10]
            ]);

        return response()->json([
            'FirstNm'=>$data->teacher_Fname, 
            'LastNm'=>$data->teacher_Lname,
            'email'=>$data->teacher_Email,
            'reg'=>$data->Reg_Num,
            'staff'=>$data->StaffID,
            'rank'=>$data->teacher_Current_Rank,
            'gender'=>$data->teacher_Gender
            ]);
    }
}
