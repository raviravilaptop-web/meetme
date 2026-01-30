<?php
include_once('./_inc/config.php');
$tbluser = 'user_log';
//--->new signup - start
if (isset($_GET['code'])) {
    $Code = $_GET['code'];

    $RecData = $db->Select("select * from $tbluser where code='$Code' ");

    if ($RecData < 1) {
        //didn't find a record
        echo '<p>Looks like you do not have an account yet</p> <a href="' . SiteRootDir . '" > Click here to create one</a>';
    } else if ($RecData > 0) {
        //found a rec
        $CheckAccStatus = $RecData[0]["user_status"];
        //Already confirmed redirect to sign on page
        if ($CheckAccStatus == 'active') {
            //Take to login screen 
            echo '<p>Looks like your account is activated already</p> <a href="' . SiteRootDir . '" > Click here to login</a>';
        } else if ($CheckAccStatus == 'pending') {
            $UpdateStatus = $db->qry("UPDATE $tbluser  SET user_status='active'  WHERE code='$Code'");

            echo '<p>Your account is activated </p> <a href="' . SiteRootDir . '"> Click here to login</a>';
        }
    }
}

//--->new signup - end
//--->new signup - start
if (isset($_GET['reset'])) {
    $Code = $_GET['reset'];
    $RecData = $db->Select("select * from $tbluser where code='$Code' and user_status='reset' ");
    $UserEmail = $RecData[0]['user_email'];


    if ($RecData < 1) {
        //didn't find a record
        echo '<p>Looks like you do not have an account yet</p> <a href="' . SiteRootDir . '" > Click here to create one</a>';
        die();
    } else {
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/libs/awesome-functions.min.js" type="text/javascript"></script>
        <script type="text/javascript">

            $(document).ready(function($) {
                $(document).on('click', '.btn_Change_Password', function(e) {
                    //Prevent's page from reloading
                    e.preventDefault();
                    var new_password = $('.new_password');
                    var repeat_password = $('.repeat_password');
                    //To clear all old alerts
                    bs.ClearError();
                    if (frm.IsEmpty(new_password.val())) {
                        //Show alert
                        bs.ShowError("Please enter new password", new_password)
                    } else if (frm.IsEmpty(repeat_password.val())) {
                        //Show alert
                        bs.ShowError("Please enter repeat password", repeat_password)
                    } else if (new_password.val() != repeat_password.val()) {
                        //Show alert
                        var Msg = bs.AlertMsg("Oppsss... Looks like you typed in two different passwords<br><br> New and Repeat passwords have to be the same", 'error')
                        $('.alert_box').before(Msg);
                    } else {
                        //do the ajax process
                        var FormData =
                                {
                                    call_type: "update_password",
                                    userpasswd: new_password.val(),
                                    useremail: "<?php echo $UserEmail ?>",
                                }
                        $('.frm_body').hide();
                        $.post("my-ajax.php", FormData, function(data) {
                            var UserData = $.parseJSON(data);
                            //console.log( UserData);
                            if (Status == 'Error') {
                                $('.frm_body').show();
                                var Msg = "Reset  Failed...</br></br>Please Try Again In A Few Seconds";
                                var ErrorMsg = bs.AlertMsg(Msg, 'error');
                                $('.alert_box').after(ErrorMsg);
                            } else if (Status == 'Failed') {
                                $('.frm_body').show()
                                var ErrorMsg = bs.AlertMsg(UserData.Msg, 'error');
                                $('.alert_box').after(ErrorMsg);
                            } else if (Status == 'Success') {
                                //var Msg = "Reset  Failed...</br></br>Please Try Again In A Few Seconds";
                                var Msg = bs.AlertMsg(UserData.Msg, 'success');
                                $('.alert_box').after(Msg);
                            }
                        });
                    }

                });

            });
        </script>

        <hr>
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="text-center">
                                    <h3><i class="fa fa-lock fa-4x"></i></h3>
                                    <h2 class="text-center">Reset Password</h2>
                                    <p>You can reset your password here.</p>
                                    <div class="alert_box"></div>
                                    <div class="panel-body frm_body">
                                        <form class="form">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>New password</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span> 
                                                        <input   class="form-control new_password" type="password"  required="">
                                                    </div>
                                                    <br><br>
                                                    <label>Repeat password</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>  
                                                        <input    class="form-control repeat_password" type="password"  required="">
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class="form-group">
                                                    <input class="btn btn-lg btn-primary btn-block btn_Change_Password" value="Change My Password" type="submit">
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <hr>

        <?php
    }
}
//--->new signup - end
?>  