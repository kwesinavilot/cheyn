<?php
    define('TITLE', ucwords($content->title) . " | Cheyn - Escaping The Rat Race");
    define('HEADER', $content->title);

    //$del = base_url() . 'income/delete/' . $content->id;
    //die($del);

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

                    <aside class="col-lg-12 marg" style="display:none;">
                        <div duty="further-entry-details" class="shade chart-container">
                            <div class="pageheader marg-sub col-lg-12 paddoff">
                                <div class="pull-left" style="padding: 0.5%; float:left;">
                                    <h4 style="margin:0;"><?php print ucwords(HEADER); ?></h4>
                                </div>

                                <div class="pull-right col-lg-4 paddoff" style="float:right;">
                                    <nav class="navbar navbar-expand-sm paddoff" style="float:right;">
                                        <ul class="navbar-nav">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php print base_url() . 'income/delete/' . $content->id; ?>">Delete</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                                <hr style="clear: both;">

                                <div duty="entry-title" class="pull-left col-lg-12">
                                    <ul class="list-group list-group-horizontal">
                                        <li class="list-group-item">
                                            <span>DATE:</span> <?php $date = date_create($content->entry_date); echo date_format($date,"F, j Y");//$content->entry_date; ?>
                                        </li>

                                        <li class="list-group-item">
                                            <span>BUCKET:</span> <?php print ucwords($content->bucket); ?>
                                        </li>

                                        <li class="list-group-item">
                                            <span>AMOUNT:</span> <?php print $content->amount; ?>
                                        </li>
                                    </ul> 
                                </div>
                            </div>

                            <div duty="entry-content" class="col-lg-12 description">
                                <span>DESCRIPTION</span>

                                <p>
                                    <?php 
                                        if(empty($content->description)) {
                                            echo "You didn't add a description for this entry.";
                                        } else {
                                            echo $content->description;
                                        }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </aside>

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

                                    <div class="pull-right form-group col-lg-4 paddoff" style="margin:0; float:right;">
                                        <label class="pull-left entry-label" style="width: 20%; float:left; text-align:end;">Date</label>
                                        <input class="form-control pull-right" style="width:73%; float:right;" type="date" name="date" value="<?php echo $content->entry_date; ?>">
                                        <?php echo form_error('date'); ?>
                                    </div>
                                </div>

                                <div class="main-entry-form row">
                                    <div class="top-entry col-lg-12 marg-sub" style="padding:0;">
                                        <div class="pull-left form-group col-lg-4" style="margin:0; float:left;">
                                            <label class="pull-left entry-label" style="width: 10%; float:left;">Title</label>
                                            <input class="form-control pull-right" style="width:88%; float:right;" max-length="100" type="text" name="title" value="<?php echo $content->title; ?>" placeholder="Enter entry title...">
                                            <?php echo form_error('title'); ?>
                                        </div>

                                        <div class="pull-left form-group col-lg-4" style="margin:0; float:left;">
                                            <label class="pull-left entry-label" style="width: 20%; float:left;">Amount</label>
                                            <input class="form-control pull-right" style="width:78%; float:right;" max-length="9" type="text" name="amount" value="<?php echo $content->amount; ?>" placeholder="Enter the amount...">
                                            <?php echo form_error('amount'); ?>
                                        </div>

                                        <div class="pull-right form-group col-lg-4" style="margin:0; float:right;">
                                            <label class="pull-left entry-label" style="width: 20%; float:left;">Bucket</label>
                                            <select id="bucket" name="bucket" class="form-control" style="width: 78%; float:right;">
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