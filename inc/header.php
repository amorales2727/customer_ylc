<?php global $customer;  ?>
<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ms-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="html/index.html" class="logo-link">
                    <img class="logo-light logo-img" src="assets/img/logo.ligt.png" alt="logo">
                    <img class="logo-dark logo-img" src="assets/img/logo.png" alt="logo-dark">
                </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <?php if(empty($customer->avatar)) :  ?>
                                        <em class="icon ni ni-user-alt"></em>
                                    <?php else :  ?>
                                        <img class="img-avatar-header" src="<?php echo $customer->avatar?>" >
                                    <?php endif ; ?>
                                </div>
                                <div class="user-info d-none d-xl-block">
                                    <div class="user-status user-status-unverified"><?php echo chronym_locker . $customer->locker ?></div>
                                    <div class="user-name dropdown-indicator"><?php echo $customer->name ?></div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <?php if(empty($customer->avatar)) :  ?>
                                            <em class="icon ni ni-user-alt"></em>
                                        <?php else :  ?>
                                            <img class="img-avatar-header" src="<?php echo $customer->avatar?>" >
                                        <?php endif ; ?>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text"><?php echo $customer->name ?></span>
                                        <span class="sub-text"><?php echo $customer->email ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="account-setting"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="out"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>