$(document).ready(function($) {

    //--->Enter key press - Start
    js.EnterKey($('.Signup_Frm'), function(e) {
        //prevent the page from reloading 
        e.preventDefault();
        //Call the submit process
        $(".Signup_Btn").click();

    });
    //--->Enter key press - End

    $(document).on('click', '.Signup_Btn', function(e) {
        var Signup_UserName = $('.Signup_UserName');
        var Signup_Email = $('.Signup_Email');
        var Signup_phone = $('.Signup_phone');
        var Signup_address = $('.Signup_address');
        var Signup_offce_type = $('.Signup_offce_type');
        var Signup_accss_level = $('.Signup_accss_level');
        var Signup_province = $('.Signup_province');
        var Signup_min= $('.Signup_min');
        var Signup_dept= $('.Signup_dept');
        var Signup_zonal= $('.Signup_zonal');
        var Signup_UserID = $('.Signup_UserID');
        var Signup_Password = $('.Signup_Password');
        
        //To clear all old alerts
        bs.ClearError();
        $('.Signup_Alert').html('');
        if (frm.IsEmpty(Signup_UserName.val())) {
            //Show alert
            bs.ShowError("Please enter user name", Signup_UserName)
        } else if (frm.IsEmpty(Signup_UserID.val())) {
            //Show alert
            bs.ShowError("Please enter user id", Signup_UserID)
        } else if (frm.IsEmpty(Signup_Password.val())) {
            //Show alert
            bs.ShowError("Please enter password", Signup_Password)
        } else if (frm.IsEmpty(Signup_Email.val())) {
            //Show alert
            bs.ShowError("Please enter email", Signup_Email)
        }  else {
            //do the ajax process	
            var CallType = 'POST' //--->Other options: GET/POST/DELETE/PUT
            var AjaxURL = 'my-ajax-meet.php';
            var DataString = {
                call_type: "signup",
                user_name: Signup_UserName.val(),
                 user_email: Signup_Email.val(),
                user_phone: Signup_phone.val(),
                user_address: Signup_address.val(),
                user_offce_type: Signup_offce_type.val(),
                user_accss_level: Signup_accss_level.val(),
                user_province: Signup_province.val(),
                user_min: Signup_min.val(),
                user_dept: Signup_dept.val(),
                user_zonal: Signup_zonal.val(),
                user_id: Signup_UserID.val(),
                user_password: Signup_Password.val(),
               
            };
            //this is part of the awesome functions lib (http://awesomefunctions.com/jquery#Ajax)
            var ajax = js.Ajax(CallType, AjaxURL, DataString)
            //error
            ajax.fail(function(xhr, ajaxOptions, thrownError) {
                //do your error handling here
                console.log(thrownError);
                console.log(xhr.responseText);
                $('.Signup_Alert').html(xhr.responseText).show();
            });

            //success
            ajax.done(function(data) {
                //do your success data processing here
                //console.log(data)
                var UserData = data;
                //console.log( UserData);
                var Status = UserData.status;
                if (Status == 'error') {
                    if (UserData.error_code == "user_id") {
                        bs.ShowError(UserData.msg, Signup_UserID);
                    } else if (UserData.error_code == "user_email") {
                        bs.ShowError(UserData.msg, Signup_Email);
                    }
                } else if (Status == "success") {
                    var ConfirmLink = ' <br> <br><a href="' + UserData.url + '" target="_blank"  > Confirm ok</a>'
                    var Msg = bs.AlertMsg(UserData.msg, "success");
                    $('.Signup_Alert').after(Msg + ConfirmLink);

//                    $('.Signup_Form').hide();
//                    $('.ScreenMenu').hide();
                }
            });
        }
    });
});

//================================sigupUpdate=========================================
$(document).ready(function($) {

    //--->Enter key press - Start
    js.EnterKey($('.SignupUpdate_Form'), function(e) {
        //prevent the page from reloading 
        e.preventDefault();
        //Call the submit process
        $(".Signupupdate_Btn").click();

    });
    //--->Enter key press - End

    $(document).on('click', '.Signupupdate_Btn', function(e) {
        var Signup_UserName = $('.Signup_UserName');
        var Signup_Email = $('.Signup_Email');
        var Signup_phone = $('.Signup_phone');
        var Signup_address = $('.Signup_address');
        var Signup_offce_type = $('.Signup_offce_type');
        var Signup_accss_level = $('.Signup_accss_level');
        var Signup_province = $('.Signup_province');
        var Signup_min= $('.Signup_min');
        var Signup_dept= $('.Signup_dept');
        var Signup_zonal= $('.Signup_zonal');
        var Signup_UserID = $('.Signup_UserID');
        var Signup_Password = $('.Signup_Password');
        
        //To clear all old alerts
        bs.ClearError();
        $('.Signup_Alert').html('');
        if (frm.IsEmpty(Signup_UserName.val())) {
            //Show alert
            bs.ShowError("Please enter user name", Signup_UserName)
        } else if (frm.IsEmpty(Signup_UserID.val())) {
            //Show alert
            bs.ShowError("Please enter user id", Signup_UserID)
        } else if (frm.IsEmpty(Signup_Password.val())) {
            //Show alert
            bs.ShowError("Please enter password", Signup_Password)
        } else if (frm.IsEmpty(Signup_Email.val())) {
            //Show alert
            bs.ShowError("Please enter email", Signup_Email)
        }  else {
            //do the ajax process	
            var CallType = 'POST' //--->Other options: GET/POST/DELETE/PUT
            var AjaxURL = 'action_ajax.php';
            var DataString = {
                call_type: "signupupdate",
                user_name: Signup_UserName.val(),
                 user_email: Signup_Email.val(),
                user_phone: Signup_phone.val(),
                user_address: Signup_address.val(),
                user_offce_type: Signup_offce_type.val(),
                user_accss_level: Signup_accss_level.val(),
                user_province: Signup_province.val(),
                user_min: Signup_min.val(),
                user_dept: Signup_dept.val(),
                user_zonal: Signup_zonal.val(),
                user_id: Signup_UserID.val(),
                user_password: Signup_Password.val(),
               
            };
            //this is part of the awesome functions lib (http://awesomefunctions.com/jquery#Ajax)
            var ajax = js.Ajax(CallType, AjaxURL, DataString)
            //error
            ajax.fail(function(xhr, ajaxOptions, thrownError) {
                //do your error handling here
                console.log(thrownError);
                console.log(xhr.responseText);
                $('.Signup_Alert').html(xhr.responseText).show();
            });

            //success
            ajax.done(function(data) {
                //do your success data processing here
                //console.log(data)
                var UserData = data;
                //console.log( UserData);
                var Status = UserData.status;
                if (Status == 'error') {
                    if (UserData.error_code == "user_name") {
                        bs.ShowError(UserData.msg, Signup_UserName);
                    } else if (UserData.error_code == "user_email") {
                        bs.ShowError(UserData.msg, Signup_Email);
                    }
                } else if (Status == "success") {
                    var ConfirmLink = '<br><a href="' + UserData.url + '"> Confirm ok</a> <br>'
                    var Msg = bs.AlertMsg(UserData.msg, "success");
                    $('.Signup_Alert').after(Msg + ConfirmLink);

//                    $('.Signup_Form').hide();
//                    $('.ScreenMenu').hide();
                }
            });
        }
    });
});
