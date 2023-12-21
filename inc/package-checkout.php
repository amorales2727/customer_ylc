<!-- main @s -->
<?php

    global $customer;
    global $invoice;
?>
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
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <div class="card card-full overflow-hidden">
                                        <div class="nk-ecwg nk-ecwg7 h-100">
                                            <div class="card-inner flex-grow-1">
                                                <div class="invoice-wrap p-0 border-0">
                                                    <div class="invoice-brand text-center">
                                                        <img src="assets/img/logo.png" width=250px" alt="">
                                                    </div>
                                                    <div class="invoice-head">
                                                        <div class="invoice-contact">
                                                            <span class="overline-title">Facturado a</span>
                                                            <div class="invoice-contact-info">
                                                                <h4 class="title"><?php echo $customer->name?></h4>
                                                                <ul class="list-plain">
                                                                    <li><em class="icon ni ni-map-pin-fill"></em><span><?php echo $customer->address?>
                                                                        <br>
                                                                        <?php echo $customer->provincia ?>, <?php echo $customer->distrito?></span></li>
                                                                    <li><em class="icon ni ni-call-fill"></em><span><?php echo $customer->phone ?></span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="invoice-desc">
                                                            <ul class="list-plain">
                                                                <li class="invoice-id"><span>Factura ID</span>:<span><?php echo $invoice->id ?></span></li>
                                                                <li class="invoice-date"><span>Fecha</span>:<span><?php echo $invoice->date_create ?></span></li>
                                                            </ul>
                                                        </div>
                                                    </div><!-- .invoice-head -->
                                                    <div class="invoice-bills">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="w-60">Descripción</th>
                                                                        <th>PRECIO</th>
                                                                        <th>Qty</th>
                                                                        <th>Cantidad</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><?php echo $invoice->service . 'Tracking ' . $invoice->tracking ?></td>
                                                                        <td><?php echo showCurrency($invoice->price_pound) ?></td>
                                                                        <td><?php echo $invoice->pound_qty ?></td>
                                                                        <td><?php echo showCurrency($invoice->total_pound) ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $invoice->service . ' Volumen Tracking ' . $invoice->tracking ?></td>
                                                                        <td><?php echo showCurrency($invoice->price_volumen) ?></td>
                                                                        <td><?php echo $invoice->square_meter ?></td>
                                                                        <td><?php echo showCurrency($invoice->total_volumen) ?></td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <td colspan="1"></td>
                                                                        <td colspan="2">Subtotal</td>
                                                                        <td><?php echo showCurrency($invoice->sub_total) ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="1"></td>
                                                                        <td colspan="2">ITBMS</td>
                                                                        <td><?php echo showCurrency($invoice->itbms) ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="1"></td>
                                                                        <td colspan="2">Total</td>
                                                                        <td><?php echo showCurrency($invoice->total) ?></td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                            <div class="nk-notes ff-italic fs-12px text-soft">
                                                            <code>Documento no fiscal</code>
                                                            </div>
                                                        </div>
                                                    </div><!-- .invoice-bills -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <form id="payment-package" class="card card-full overflow-hidden">
                                        <div class="d-none">
                                            <input type="hidden" name="token" value="<?php echo $invoice->token?>">
                                        </div>
                                        <div class="nk-ecwg nk-ecwg7 h-100">
                                            <div class="card-inner flex-grow-1">
                                                <span class="preview-title overline-title">Metodo de pago</span>
                                                <ul class="custom-control-group custom-control-vertical w-100">
                                                    <?php foreach (Payment::metodAllSelect() as $method) { ?>
                                                    <li>
                                                        <div class="custom-control custom-control-sm custom-radio custom-control-pro checked">
                                                            <input type="radio" class="custom-control-input" name="payment_method" id="<?php echo $method->text ?>" value="<?php echo $method->id ?>">
                                                            <label class="custom-control-label" for="<?php echo $method->text?>">
                                                                <div class="btn-payment <?php echo $method->style ?>">
                                                                    <?php if(!empty($method->logo)) : ?>
                                                                        <img src="<?php echo $method->logo ?>">
                                                                    <?php else : ?>
                                                                        <i class="<?php echo $method->icon ?>"></i>
                                                                        <span><?php echo $method->text ?></span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="position-absolute bottom-0 w-100 mb-4 ">
                                            <div class="text-center">
                                                <button class="btn btn-primary">Pagar <?php echo  showCurrency($invoice->total)?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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