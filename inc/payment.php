<!-- main @s -->
<?php global $customer; ?>
<div class="nk-main ">
    <!-- wrap @s -->
    <div class="nk-wrap ">
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
                            <div class="d-flex justify-content-center">
                                <div class="col-12 col-sm-10">
                                    <div class="card">
                                        <div class="card-body">
                                            <form id="form-add-payment" class="">

                                                <div class="d-flex justify-content-center">
                                                    <div class="col-md-8 col-12">
                                                        <div class="d-flex justify-content-center">
                                                            <div class="col-sm-6 mb-3 mx-2">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="amount_paid">Monto</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control input-currency" name="amount_paid" id="amount_paid" placeholder="0.00">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 mb-3 mx-2">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="num_reference">Numero de referencia</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" name="num_reference" id="num_reference" placeholder="ABC-123">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="payment-upload-content">
                                                            <div class="d-none">
                                                                <input type="hidden" name="token" value="<?php echo $_GET['token'] ?>">
                                                                <input type="file" accept="imagen/*" name="file" id="file">
                                                            </div>
                                                            <i id="btn-upload-file" class="fa-solid fa-file-arrow-up"></i>
                                                            <span class="d-block fs-12px">click para cargar compobante de trasferencia</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center my-3">
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content @e -->
    </div>
    <!-- wrap @e -->
</div>