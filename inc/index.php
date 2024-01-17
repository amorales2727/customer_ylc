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
                            <div class="row g-gs">
                                <?php foreach(Services::getServices($customer->locker) as $service) { ?>
                                <div class="card card-body col-sm-5 bg-white shadow-sm mx-2">
                                <div class="d-flex">
                                    <div style="font-size: 25px;" class="col-2 text-center align-self-center ">
                                        <div>
                                            <i class="fa-solid fa-plane"></i>
                                        </div>
                                        <div>
                                            <span>Aereo</span>
                                        </div>
                                    </div>
                                    <div class="ps-5 col-10">
                                        <div>
                                            <h5><?php echo $customer->name ?></h5>
                                        </div>
                                        <div class="py-2 address-services">
                                            <span class="line d-block">
                                                <?php $service->address ?>
                                                <em class="px-2 pointer-on icon ni ni-copy"></em>
                                            </span>
                                            <span class="line d-block">
                                                <?php echo chronym_locker . $customer->locker ?>
                                                <em class="px-2 pointer-on icon ni ni-copy"></em>
                                            </span>
                                            <span>
                                                <span class="line">
                                                    <?php echo $service->city . ',  ' . $service->state . ' ' . $service->zip_code ?>
                                                    <em class="px-2 pointer-on icon ni ni-copy"></em>
                                                </span>
                                            </span>
                                            <span class="d-block line" >
                                                <?php echo $service->phone ?>
                                                <em class="px-2 pointer-on icon ni ni-copy"></em>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <?php } ?>
                            </div>
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