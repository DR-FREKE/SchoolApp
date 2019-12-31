@extends('layouts.app')

@section('content')
    <!--view teacher tab-->
    <div class="container body" id="view-teacher">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">View Teachers</div>

                    <div class="panel-body">
                        <div class="grid">
                            <div class="box tablebox" style="padding:1em 2em;">
                                <div class="" style="padding:2em 0;">
                                    <div class="form-inline" style="padding-bottom:3em;">
                                        <div class="searchbox">
                                            <input type="search" name="search_name" class="" id="mSearch" placeholder="search here">
                                            <button class="" type="button" name="submit"><span class="fa fa-search"></span></button>
                                        </div>
                                        <div class="" style="padding:0 1em; float:left;">
                                            <Button class="btn btn-danger" type="button" name="delete_user" id="delete_All">Delete All</Button>
                                            <Button class="btn btn-primary" type="button" name="view" id="view">View All</Button>
                                        </div>
                                    </div>
                                    <div id="root"></div>
                                </div>
                                
                                
                                <table class='table table-striped table-bordered table-responsive'>
                                    <thead>
                                        <tr>
                                            <th>FirstName</th>
                                            <th>LastName</th>
                                            <th>Email</th>
                                            <th>Registered Num</th>
                                            <th>Staff ID</th>
                                            <th>Current Rank</th>
                                            <th>Gender</th>
                                            <th class="Header">Edit</th>
                                            <th class="Header">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="info">
                                        @foreach($teach as $new_var)
                                            <tr data-tr="{{ $new_var->teacher_Fname }}">
                                                <td class="td" id="mFname">{{ $new_var->teacher_Fname }}</td>
                                                <td class="td" id="mLname">{{ $new_var->teacher_Lname }}</td>
                                                <td class="td" id="mEmail">{{ $new_var->teacher_Email }}</td>
                                                <td class="td" id="mReg">{{ $new_var->Reg_Num }}</td>
                                                <td class="td" id="mStaffID">{{ $new_var->StaffID }}</td>
                                                <td class="td" id="mCRank">{{ $new_var->teacher_Current_Rank }}</td>
                                                <td class="td" id="mGender">{{ $new_var->teacher_Gender }}</td>
                                                <td data-edit="{{ $new_var->id }}"><button class="edit" id="btnEdit">Edit</button></td>
                                                <td data-delete="{{ $new_var->id }}"><button class='remove' data-target='m'>Delete</button></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="deleteModal" id="delModal">
        <div class="modal-content">
            <span class="close" id="close_delete_modal">&times;</span>
            <span>sure to delete this user :( ? </span>
            <div>
                <button type="button" id="btnDelete">delete</button>
                <button type="button" id="cancel">cancel</button>
            </div>
        </div>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-content">
            <span class="close" id="close_modal">&times;</span>
            <p>Edit this person</p>

            <div class="modal-grid">
                <input name="Id" id="userid" class="input_value" type="hidden"/>
                <div class="box modal-box1">
                    <label for="firstname">FirstName</label>
                    <input name="firstname" id="Fname" class="input_value"/>
                </div>
                <div class="box modal-box2">
                    <label for="lastname">LastName</label>
                    <input name="lastname" id="Lname" class="input_value"/>
                </div>
                <div class="box modal-box3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="Email" class="input_value">
                </div>
                <div class="box modal-box4">
                    <label for="reg_num">Registered Number</label>
                    <input type="text" name="reg_num" id="Reg" class="input_value">
                </div>
                <div class="box modal-box5">
                    <label for="ssn">Social Security Number</label>
                    <input type="text" name="ssn" id="SSN" class="input_value">
                </div>
                <div class="box modal-box6">
                    <label for="staff_id">Current Rank</label>
                    <input type="text" name="rank" id="C-Rank" class="input_value">
                </div>
                <div class="box modal-box7">
                    <label for="date_of_first_app">Date of first Appointment</label>
                    <input type="text" name="date_of_first_app" id="DOFA" class="input_value">
                </div>
                <div class="box modal-box8">
                    <label for="school_name">school_name</label>
                    <input type="text" name="school_name" id="S-Name" class="input_value" disabled>
                </div>
                <div class="box modal-box9">
                    <label for="rank">Staff ID</label>
                    <input type="text" name="staff_id" id="Staff" class="input_value">
                    
                </div>
                <div class="box modal-box10">
                    <label for="dob">DOB</label>
                    <input type="text" name="dob" id="DOB" class="input_value">
                </div>
                <div class="box modal-box11">
                    <label for="gender">Gender</label>
                    <input type="text" name="gender" id="Gender" class="input_value">
                </div>
            </div>
            <div class="buttonBox">
                <button id="save">Save</button>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#mSearch').keyup(function(){
                var root = document.getElementById('root');
                root.style.display="block";
                var con = $('#mSearch').val();
                $('#root').html("<ul><li>"+con+"</li>"+"<li>felix</li></ul>");
                
                if($('#mSearch').val() == ""){
                    root.style.display="none";
                }
                window.onclick=function(e){
                    if(e.target != root){
                        root.style.display = 'none';
                    }
                }
            })
        });
    </script>
@endsection