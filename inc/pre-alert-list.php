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
                                            <th class="nk-tb-col"><span>#</span></th>
                                            <th class="nk-tb-col"><span>Tracking</span></th>
                                            <th class="nk-tb-col"><span>Peso</span></th>
                                            <th class="nk-tb-col"><span>Total</span></th>
                                            <th class="nk-tb-col"><span>Status</span></th>
                                            <th class="nk-tb-col"><span></span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach (Packages::getAll() as $packages) { ?>
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col tb-col-sm">
                                                    <span class="title"><?php echo  $packages->id ?></span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span class="tb-sub"><?php echo  $packages->tracking ?></span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span class="tb-sub"><?php echo  $packages->pound ?></span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span class="tb-sub"><?php echo  showCurrency($packages->total) ?></span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span class="tb-sub badge badge-dim bg-outline-<?php echo  $packages->status_color ?>"><?php echo  $packages->status ?></span>
                                                </td>
                                                <td class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                        <li class="nk-tb-action">
                                                            <?php if (empty($packages->url_img)) : ?>
                                                                <a style="color: #c1c1c1;" href="#" class="btn  btn-icon pointer-off ">
                                                                    <em class="icon fa-solid fa-camera"></em>
                                                                </a>
                                                            <?php else : ?>
                                                                <a href="#" class="btn btn-trigger btn-icon btn-show-photo" data-url-img="<?php echo $packages->url_img ?>" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Wallet" data-bs-original-title="Ver Foto">
                                                                    <em class="icon fa-solid fa-camera"></em>
                                                                </a>
                                                            <?php endif; ?>
                                                        </li>
                                                    </ul>
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