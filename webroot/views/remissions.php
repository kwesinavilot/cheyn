<?php
    define('TITLE', "Remissions | Cheyn - Escaping The Rat Race");
    define('HEADER', "Remissions");

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
                        <div duty="income-expenses-chart" class="shade chart-container">
                        </div>
                    </aside>

                    <aside class="col-lg-12 marg">
                        <div duty="essentials" class="shade col-lg-6" style="float: left;">
                            <h4 class="sect-header">Essentials</h4>
                            
                            <div class="essentials">
                                <div class="col-lg-12 first-row">
                                    <div class="1st-quart col-lg-6">Hello</div>
                                    <div class="2st-quart col-lg-6">Hello</div>
                                </div>

                                <hr>

                                <div class="col-lg-12 second-row">
                                    <div class="3st-quart col-lg-6">Hello</div>
                                    <div class="4st-quart col-lg-6">Hello</div>
                                </div>
                            </div>
                        </div>

                        <div duty="month-calendar" class="shade col-lg-6" style="float: right;">
                            <h4 class="chart-header">Essentials</h4>
                            <hr>
                            <hr>
                        </div>
                    </aside>

                    <aside class="col-lg-12 marg">
                        <div duty="essentials" class="shade col-lg-4" style="float: left;">
                            <h4 class="chart-header">Essentials</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates qui eos ipsam aut! Sit, quas. Amet dolorum, et corporis provident consequatur quidem temporibus dolores unde impedit autem. Eos, incidunt expedita.</p>
                        </div>

                        <div duty="month-calendar" class="shade col-lg-4" style="float: right;">
                            <h4 class="chart-header">Essentials</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates qui eos ipsam aut! Sit, quas. Amet dolorum, et corporis provident consequatur quidem temporibus dolores unde impedit autem. Eos, incidunt expedita.</p>
                        </div>

                        <div duty="month-calendar" class="shade col-lg-4" style="float: right;">
                            <h4 class="chart-header">Essentials</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates qui eos ipsam aut! Sit, quas. Amet dolorum, et corporis provident consequatur quidem temporibus dolores unde impedit autem. Eos, incidunt expedita.</p>
                        </div>
                    </aside>
                </section>

                <?php
                    //Load the footer
                    $this->load->view('generics/footer.php');
                ?>
            </div>
        </div>

        <script src="<?php echo base_url();?>assets/js/xchart/d3.v3.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/xchart/xcharts.min.js"></script>
    </body>
</html>

<?php
    //Load the footer
    //$this->load->view('generics/footer.php');
?>