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
                            <div class="nk-block nk-block-lg">
                                <table class="datatable-init nowrap nk-tb-list is-separate" data-auto-responsive="false">
                                    <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span>#</span></th>
                                            <th class="nk-tb-col"><span>Tracking</span></th>
                                            <th class="nk-tb-col"><span>Peso</span></th>
                                            <th class="nk-tb-col"><span>Total</span></th>
                                            <th class="nk-tb-col"><span>Status</span></th>
                                            <th class="nk-tb-col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach (Invoice::getAll() as $invoice) { ?>
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col tb-col-sm">
                                                    <span class="title">INV<?php echo  $invoice->id ?></span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span class="tb-sub"><?php echo  $invoice->tracking ?></span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span class="tb-sub"><?php echo  $invoice->pound ?></span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span class="tb-sub"><?php echo  showCurrency($invoice->total) ?></span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span class="tb-sub badge badge-dim bg-outline-<?php echo  $invoice->status_color ?>"><?php echo  $invoice->status ?></span>
                                                </td>
                                                <td class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1 my-n1">
                                                        <li class="me-n1">
                                                            <div class="dropdown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <?php if($invoice->id_status != 3) : ?>
                                                                        <li>
                                                                            <a href="checkout/package/<?php echo $invoice->token ?>" class="payment">
                                                                                <em class="icon fa-solid fa-money-bill"></em>
                                                                                <span>Pagar</span>
                                                                            </a>
                                                                        </li>
                                                                        <?php endif; ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
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
        <?php inc('modal/payment-form') ?>
        <!-- footer @e -->
    </div>
    <!-- wrap @e -->
</div>