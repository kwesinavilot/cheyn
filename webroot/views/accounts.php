<?php
    define('TITLE', "My Account | Cheyn - Escaping The Rat Race");
    define('HEADER', "My Account");

    //Array for elements
    $top_elems = array("firstname" => 'First Name', "lastname" => 'Last Name', "contact" => 'Contact', "email" => 'Email');
    $down_elems = array("currentPassword" => 'Current Password', "newPassword" => 'New Password', "confirmPassword" => 'Confirm New Password');
    $inValue = "";

    //Load the header and sidebar sections
    //die(print_r($this->session->picture));
    $this->load->view('generics/header-sidebar.php');
?>

            <!-- PAGE CONTENT -->
            <div class="content">
                <section duty="main-content" class="xcontent">
                    <div class="col-lg-12 col-md-12 col-sm-12 col pageheader">
                        <div class="col-lg-12 col-md-12 col-sm-12 col ">
                            <h4><?php print HEADER; ?></h4>
                            <hr>
                        </div>
                    </div>

                    <aside class="col-lg-12 col-md-12 col-sm-12 col marg">
                        <div duty="picture-change" class="shade col-lg-12">
                            <?php 
                                $attributes = array('id' => 'profile-picture-form');     //Create main form attributes
                                $this->form_validation->set_error_delimiters('<div class="fm_error">', '</div>');
                                echo form_open_multipart("accounts/update_picture", $attributes);    //Create form and set attributes
                                if(isset($error)) {echo $error;}
                            ?>

                                <div class="fixed-table-toolbar marg-sub">
                                    <!-- Section Header -->
                                    <div class="pull-left" style="padding: 0.5%;">
                                        <h4 style="margin:0;">Profile Picture</h4>
                                    </div>
                                </div>

                                <div class="main-entry-form row" style="">
                                    <div class="top-entry col-lg-12 col-md-12 col-sm-12 col marg-sub">
                                        <div class="pull-left current-picture col-lg-5 col-md-5 col-sm-5 col" style="float:left;">
                                            <img class="pull-right col-lg-12 col-md-12 col-sm-12 col" src="<?php
                                                                                    //Check if there's a profile picture for the user
                                                                                    if(isset($this->session->picture)) {        //Show it if there is
                                                                                        if (file_exists("./assets/profile/" . $this->session->picture)) {
                                                                                            echo base_url() . "/assets/profile/" . $this->session->picture;
                                                                                        } else {                                    //Use default if there isnt
                                                                                            echo base_url() . "/assets/img/default.png"; 
                                                                                        }
                                                                                    } else {                                    //Use default if there isnt
                                                                                        echo base_url() . "/assets/img/default.png"; 
                                                                                    }
                                                                                ?>" style="max-width: 75%;border-radius: 50%;background: white;max-height: 100%;">
                                        </div>

                                        <div class="pull-right col-lg-7 col-md-6 col-sm-7 col" style="float:right;">
                                            <label class="picture-label col-lg-12 col-md-12 col-sm-12 col">Upload A New Image</label>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col picture-dock">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <input type="hidden" value="" name="hidden">

                                                    <div class="fileupload-new thumbnail" style="width: 250px; height: 200px;">
                                                        <img src="" alt="" />
                                                    </div>

                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width:; max-height: 150px; line-height: 20px;">
                                                    </div>

                                                    <div>
                                                        <span class="btn btn-theme02 btn-file">
                                                            <span class="fileupload-new">
                                                                <i class="fa fa-paperclip"></i> Select image
                                                            </span>

                                                            <span class="fileupload-exists">
                                                                <i class="fa fa-undo"></i> Change
                                                            </span>

                                                            <input type="file" class="default" id="profile-picture" name="profile-picture"/>
                                                        </span>

                                                        <!-- <span class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload">
                                                            <i class="fa fa-trash-o"></i> Remove
                                                        </span> -->
                                                    </div>
                                                </div>

                                                <span class="p-label p-label-info">NOTE!</span>
                                                <small>
                                                    Image previews are supported by latest Firefox, Chrome, Opera,
                                                    Safari and Internet Explorer 10 only
                                                </small>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="control" class="col-lg-3 col-md-4 col-sm-5">
                                        <button type="submit" class="col-lg-12 col-md-12 col-sm-12 btn btn-outline-success">Update Picture</Picture></button>
                                    </div>
                                </div>

                            <?php echo form_close(); ?>
                        </div>
                    </aside>

                    <aside class="col-lg-12 col-md-12 col-sm-12 col marg">
                        <div duty="personal-deatails" class="shade col-lg-12 col-md-12 col-sm-12 col">
                            <?php 
                                $attributes = array('id' => 'edit-details-form');     //Create main form attributes
                                $this->form_validation->set_error_delimiters('<div class="fm_error">', '</div>');
                                echo form_open("accounts/update_details", $attributes);    //Create form and set attributes
                            ?>

                                <div class="fixed-table-toolbar marg-sub">
                                    <!-- Section Header -->
                                    <div class="pull-left" style="padding: 0.5%;">
                                        <h4 style="margin:0;">Personal Details</h4>
                                    </div>
                                </div>

                                <div class="main-entry-form row">
                                    <div class="top-entry col-lg-12 marg-sub" style="padding:0;">
                                        <div class="pull-left form-group col-lg-12 col-md-12 col-sm-12 col">
                                            <label class="pull-left col-lg-4 col-md-4 col-sm-4 col resp-pad" style="float:left;">First Name</label>
                                            <input class="form-control pull-right col-lg-7 col-md-8 col-sm-8" max-length="25" type="text" name="firstname" value="<?php 
                                                                                                                                                    if(isset($this->session->firstname)) {
                                                                                                                                                        echo $this->session->firstname;
                                                                                                                                                    } else {
                                                                                                                                                        echo set_value('firstname'); 
                                                                                                                                                    }
                                                                                                                                                ?>" placeholder="Enter your first name here...">
                                            <?php echo form_error('firstname'); ?>
                                        </div>

                                        <div class="pull-left form-group col-lg-12 col-md-12 col-sm-12 col">
                                            <label class="pull-left col-lg-4 col-md-4 col-sm-4 col resp-pad" style="float:left;">Last Name</label>
                                            <input class="form-control pull-right col-lg-7 col-md-8 col-sm-8" max-length="25" type="text" name="lastname" value="<?php 
                                                                                                                                                    if(isset($this->session->lastname)) {
                                                                                                                                                        echo $this->session->lastname;
                                                                                                                                                    } else {
                                                                                                                                                        echo set_value('lastname'); 
                                                                                                                                                    }
                                                                                                                                                ?>" placeholder="Enter your last name here...">
                                            <?php echo form_error('lastname'); ?>
                                        </div>

                                        <div class="pull-left form-group col-lg-12 col-md-12 col-sm-12 col">
                                            <label class="pull-left col-lg-4 col-md-4 col-sm-4 col resp-pad" style="float:left;">Email</label>
                                            <input class="form-control pull-right col-lg-7 col-md-8 col-sm-8" max-length="50" type="text" name="email" value="<?php 
                                                                                                                                                if(isset($this->session->email)) {
                                                                                                                                                    echo $this->session->email;
                                                                                                                                                } else {
                                                                                                                                                    echo set_value('email'); 
                                                                                                                                                }
                                                                                                                                            ?>" placeholder="Enter your email here...">
                                            <?php echo form_error('email'); ?>
                                        </div>
                                    </div>

                                    <div id="control" class="col-lg-3 col-md-4 col-sm-5">
                                        <button type="submit" class="col-lg-12 col-md-12 col-sm-12 btn btn-outline-success">Update Details</button>
                                    </div>
                                </div>

                            <?php echo form_close(); ?>
                        </div>
                    </aside>

                    <aside class="col-lg-12 col-md-12 col-sm-12 col marg">
                        <div duty="change password" class="shade col-lg-12 col-md-12 col-sm-12 col">
                            <?php 
                                $attributes = array('id' => 'change-password-form');     //Create main form attributes
                                $this->form_validation->set_error_delimiters('<small class="fm_error">', '</small>');
                                echo form_open("accounts/change_password", $attributes);    //Create form and set attributes
                            ?>

                                <div class="fixed-table-toolbar marg-sub">
                                    <!-- Section Header -->
                                    <div class="pull-left" style="padding: 0.5%;">
                                        <h4 style="margin:0;">Change Password</h4>
                                    </div>
                                </div>

                                <div class="main-entry-form row">
                                    <div class="top-entry col-lg-12 col-md-12 col-sm-12 col marg-sub" style="padding:0;">
                                        <div class="pull-left form-group col-lg-12 col-md-12 col-sm-12 col">
                                            <label class="pull-left col-lg-4 col-md-4 col-sm-4 col resp-pad" style="float:left;">Current Password</label>
                                            <input class="form-control pull-right col-lg-7 col-md-8 col-sm-8" min-length="6" max-length="20" type="password" name="current_password" value="<?php echo set_value('current_password'); ?>" placeholder="Enter your current password here...">
                                            <?php echo form_error('current_password'); ?>
                                        </div>

                                        <div class="pull-left form-group col-lg-12 col-md-12 col-sm-12 col">
                                            <label class="pull-left col-lg-4 col-md-4 col-sm-4 col resp-pad" style="float:left;">New Password</label>
                                            <input class="form-control pull-right col-lg-7 col-md-8 col-sm-8" min-length="6" max-length="20" type="password" name="new_password" value="<?php echo set_value('new_password'); ?>" placeholder="Enter your new password here...">
                                            <?php echo form_error('new_password'); ?>
                                        </div>

                                        <div class="pull-left form-group col-lg-12 col-md-12 col-sm-12 col">
                                            <label class="pull-left col-lg-4 col-md-4 col-sm-4 col resp-pad" style="float:left;">Confirm New Password</label>
                                            <input class="form-control pull-right col-lg-7 col-md-8 col-sm-8" min-length="6" max-length="20" type="password" name="confirm_new" value="<?php echo set_value('confirm_new'); ?>" placeholder="Confirm your new password here...">
                                            <?php echo form_error('confirm_new'); ?>
                                        </div>
                                    </div>

                                    <div id="control" class="col-lg-3 col-md-4 col-sm-5">
                                        <button type="submit" class="col-lg-12 col-md-12 col-sm-12 btn btn-outline-success">Change Password</button>
                                    </div>
                                </div>

                            <?php echo form_close(); ?>
                        </div>
                    </aside>
                </section>

                <?php
                    //Load the footer
                    $this->load->view('generics/footer.php');
                ?>
            </div>
        </div>

        <script src="<?php echo base_url();?>assets/js/bootstrap-fileupload.js"></script>

    </body>
</html>

<?php
    if ($this->session->flashdata('details_update_success')) {
        echo "
            <script>
                $.notify('" . $this->session->flashdata('details_update_success') . "', { position:'top center', className:'success'});
            </script>
        ";
    } else if($this->session->flashdata('details_update_failure')) {
        echo "
            <script>
            $.notify('" . $this->session->flashdata('details_update_failure') . "', { position:'top center', className:'error'});
            </script>
        ";
    } else if ($this->session->flashdata('password_change_success')) {
        echo "
            <script>
                $.notify('" . $this->session->flashdata('password_change_success') . "', { position:'top center', className:'success'});
            </script>
        ";
    } else if($this->session->flashdata('password_change_failure')) {
        echo "
            <script>
            $.notify('" . $this->session->flashdata('password_change_failure') . "', { position:'top center', className:'error'});
            </script>
        ";
    } else if ($this->session->flashdata('update_picture_success')) {
        echo "
            <script>
                $.notify('" . $this->session->flashdata('update_picture_success') . "', { position:'top center', className:'success'});
            </script>
        ";
    } else if($this->session->flashdata('update_picture_failure')) {
        echo "
            <script>
            $.notify('" . $this->session->flashdata('update_picture_failure') . "', { position:'top center', className:'error'});
            </script>
        ";
    }
?>