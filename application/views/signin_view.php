

<div class="loginSignup insidePopup clearfix" id="loginDiv" style="display:none">
            <form method="post" action="<?php echo site_url('login/index');?>" id="login-form" name="login-form">
            <aside class="gutter-bottom">
                Don't have an account?   <a href="#" class="action-login-toggle" id="sign_up" tabindex="-1">Sign Up</a>            </aside>


                                               <div class="action-social-login button-facebook left">  <p><fb:login-button autologoutlink="true" perms="email,user_birthday,status_update,publish_stream"></fb:login-button></p>
 
                    <a href="" tabindex="-1" class=""></a>                        <div class="orSeparator span-8 last"></div>
            </div>
            <div class=" signin span-8 clearfix last">
                <div class="gutter-bottom clearfix">
                    <label for="LoginForm_email" class="clear">Email</label>                    <input type="text" id="LoginForm_email" name="lemail" class="tall span-8 last" tabindex="1">                    <div style="display:none" id="LoginForm_email_em_" class="hidden never-show"></div>                </div>
                <div class="clearfix gutter-bottom">
                    <label for="LoginForm_password" class="left">Password</label>                    <input type="password" id="LoginForm_password" name="lpassword" autocomplete="off" class="span-8 last tall" tabindex="2">                    <div style="display:none" id="LoginForm_password_em_" class="hidden never-show"></div>                </div>
                <div class="clearfix gutter-bottom">
                    <input type="hidden" name="lrememberMe" value="0" id="ytLoginForm_rememberMe"><input type="checkbox" value="1" id="LoginForm_rememberMe" name="LoginForm[rememberMe]" class="plain left clear" checked="checked" tabindex="3">                    <label for="LoginForm_rememberMe" class="left rememberMe">Remember me</label>                    <div class="gutter-bottom clear">
                        <a href="#" tabindex="5" class="forgotPassword action-forgot-toggle">Forgot password?</a>                    </div>

                </div>

                <div class="clearfix span-8 last">
                    <input type="button" onclick="login_validate();return false;" value="Log In" name="yt0" class="call-to-action span-8 lasty extra-tall org_button" tabindex="4">                </div>
                            </div><input type="hidden" name="next" class="login-next-url" value="<?php echo $pageURL;?>"></form>

        </div>

