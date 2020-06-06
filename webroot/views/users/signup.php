<?php 
    $attributes = array('id' => 'signup-form');     //Create main form attributes
    $this->form_validation->set_error_delimiters('<small class="fm_error">', '</small>');
    echo form_open('users/signup', $attributes);    //Create form and set attributes

    //Set the attributes for the first name input
    echo "<div class='elem-container'>";
    $data = array('name' => 'firstname',
                    'class' => "content-form-elems",
                    'placeholder' => "First Name",
                    'value' => set_value('firstname')
            );
    echo form_input($data);     //Create the firstname input
    echo form_error('firstname');
    echo "</div>";

    //Set the attributes for the second name input
    echo "<div class='elem-container'>";
    $data = array('name' => 'surname',
                    'class' => "content-form-elems",
                    'placeholder' => "Surname",
                    'value' => set_value('surname')
            );
    echo form_input($data);     //Create the lastname input
    echo form_error('surname');
    echo "</div>";

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
    $data = array('name' => 'create-password',
                    'class' => "content-form-elems",
                    'id' => "create-password",
                    'placeholder' => "Create Password",
                    'value' => set_value('create-password')
            );
    echo form_password($data);     //Create the password input
    echo form_error('create-password');
    echo "<div class='icon-visible password-toggle' id='showCreate' style='top: 51%;'></div>";
    echo "</div>";

    //Set the attributes for the password input
    echo "<div class='elem-container'>";
    $data = array('name' => 'confirm-password',
                    'class' => "content-form-elems",
                    'id' => "confirm-password",
                    'placeholder' => "Confirm Password",
                    'value' => set_value('confirm-password')
            );
    echo form_password($data);     //Create the confirm password input
    echo form_error('confirm-password');
    echo "<div class='icon-visible password-toggle' style='top: 58.5%;' id='showConfirm'></div>";
    echo "</div>";

    echo "<label class='container'>I agree to the Cheyn Terms and Conditions of use.
                <input type='checkbox' required>
                <span class='checkmark'></span>
        </label>";

    //Set the attributes for the signup button input
    $data = array('name' => 'signup-button',
                    'class' => "content-form-action",
                    'value' => "Sign Up"
            );
    echo form_submit($data);     //Create the firstname input
?>

<?php echo form_close(); ?>