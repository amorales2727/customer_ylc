<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="html/index.html" class="logo-link nk-sidebar-logo">
                <img style="width: 178px" class="logo-dark logo-img" src="assets/img/logo.png" alt="logo-dark">
                <img class="logo-small logo-img logo-img-small" src="assets/img/logo-smal.png" alt="logo-small">
                <img class="logo-light logo-img" src="assets/img/logo.ligt.png" alt="logo">
            </a>
        </div>
        <div class="nk-menu-trigger me-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">


                    <?php foreach (Theme::sidebar() as $sidebar) { ?>
                        <li class="nk-menu-item <?php showClass($sidebar->sub, 1, 'has-sub') ?> ">
                            <a href="<?php echo $sidebar->url?>" class="nk-menu-link <?php showClass($sidebar->sub, 1, 'nk-menu-toggle')  ?>">
                                <span class="nk-menu-icon"><em class="<?php echo $sidebar->icon?>"></em></span>
                                <span class="nk-menu-text"><?php echo $sidebar->name?></span>
                            </a>
                            <?php if ($sidebar->sub == '1') : ?>
                                <ul class="nk-menu-sub">
                                    <?php foreach(Theme::sidebar_sub($sidebar->id) as $sub) { ?>
                                        <li class="nk-menu-item">
                                            <a href="<?php echo $sub->url ?>" class="nk-menu-link"><span class="nk-menu-text"><?php echo $sub->name ?></span></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>