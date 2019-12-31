window.onload=function(){
    
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });
    //update();
    deleteItem();
    teachersProfile();
    edit_Item();
    viewAll();
}

function teachersProfile(){
    $('tbody > tr >.td').on('click', function(){
        var teacher = $(this).parent().attr('data-tr').replace(/ /g, "");
        $.ajax({
            type: 'GET', 
            url: 'viewteachers/'+teacher,
            success:function(){
                window.location="viewteachers/"+teacher.toLowerCase();
            }
        })
    });
}

function deleteItem(){
    var parent;
    var delet = document.getElementsByClassName('remove');
    for(var j=0; j<delet.length; j++){
        delet[j].addEventListener('click', function(){
            parent = $(this).parent().attr('data-delete');
            // alert(parent);
            //onclick on this button perform an ajax call and on success, do this part of the code
           
            //alert(tr.innerHTML);
            var pa =this.parentElement;
            var tr = pa.parentElement;
            delete_Modal(tr, parent);
        })
    }
}

var edit_Item = function(){
    var edit = document.querySelectorAll('.edit');
    edit.forEach(function(element) {
        element.onclick=function(){
            var data_target = $(this).parent().attr('data-edit');
            var pa =this.parentElement;
            var tr = pa.parentElement;
            $.ajax({
                type: 'POST',
                url: '/viewteachers',
                data: { editData: data_target },
                success: function(response){
                    openModal(response, tr, data_target);
                }
            })
        }
    }, this);
}

function viewAll(){
    $('#view').on('click', function(){
        $('#info').load();
    })
}

// code for opening the delete modal
var delete_Modal = function(tr, parent){
    var deleteModal = document.getElementById('delModal');

    var close_modal = document.getElementById('close_delete_modal');

    var btnDelete = document.getElementById('btnDelete');
    var btnCancel = document.getElementById('cancel');

    deleteModal.style.display="block";

    close_modal.onclick=function(){
        deleteModal.style.display = 'none';
    }
    btnCancel.onclick=function(){
        deleteModal.style.display="none";
    }

    btnDelete.onclick=function(){
        $.ajax({
            type: 'DELETE',
            url: '/viewteachers/'+parent,
            success: function(res){
                // 
                tr.style.display="none";
                deleteModal.style.display="none"; 
                alert(res.deletemsg)
            }
        })
    }

    window.onclick=function(e){
        if(e.target == deleteModal){
            deleteModal.style.display = 'block';
        }
    }
}





//code for opening the edit modal
var openModal = function(res, tr, data_target){
    var mModal = document.getElementById('myModal');
    var input_val = document.getElementsByClassName('input_value');
    var btnSave = document.getElementById('save');
    var responseArray = [res.Id, res.Fname, res.Lname, res.Email, 
                        res.Reg_num, res.SSN, res.teacher_CR,
                        res.DOFA, res.schoolName, res.staffID, res.DOB, res.Gender];
   for(var a = 0; a<input_val.length; a++){
       input_val[a].value = responseArray[a]
   }
    
    var close_modal = document.getElementById('close_modal');
    
    mModal.style.display = 'block';

    close_modal.onclick=function(){
        mModal.style.display = 'none';
    }

    window.onclick=function(e){
        if(e.target == mModal){
            mModal.style.display = 'none';
        }
    }
    btnSave.onclick=function(){
        ArrayData=[];
        mElement = document.getElementsByClassName('input_value');
        for(x = 1; x<mElement.length; x++){
            ArrayData.push(mElement[x].value);
        }
        
        $.ajax({
            type: 'POST',
            url: '/update/'+data_target,
            data: {edit_item: ArrayData},
            success: function(res){
                $(tr).children("#mFname").html(res.FirstNm);
                $(tr).children("#mLname").html(res.LastNm);
                $(tr).children("#mEmail").html(res.email);
                $(tr).children("#mReg").html(res.reg);
                $(tr).children("#mStaffID").html(res.staff);
                $(tr).children("#mCRank").html(res.rank);
                $(tr).children("#mGender").html(res.gender);
                $(tr).attr('data-tr', res.FirstNm)
            }
        });
        //alert(tr.innerHTML);
       
    mModal.style.display="none";
    }
}