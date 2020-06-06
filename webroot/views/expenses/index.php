<?php
    if(!isset($this->session->cheynId)) {
        redirect("home");
    }

    define('TITLE', "Expenses | Cheyn - Escaping The Rat Race");
    define('HEADER', "Expenses");

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

                    <aside duty="expenses-only-charts" class="col-lg-12 marg">
                        <?php //die(print_r($monthlies)); ?>
                        <div duty="expenses-charts" class="shade chartx-container">
                            <div duty="expenses-piechart" class="paddoff col-lg-6" style="width: 100%; height: 43vh;">
                                <canvas id="expensesBarGraph"></canvas>
                            </div>

                            <div duty="expenses-piechart" class="paddoff col-lg-6" style="width: 100%; height: 43vh;">
                                <canvas id="expensesPieChart"></canvas>
                            </div>
                        </div>
                    </aside>

                    <aside class="col-lg-12 marg">
                        <div duty="expenses-expense-chart" class="shade chart-container">
                            <div class="fixed-table-toolbar marg-sub">
                                <!-- Section Header -->
                                <div class="pull-left" style="padding: 0.5%; float:left;">
                                    <h4 style="margin:0;">All Expenses</h4>
                                </div>

                                <div class="pull-right col-lg-4 col-md-4 col-sm-6 col paddoff" style="float:right;">
                                    <!-- Create Search -->
                                    <div class="search">
                                        <input id="search-expenses" class="form-control" type="search" placeholder="Search table here...">
                                    </div> 
                                </div>
                            </div>

                            <div class="expenses-table table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <th style="width: 12%;">Date</th>
                                        <th style="width: 33%;">Title</th>
                                        <th style="width: 25%;">Bucket</th>
                                        <th style="width: 15%;">Amount (GHC)</th>
                                        <th style="width: 15%;">Actions</th>
                                    </thead>

                                    <tbody id="expenses-table-body" class="show fade">

                                        <?php
                                            //die(print_r($expenses));
                                            if(empty($expenses)) {
                                                echo "
                                                    <tr>
                                                        <td colspan='6' style='text-align:center;'>You haven't made any expenses entries yet.</td>
                                                    </tr>
                                                ";
                                            } else {
                                                //die(print_r($config));
                                                foreach ($expenses as $expenses) {
                                                    $view = base_url() . 'expenses/view/' . $expenses->id;
                                                    $edit = base_url() . 'expenses/edit/' . $expenses->id;

                                                    echo "
                                                        <tr>
                                                            <td>$expenses->entry_date</td>
                                                            <td>$expenses->title</td>
                                                            <td style='text-transform:capitalize'>$expenses->bucket</td>
                                                            <td>$expenses->amount</td>
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
                                            if(!empty($expenses)) {      //Only show results when there are expensess
                                                print "Showing 1 to 10 of " . $total_rows . " entry(ies)"; 
                                            }
                                        ?>
                                    </div>
                                </div>

                                <div class="pagination-control col-lg-7 col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers pull-right" id="bootstrap-data-table-export_paginate">
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
                        <div duty="expenses-entry" class="shade col-lg-12">

                            <?php 
                                $attributes = array('id' => 'expenses-entry-form');     //Create main form attributes
                                echo form_open("expenses/insert_record", $attributes);    //Create form and set attributes
                            ?>
                            
                                <div class="fixed-table-toolbar marg-sub">
                                    <!-- Section Header -->
                                    <div class="pull-left" style="padding: 0.5%; float:left;">
                                        <h4 style="margin:0;">New Expenses Entry</h4>
                                    </div>

                                    <div class="pull-right form-group resp-form col-lg-4 col-md-4 col-sm-4 col paddoff" style="float:right;">
                                        <label class="pull-left entry-label" style="width: 20%; float:left; text-align:end;">Date</label>
                                        <input class="form-control pull-right date" type="date" name="date" value="<?php echo set_value('date'); ?>">
                                        <?php echo form_error('date'); ?>
                                    </div>
                                </div>

                                <div class="main-entry-form row">
                                    <div class="top-entry col-lg-12 marg-sub" style="padding:0;">
                                        <div class="pull-left form-group resp-form col-lg-4 col-md-4 col-sm-4 col" style="float:left;">
                                            <label class="pull-left entry-label" style="width: 10%; float:left;">Title</label>
                                            <input class="form-control pull-right title" max-length="100" type="text" name="title" value="<?php echo set_value('title'); ?>" placeholder="Enter entry title...">
                                            <?php echo form_error('title'); ?>
                                        </div>

                                        <div class="pull-left form-group resp-form col-lg-4 col-md-4 col-sm-4 col" style="float:left;">
                                            <label class="pull-left entry-label" style="width: 20%; float:left;">Amount</label>
                                            <input class="form-control pull-right amount" max-length="9" type="text" name="amount" value="<?php echo set_value('amount'); ?>" placeholder="Enter the amount...">
                                            <?php echo form_error('amount'); ?>
                                        </div>

                                        <div class="pull-right form-group resp-form col-lg-4 col-md-4 col-sm-4 col" style="float:left;">
                                            <label class="pull-left entry-label" style="width: 20%; float:left;">Bucket</label>
                                            <select id="bucket" name="bucket" class="form-control bucket">
                                                <?php
                                                    //die(print_r($expenses));
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

                                    <div id="control" style="margin-left: 40%;" class="col-lg-3 col-md-5 col-sm-6">
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
                var ctx1 = document.getElementById('expensesBarGraph').getContext('2d');       //Get the element to render chart in 
                var expensesBarGraph = new Chart(ctx1, {                                       //Create chart object
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
                                            print "'Expenses Per Month'";
                                        }
                                    ?>
                            ,

                            data: [
                                <?php
                                    //Check if there is a data list
                                    if(empty($monthlies)) {
                                        echo "0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0";            //If no, say nothing
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

                var ctx2 = document.getElementById('expensesPieChart').getContext('2d');       //Get the element to render chart in 
                var expensesPieChart = new Chart(ctx2, {                                       //Create chart object
                    type: 'pie',                                                            //specify chart type

                    //The data for the chart goes here
                    data : {
                        //Data to plot and chart-related options
                        datasets: [{
                            //Set label for the chart itself, more like a title
                            label: "Proportion of Expenses Buckets",

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

    if ($this->session->tempdata('expenses_entry_success')) {
        echo "
            <script>
                $.notify('" . $this->session->tempdata('expenses_entry_success') . "', { position:'top center', className:'success'});
            </script>
        ";
    } else if($this->session->tempdata('expenses_entry_failure')) {
        echo "
            <script>
            $.notify('" . $this->session->tempdata('expenses_entry_failure') . "', { position:'top center', className:'error'});
            </script>
        ";
    }
?>