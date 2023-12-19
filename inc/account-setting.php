<!-- main @s -->
<?php global $customer; ?>
<div class="nk-main ">
    <!-- sidebar @s -->
    <?php inc('sidebar'); ?>
    <!-- sidebar @e -->
    <!-- wrap @s -->
    <div class="nk-wrap ">
        <!-- main header @s -->
        <?php inc('header') ?>
        <!-- main header @e -->
        <!-- content @s -->
        <div class="nk-content ">
            <div class="container-fluid">
                <div class="nk-content-inner">
                    <div class="nk-content-body">
                        <div class="nk-block-head nk-block-head-sm">
                            <div class="nk-block-between">
                            </div>
                        </div>
                        <div class="nk-block">
                            <div class="card">
                                <div class="card-aside-wrap">
                                    <?php inc('account-setting/informacion-personal') ?>
                                    <?php inc('account-setting/address') ?>
                                    <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-toggle-body="true" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                        <div class="card-inner-group" data-simplebar>
                                            <div class="card-inner">
                                                <div class="user-card pointer-on">
                                                    <div class="user-avatar bg-primary avatar-content-perfil">
                                                        <div class="user-avatar">
                                                            <?php if(empty($customer->avatar)) :  ?>
                                                                <em class="icon ni ni-user-alt"></em>
                                                            <?php else :  ?>
                                                                <img class="img-avatar-header" src="<?php echo $customer->avatar?>" >
                                                            <?php endif ; ?>
                                                        </div>
                                                        <div class="change-avatar position-absolute w-100 h-100 text-center pt-1">
                                                            <div class="d-none">
                                                                <input type="file" id="new_avatar" accept="image/*">
                                                            </div>
                                                            <i class="fa-solid fa-upload"></i>
                                                        </div>
                                                    </div>
                                                    <div class="user-info ra">
                                                        <span class="lead-text"><?php echo $customer->name ?></span>
                                                        <span class="sub-text"><?php echo $customer->email ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-inner p-0">
                                                <ul class="link-list-menu">
                                                    <li><a class="active" href="account-setting"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                                                    <li><a href="account-setting#address"><em class="icon fa-solid fa-map-location-dot"></em><span>Dirrecion</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content @e -->
        <!-- footer @s -->
        <?php inc('footer') ?>
        <!-- footer @e -->
    </div>
    <!-- wrap @e -->
</div>