<?php
    define('TITLE', "Targets | Cheyn - Escaping The Rat Race");
    define('HEADER', "Targets");

    //Load the header and sidebar sections
    $this->load->view('generics/header-sidebar.php');
?>

            <!-- PAGE CONTENT -->
            <div class="content">
                <section duty="main-content" class="xcontent">
                    <div class="col-lg-12 pageheader">
                        <div class="col-lg-12">
                            <h4><?php print HEADER; ?></h4>
                            <hr>
                        </div>
                    </div>

                    <aside class="col-lg-12 marg">
                        <div duty="target-expenses-chart" class="shade chart-container">
                            <div class="target-table">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <?php
                                                $months = array(13 => "Point", 1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun",
                                                                7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec", 14 => "Total", 15 => "Target");
                                                foreach ($months as $index => $month) {
                                                    echo "<th style='width: auto;'>$month</th>";
                                                }
                                            ?>
                                        </tr>
                                    </thead>

                                    <tbody id="target-table-body" class="show fade">

                                        <?php
                                            //die(print_r($targets));
                                            if(empty($targets)) {
                                                echo "
                                                    <tr>
                                                        <td colspan='" . count($months) . "' style='text-align:center;'>You haven't set any targets yet.</td>
                                                    </tr>
                                                ";
                                            } else {
                                                //die(print_r($targets));
                                                foreach ($targets as $target) {
                                                    $view = base_url() . 'target/view/' . $target->id;
                                                    $edit = base_url() . 'target/edit/' . $target->id;

                                                    echo "
                                                        <tr>
                                                            <td id='date'>$target->entry_date</td>
                                                            <td><a href='$view'>View</a> | <a href='$edit'>Edit</a></td>
                                                        </tr>
                                                    ";
                                                }
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </aside>
                </section>

                <?php
                    //Load the footer
                    $this->load->view('generics/footer.php');
                ?>
            </div>
        </div>
    </body>
</html>

<?php
    //Load the footer
    //$this->load->view('generics/footer.php');
?>