

$(document).ready(function($) {

    //--->Enter key press - Start
    js.EnterKey($('.Login_Frm'), function(e) {
        //prevent the page from reloading 
        e.preventDefault();
        //Call the submit process
        $(".Login_Btn").click();
    });
    //--->Enter key press - End

    $(document).on('click', '.Login_Btn', function(e) {
        var Login_Email = $('.Login_Email');
        var Login_Password = $('.Login_Password');
        //To clear all old alerts
        bs.ClearError();
        if (frm.IsEmail(Login_Email.val())) {
            //Show alert
            bs.ShowError("Please enter valid email", Login_Email)
        } else if (frm.IsEmpty(Login_Password.val())) {
            //Show alert
            bs.ShowError("Please enter valid password ", Login_Password)
        } else {
            //do the ajax process
            var FormData = {
                call_type: "login",
                user_email: Login_Email.val(),
                user_password: Login_Password.val(),
            }

            $.post("my-ajax-meet.php", FormData, function(data) {

               var UserData = $.parseJSON(data);
                console.log(UserData);
                var Status = UserData.status;
                if (Status == 'error') {
                    var Msg = "Login Failed...</br></br>Please Check Your Email And/Or Password... </br></br>And Try Again";
                    var ErrorMsg = bs.AlertMsg(Msg, 'error');
                    $('.LoginAlert').after(ErrorMsg);
                }
                else if (Status == "success") {
                    $(".screen-click").hide();
                    $(".panel-title").html('Redirecting To Dashboard.... Please Wait...');
                    //redirect to dashboard
                    $(location).attr('href', UserData['URL']);
                }
            });
        }

    });

});