
<div class="container-fluid">
    <ul class="main-nav">
        <li><a href="<?php echo DOMAINAD; ?>" class="brand">Dashboard</a></li>
        <li><a href="<?php echo DOMAIN; ?>" target="_blank">Xem trang</a></li>
    </ul>
    <a href="#" class="toggle-nav toogle-menu-mobile" rel="tooltip" data-placement="bottom" title="" data-original-title="Toggle navigation"><i class="icon-reorder"></i></a>
    <ul class="main-nav">
        <li>
            <a href="<?php echo DOMAINAD; ?>admin_contact/contact_list">
                <i class="icon-envelope-alt"></i><span></span>
                <span class="text-notify">(<?php echo $num_contacts; ?>)</span>
            </a>
        </li>
        <?php /*
        <li>
            <a href="<?php echo DOMAINAD; ?>admin_news/news_waiting">
                <i class="icon-bullhorn"></i> <span class="text-notify">(<?php echo $num_orders; ?>)</span>
            </a>
        </li> 
        */ ?>
    </ul>
<!--     <div class="report_contact pull-left">
        <div class="dropdown">
            <a href="<?php echo DOMAINAD; ?>admin_contact/contact_list?form_type=999" class="dropdown-toggle">
                <i class="icon-bell"></i><span></span>
                <span class="text-notify">(<?php //echo $num_rpcontacts; ?>)</span>
            </a>
            
        </div>
    </div> -->

    <div class="user">
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- {name} -->
                <em>Xin chào, </em><?php echo $admin['fullname']; ?>
            </a>
            <ul class="dropdown-menu pull-right">
                <li>
                    <a href="<?php echo DOMAINAD; ?>admin_account/account_profile">Sửa Profile</a>
                </li>
                <li><a href="<?php echo DOMAINAD; ?>admin_dashboard/dashboard_logout"><i class="icon icon-off"></i> Thoát</a></li>
            </ul>
        </div>
    </div>

</div>

<script type="text/javascript">
    $('a.theme_name').click(function() {
        var v = $('input.theme_name').val();
        if(v == "")
        {
            alert("Vui lòng nhập tên Theme");

            return false;
        }

        var link = "<?php echo DOMAINAD; ?>admin_dashboard/dashboard_change_theme/?nm=" + v;
        document.location.href = link;
    });
</script>