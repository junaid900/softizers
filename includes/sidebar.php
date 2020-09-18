<div class="navbar nav_title" style="border: 0;">

    <a href="index.php" class="site_title">
        <?php

        if (!empty(SITE_LOGO)) {
            echo '<img src="uploads/site/logo.png" style="width: 70%; height:100%" />';
        } else {
            echo '<img src="images/login_banner.jpg" >';
        }
        ?>

    </a>

</div>

<div class="clearfix"></div>

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <div class="menu_section">
        <ul class="nav side-menu">

            <li><a href="index.php"><i class="fa fa-tachometer white"></i>Dashboard</a>
            </li>


            <li class=" <?php if ($page == " add_category " or $page == "add_item " or $page == "items " or $page == "add_company " or $page == "add_item ") {
                echo "active ";
            } ?>"><a><i class="fa fa-cubes white"></i> Items <span class="fa fa-chevron-down"></span></a>

                <ul class="nav child_menu" <?php if ($page == "add_category" or $page == "add_item") {
                    echo 'style="display: block;"';
                } ?>>
                    <li class="<?php if ($page == " customers ") {
                        echo "current-page ";
                    } ?>"><a href="customers.php">Customer</a>
                    </li>
                    <li class="<?php if ($page == " companies ") {
                        echo "current-page ";
                    } ?>"><a href="companies.php">Company</a>
                    </li>
<!--                    <li class="--><?php //if ($page == " categories ") {
//                        echo "current-page ";
//                    } ?><!--"><a href="categories.php">Categories</a>-->
<!--                    </li>-->
                </ul>
            </li>
            <li class="<?php if ($page == "hospital") {
                echo "active ";
            } ?>"><a href="hospital.php"><i class="fa fa-dollar white"></i>Hospital</a>
            </li>
            <li class="<?php if($page==" categories "){ echo "current-page ";}?>"><a href="categories.php"><i class="fa fa-dollar white"></i>Categories</a>
            </li>
            <li class="<?php if ($page == "head") {
                echo "active ";
            } ?>"><a href="head.php"><i class="fa fa-dollar white"></i>Head</a>
            </li>


            <li class=" <?php if ($page == " sales_report " or $page == "purchase_report ") {
                echo "active ";
            } ?>"><a><i class="fa fa-file-text-o white"></i> Reports <span class="fa fa-chevron-down"></span></a>

                <ul class="nav child_menu" <?php if ($page == "sales_report" or $page == "purchase_report") {
                    echo 'style="display: block;"';
                } ?>>


                    <li class="<?php if ($_REQUEST['type'] == " date ") {
                        echo "current-page ";
                    } ?>"><a href="sales_report.php?type=date">Sales Report By Date</a>
                    </li>
                    <li class="<?php if ($_REQUEST['type'] == " item ") {
                        echo "current-page ";
                    } ?>"><a href="sales_report.php?type=item">Sales Report By Item</a>
                    </li>
                    <li class="<?php if ($_REQUEST['type'] == " client ") {
                        echo "current-page ";
                    } ?>"><a href="sales_report.php?type=client">Sales Report By Client</a>
                    </li>
                    <li class="<?php if ($_REQUEST['type'] == " pdate ") {
                        echo "current-page ";
                    } ?>"><a href="purchase_report.php?type=pdate">Purchase Report By Date</a>
                    </li>
                    <li class="<?php if ($_REQUEST['type'] == " pitem ") {
                        echo "current-page ";
                    } ?>"><a href="purchase_report.php?type=pitem">Purchase Report By Item</a>
                    </li>
                    <li class="<?php if ($_REQUEST['type'] == " pvander ") {
                        echo "current-page ";
                    } ?>"><a href="purchase_report.php?type=pvander">Purchase Report By Vendor</a>
                    </li>
                    <li class=""><a href="opening_stock_report.php">Opening Stock</a>
                    </li>
                    <li class=""><a href="damage_stock_report.php">Damage Stock</a>
                    </li>

                </ul>

            </li>

            <li class="<?php if ($page == " users " or $page == "add_user " or $page == "edit_user " or $page == "view_user ") {
                echo "active ";
            } ?>"><a href="users.php"><i class="fa fa-users white"></i> Users</a>
            </li>

            <li><a href="security.php"><i class="fa fa-lock white"></i> Security</a>
            </li>
            <li><a href="site_settings.php"><i class="fa fa-lock white"></i> Settings</a>
            </li>

        </ul>

    </div>

</div>