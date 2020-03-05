<?php
    //THis array creates the sidebar links
    $navs = array("dashboard" => 'Dashboard', "income" => 'Income', "expenses" => 'Expenses', "remit" => "Remissions", "buckets" => "Buckets");

    //die(print_r($this->session));
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/data-table/bootstrap-table.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/data-table/bootstrap-editable.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/xcharts.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/charts.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/statics.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/dashboard.css" type="text/css">

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
            <header class="row fixed-top">
                <div class="left-header col-lg-2">
                    <h4>CHEYN</h4>
                </div>

                <div class="right-header col-lg-10">
                    <nav class="right-header-opts">
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="" class="nav-link action-link" id="" title="Search">Search</a>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link action-link" id="" title="Quickly add an entry">Quick Add</a>
                            </li>

                            <li class="nav-item dropdown nav-user" id="nav-user">
                                <a class="nav-link" style="padding: 0 1rem;" href="#" data-toggle="dropdown">
                                    <img id="picture" class="marg-side" style="border: 3px solid white; max-width:45px;" src="<?php echo base_url();?>/assets/img/default.png" alt="My Profile Picture" title="My Profile Picture">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" id="nav-user-content">
                                    <div class="user-content-up">
                                        <img id="picture" class="marg-side" style="border: 3px solid white;" src="<?php echo base_url();?>/assets/img/default.png" alt="My Profile Picture" title="My Profile Picture">

                                        <p>
                                            <?php print $this->session->firstname . " " . $this->session->lastname; ?> <br>
                                            <?php print $this->session->email; ?>
                                        </p>
                                    </div>

                                    <div class="user-content-down">
                                        <a class="dropdown-item" target="_self" href="<?php print base_url() . "accounts"; ?>">My Account</a>
                                        <a class="dropdown-item" href="<?php print $_SERVER['REQUEST_URI'] . "/logout" ?>">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </header>

            <section class="sidebar" duty="sidebar">
                <div id="menus" class="col-lg-12" duty="profile">
                    <nav class="nav col-lg-12" style="padding-right: 0px;">
                        <ul class="navbar-nav">
                            <li class="nav-divider">
                                Menu
                            </li>

                            <?php
                                foreach ($navs as $index => $value){
                                    print "<li class='nav-item'>";
                                    
                                    switch($index){
                                        case "dashboard":
                                            print "<a id='$index' class='active nav-link' target='_self' href='" . base_url() . "dashboard'>$value</a>";
                                            break;
                                        case "income":
                                            print "<a id='$index' class='nav-link' target='_self' href='" . base_url() . "income'>$value</a>";
                                            break;
                                        case "expenses":
                                            print "<a id='$index' class='nav-link' target='_self' href='" . base_url() . "expenses'>$value</a>";
                                            break;
                                        case "remit":
                                            print "<a id='$index' class='nav-link' target='_self' href='" . base_url() . "remissions'>$value</a>";
                                            break;

                                        case "buckets":
                                            print "<a id='$index' class='nav-link' target='_self' href='" . base_url() . "buckets'>$value</a>";
                                            break;
                                        default:
                                            print "<a id='$index' class='nav-link' target='_self' href='" . base_url() . "dashboard'>$value</a>";
                                    }
                                    print "</li>";
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
            </section>