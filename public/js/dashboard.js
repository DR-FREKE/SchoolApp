currentForm = 0;
mArray = [];
numberofTeachers = 1;

$(document).ready(function() {
    setInterval(Validation, 100);
    constructor();

    var btn = document.getElementById('btnSubmit');
    var btnBars = document.getElementById('icon-bars');

    btnBars.onclick = function() {
        changeClass("myNavbar", "res");
    }

    btn.onclick = function() {
        var selector = document.getElementById('selecter');
        setNumber_of_Forms(selector);
        // render react here: reactDom.Render();
        reactDev();
        showForm(currentForm);
        $(selector).hide();
        $(this).hide();
        $('#add-teacher .panel-heading').html('Add Teachers > Fill Forms');
        selector.value = 1;
    }

});


function setLocalStorage(key, mValue) {
    localStorage.setItem(key, mValue);
}

function getLocalStorage(key) {
    return localStorage.getItem(key);
}

function constructor() {

    var isAvail = getLocalStorage('activeTab');

    if (isAvail == null || isAvail == 'http://localhost:8000/null') {
        alert('welcome to the app')
    } else if (isAvail == 'http://localhost:8000/logout') {
        snackBar('snack', 'show-snackbar', 3000)
    }
}

function snackBar(ID, classNm, time) {

    var vb = document.getElementById(ID);
    vb.className = classNm;
    setTimeout(function() {
        vb.className = vb.className.replace(classNm, "");
        setLocalStorage('activeTab', '/');
    }, time);
}

function setNumber_of_Forms(selector) {
    sessionStorage.setItem('one', selector.value);
}

function getNumber_of_Forms(itemName) {
    //document.getElementById('data').innerHTML = "";
    document.getElementById('btnSubmitForm').style.display = "block";
    //var itemName = sessionStorage.key(1);
    var b = sessionStorage.getItem(itemName);
    return b;
}

function reactDev() {
    numSaved = getNumber_of_Forms('one');
    for (var x = 0; x < numSaved; x++) {
        document.getElementById('mData').innerHTML +=
            '<div class="mForm"> Teacher ' + (numberofTeachers++) +
            '<div class="row">' +
            '<div class="col-md-6">' +
            '<input type="text" name="" class="Fname" placeholder="FirstName" />' +
            '</div>' +
            '<div class="col-md-6">' +
            '<input type="text" name="" class="Lname" placeholder="LastName" />' +
            '</div>' +
            '<div class="col-md-12">' +
            '<input type="text" name="" id="e-mail" class="Email" placeholder="Email" />' +
            '</div>' +
            '<div class="col-md-6">' +
            '<input type="text" name="" class="Reg_num" placeholder="Registration Number" />' +
            '</div>' +
            '<div class="col-md-6">' +
            '<input type="text" name="" class="SSN" placeholder="Social Security Number" />' +
            '</div>' +
            '<div class="col-md-8">' +
            '<input type="text" name="" class="CRank" placeholder="Current Rank" />' +
            '</div>' +
            '<div class="col-md-4">' +
            '<input type="text" name="" class="staffID" placeholder="Staff ID" />' +
            '</div>' +
            '<div class="col-md-6">' +
            '<input type="text" name="" class="DOFA" placeholder="Date of first Appointment" />' +
            '</div>' +
            '<div class="col-md-6">' +
            '<input type="text" name="" class="DOB" placeholder="D.O.B" />' +
            '</div>' +
            '<div class="col-md-6">' +
            '<input type="text" name="" class="Gender" placeholder="Gender" />' +
            '</div>' +
            '</div>' +
            '</div>';

        // return(
        //     <div className></div>   
        // )
    }
    document.getElementById('form-body').style.boxShadow = "0 0 0 1px rgba(0, 0, 0, .1)";
}

function showForm(n) {

    var myForm = document.querySelectorAll('.mForm');
    var btnSubForm = document.getElementById('btnSubmitForm');

    myForm[n].style.display = "block";

    if (n == (myForm.length - 1)) {
        btnSubForm.innerHTML = "submit";
    } else {
        btnSubForm.innerHTML = "next";
    }

    var checkMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    var mail = myForm[currentForm].querySelectorAll('.Email');
    mail.forEach(function(el) {
        el.onkeyup = function() {
            if (el.value.match(checkMail)) {
                el.style.border = "1px solid #bbb";
                btnSubForm.disabled = false
            } else {
                el.style.border = "1px solid red";
                btnSubForm.disabled = true;
            }
        }
    }, this);
}

function plusForm(n) {
    myForm = document.querySelectorAll('.mForm');
    var btnSubForm = document.getElementById('btnSubmitForm'),

        /**
         * get value of a field from the form 
         */
        mFirstName = document.getElementsByClassName('Fname'),
        mLastName = document.getElementsByClassName('Lname'),
        mEmail = document.getElementsByClassName('Email');
    mRegNum = document.getElementsByClassName('Reg_num');
    mSSN = document.getElementsByClassName('SSN');
    mCRank = document.getElementsByClassName('CRank');
    mStaffID = document.getElementsByClassName('staffID');
    mDOFA = document.getElementsByClassName('DOFA');
    mDOB = document.getElementsByClassName('DOB');
    mGender = document.getElementsByClassName('Gender')

    /** check if form has incremented and validation is true/correct */
    if (n == 1 && Validation()) return true;

    /** if the above returns true set the previous 
     * form to be none
     */
    myForm[currentForm].style.display = "none";
    /*increment current form from zero to one*/
    currentForm += n;

    /** save the values gotten from the current form field to an object
     * this object will then be stored in an empty array which is sent to the server
     */
    var element = {
        FirstName: mFirstName[currentForm - 1].value,
        LastName: mLastName[currentForm - 1].value,
        Email: mEmail[currentForm - 1].value,
        RegNum: parseInt(mRegNum[currentForm - 1].value),
        SSN: parseInt(mSSN[currentForm - 1].value),
        StaffId: mStaffID[currentForm - 1].value,
        DOFA: mDOFA[currentForm - 1].value,
        DOB: mDOB[currentForm - 1].value,
        teacher_CR: mCRank[currentForm - 1].value,
        Gender: mGender[currentForm - 1].value,
        SchoolName: document.getElementById('mSchool').innerText
    };

    /** if we get to the end of number of forms created,
     * submit them values to the server
     */
    if (currentForm >= myForm.length) {

        /** reaches the end of form first push object created above to array */
        mArray.push(element);

        /** wait a little for the pushing to array to take place,
         * perform an ajax call to send data to laravel server */
        setTimeout(function() {
            $.ajax({
                type: 'POST',
                url: '/addteachers',
                data: { items: mArray, num: parseInt(getNumber_of_Forms('one')) },
                success: function(res) {
                    returnedMsg = (res.con == 'success') ? 'good here' : 'unsuccessful';
                    alert(returnedMsg);
                    location.reload();
                }
            })
        }, 1000)
    } else {
        mArray.push(element);
    }

    /** show currentForm */
    showForm(currentForm);
}

function Validation() {
    var y, empty;
    var myForm = document.querySelectorAll('.mForm');
    var btnSubForm = document.getElementById('btnSubmitForm');
    y = myForm[currentForm].getElementsByTagName('input');

    [].slice.call(y).forEach(function(e) {
        if (e.value == "") {
            empty = true;
        }
    }, this);
    if (!empty) {
        // btnSubForm.style.display="block";
        // btnSubForm.style.backgroundColor = "#bbbbbb";btnNext.style.border="1px solid red";
    } else {
        // btnSubForm.style.display="none";
    }
    return empty;
}

function changeClass(ID, classNm) {

    var vb = document.getElementById(ID);
    vb.className = classNm;

    vb.className = vb.className.replace(classNm, "res");
}










































































































































// $.ajax({
//     type: 'GET',
//     url: '/viewteachers',
//     success:function(response){
//         var object = JSON.parse(response);
//         var teacher_info = document.getElementById('info');
//         [].slice.call(object.forEach(function(e) {
//             teacher_info.innerHTML += "<tr><td>"+e.Fname+"</td><td>"+e.Lname+"</td><td>"+e.Email+"</td>"+
//             "<td>"+e.Gender+"</td><td><button class='btn btn-danger del' data-target='m'>Delete</button></td></tr>";
//         }, this));
//     }
// });