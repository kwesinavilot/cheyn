<div class="profile">

        <?php
            if(isset($this->session->picture)){
                $picname = $this->session->picture;
                $path = "../../users/" . strtolower($this->session->picture) . "/" . $picname;
            } else {
                $path = base_url() . "assets/img/default.png";
            }
        ?>

        <div id="profile-picture">
            <img id="picture" class="marg-side" style='border: 3px solid white;' src="<?php print $path; ?>" alt="My Profile Picture" title="Profile Picture">
        </div>

        <div class="profile-desc marg-side">
            <p id="nickname">
                <?php print $this->session->cheynID; ?>
            </p>

            <p id="email">
                <?php print $this->session->email; ?>
            </p>
        </div>

        <div id="profile-control" class="marg-side">
            <a href="<?php print base_url() . "index.php/users/logout"; ?>">Logout</a>
        </div>
    </div>


    <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                        </tr>

                                        <tr>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="bootstrap-table">
                                <div class="fixed-table-toolbar">
                                    <div class="bs-bars pull-left">
                                        <div id="toolbar">
                                            <select class="form-control">
                                                <option value="">Export Basic</option>
                                                <option value="all">Export All</option>
                                                <option value="selected">Export Selected</option>
                                            </select>
                                        </div>
                                    </div>

                                    
                                </div>
                                
                                <div class="columns columns-right btn-group pull-right">
                                    <button class="btn btn-default" type="button" name="paginationSwitch" aria-label="pagination Switch" title="Hide/Show pagination">
                                        <i class="glyphicon glyphicon-collapse-down icon-chevron-down"></i>
                                    </button>
                                    
                                    <button class="btn btn-default" type="button" name="refresh" aria-label="refresh" title="Refresh">
                                        <i class="glyphicon glyphicon-refresh icon-refresh"></i>
                                    </button>
                                    
                                    <button class="btn btn-default" type="button" name="toggle" aria-label="toggle" title="Toggle">
                                        <i class="glyphicon glyphicon-list-alt icon-list-alt"></i>
                                    </button>
                                    
                                    <div class="export btn-group">
                                        <button class="btn btn-default dropdown-toggle" aria-label="export type" title="Export data" data-toggle="dropdown" type="button">
                                            <i class="glyphicon glyphicon-export icon-share"></i>
                                            <span class="caret"></span>
                                        </button>
                                        
                                        <ul class="dropdown-menu" role="menu">
                                            <li role="menuitem" data-type="json">
                                                <a href="javascript:void(0)">JSON</a>
                                            </li>
                                            
                                            <li role="menuitem" data-type="xml">
                                                <a href="javascript:void(0)">XML</a>
                                            </li>
                                            
                                            <li role="menuitem" data-type="csv">
                                                <a href="javascript:void(0)">CSV</a>
                                            </li>
                                            
                                            <li role="menuitem" data-type="txt">
                                                <a href="javascript:void(0)">TXT</a>
                                            </li>
                                            
                                            <li role="menuitem" data-type="sql">
                                                <a href="javascript:void(0)">SQL</a>
                                            </li>
                                            
                                            <li role="menuitem" data-type="excel">
                                                <a href="javascript:void(0)">MS-Excel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                    
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="bs-checkbox " style="width: 36px; " data-field="state" tabindex="0">
                                                    <div class="th-inner ">
                                                        <input name="btSelectAll" type="checkbox">
                                                    </div>
                                                    
                                                    <div class="fht-cell">
                                                    </div>
                                                </th>
                                                
                                                <th style="width: 32px;" data-field="id" tabindex="0">
                                                    <div class="th-inner ">ID</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                
                                                <th style="width: 159px;" data-field="name" tabindex="0">
                                                    <div class="th-inner ">Project</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                
                                                <th style="width: 135px;" data-field="email" tabindex="0">
                                                    <div class="th-inner ">Email</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                
                                                <th style="width: 126px;" data-field="phone" tabindex="0">
                                                    <div class="th-inner ">Phone</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                
                                                <th style="width: 115px;" data-field="company" tabindex="0">
                                                    <div class="th-inner ">Company</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                
                                                <th style="width: 93px;" data-field="complete" tabindex="0">
                                                    <div class="th-inner ">Completed</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                
                                                <th style="width: 50px;" data-field="task" tabindex="0">
                                                    <div class="th-inner ">Task</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                
                                                <th style="width: 103px;" data-field="date" tabindex="0">
                                                    <div class="th-inner ">Date</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                
                                                <th style="width: 77px;" data-field="price" tabindex="0">
                                                    <div class="th-inner ">Price</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                
                                                <th style="width: 65px;" data-field="action" tabindex="0">
                                                    <div class="th-inner ">Action</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr data-index="0">
                                                <td class="bs-checkbox ">
                                                    <input data-index="0" name="btSelectItem" type="checkbox">
                                                </td>
                                                
                                                <td style="">1</td>

                                                <td style="">
                                                    <a href="javascript:void(0)" data-name="name" data-pk="undefined" data-value="Web Development" class="editable editable-click">Web Development</a>
                                                </td>
                                                
                                                <td style="">
                                                    <a href="javascript:void(0)" data-name="email" data-pk="undefined" data-value="admin@uttara.com" class="editable editable-click">admin@uttara.com</a>
                                                </td>
                                                
                                                <td style="">
                                                    <a href="javascript:void(0)" data-name="phone" data-pk="undefined" data-value="+8801962067309" class="editable editable-click">+8801962067309</a>
                                                </td>
                                                
                                                <td style="">
                                                    <a href="javascript:void(0)" data-name="company" data-pk="undefined" data-value="Aber Ltd." class="editable editable-click">Aber Ltd.</a>
                                                </td>
                                                
                                                <td class="datatable-ct" style="">
                                                    <span class="pie" style="display: none;">1/6</span>
                                                    <svg class="peity" height="16" width="16">
                                                        <path d="M 8 8 L 8 0 A 8 8 0 0 1 14.928203230275509 4 Z" fill="#03a9f4"></path>
                                                        <path d="M 8 8 L 14.928203230275509 4 A 8 8 0 1 1 7.999999999999998 0 Z" fill="#d7d7d7"></path>
                                                    </svg>
                                                </td>
                                                
                                                <td style="">
                                                    <a href="javascript:void(0)" data-name="task" data-pk="undefined" data-value="10%" class="editable editable-click">10%</a>
                                                </td>
                                                
                                                <td style="">
                                                    <a href="javascript:void(0)" data-name="date" data-pk="undefined" data-value="Jul 14, 2018" class="editable editable-click">Jul 14, 2018</a>
                                                </td>
                                                
                                                <td style="">
                                                    <a href="javascript:void(0)" data-name="price" data-pk="undefined" data-value="$5455" class="editable editable-click">$5455</a>
                                                </td>
                                                
                                                <td class="datatable-ct" style="">
                                                    <i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="fixed-table-pagination">
                                <div class="pull-left pagination-detail">
                                    <span class="pagination-info">Showing 1 to 10 of 21 rows</span>
                                    <span class="page-list">
                                    <span class="btn-group dropup">

                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <span class="page-size">10</span>
                                        <span class="caret"></span>
                                    </button>
                                    
                                    <ul class="dropdown-menu" role="menu">
                                        <li role="menuitem" class="active">
                                            <a href="#">10</a>
                                        </li>
                                        
                                        <li role="menuitem">
                                            <a href="#">25</a>
                                        </li>
                                    </ul>
                                    
                                    </span> rows per page</span>
                                </div>
                                
                                <div class="pull-right pagination">
                                    <ul class="pagination">
                                        <li class="page-pre">
                                            <a href="#">‹</a>
                                        </li>
                                        
                                        <li class="page-number active">
                                            <a href="#">1</a>
                                        </li>
                                        
                                        <li class="page-number">
                                            <a href="#">2</a>
                                        </li>
                                        
                                        <li class="page-number">
                                            <a href="#">3</a>
                                        </li>
                                        
                                        <li class="page-next">
                                            <a href="#">›</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>