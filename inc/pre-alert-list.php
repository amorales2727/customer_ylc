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
                            <div class="text-end">
                                <a href="pre-alert-add" class="btn btn-primary"><em class="me-1 icon ni ni-package-fill"></em>PreAlertar Paquete</a>
                            </div>

                        </div>
                        <div class="nk-block">
                            <div class="nk-block nk-block-lg">
                                <table class="datatable-init nowrap nk-tb-list is-separate" data-auto-responsive="false">
                                    <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span>Tracking</span></th>
                                            <th class="nk-tb-col"><span>Fecha de creación</span></th>
                                            <th class="nk-tb-col"><span>Total</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach (PreAlert::getAll() as $PreAlert) { ?>
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col">
                                                    <a href="#" data-courier="<?php echo $PreAlert->courier_code?>" data-tracking="<?php echo $PreAlert->tracking ?>" class="tb-sub btn-tracking"><?php echo  $PreAlert->tracking ?></a>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span class="tb-sub"><?php echo  $PreAlert->date ?></span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span class="tb-sub"><?php echo  showCurrency($PreAlert->cost) ?></span>
                                                </td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php  ?>
        <!-- content @e -->
        <!-- footer @s -->
        <?php inc('modal/tracking') ?>
        <!-- footer @e -->
    </div>
    <!-- wrap @e -->
</div>