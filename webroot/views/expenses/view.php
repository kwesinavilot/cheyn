<?php
    define('TITLE', ucwords($content->title) . " | Cheyn - Escaping The Rat Race");
    define('HEADER', $content->title);

    $del = base_url() . 'income/delete/' . $content->id;
    //die($del);

    //Load the header and sidebar sections
    $this->load->view('generics/header-sidebar.php');
?>

            <!-- PAGE CONTENT -->
            <div class="content">
                <section duty="main-content" class="xcontent">
                    <aside class="col-lg-12 marg">
                        <div duty="further-entry-details" class="shade chart-container">
                            <div class="pageheader marg-sub col-lg-12 paddoff">
                                <div class="pull-left" style="padding: 0.5%; float:left;">
                                    <h4 style="margin:0;"><?php print ucwords(HEADER); ?></h4>
                                </div>

                                <div class="pull-right col-lg-5 col-md-6 col-sm-12 col paddoff" style="float:right;">
                                    <nav class="navbar navbar-expand-sm paddoff ed_opts">
                                        <ul class="navbar-nav">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php print base_url() . 'expenses/edit/' . $content->id; ?>">Edit</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="delete" href="<?php print $del; ?>">Delete</a>
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
                </section>

                <?php
                    //Load the footer
                    $this->load->view('generics/footer.php');
                ?>
            </div>
        </div>

        <script>
            $('#delete').click(
                function(clickEvent){
                    clickEvent.preventDefault();    //Prevent link from going through

                    var answer = confirm("Are you really sure you want to delete this entry?");

                    if(answer == true) {
                        window.location.replace(<?php echo $del; ?>);
                    }
                }
            );
        </script>

    </body>
</html>

<?php
    if ($this->session->flashdata('update_entry_success')) {
        echo "
            <script>
                $.notify('" . $this->session->flashdata('update_entry_success') . "', { position:'top center', className:'success'});
            </script>
        ";
    } else if($this->session->flashdata('update_entry_failure')) {
        echo "
            <script>
            $.notify('" . $this->session->flashdata('update_entry_failure') . "', { position:'top center', className:'error'});
            </script>
        ";
    }
?>