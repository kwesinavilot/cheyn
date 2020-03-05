<?php
    //define('TITLE', ucwords($content->name) . " | Cheyn - Escaping The Rat Race");
    //define('HEADER', $content->name);

    //$del = base_url() . 'buckets/delete/' . $content->id;
    //die($del);
    //die(print_r($content));

    //Load the header and sidebar sections
    $this->load->view('generics/header-sidebar.php');
?>

            <!-- PAGE CONTENT -->
            <div class="content">
                <section duty="main-content" class="xcontent">
                    <!-- <div class="col-lg-12 pageheader">
                        <div class="col-lg-12">
                            <h4><?php print ucwords(HEADER); ?></h4>
                            <hr>
                        </div>
                    </div> -->

                    <aside class="col-lg-12 marg">
                        <div duty="buckets-entry" class="shade col-lg-12">

                            <?php 
                                $attributes = array('id' => 'buckets-update-form');     //Create main form attributes
                                echo form_open("buckets/update/" . $content->short, $attributes);    //Create form and set attributes
                                //die(print_r($content));
                            ?>
                            
                                <div class="fixed-table-toolbar marg-sub">
                                    <!-- Section Header -->
                                    <div class="pull-left" style="padding: 0.5%; float:left;">
                                        <h4 style="margin:0;">Update Bucket: <?php print $content->name; ?></h4>
                                    </div>
                                </div>

                                <div class="main-entry-form row">
                                    <div class="top-entry col-lg-12 marg-sub" style="padding:0;">
                                        <div class="pull-left form-group col-lg-6" style="margin:0; float:left;">
                                            <label class="pull-left entry-label" style="width: 10%; float:left;">Name</label>
                                            <input class="form-control pull-right" style="width:88%; float:right;" max-length="25" type="text" name="name" value="<?php echo $content->name; ?>" placeholder="Enter new bucket name...">
                                            <?php echo form_error('name'); ?>
                                        </div>

                                        <div class="pull-right form-group col-lg-4" style="margin:0; float:right;">
                                            <label class="pull-left entry-label" style="width: 30%; float:left;">Label Color</label>
                                            <select id="label-color" name="label-color" class="form-control" style="width: 68%;">
                                                <?php 
                                                    $colors = array('red' => 'Red', 'green' => 'Green', 'blue' => 'Blue', 'yellow' => 'Yellow',
                                                                    'brown' => 'Brown', 'orange' => 'Orange', 'indigo' => 'Indigo', 'violet' => 'Violet');
                                                    
                                                    foreach ($colors as $value => $color) {
                                                        if ($content->color == $value) {
                                                            echo "<option id='bucket-color' value='$value' style='color: white; background: $value;' selected>$color</option>";
                                                        } else {
                                                            echo "<option id='bucket-color' value='$value' style='color: white; background: $value;'>$color</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                            <?php echo form_error('label-color'); ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 marg-sub">
                                        <?php echo form_error('description'); ?>
                                        <textarea class="form-control" rows="5" name="description" max-length="5000" placeholder="Enter description here..."><?php print $content->description; ?></textarea>
                                    </div>

                                    <div id="control" style="margin-left: 40%;" class="col-lg-3">
                                        <button type="submit" class="col-lg-12 btn btn-outline-success">Update Entry</button>
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
    
?>