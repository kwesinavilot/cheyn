<?php 
    $attributes = array('id' => 'login-form');     //Create main form attributes
    $this->form_validation->set_error_delimiters('<small class="fm_error">', '</small>');
    echo form_open('users/login', $attributes);    //Create form and set attributes

    //Set the attributes for the email input
    echo "<div class='elem-container'>";
    $data = array('name' => 'email',
                    'type' => "email",
                    'class' => "content-form-elems",
                    'placeholder' => "Email",
                    'value' => set_value("email")
            );
    echo form_input($data);     //Create the email input
    echo form_error('email');
    echo "</div>";

    //Set the attributes for the password input
    echo "<div class='elem-container'>";
    $data = array('name' => 'password',
                    'class' => "content-form-elems",
                    'id' => "password",
                    'placeholder' => "Password",
                    'value' => set_value('password')
            );
    echo form_password($data);     //Create the password input
    echo form_error('password');
    echo "<div class='icon-visible password-toggle' id='showPass'></div>";
    echo "</div>";

    //Set the attributes for the signup button input
    $data = array('name' => 'login-button',
                    'class' => "content-form-action",
                    'value' => "Login"
            );
    echo form_submit($data);     //Create the firstname input

    //Add the password reset link
    echo "<label class='container down-liner'>";
        //Check if we're in the mobile mode or not and use the proper link
        if($this->session->mode == "mobile") {
            echo "<a href='" . base_url() . "reset' >Forgot your password?</a>";
        } else {
            echo "<a href='' id='login-to-reset'>Forgot your password?</a>";
        }
    echo "</label>";
?>

<?php echo form_close(); ?>