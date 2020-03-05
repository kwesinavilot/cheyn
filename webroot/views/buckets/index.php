<?php
    define('TITLE', "Buckets | Cheyn - Escaping The Rat Race");
    define('HEADER', "Buckets");

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
                        <div duty="bucket-expense-chart" class="shade chart-container">
                            <div class="fixed-table-toolbar marg-sub">
                                <!-- Section Header -->
                                <div class="pull-left" style="padding: 0.5%;">
                                    <h4 style="margin:0;">Buckets</h4>
                                </div>
                            </div>

                            <div class="bucket-table">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 30%;">Name</th>
                                            <th style="width: 40%;">Description</th>
                                            <th style="width: 15%;">Label Color</th>
                                            <th style="width: 15%;">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody id="bucket-table-body" class="show fade">

                                        <?php
                                            //die(print_r($buckets));
                                            if(empty($buckets)) {
                                                echo "
                                                    <tr>
                                                        <td colspan='5' style='text-align:center;'>You haven't added any buckets yet.</td>
                                                    </tr>
                                                ";
                                            } else {
                                                //die(print_r($config));
                                                foreach ($buckets as $bucket) {
                                                    $insights = base_url() . 'buckets/insights/' . $bucket->short;
                                                    $edit = base_url() . 'buckets/edit/' . $bucket->short;

                                                    echo "
                                                        <tr>
                                                            <td>$bucket->name</td>
                                                            <td>$bucket->description</td>
                                                            <td style='text-transform: capitalize;'>$bucket->color</td>
                                                            <td><a href='$insights'>Insights</a> | <a href='$edit'>Edit</a></td>
                                                        </tr>
                                                    ";
                                                }
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>

                            <!-- <div class="row paginate">
                                <div class="pagination-exp col-lg-5 col-sm-12 col-md-5">
                                    <div style="padding: 7px 0px;">
                                        <?php print "Showing 1 to 10 of " . $total_rows . " entries"; ?>
                                    </div>
                                </div>

                                <div class="pagination-control col-lg-7 col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers pull-right" id="bootstrap-data-table-export_paginate">
                                        <?php echo $links; ?>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </aside>

                    <aside class="col-lg-12 marg">
                        <div duty="add-bucket" class="shade col-lg-12">

                            <?php 
                                $attributes = array('id' => 'add-bucket-form');     //Create main form attributes
                                echo form_open("buckets/add_bucket", $attributes);    //Create form and set attributes
                            ?>
                            
                                <div class="fixed-table-toolbar marg-sub">
                                    <!-- Section Header -->
                                    <div class="pull-left" style="padding: 0.5%;">
                                        <h4 style="margin:0;">Add New Bucket</h4>
                                    </div>
                                </div>

                                <div class="main-entry-form row">
                                    <div class="top-entry col-lg-12 marg-sub" style="padding:0;">
                                        <div class="pull-left form-group col-lg-6" style="margin:0; float:left;">
                                            <label class="pull-left entry-label" style="width: 10%; float:left;">Name</label>
                                            <input class="form-control pull-right" style="width:88%; float:right;" max-length="25" type="text" name="name" value="<?php echo set_value('name'); ?>" placeholder="Enter bucket name...">
                                            <?php echo form_error('name'); ?>
                                        </div>

                                        <div class="pull-right form-group col-lg-4" style="margin:0; float:right;">
                                            <label class="pull-left entry-label" style="width: 30%; float:left;">Label Color</label>
                                            <select id="label-color" name="label-color" class="form-control" style="width: 68%;">
                                                <option value="select" style="background: white;">Select label color</option>
                                                <option id="bucket-color" value="red" style="color: white; background: red;">Red</option>
                                                <option id="bucket-color" value="green" style="color: white; background: green;">Green</option>
                                                <option id="bucket-color" value="blue" style="color: white; background: blue;">Blue</option>
                                                <option id="bucket-color" value="yellow" style="color: white; background: yellow;">Yellow</option>
                                                <option id="bucket-color" value="brown" style="color: white; background: brown;">Brown</option>
                                                <option id="bucket-color" value="orange" style="color: white; background: orange;">Orange</option>
                                                <option id="bucket-color" value="indigo" style="color: white; background: indigo;">Indigo</option>
                                                <option id="bucket-color" value="violet" style="color: white; background: violet;">Violet</option>
                                            </select>
                                            <?php echo form_error('label-color'); ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 marg-sub">
                                        <?php echo form_error('description'); ?>
                                        <textarea class="form-control" rows="5" name="description" max-length="5000" value="<?php echo set_value('description'); ?>" placeholder="Enter bucket description here..."></textarea>
                                    </div>

                                    <div id="control" style="margin-left: 40%;" class="col-lg-3">
                                        <button type="submit" class="col-lg-12 btn btn-outline-success">Add Bucket</button>
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
    </body>
</html>

<?php
    //die(print_r($this->session->tempdata()));

    if ($this->session->tempdata('bucket_entry_success')) {
        echo "
            <script>
                $.notify('" . $this->session->tempdata('bucket_entry_success') . "', { position:'top center', className:'success'});
            </script>
        ";
    } else if($this->session->tempdata('bucket_entry_failure')) {
        echo "
            <script>
            $.notify('" . $this->session->tempdata('bucket_entry_failure') . "', { position:'top center', className:'error'});
            </script>
        ";
    }
?>