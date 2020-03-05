<?php
    //Check if there's been a login else go back home
    if(!isset($this->session->cheynId)) {
        redirect("home");
    }
    
    define('TITLE', "Dashboard | Cheyn - Escaping The Rat Race");
    define('HEADER', "Dashboard");

    //Load the header and sidebar sections
    $this->load->view('generics/header-sidebar.php');

    //die("http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
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

                    <aside duty="income-expenses" class="col-lg-12 marg">
                        <div duty="income-expenses-chart" class="shade chart-container">
                            <h4 class="sect-header">Income &amp; Expenses</h4>

                            <!-- Create xChart -->
                            <figure class="xchart" id="xchart"></figure>

                            <!--Show totals-->
                            <div class="col-lg-12 totals">
                                <div class="col-lg-6 left-total">
                                    <div class="total-desc col-lg-8">
                                        <h4 class="total-header" style="color:green;">Income</h4>
                                        <span class="total-currency">GHC</span>
                                    </div>

                                    <div class="total-amount col-lg-4">
                                        <h1 class="total-figure">
                                            <?php
                                                if (!isset($top_chart['income'])) {
                                                    print "0.00";
                                                    //die(print_r($top_chart));
                                                } else {
                                                    print $top_chart['income'];
                                                    //die(print_r($top_chart));
                                                }
                                            ?>
                                        </h1>
                                    </div>
                                </div>

                                <div class="col-lg-6 right-total">
                                    <div class="total-desc col-lg-4">
                                        <h4 class="total-header" style="color:red;">Expenses</h4>
                                        <span class="total-currency">GHC</span>
                                    </div>

                                    <div class="total-amount col-lg-8">
                                        <h1 class="total-figure">
                                            <?php
                                                if (!isset($top_chart['expenses'])) {
                                                    print "0.00";
                                                } else {
                                                    print $top_chart['expenses'];
                                                }
                                            ?>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>

                    <aside duty="essentials" class="essentials col-lg-12 marg">
                        <div duty="income-expenses-chart" class="shade chart-container col-lg-12" style="display:inline-block;">
                            <div class="col-lg-12">
                                <h4 class="sect-header">Bucket Proportions</h4>
                            </div>

                            <div duty="income-piechart" class="paddoff col-lg-6" style="float: left; height: 43vh;">
                                <canvas id="incomePieChart"></canvas>
                            </div>

                            <div duty="expenses-piechart" class="paddoff col-lg-6" style="float: left; height: 43vh;">
                                <canvas id="expensesPieChart"></canvas>
                            </div>
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

        <script>
            (function() {
                var data = [{
                    "xScale": "ordinal",
                    "comp": [],
                    "main": [{
                    "className": ".main.l1",
                    "data": [{
                        "y": 15,
                        "x": "2012-11-19T00:00:00"
                    }, {
                        "y": 11,
                        "x": "2012-11-20T00:00:00"
                    }, {
                        "y": 8,
                        "x": "2012-11-21T00:00:00"
                    }, {
                        "y": 10,
                        "x": "2012-11-22T00:00:00"
                    }, {
                        "y": 1,
                        "x": "2012-11-23T00:00:00"
                    }, {
                        "y": 6,
                        "x": "2012-11-24T00:00:00"
                    }, {
                        "y": 8,
                        "x": "2012-11-25T00:00:00"
                    }]
                    }, {
                    "className": ".main.l2",
                    "data": [{
                        "y": 29,
                        "x": "2012-11-19T00:00:00"
                    }, {
                        "y": 33,
                        "x": "2012-11-20T00:00:00"
                    }, {
                        "y": 13,
                        "x": "2012-11-21T00:00:00"
                    }, {
                        "y": 16,
                        "x": "2012-11-22T00:00:00"
                    }, {
                        "y": 7,
                        "x": "2012-11-23T00:00:00"
                    }, {
                        "y": 18,
                        "x": "2012-11-24T00:00:00"
                    }, {
                        "y": 8,
                        "x": "2012-11-25T00:00:00"
                    }]
                    }],
                    "type": "line-dotted",
                    "yScale": "linear"
                }, {
                    "xScale": "ordinal",
                    "comp": [],
                    "main": [{
                    "className": ".main.l1",
                    "data": [{
                        "y": 12,
                        "x": "2012-11-19T00:00:00"
                    }, {
                        "y": 18,
                        "x": "2012-11-20T00:00:00"
                    }, {
                        "y": 8,
                        "x": "2012-11-21T00:00:00"
                    }, {
                        "y": 7,
                        "x": "2012-11-22T00:00:00"
                    }, {
                        "y": 6,
                        "x": "2012-11-23T00:00:00"
                    }, {
                        "y": 12,
                        "x": "2012-11-24T00:00:00"
                    }, {
                        "y": 8,
                        "x": "2012-11-25T00:00:00"
                    }]
                    }, {
                    "className": ".main.l2",
                    "data": [{
                        "y": 29,
                        "x": "2012-11-19T00:00:00"
                    }, {
                        "y": 33,
                        "x": "2012-11-20T00:00:00"
                    }, {
                        "y": 13,
                        "x": "2012-11-21T00:00:00"
                    }, {
                        "y": 16,
                        "x": "2012-11-22T00:00:00"
                    }, {
                        "y": 7,
                        "x": "2012-11-23T00:00:00"
                    }, {
                        "y": 18,
                        "x": "2012-11-24T00:00:00"
                    }, {
                        "y": 8,
                        "x": "2012-11-25T00:00:00"
                    }]
                    }],
                    "type": "cumulative",
                    "yScale": "linear"
                }, {
                    "xScale": "ordinal",
                    "comp": [],
                    "main": [{
                    "className": ".main.l1",
                    "data": [{
                        "y": 12,
                        "x": "2012-11-19T00:00:00"
                    }, {
                        "y": 18,
                        "x": "2012-11-20T00:00:00"
                    }, {
                        "y": 8,
                        "x": "2012-11-21T00:00:00"
                    }, {
                        "y": 7,
                        "x": "2012-11-22T00:00:00"
                    }, {
                        "y": 6,
                        "x": "2012-11-23T00:00:00"
                    }, {
                        "y": 12,
                        "x": "2012-11-24T00:00:00"
                    }, {
                        "y": 8,
                        "x": "2012-11-25T00:00:00"
                    }]
                    }, {
                    "className": ".main.l2",
                    "data": [{
                        "y": 29,
                        "x": "2012-11-19T00:00:00"
                    }, {
                        "y": 33,
                        "x": "2012-11-20T00:00:00"
                    }, {
                        "y": 13,
                        "x": "2012-11-21T00:00:00"
                    }, {
                        "y": 16,
                        "x": "2012-11-22T00:00:00"
                    }, {
                        "y": 7,
                        "x": "2012-11-23T00:00:00"
                    }, {
                        "y": 18,
                        "x": "2012-11-24T00:00:00"
                    }, {
                        "y": 8,
                        "x": "2012-11-25T00:00:00"
                    }]
                    }],
                    "type": "bar",
                    "yScale": "linear"
                }];
                
                var order = [0, 1, 0, 2],
                    i = 0,
                    xFormat = d3.time.format('%A'),
                    chart = new xChart('line-dotted', data[order[i]], '#xchart', {
                    axisPaddingTop: 5,
                    dataFormatX: function(x) {
                        return new Date(x);
                    },
                    tickFormatX: function(x) {
                        return xFormat(x);
                    },
                    timing: 1250
                    }),
                    rotateTimer,
                    toggles = d3.selectAll('.multi button'),
                    t = 3500;

                function updateChart(i) {
                    var d = data[i];
                    chart.setData(d);
                    toggles.classed('toggled', function() {
                    return (d3.select(this).attr('data-type') === d.type);
                    });
                    return d;
                }

                toggles.on('click', function(d, i) {
                    clearTimeout(rotateTimer);
                    updateChart(i);
                });

                function rotateChart() {
                    i += 1;
                    i = (i >= order.length) ? 0 : i;
                    var d = updateChart(order[i]);
                    rotateTimer = setTimeout(rotateChart, t);
                }
                
                rotateTimer = setTimeout(rotateChart, t);
            }());
        </script>
    </body>
</html>

<script>
        //Plot Income Pie Chart
        var incomeChart = document.getElementById('incomePieChart').getContext('2d');       //Get the element to render chart in 
        var incomePieChart = new Chart(incomeChart, {                                       //Create chart object
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
                                    if(empty($inc_centiles)) {
                                        echo "'100'";            //If no, say nothing
                                    } else {                //Else,
                                        foreach ($inc_centiles as $index => $centile) {     //loop through the list
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
                                        echo "'left'";           //and display them as an array
                                    }
                                ?>
                            ,
                        },
                        title: {
                            display: true,
                            text: 'Incomes'
                        },
                        animation: {
                            animateRotate: true,
                            animationEasing      : 'easeOutBounce',
                            animateScale: true
                        }
                    }
        });

        var expensesChart = document.getElementById('expensesPieChart').getContext('2d');       //Get the element to render chart in 
        var expensesPieChart = new Chart(expensesChart, {                                       //Create chart object
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
                                    if(empty($exp_centiles)) {
                                        echo "'100'";            //If no, say nothing
                                    } else {                //Else,
                                        foreach ($exp_centiles as $index => $centile) {     //loop through the list
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
                            text: 'Expenses'
                        },
                        animation: {
                            animateRotate: true,
                            animationEasing      : 'easeOutBounce',
                            animateScale: true
                        }
                    }
        });
</script>

<?php
    //Load the footer
    //$this->load->view('generics/footer.php');
?>