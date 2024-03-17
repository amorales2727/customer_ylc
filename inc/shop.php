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
                                <a href="add-shop" class="btn btn-primary">Agregar</a>
                            </div>
                        </div>
                        <div class="nk-block">
                            <div class="nk-block nk-block-lg">
                                <table class="datatable-init nowrap nk-tb-list is-separate" data-auto-responsive="false">
                                    <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span>#</span></th>
                                            <th class="nk-tb-col"><span>URL</span></th>
                                            <th class="nk-tb-col"><span>Costo del Producto</span></th>
                                            <th class="nk-tb-col"><span>Total</span></th>
                                            <th class="nk-tb-col"><span>Status</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach (shop::getAll() as $packages) { ?>
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col tb-col-sm">
                                                    <span class="title">SHOP<?php echo  $packages->id ?></span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <a href="#" class="btn btn-trigger btn-icon show-url-shop" data-url="<?php echo $packages->url ?>" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="URL" data-bs-original-title="URL">
                                                        <em class="icon ni ni-link"></em>
                                                    </a>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span class="tb-sub"><?php echo showCurrency($packages->product_cost) ?></span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span class="tb-sub"><?php echo showCurrency($packages->total) ?></span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span class="tb-sub"><?php echo $packages->status ?></span>
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
        <!-- content @e -->
        <!-- footer @s -->
        <?php inc('footer') ?>
        <!-- footer @e -->
    </div>
    <!-- wrap @e -->
</div>