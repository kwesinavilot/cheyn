<?php
    if(!isset($this->session->cheynId)) {
        redirect("home");
    }

    define('TITLE', "Income | Cheyn - Escaping The Rat Race");
    define('HEADER', "Income");

    //Load the header and sidebar sections
    $this->load->view('generics/header-sidebar.php');
?>

            <!-- PAGE CONTENT -->
            <div class="content">
                <section duty="main-content" class="xcontent">
                    <div duty="heading" class="col-lg-12 pageheader">
                        <div class="col-lg-12">
                            <h4><?php print HEADER; ?></h4>
                            <hr>
                        </div>
                    </div>

                    <aside duty="income-only-charts" class="col-lg-12 marg">
                        <?php //die(print_r($monthlies)); ?>
                        <div duty="income-charts" class="shade chart-container" style="display:flex;">
                            <div duty="income-piechart" class="paddoff col-lg-6" style="width: 100%; height: 43vh;">
                                <canvas id="incomeBarGraph"></canvas>
                            </div>

                            <div duty="income-piechart" class="paddoff col-lg-6" style="width: 100%; height: 43vh;">
                                <canvas id="incomePieChart"></canvas>
                            </div>
                        </div>
                    </aside>

                    <aside class="col-lg-12 marg">
                        <div duty="income-expense-chart" class="shade chart-container">
                            <div class="fixed-table-toolbar marg-sub">
                                <!-- Section Header -->
                                <div class="pull-left" style="padding: 0.5%; float:left;">
                                    <h4 style="margin:0;">All Income</h4>
                                </div>

                                <div class="pull-right col-lg-4 paddoff" style="float:right;">
                                    <!-- Create Search -->
                                    <div class="search">
                                        <input id="search-income" class="form-control" type="search" placeholder="Search table here...">
                                    </div> 
                                </div>
                            </div>

                            <div class="income-table">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 12%;">Date</th>
                                            <th style="width: 33%;">Title</th>
                                            <th style="width: 25%;">Bucket</th>
                                            <th style="width: 15%;">Amount (GHC)</th>
                                            <th style="width: 15%;">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody id="income-table-body" class="show fade">

                                        <?php
                                            //die(print_r($incomes));
                                            if(empty($incomes)) {
                                                echo "
                                                    <tr>
                                                        <td colspan='6' style='text-align:center;'>You haven't made any income entries yet.</td>
                                                    </tr>
                                                ";
                                            } else {
                                                //die(print_r($incomes));
                                                foreach ($incomes as $income) {
                                                    $view = base_url() . 'income/view/' . $income->id;
                                                    $edit = base_url() . 'income/edit/' . $income->id;

                                                    echo "
                                                        <tr>
                                                            <td id='date'>$income->entry_date</td>
                                                            <td>$income->title</td>
                                                            <td style='text-transform:capitalize'>$income->bucket</td>
                                                            <td>$income->amount</td>
                                                            <td><a href='$view'>View</a> | <a href='$edit'>Edit</a></td>
                                                        </tr>
                                                    ";
                                                }
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>

                            <div class="row paginate">
                                <div class="pagination-exp col-lg-5 col-sm-12 col-md-5">
                                    <div style="padding: 7px 0px;">
                                        <?php 
                                            if(!empty($incomes)) {      //Only show results when there are incomes
                                                print "Showing 1 to 10 of " . $total_rows . " entry(ies)"; 
                                            }
                                        ?>
                                    </div>
                                </div>

                                <div class="pagination-control col-lg-7 col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers pull-right" style="float: right;" id="bootstrap-data-table-export_paginate">
                                        <?php 
                                            if(isset($links)) {     //Check if the links are set
                                                echo $links;        //Print out the links
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>

                    <aside class="col-lg-12 marg">
                        <div duty="income-entry" class="shade col-lg-12">

                            <?php 
                                $attributes = array('id' => 'income-entry-form');     //Create main form attributes
                                echo form_open("income/insert_record", $attributes);    //Create form and set attributes
                            ?>
                            
                                <div class="fixed-table-toolbar marg-sub">
                                    <!-- Section Header -->
                                    <div class="pull-left" style="padding: 0.5%; float:left;">
                                        <h4 style="margin:0;">New Income Entry</h4>
                                    </div>

                                    <div class="pull-right form-group col-lg-4 paddoff" style="margin:0; float:right;">
                                        <label class="pull-left entry-label" style="width: 20%; float:left; text-align:end;">Date</label>
                                        <input class="form-control pull-right" style="width:73%; float:right;" type="date" name="date" value="<?php echo set_value('date'); ?>">
                                        <?php echo form_error('date'); ?>
                                    </div>
                                </div>

                                <div class="main-entry-form row">
                                    <div class="top-entry col-lg-12 marg-sub" style="padding:0;">
                                        <div class="pull-left form-group col-lg-4" style="margin:0; float:left;">
                                            <label class="pull-left entry-label" style="width: 10%; float:left;">Title</label>
                                            <input class="form-control pull-right" style="width:88%; float:right;" max-length="100" type="text" name="title" value="<?php echo set_value('title'); ?>" placeholder="Enter entry title...">
                                            <?php echo form_error('title'); ?>
                                        </div>

                                        <div class="pull-left form-group col-lg-4" style="margin:0; float:left;">
                                            <label class="pull-left entry-label" style="width: 20%; float:left;">Amount</label>
                                            <input class="form-control pull-right" style="width:78%; float:right;" max-length="9" type="text" name="amount" value="<?php echo set_value('amount'); ?>" placeholder="Enter the amount...">
                                            <?php echo form_error('amount'); ?>
                                        </div>

                                        <div class="pull-right form-group col-lg-4" style="margin:0; float:right;">
                                            <label class="pull-left entry-label" style="width: 20%; float:left;">Bucket</label>
                                            <select id="bucket" name="bucket" class="form-control" style="width: 78%; float:right;">
                                                <?php
                                                    //die(print_r($incomes));
                                                    if(empty($buckets)) {
                                                        echo "
                                                            <option value='select' style='background: white;'>Select bucket</option>
                                                        ";
                                                    } else {
                                                        echo "
                                                            <option value='select' style='background: white;'>Select bucket</option>
                                                        ";

                                                        foreach ($buckets as $bucket) {
                                                            echo "
                                                                <option id='bucket' value='" . strtolower($bucket->name) . "'>$bucket->name</option>
                                                            ";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                            <?php echo form_error('bucket'); ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 marg-sub">
                                        <?php echo form_error('description'); ?>
                                        <textarea class="form-control" rows="5" name="description" max-length="5000" value="<?php echo set_value('description'); ?>" placeholder="Enter description here..."></textarea>
                                    </div>

                                    <div id="control" style="margin-left: 40%;" class="col-lg-3">
                                        <button type="submit" class="col-lg-12 btn btn-outline-success">Save Entry</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </aside>
                </section>

                <?php
                    //Load the footer
                    $this->load->view('generics/footer.php');
                ?>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                var ctx1 = document.getElementById('incomeBarGraph').getContext('2d');       //Get the element to render chart in 
                var incomeBarGraph = new Chart(ctx1, {                                       //Create chart object
                    type: 'bar',

                    data: {
                        labels: [
                            <?php
                                //Check if there is a list of months
                                if(empty($monthlies)) {
                                    echo "'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'";            //If no, say nothing
                                } else {                //Else,
                                    foreach ($monthlies as $month) {     //loop through the list
                                        echo "'$month->month',";           //and display them as an array
                                    }
                                }
                            ?>
                        ],

                        datasets: [
                            {
                            label: <?php if(empty($monthlies)) {
                                            print "'Showing Sample Data'";
                                        } else {
                                            print "'Incomes Per Month'";
                                        }
                                    ?>,

                            data: [
                                <?php
                                    //Check if there is a data list
                                    if(empty($monthlies)) {
                                        echo "400, 550, 750, 810, 56, 55, 400, 80, 660, 5000, 3000, 999";            //If no, say nothing
                                    } else {                //Else,
                                        foreach ($monthlies as $index => $month) {     //loop through the list
                                            echo "$month->amount,";           //and display the data as an array
                                        }
                                    }
                                ?>
                            ],

                            borderColor: "rgba(0, 123, 255, 0.9)",
                            borderWidth: "0",
                            backgroundColor: "rgba(0, 123, 255, 0.5)"
                            }
                        ]
                    },
                    
                    options: {
                        legend: {
                            position: 'top',

                            labels: {
                            fontFamily: 'Poppins'
                            }
                        },

                        responsive:true,
                        maintainAspectRatio: false,

                        scales: {
                            xAxes: [{
                                ticks: {
                                    fontFamily: "Poppins"

                                }
                            }],

                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    fontFamily: "Poppins"
                                }
                            }]
                        }
                    }
                });

                var ctx2 = document.getElementById('incomePieChart').getContext('2d');       //Get the element to render chart in 
                var incomePieChart = new Chart(ctx2, {                                       //Create chart object
                    type: 'pie',                                                            //specify chart type

                    //The data for the chart goes here
                    data : {
                        //Data to plot and chart-related options
                        datasets: [{
                            //Set label for the chart itself, more like a title
                            label: "Proportion of Income Buckets",

                            //Real set of data to plot - must be in an array
                            data: [
                                <?php
                                    //Check if there is a data list
                                    if(empty($centiles)) {
                                        echo "'100'";            //If no, say nothing
                                    } else {                //Else,
                                        foreach ($centiles as $index => $centile) {     //loop through the list
                                            echo "$centile,";           //and display the data as an array
                                        }
                                    }
                                ?>
                            ],

                            //Background colors for each arc of the chart
                            backgroundColor: [
                                <?php
                                    //Check if there is a bucket list
                                    if(empty($buckets)) {
                                        echo "'#0e0c28'";            //If no, say nothing
                                    } else {                //Else,
                                        foreach ($buckets as $bucket) {     //loop through the list
                                            echo "'$bucket->color',";           //and display the colors as an array
                                        }
                                    }
                                ?>
                            ],

                            //Set the width of the border of the arcs
                            borderWidth: 2//,

                            //weight: 250
                        }],

                        // These labels appear in the legend and in the tooltips when hovering different arcs
                        labels: [
                            <?php
                                //Check if there is a bucket list
                                if(empty($buckets)) {
                                    echo "'This is a sample data'";            //If no, say nothing
                                } else {                //Else,
                                    foreach ($buckets as $bucket) {     //loop through the list
                                        echo "'$bucket->name',";           //and display them as an array
                                    }
                                }
                            ?>
                        ]
                    },

                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: {
                            position: //Check if there is a bucket list
                                <?php
                                    if(empty($buckets)) {
                                        echo "'bottom'";            //If no, say nothing
                                    } else {                //Else,
                                        echo "'right'";           //and display them as an array
                                    }
                                ?>
                            ,
                        },
                        title: {
                            display: true,
                            text: 'Bucket Proportionals'
                        },
                        animation: {
                            animateRotate: true,
                            animationEasing      : 'easeOutBounce',
                            animateScale: true
                        }
                    }
                });
            });
        </script>

    </body>
</html>

<?php
    //die(print_r($this->session->tempdata()));

    if ($this->session->tempdata('income_entry_success')) {
        echo "
            <script>
                $.notify('" . $this->session->tempdata('income_entry_success') . "', { position:'top center', className:'success'});
            </script>
        ";
    } else if($this->session->tempdata('income_entry_failure')) {
        echo "
            <script>
            $.notify('" . $this->session->tempdata('income_entry_failure') . "', { position:'top center', className:'error'});
            </script>
        ";
    }
?>