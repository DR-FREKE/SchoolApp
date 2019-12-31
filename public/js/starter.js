$(document).ready(function(){
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });

    var name = $('input[name=name]'),
    password = $('input[name=password]');
    $('#btnLogin').on('click', function(){
        mAjax(name, password)
        name.val() == "";

    }); 
    $('.input_field').on('keyup', function(e){
        if(e.keyCode == 13){
            mAjax(name, password);
        }
    })


    //getting user browser type
    // $.ajax({
    //     url:'/',
    //     type: 'GET',
    //     success: function(response){
    //         setTimeout(function(){
    //             alert(response.browser_msg);
    //         }, 3000)
    //     }
    // })
});


var mAjax = function(name, password){
    $.ajax({
        type: 'POST',
        url: '/',
        data: {
            name: name.val(),
            password: password.val()
        },
        success:function(response){
            if(response.msg == "good"){
                var locate = localStorage.getItem('activeTab');
                var mName = sessionStorage.getItem('name');
                if(locate == 'http://localhost:8000/null' || locate == 'http://localhost:8000/logout' || name.val() != mName){
                    window.location="/";
                }else{
                    window.location=locate;
                }
            }else{
                vibrate('loginHolder', 'vibrate', 1000);
            }
        }
    });
}
function vibrate(ID, classNm, time){
    var vb = document.getElementById(ID);
    vb.className = classNm;
    
    setTimeout(function(){
        vb.className = vb.className.replace(classNm, "");
    }, time);
}