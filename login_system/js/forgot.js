$(document).ready(function($) {

    //--->Enter key press - Start
    js.EnterKey($('.ForgotPassword_Frm'), function(e) {
        //prevent the page from reloading 
        e.preventDefault();
        //Call the submit process
        $(".ForgotPassword_Btn").click();
    });
    //--->Enter key press - End

    $(document).on('click', '.ForgotPassword_Btn', function(e) {
        //Prevent's page from reloading
        e.preventDefault();
        var ForgotPassword_Email = $('.ForgotPassword_Email');
        //To clear all old alerts
        bs.ClearError();
        if (frm.IsEmpty(ForgotPassword_Email.val())) {
            //Show alert
            bs.ShowError("Please enter email", ForgotPassword_Email)
        }
        else if (frm.IsEmail(ForgotPassword_Email.val())) {
            //Show alert
            bs.ShowError("Please enter valid email", ForgotPassword_Email)
        } else {
            //do the ajax process
            var FormData = {
                call_type: "password_reset",
                user_email: ForgotPassword_Email.val(),
            }
            
            $.post("my-ajax.php", FormData, function(data) {
                console.log(data);
                //var UserData = jQuery.parseJSON(data);
                var UserData = $.parseJSON(data);
                var Status = UserData.status;
                if (Status == 'error') {
                    bs.ShowError(UserData.Msg, ForgotPassword_Email)
                } else if (Status == "success") {
                    var ConfirmLink = ' <br> <br><a href="' + UserData.URL + '" target="_blank"  > Reset Password Link</a>';
                    var Msg = bs.AlertMsg(UserData.Msg, "success");
                    $('.ForgotPasswordAlert').after(Msg + ConfirmLink);
                    $('.ForgotPassword_Form').hide();
                    $('.ScreenMenu').hide();
                }
            });
        }
    });
});
