<?php
    //die(print_r($_SERVER));

    // $new_password = password_hash('Martini1', PASSWORD_DEFAULT);
    // die($new_password);

    //die("http://" . $_SERVER['SERVER_NAME'] . "/Cheyn/");
    define('TITLE', "Home | Cheyn - Escaping The Rat Race");
    //die($this->session->mode);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/login-signup.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/home.css" type="text/css">

        <title>
            <?php
                if(defined('TITLE')){       //Check if the title is set
                    print TITLE;            //If it is, then set it as the page title
                } else  {
                    print "Cheyn - Escaping The Rat Race!";      //If it's not then set a default title
                }
            ?>
        </title>
    </head>

    <body>
        <div id="anchor">
            <header class="row">
                <aside class="left-header col-lg-6 col-md-6 col-sm-6 col">
                    <h4>
                        <a href="<?php echo base_url(); ?>">CHEYN</a>
                    </h4>
                </aside>

                <aside class="right-header col-lg-6 col-md-6 col-sm-6">
                    <nav class="right-header-opts">
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="" class="nav-link action-link" id="signup" title="Sign Up">Sign Up</a>

                                <div duty="signup-content" id="signup-content" class="action-content col-lg-4">
                                    <button type="button" class="close" id="close-signup">×</button>
                                    
                                    <div class="content-inner">
                                        <div class="content-header">
                                            <h4>Sign Up</h4>
                                            <small>or <a href="" id="signup-to-login">log into your account</a></small>
                                        </div>

                                        <div class="content-form">
                                            <?php
                                                // Check if we have a return message and show it
                                                if ($this->session->flashdata('failed_signup')) {
                                                    echo "<p class='error'>" . $this->session->flashdata('failed_signup') . "</p>";
                                                }
                                                
                                                $this->load->view('users/signup');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link action-link" id="login" title="Login">Login</a>

                                <div duty="login-content" id="login-content" class="action-content col-lg-4">
                                    <button type="button" class="close" id="close-login">×</button>
                                    
                                    <div class="content-inner" style="margin-bottom: 55%;">
                                        <div class="content-header">
                                            <h4>Login</h4>
                                            <small>or <a href="" id="login-to-signup">create a new account</a></small>
                                        </div>

                                        <div class="content-form">
                                            <?php
                                                // Check if we have a return message and show it
                                                if ($this->session->flashdata('failed_login')) {
                                                    echo "<p class='error'>" . $this->session->flashdata('failed_login') . "</p>";
                                                } else if ($this->session->flashdata('signup_success')) {
                                                    echo "<p class='success'>" . $this->session->flashdata('signup_success') . "</p>";
                                                }

                                                //Load the login form
                                                $this->load->view('users/login'); 
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- RESET CONTENT -->
                                <div duty="reset-content" id="reset-content" class="action-content col-lg-4">
                                    <button type="button" class="close" id="close-reset">×</button>
                                    
                                    <div class="content-inner" style="margin-bottom: 55%;">
                                        <div class="content-header">
                                            <?php
                                                if($this->session->flashdata('reset_success')) {
                                                    echo "<h4>Rmembered Your Password?</h4>
                                                    <small>then <a href='' id='reset-to-login'>log into your account</a></small>";
                                                } else {
                                                    echo "<h4>Reset Your Password</h4>
                                                    <small>or <a href='' id='reset-to-login'>log into your account</a></small>";
                                                }
                                            ?>
                                        </div>

                                        <div class="content-form">
                                            <?php
                                                // // Check if we have a return message and show it
                                                // if ($this->session->flashdata('reset_success')) {
                                                //     echo "<p class='success'>" . $this->session->flashdata('reset_success') . "</p>";
                                                // }

                                                //Load the reset form
                                                $this->load->view('users/reset'); 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </aside>
            </header>

            <section duty="content" class="content row">
                <div class="center-text col-lg-12 col-sm-12 paddoff col marg">
                    <h5>Wealth!</h5>
                    <p>Let's help you get to your wealth zone...</p>
                </div>

                <div class='sm-opts-container col-sm-12'>
                    <div class='sm-opts-first col-sm-6'>
                        <a class='sm-login' href="<?php echo base_url();?>login">Login</a>
                    </div>

                    <div class='sm-opts-second'>
                        <a class='sm-signup' href="<?php echo base_url();?>signup">Sign Up</a>
                    </div>
                </div>
            </section>

            <footer>
                <p>© 2019 CHEYN | POWERED BY <a href="">NAVIWARE</a></p>
            </footer>
        </div>

        <script src="<?php echo base_url();?>assets/js/jquery-3.3.1.js"></script>
        <script src="<?php echo base_url();?>assets/js/home.js"></script>
    </body>
</html>

<?php
    if ($this->session->flashdata('failed_login')) {
        echo "
            <script>
                $('#login-content').css('left', '270px');
                $('#login-content').css('visibility', 'visible');
            </script>
        ";
    } else if ($this->session->flashdata('failed_signup')) {
        echo "
            <script>
                $('#signup-content').css('left', '270px');
                $('#signup-content').css('visibility', 'visible');
            </script>
        ";
    } else if ($this->session->flashdata('signup_success')) {
        echo "
            <script>
                $('#login-content').css('left', '270px');
                $('#login-content').css('visibility', 'visible');
            </script>
        ";
    } else if ($this->session->flashdata('reset_success')) {
        echo "
            <script>
                $('#reset-content').css('left', '270px');
                $('#reset-content').css('visibility', 'visible');
            </script>
        ";
    } else if ($this->session->flashdata('erros') == "signup") {
        echo "
            <script>
                $('#signup-content').css('left', '270px');
                $('#signup-content').css('visibility', 'visible');
            </script>
        ";
    } else if ($this->session->flashdata('erros') == "login") {
        echo "
            <script>
                $('#login-content').css('left', '270px');
                $('#login-content').css('visibility', 'visible');
            </script>
        ";
    }

    //die(print_r($this->session->platform));
?>