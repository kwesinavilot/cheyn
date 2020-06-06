<?php
    //THis array creates the sidebar links
    $navs = array("dashboard" => 'Dashboard', "income" => 'Income', "expenses" => 'Expenses', "targets" => "Targets", "remit" => "Remissions", "buckets" => "Buckets");

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

        <?php
            if(defined('HEADER') == "Dashboard") {
             echo "<link rel='stylesheet' href='" . base_url() . "assets/css/dashboard.css' type='text/css'>";
            }
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
            <header class="head-header row fixed-top">
                <div class="left-header col-lg-2 col-md-4 col-sm-6 col">
                    <div class="resp-left-one">
                        <nav id="resp-menu-toggle" class="navbar navbar-light">
                            <button id="menus-toggle" class="hide-sidebar navbar-toggler" type="button" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </nav>
                    </div>

                    <div class="resp-left-two">
                        <h4>
                            <a href="<?php echo base_url() . "dashboard"; ?>">CHEYN</a>
                        </h4>
                    </div>
                </div>

                <div class="right-header col-lg-10 col-md-8 col-sm-6 col">
                    <nav class="right-header-opts">
                        <ul class="nav">
                            <li id="nav-opts" class="nav-item">
                                <a href="" class="nav-link action-link" id="" title="Search">Search</a>
                            </li>

                            <li id="nav-opts" class="nav-item">
                                <a href="" class="nav-link action-link" id="" title="Quickly add an entry">Quick Add</a>
                            </li>

                            <li class="nav-item dropdown nav-user" id="nav-user">
                                <a class="nav-link" style="padding: 0 1rem;" href="#" data-toggle="dropdown">
                                    <img id="picture" class="marg-side" style="border: 3px solid white; max-width:45px;" src="<?php
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
                                                                                                                            ?>" alt="My Profile Picture" title="My Profile Picture">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" id="nav-user-content">
                                    <div class="user-content-up">
                                        <img id="picture" class="marg-side" style="border: 3px solid white;" src="<?php
                                                                                                                    //Check if there's a profile picture for the user
                                                                                                                    if(isset($this->session->picture)) {        //Show it if there is
                                                                                                                        //die(print_r($this->session->picture));
                                                                                                                        if (file_exists("./assets/profile/" . $this->session->picture)) {
                                                                                                                            echo base_url() . "/assets/profile/" . $this->session->picture;
                                                                                                                        } else {                                    //Use default if there isnt
                                                                                                                            echo base_url() . "/assets/img/default.png"; 
                                                                                                                        }
                                                                                                                    } else {                                    //Use default if there isnt
                                                                                                                        echo base_url() . "/assets/img/default.png"; 
                                                                                                                    }
                                                                                                                ?>" alt="My Profile Picture" title="My Profile Picture">

                                        <p>
                                            <?php print $this->session->firstname . " " . $this->session->lastname; ?> <br>
                                            <?php print $this->session->email; ?>
                                        </p>
                                    </div>

                                    <div class="user-content-down">
                                        <a class="dropdown-item" target="_self" href="<?php print base_url() . "accounts"; ?>">My Account</a>
                                        <a class="dropdown-item" href="<?php print base_url() . "logout" ?>">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </header>

            <section class="sidebar" duty="sidebar">
                <div id="menus" class="col-lg-12 col-md-12 col-sm-12 col" duty="profile">
                    <nav class="nav col-lg-12 col-md-12 col-sm-12 col" style="padding-right: 0px;">
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
                                        case "targets":
                                            print "<a id='$index' class='nav-link' target='_self' href='" . base_url() . "targets'>$value</a>";
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