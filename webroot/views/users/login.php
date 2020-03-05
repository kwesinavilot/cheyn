<?php 
    $attributes = array('id' => 'login-form');     //Create main form attributes

    echo form_open('users/login', $attributes);    //Create form and set attributes

    //Set the attributes for the email input
    $data = array('name' => 'email',
                    'type' => "email",
                    'class' => "content-form-elems",
                    'placeholder' => "Email",
                    'value' => set_value("email")
            );
    echo form_input($data);     //Create the email input
    echo form_error('email');

    //Set the attributes for the password input
    $data = array('name' => 'password',
                    'class' => "content-form-elems",
                    'id' => "password",
                    'placeholder' => "Password",
                    'value' => set_value('password')
            );
    echo form_password($data);     //Create the password input
    echo form_error('password');
    echo "<div class='icon-visible password-toggle' id='showPass' style='top: 36%;'></div>";

    //Set the attributes for the signup button input
    $data = array('name' => 'login-button',
                    'class' => "content-form-action",
                    'value' => "Login"
            );
    echo form_submit($data);     //Create the firstname input

    echo "<label class='container down-liner'>
            <a href='' id='login-to-reset'>Forgot your password?</a>
        </label>";
?>

<?php echo form_close(); ?>