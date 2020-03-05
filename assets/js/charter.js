// This script controls the charts
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
                label: "Incomes Per Month",
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