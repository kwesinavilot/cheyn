<?php
    define('TITLE', "Edit Entry: " . ucwords($content->title) . " | Cheyn - Escaping The Rat Race");
    define('HEADER', $content->title);

    //$del = base_url() . 'income/delete/' . $content->id;
    //die($del);

    //Load the header and sidebar sections
    $this->load->view('generics/header-sidebar.php');
?>

            <!-- PAGE CONTENT -->
            <div class="content">
                <section duty="main-content" class="xcontent">
                    <aside class="col-lg-12 marg">
                    <div duty="income-entry" class="shade col-lg-12">

                        <?php 
                            $attributes = array('id' => 'income-update-form');     //Create main form attributes
                            echo form_open("income/update/" . $content->id, $attributes);    //Create form and set attributes
                            //die(print_r($content));
                        ?>

                            <div class="fixed-table-toolbar marg-sub">
                                <!-- Section Header -->
                                <div class="pull-left" style="padding: 0.5%; float:left;">
                                    <h4 style="margin:0;">Update Income Entry</h4>
                                </div>

                                <div class="pull-right form-group resp-form col-lg-4 col-md-4 col-sm-4 col paddoff" style="float:right;">
                                    <label class="pull-left entry-label" style="width: 20%; float:left; text-align:end;">Date</label>
                                    <input class="form-control pull-right date" type="date" name="date" value="<?php echo $content->entry_date; ?>">
                                    <?php echo form_error('date'); ?>
                                </div>
                            </div>

                            <div class="main-entry-form row">
                                <div class="top-entry col-lg-12 marg-sub" style="padding:0;">
                                    <div class="pull-left form-group resp-form col-lg-4 col-md-4 col-sm-4 col" style="float:left;">
                                        <label class="pull-left entry-label" style="width: 10%; float:left;">Title</label>
                                        <input class="form-control pull-right title" max-length="100" type="text" name="title" value="<?php echo $content->title; ?>" placeholder="Enter entry title...">
                                        <?php echo form_error('title'); ?>
                                    </div>

                                    <div class="pull-left form-group resp-form col-lg-4 col-md-4 col-sm-4 col" style="float:left;">
                                        <label class="pull-left entry-label" style="width: 20%; float:left;">Amount</label>
                                        <input class="form-control pull-right amount" max-length="9" type="text" name="amount" value="<?php echo $content->amount; ?>" placeholder="Enter the amount...">
                                        <?php echo form_error('amount'); ?>
                                    </div>

                                    <div class="pull-right form-group resp-form col-lg-4 col-md-4 col-sm-4 col" style="float:left;">
                                        <label class="pull-left entry-label" style="width: 20%; float:left;">Bucket</label>
                                        <select id="bucket" name="bucket" class="form-control bucket">
                                            <?php
                                                if(empty($buckets)) {
                                                    echo "
                                                        <option value='select' style='background: white;'>Select bucket</option>
                                                    ";
                                                } else {
                                                    echo "<option value='$content->bucket' style='background: white;'>" . ucwords($content->bucket) . "</option>";

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
                                    <textarea class="form-control" rows="5" name="description" max-length="5000" placeholder="Enter description here..."><?php print $content->description; ?></textarea>
                                </div>

                                <div id="control" style="margin-left: 40%;" class="col-lg-3 col-md-5 col-sm-6">
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