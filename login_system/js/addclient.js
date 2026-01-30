//==============================add client===============================
$(document).ready(function($) {
    //--->Enter key press - Start
    js.EnterKey($('.adclient_Form'), function(e) {
        //prevent the page from reloading 
        e.preventDefault();
        //Call the submit process
        $(".addclient_Btn").click();
    });
    //--->Enter key press - End

    $(document).on('click', '.addclient_Btn', function(e) {
        var ac_nicn = $('.nicn');
        var ac_cname = $('.cname');
        var ac_contact = $('.contact');
        var ac_whatap = $('.whatsapp');
        var ac_sdecript = $('.sdecript');
        var ac_ldecript = $('.ldecript');
        var ac_meetpsn = $('.meetpsn');

        //To clear all old alerts
        bs.ClearError();
//        $('.Signup_Alert').html('');
        if (frm.IsEmpty(ac_nicn.val())) {
            //Show alert
            bs.ShowError("Please enter latitude", ac_nicn)
        } else if (frm.IsEmpty(ac_cname.val())) {
            //Show alert
            bs.ShowError("Please enter longitude", ac_cname)
        } else if (frm.IsEmpty(ac_contact.val())) {
            //Show alert
            bs.ShowError("Please Enter NIC No", ac_contact)
        } else if (frm.IsEmpty(ac_sdecript.val())) {
            //Show alert
            bs.ShowError("Please enter Short description", ac_sdecript)
        } else if (frm.IsEmpty(ac_ldecript.val())) {
            //Show alert
            bs.ShowError("Please enter Long description", ac_ldecript)
        } else if (frm.IsEmpty(ac_meetpsn.val())) {
            //Show alert
            bs.ShowError("Meet person", ac_meetpsn)
        } else {
            var CallType = 'POST' //--->Other options: GET/POST/DELETE/PUT
            var AjaxURL = 'action_ajax.php';
            var DataString = {
                call_type: "addclient",
                acnicn: ac_nicn.val(),
                accname: ac_cname.val(),
                accontact: ac_contact.val(),
                acwhatap: ac_whatap.val(),
                acsdecript: ac_sdecript.val(),
                acldecript: ac_ldecript.val(),
                acmeetpsn: ac_meetpsn.val(),
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
                    if (UserData.error_code == "acnicn") {
                        bs.ShowError(UserData.msg, ac_nicn);
                    } else if (UserData.error_code == "accname") {
                        bs.ShowError(UserData.msg, ac_cname);
                    }
                } else if (Status == "success") {
//                    var ConfirmLink = ' <a href="' + UserData.url + '> Confirmed Ok</a>'
                    var Msg = bs.AlertMsg(UserData.msg, "success");
                    $('.Signup_Alert').after(Msg );

//                    $('.Signup_Form').hide();
//                    $('.ScreenMenu').hide();
                }
            });
        }
    });
});


//==============================add ministry===============================

$(document).ready(function($) {
    //--->Enter key press - Start
    js.EnterKey($('.addmin_Form'), function(e) {
        //prevent the page from reloading 
        e.preventDefault();
        //Call the submit process
        $(".addminis_Btn").click();
    });
    //--->Enter key press - End

    $(document).on('click', '.addminis_Btn', function(e) {
        var min_id = $('.min_id');
        var min_name = $('.min_name');
        var min_address = $('.min_address');
        var min_hedname = $('.min_hedname');
        var min_vote = $('.min_vote');
        var min_contact = $('.min_contact');
        //To clear all old alerts
        bs.ClearError();
//        $('.Signup_Alert').html('');
        if (frm.IsEmpty(min_id.val())) {
            //Show alert
            bs.ShowError("Please enter Ministry ID", min_id)
        } else if (frm.IsEmpty(min_name.val())) {
            //Show alert
            bs.ShowError("Please enter Province Name", min_name)
        } else if (frm.IsEmpty(min_address.val())) {
            //Show alert
            bs.ShowError("Please enter Address", min_address)
        } else if (frm.IsEmpty(min_hedname.val())) {
            //Show alert
            bs.ShowError("Please enter Name of the head", min_hedname)
        } else if (frm.IsEmpty(min_vote.val())) {
            //Show alert
            bs.ShowError("Paying Vote", min_vote)
        } else if (frm.IsEmpty(min_contact.val())) {
            //Show alert
            bs.ShowError("Office Contact No", min_contact)
        } else {
            var CallType = 'POST' //--->Other options: GET/POST/DELETE/PUT
            var AjaxURL = 'action_ajax.php';
            var DataString = {
                call_type: "addministry",
                minid: min_id.val(),
                minname: min_name.val(),
                minaddress: min_address.val(),
                minhedname: min_hedname.val(),
                minvote: min_vote.val(),
                mincontact: min_contact.val(),
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
                    if (UserData.error_code == "minid") {
                        bs.ShowError(UserData.msg, min_id);
                    } else if (UserData.error_code == "minname") {
                        bs.ShowError(UserData.msg, min_name);
                    }
                } else if (Status == "success") {
                    var ConfirmLink = '<a href="' + UserData.url + '"  > Confirmed Ok</a>'
                    var Msg = bs.AlertMsg(UserData.msg, "success");
                    $('.Signup_Alert').after(Msg + ConfirmLink);

//                    $('.Signup_Form').hide();
//                    $('.ScreenMenu').hide();
                }
            });
        }
    });
});
//==============================add department===============================

$(document).ready(function($) {
    //--->Enter key press - Start
    js.EnterKey($('.adddepr_Form'), function(e) {
        //prevent the page from reloading 
        e.preventDefault();
        //Call the submit process
        $(".adddept_Btn").click();
    });
    //--->Enter key press - End

    $(document).on('click', '.adddept_Btn', function(e) {
        var dept_id = $('.dept_id');
        var dept_name = $('.dept_name');
        var dept_address = $('.dept_address');
        var dept_hedname = $('.dept_hedname');
        var dept_vote = $('.dept_vote');
        var dept_contact = $('.dept_contact');
        //To clear all old alerts
        bs.ClearError();
//        $('.Signup_Alert').html('');
        if (frm.IsEmpty(dept_id.val())) {
            //Show alert
            bs.ShowError("Please enter Department ID", dept_id)
        } else if (frm.IsEmpty(dept_name.val())) {
            //Show alert
            bs.ShowError("Please enter Department Name", dept_name)
        } else if (frm.IsEmpty(dept_address.val())) {
            //Show alert
            bs.ShowError("Please enter Address", dept_address)
        } else if (frm.IsEmpty(dept_hedname.val())) {
            //Show alert
            bs.ShowError("Please enter Name of the head", dept_hedname)
        } else if (frm.IsEmpty(dept_vote.val())) {
            //Show alert
            bs.ShowError("Paying Vote", dept_vote)
        } else if (frm.IsEmpty(dept_contact.val())) {
            //Show alert
            bs.ShowError("Office Contact No", dept_contact)
        } else {
            var CallType = 'POST' //--->Other options: GET/POST/DELETE/PUT
            var AjaxURL = 'action_ajax.php';
            var DataString = {
                call_type: "adddeprtmnt",
                deptid: dept_id.val(),
                deptname: dept_name.val(),
                deptaddress: dept_address.val(),
                depthedname: dept_hedname.val(),
                deptvote: dept_vote.val(),
                deptcontact: dept_contact.val(),
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
                    if (UserData.error_code == "deptid") {
                        bs.ShowError(UserData.msg, dept_id);
                    } else if (UserData.error_code == "deptname") {
                        bs.ShowError(UserData.msg, dept_name);
                    }
                } else if (Status == "success") {
                    var ConfirmLink = '<a href="' + UserData.url + '"  > Confirmed Ok</a>'
                    var Msg = bs.AlertMsg(UserData.msg, "success");
                    $('.Signup_Alert').after(Msg + ConfirmLink);

//                    $('.Signup_Form').hide();
//                    $('.ScreenMenu').hide();
                }
            });
        }
    });
});

//==============================add Zonal Office===============================

$(document).ready(function($) {
    //--->Enter key press - Start
    js.EnterKey($('.addoffice_Form'), function(e) {
        //prevent the page from reloading 
        e.preventDefault();
        //Call the submit process
        $(".addoffice_Btn").click();
    });
    //--->Enter key press - End

    $(document).on('click', '.addoffice_Btn', function(e) {
        var zonal_id = $('.zonal_id');
        var office_name = $('.office_name');
        var office_address = $('.office_address');
        var office_hedname = $('.office_hedname');
        var office_vote = $('.office_vote');
        var office_contact = $('.office_contact');
        //To clear all old alerts
        bs.ClearError();
//        $('.Signup_Alert').html('');
        if (frm.IsEmpty(zonal_id.val())) {
            //Show alert
            bs.ShowError("Please enter Office ID", zonal_id)
        } else if (frm.IsEmpty(office_name.val())) {
            //Show alert
            bs.ShowError("Please enter Office Name", office_name)
        } else if (frm.IsEmpty(office_address.val())) {
            //Show alert
            bs.ShowError("Please enter Address", office_address)
        } else if (frm.IsEmpty(office_hedname.val())) {
            //Show alert
            bs.ShowError("Please enter Name of the head", office_hedname)
        } else if (frm.IsEmpty(office_vote.val())) {
            //Show alert
            bs.ShowError("Paying Vote", office_vote)
        } else if (frm.IsEmpty(office_contact.val())) {
            //Show alert
            bs.ShowError("Office Contact No", office_contact)
        } else {
            var CallType = 'POST' //--->Other options: GET/POST/DELETE/PUT
            var AjaxURL = 'action_ajax.php';
            var DataString = {
                call_type: "adddofficedept",
                zonalid: zonal_id.val(),
                officename: office_name.val(),
                officeaddress: office_address.val(),
                officehedname: office_hedname.val(),
                officevote: office_vote.val(),
                officecontact: office_contact.val(),
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
                    if (UserData.error_code == "zonalid") {
                        bs.ShowError(UserData.msg, zonal_id);
                    } else if (UserData.error_code == "officename") {
                        bs.ShowError(UserData.msg, office_name);
                    }
                } else if (Status == "success") {
                    var ConfirmLink = '  <a href="' + UserData.url + '"  > Confirmed Ok</a>'
                    var Msg = bs.AlertMsg(UserData.msg, "success");
                    $('.Signup_Alert').after(Msg + ConfirmLink);

//                    $('.Signup_Form').hide();
//                    $('.ScreenMenu').hide();
                }
            });
        }
    });
});
//==============================add Meet person===============================

$(document).ready(function($) {
    //--->Enter key press - Start
    js.EnterKey($('.addmtpon_Form'), function(e) {
        //prevent the page from reloading 
        e.preventDefault();
        //Call the submit process
        $(".addmtpson_Btn").click();
    });
    //--->Enter key press - End

    $(document).on('click', '.addmtpson_Btn', function(e) {
        var met_person_id = $('.met_person_id');
        var meet_name = $('.meet_name');
        var meet_desig = $('.meet_desig');
        var meet_contact = $('.meet_contact');

        //To clear all old alerts
        bs.ClearError();
//        $('.Signup_Alert').html('');
        if (frm.IsEmpty(meet_name.val())) {
            //Show alert
            bs.ShowError("Please enter Person Name", meet_name)
        } else if (frm.IsEmpty(meet_desig.val())) {
            //Show alert
            bs.ShowError("Please enter Designation", meet_desig)
        } else {
            var CallType = 'POST' //--->Other options: GET/POST/DELETE/PUT
            var AjaxURL = 'action_ajax.php';
            var DataString = {
                call_type: "adddmeetperson",
                metperson_id: met_person_id.val(),
                meetname: meet_name.val(),
                meetdesig: meet_desig.val(),
                meetcontact: meet_contact.val(),
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
                    if (UserData.error_code == "metperson_id") {
                        bs.ShowError(UserData.msg, met_person_id);
                    } else if (UserData.error_code == "meetname") {
                        bs.ShowError(UserData.msg, meet_name);
                    }
                } else if (Status == "success") {
                    var ConfirmLink = ' <a href="' + UserData.url + '"  > Confirmed Ok</a>'
                    var Msg = bs.AlertMsg(UserData.msg, "success");
                    $('.Signup_Alert').after(Msg + ConfirmLink);

//                    $('.Signup_Form').hide();
//                    $('.ScreenMenu').hide();
                }
            });
        }
    });
});




//==============================add sense===============================

$(document).ready(function($) {
    //--->Enter key press - Start
    js.EnterKey($('.sense_Form'), function(e) {
        //prevent the page from reloading 
        e.preventDefault();
        //Call the submit process
        $(".btn_sense").click();
    });
    //--->Enter key press - End

    $(document).on('click', '.btn_sense', function(e) {
        var sense_refCode = $('.sense_refCode');
        var sense_nic = $('.sense_nic');
        var sense_selectCode = $('.sense_selectCode');
        var meetp_id = $('.meetp_id');


        //To clear all old alerts
        bs.ClearError();
//        $('.Signup_Alert').html('');
        if (frm.IsEmpty(sense_refCode.val())) {
            //Show alert
            bs.ShowError("No Selected Reff No", sense_refCode)
        } else if (frm.IsEmpty(sense_nic.val())) {
            //Show alert
            bs.ShowError("Please Select NIC", sense_nic)
        } else if (frm.IsEmpty(sense_selectCode.val())) {
            //Show alert
            bs.ShowError("Please Select the Sense", sense_selectCode)
        } else {
            var CallType = 'POST' //--->Other options: GET/POST/DELETE/PUT
            var AjaxURL = 'action_ajax.php';
            var DataString = {
                call_type: "adddsenser",
                senserefCode: sense_refCode.val(),
                sensenic: sense_nic.val(),
                senseselectCode: sense_selectCode.val(),
                meetpid: meetp_id.val(),
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
                    if (UserData.error_code == "senserefCode") {
                        bs.ShowError(UserData.msg, sense_refCode);
                    } else if (UserData.error_code == "senseselectCode") {
                        bs.ShowError(UserData.msg, sense_selectCode);
                    }
                } else if (Status == "success") {
//                    var ConfirmLink = ' <a href="' + UserData.url + '"  > Confirmed Ok</a>'
                    var Msg = bs.AlertMsg(UserData.msg, "success");
                    $('.Signup_Alert').after(Msg );

//                    $('.Signup_Form').hide();
//                    $('.ScreenMenu').hide();
                }
            });
        }
    });
});//==============================change user updare==================================================


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
        var Signup_UserID = $('.Signup_UserID');
        var Signup_Email = $('.Signup_Email');
        var Signup_phone = $('.Signup_phone');
        var Signup_address = $('.Signup_address');


        //To clear all old alerts
        bs.ClearError();
//        $('.Signup_Alert').html('');
        if (frm.IsEmpty(Signup_UserName.val())) {
            //Show alert
            bs.ShowError("Please Enter Current Password", Signup_UserName)
        } else if (frm.IsEmpty(Signup_UserID.val())) {
            //Show alert
            bs.ShowError("Please Enter New Password", Signup_UserID)
        } else if (frm.IsEmpty(Signup_Email.val())) {
            //Show alert
            bs.ShowError("ReType New  Password", Signup_Email)
        } else if (frm.IsEmpty(Signup_phone.val())) {
            //Show alert
            bs.ShowError("ReType New  Password", Signup_phone)
        }else if (frm.IsEmpty(Signup_address.val())) {
            //Show alert
            bs.ShowError("ReType New  Password", Signup_address)
        }else {
            var CallType = 'POST' //--->Other options: GET/POST/DELETE/PUT
            var AjaxURL = 'action_ajax.php';
            var DataString = {
                call_type: "signupupdate",
                user_name: Signup_UserName.val(),
                SignupUserID: Signup_UserID.val(),
                user_email: Signup_Email.val(),
                user_phone: Signup_phone.val(),
                user_address: Signup_address.val(),

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
                    if (UserData.error_code == "SignupUserName") {
                        bs.ShowError(UserData.msg, Signup_UserName);
                    } else if (UserData.error_code == "SignupUserID") {
                        bs.ShowError(UserData.msg, Signup_UserID);
                    }
                } else if (Status == "success") {
                    var ConfirmLink = '  <a href="' + UserData.url + '"  > Confirmed Ok</a>'
                    var Msg = bs.AlertMsg(UserData.msg, "success");
                    $('.Signup_Alert').after(Msg + ConfirmLink);

//                    $('.Signup_Form').hide();
//                    $('.ScreenMenu').hide();
                }
            });
        }
    });
});

//==============================change Password==================================================


$(document).ready(function($) {
    //--->Enter key press - Start
    js.EnterKey($('.changepass_Form'), function(e) {
        //prevent the page from reloading 
        e.preventDefault();
        //Call the submit process
        $(".changepass_Btn").click();
    });
    //--->Enter key press - End

    $(document).on('click', '.changepass_Btn', function(e) {
        var c_password = $('.cpassword');
        var new_passwrd = $('.newpasswrd');
        var renew_passwrd = $('.renewpasswrd');


        //To clear all old alerts
        bs.ClearError();
//        $('.Signup_Alert').html('');
        if (frm.IsEmpty(c_password.val())) {
            //Show alert
            bs.ShowError("Please Enter Current Password", c_password)
        } else if (frm.IsEmpty(new_passwrd.val())) {
            //Show alert
            bs.ShowError("Please Enter New Password", new_passwrd)
        } else if (frm.IsEmpty(renew_passwrd.val())) {
            //Show alert
            bs.ShowError("ReType New  Password", renew_passwrd)
        } else {
            var CallType = 'POST' //--->Other options: GET/POST/DELETE/PUT
            var AjaxURL = 'action_ajax.php';
            var DataString = {
                call_type: "changepass",
                cpassword: c_password.val(),
                newpasswrd: new_passwrd.val(),
                renewpasswrd: renew_passwrd.val(),
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
                    if (UserData.error_code == "cpassword") {
                        bs.ShowError(UserData.msg, c_password);
                    } else if (UserData.error_code == "newpasswrd") {
                        bs.ShowError(UserData.msg, new_passwrd);
                    }
                } else if (Status == "success") {
                    var ConfirmLink = '  <a href="' + UserData.url + '"  > Confirmed Ok</a>'
                    var Msg = bs.AlertMsg(UserData.msg, "success");
                    $('.Signup_Alert').after(Msg + ConfirmLink);

//                    $('.Signup_Form').hide();
//                    $('.ScreenMenu').hide();
                }
            });
        }
    });
});

//==============================send Message===============================

$(document).ready(function($) {
    //--->Enter key press - Start
    js.EnterKey($('.msg_Form'), function(e) {
        //prevent the page from reloading 
        e.preventDefault();
        //Call the submit process
        $(".message_btn").click();
    });
    //--->Enter key press - End
    $(document).on('click', '.message_btn', function(e) {
        var siid = $('.siid');
        var refNo = $('.refNo');
        var name = $('.name');
        var contact = $('.contact');
        var subject = $('.subject');
        var messages = $('.messages');


        //To clear all old alerts
        bs.ClearError();
//        $('.Signup_Alert').html('');
        if (frm.IsEmpty(siid.val())) {
            //Show alert
            bs.ShowError("Please Select the Institution", siid)
        } else if (frm.IsEmpty(refNo.val())) {
            //Show alert
            bs.ShowError("Please Enter Reference No", refNo)
        } else if (frm.IsEmpty(name.val())) {
            //Show alert
            bs.ShowError("What is the Name", name)
        } else if (frm.IsEmpty(contact.val())) {
            //Show alert
            bs.ShowError("No Contact No", contact)
        } else if (frm.IsEmpty(subject.val())) {
            //Show alert
            bs.ShowError("Type Subject Here", subject)
        } else if (frm.IsEmpty(messages.val())) {
            //Show alert
            bs.ShowError("Type Youe Message", messages)
        } else {
            var CallType = 'POST' //--->Other options: GET/POST/DELETE/PUT
            var AjaxURL = 'action_ajax.php';
            var DataString = {
                call_type: "sendmessage",
                m_siid: siid.val(),
                m_refNo: refNo.val(),
                m_name: name.val(),
                m_contact: contact.val(),
                m_subject: subject.val(),
                m_messages: messages.val(),
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
                    if (UserData.error_code == "m_siid") {
                        bs.ShowError(UserData.msg, siid);
                    } else if (UserData.error_code == "m_name") {
                        bs.ShowError(UserData.msg, name);
                    }
                } else if (Status == "success") {
                    var ConfirmLink = '  <a href="' + UserData.url + '> Confirmed Ok</a>'
                    var Msg = bs.AlertMsg(UserData.msg, "success");
                    $('.Signup_Alert').after(Msg );

//                    $('.Signup_Form').hide();
//                    $('.ScreenMenu').hide();
                }
            });
        }
    });
});


//============================== Message delete===============================

$(document).ready(function($) {
    //--->Enter key press - Start
    js.EnterKey($('.msg_form'), function(e) {
        //prevent the page from reloading 
        e.preventDefault();
        //Call the submit process
        $(".read").click();
    });
    //--->Enter key press - End

    $(document).on('click', '.read', function(e) {
        var msgrefno = $('.msgrefno');

        //To clear all old alerts
        bs.ClearError();
//        $('.Signup_Alert').html('');
        if (frm.IsEmpty(msgrefno.val())) {
            //Show alert
            bs.ShowError("Please Select the message", msgrefno)
        } else {
            var CallType = 'POST' //--->Other options: GET/POST/DELETE/PUT
            var AjaxURL = 'action_ajax.php';
            var DataString = {
                call_type: "messagedlete",
                m_msgrefno: msgrefno.val(),
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
                    if (UserData.error_code == "m_msgrefno") {
                        bs.ShowError(UserData.msg, msgrefno);
                    }
                } else if (Status == "success") {
                    var ConfirmLink = '<a href="' + UserData.url + '> Confirmed Ok</a>'
                    var Msg = bs.AlertMsg(UserData.msg, "success");
                    $('.Signup_Alert').after(Msg + ConfirmLink);

//                    $('.Signup_Form').hide();
//                    $('.ScreenMenu').hide();
                }
            });
        }
    });
});