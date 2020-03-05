<?php
    //THis file creates the sidebar

    $navs = array("compose" => 'Compose', "sent" => 'Sent Messages', "settings" => "Settings");
?>

<section class="sidebar col-lg-3" duty="sidebar">
    <div id="menus" class="row" duty="profile">
        <nav class="nav col-lg-12" style="padding-right: 0px;">
            <ul class="navbar-nav">
                <?php
                    foreach ($navs as $index => $value){
                        print "<li class='nav-item'>";
                        
                        switch($index){
                            case "compose":
                                print "<a id='$index' class='active nav-link' target='_self' href='compose_view.php'>$value</a>";
                                break;
                            case "sent":
                                print "<a id=$index' class='nav-link' target='_self' href='sent_view.php'>$value</a>";
                                break;
                            case "settings":
                                print "<a id=$index' class='nav-link' target='_self' href='settings_view.php'>$value</a>";
                                break;
                            default:
                                print "<a id='compose' class='nav-link' target='_self' href='conmpose_mail.php'>Compose</a>";
                        }
                        print "</li>";
                    }
                ?>
            </ul>
        </nav>
    </div>
</section>