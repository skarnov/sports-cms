<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/private/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/private/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/private/css/skin-green.css">
        <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <script>
            function check_delete()
            {
                var chk = confirm('Are You Want To Delete This');
                if (chk)
                {
                    return true;
                } else
                {
                    return false;
                }
            }
        </script>
    </head>

    <body class="hold-transition skin-green sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <a href="<?php echo base_url(); ?>" class="logo">
                    <span class="logo-mini"><b>Evis</b></span>
                    <span class="logo-lg"><b>Sports</b></span>
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span><?php echo $this->session->userdata('admin_name'); ?> <i class="caret"></i></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header bg-light-blue">
                                        <img src="<?php echo base_url(); ?>asset/public/themes/leo_sportstore/img/logo3.jpg" alt="User Image" />
                                        <p>
                                            <?php echo $this->session->userdata('admin_name'); ?>
                                            <small>Member since <?php echo $this->session->userdata('admin_date_time'); ?></small>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo base_url(); ?>evis_app/edit_admin/<?php echo $this->session->userdata('admin_id'); ?>" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo base_url(); ?>evis_app/logout" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <ul class="sidebar-menu">
                        <li class="active treeview">
                            <a href="<?php echo base_url(); ?>evis_app">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="<?php echo base_url(); ?>" target="_blank">
                                <i class="fa fa-home"></i> <span>View Website</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-paper-plane"></i> <span>News Manager</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>evis_sale/add_news"> Add News</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_sale/manage_news"> Manage News</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-play"></i> <span>Team Manager</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>evis_sports/add_team"> Add Team</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_sports/manage_team"> Manage Team</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i> <span>Admin Manager</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>evis_app/add_admin"> Add New Admin</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_app/manage_admin"> Manage Admin</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-desktop"></i> <span>Slider Manager</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>evis_app/add_slide"> Add New Slide</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_app/manage_slider"> Manage Slider</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-suitcase"></i> <span>Banner Manager</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>evis_app/add_banner"> Add New Banner</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_app/manage_banner"> Manage Banner</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-futbol-o"></i> <span>Match Schedules</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>evis_sports/add_match_schedule"> Add Match Schedule</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_sports/manage_match_schedule"> Manage Schedule</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_sports/manage_prediction"> Manage Prediction</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bars"></i> <span>Inventory Manager</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>evis_inventory/add_category"> Add New Category</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_inventory/add_product"> Add New Product</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_inventory/manage_category"> Manage Category</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_inventory/manage_product"> Manage Product</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-male"></i> <span>Customer Manager</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>evis_sale/add_customer"> Add New Customer</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_sale/manage_customer"> Manage Customer</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cart-arrow-down"></i> <span>Sales Management</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>evis_sale/sales_report"> Sales Report</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_sale/manage_sale"> Manage Sales</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_sale/manage_order"> Order Management</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-newspaper-o"></i> <span>Newsletter Subscription</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>evis_sale/send_newsletter"> Send Newsletter</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_sale/manage_subscription"> Manage Subscription</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="<?php echo base_url(); ?>evis_app/setting">
                                <i class="fa fa-cogs"></i> <span>Setting</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="<?php echo base_url(); ?>evis_app/about">
                                <i class="fa fa-adjust"></i> <span>About</span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>
            <?php echo $dashboard; ?>
            <footer class="main-footer">
                <strong>Copyright © <a href="<?php echo base_url(); ?>">Sports</a></strong> All Rights Reserved.
            </footer>
        </div>
        <script src="<?php echo base_url(); ?>asset/private/js/jQuery-2.1.4.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/private/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>asset/private/js/app.min.js"></script>
        <script type="text/javascript">
            var xmlhttp = false;
            try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (E) {
                    xmlhttp = false;
                }
            }
            if (!xmlhttp && typeof XMLHttpRequest !== 'undefined') {
                xmlhttp = new XMLHttpRequest();
            }
            function categorySearch(search)
            {
                if (search) {
                    serverPage = '<?php echo base_url(); ?>evis_app/category_search/' + search + '/';
                    xmlhttp.open("GET", serverPage);
                    xmlhttp.onreadystatechange = function ()
                    {
                        document.getElementById('search_category').innerHTML = xmlhttp.responseText;
                    };
                    xmlhttp.send(null);
                }
            }
            function productSearch(search)
            {
                if (search) {
                    serverPage = '<?php echo base_url(); ?>evis_app/product_search/' + search + '/';
                    xmlhttp.open("GET", serverPage);
                    xmlhttp.onreadystatechange = function ()
                    {
                        document.getElementById('search_product').innerHTML = xmlhttp.responseText;
                    };
                    xmlhttp.send(null);
                }
            }
            function customerSearch(search)
            {
                if (search) {
                    serverPage = '<?php echo base_url(); ?>evis_app/customer_search/' + search + '/';
                    xmlhttp.open("GET", serverPage);
                    xmlhttp.onreadystatechange = function ()
                    {
                        document.getElementById('search_customer').innerHTML = xmlhttp.responseText;
                    };
                    xmlhttp.send(null);
                }
            }
            function orderSearch(search)
            {
                if (search) {
                    serverPage = '<?php echo base_url(); ?>evis_app/order_search/' + search + '/';
                    xmlhttp.open("GET", serverPage);
                    xmlhttp.onreadystatechange = function ()
                    {
                        document.getElementById('search_order').innerHTML = xmlhttp.responseText;
                    };
                    xmlhttp.send(null);
                }
            }
            function subscriptionSearch(search)
            {
                if (search) {
                    serverPage = '<?php echo base_url(); ?>evis_app/subscription_search/' + search + '/';
                    xmlhttp.open("GET", serverPage);
                    xmlhttp.onreadystatechange = function ()
                    {
                        document.getElementById('search_subscription').innerHTML = xmlhttp.responseText;
                    };
                    xmlhttp.send(null);
                }
            }
        </script>
    </body>
</html>