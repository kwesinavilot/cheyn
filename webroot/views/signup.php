<?php
    //die(print_r($_SERVER));

    // $new_password = password_hash('Martini1', PASSWORD_DEFAULT);
    // die($new_password);

    //die("http://" . $_SERVER['SERVER_NAME'] . "/Cheyn/");
    define('TITLE', "Sign Up | Cheyn - Escaping The Rat Race");
    $this->session->set_userdata('mode', 'mobile');
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

        <?php
            echo "<style>
                body {
                    background: none;
                }

                .content-inner {
                    padding: 10%;
                }

                footer {
                    position: relative;
                    z-index: 0;
                }

                .password-toggle {
                    display: none !important;
                    position: fixed;
                    right: 25px;
                    top: 45%;
                    z-index: 0;
                }
            </style>";
        ?>

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
            </header>

            <section duty="content" class="content row">
                <div class="content-inner">
                    <div class="content-header">
                        <h4>Sign Up</h4>
                        <small>or <a href="<?php echo base_url();?>login">log into your account</a></small>
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
    //die(print_r($this->session->platform));
?>