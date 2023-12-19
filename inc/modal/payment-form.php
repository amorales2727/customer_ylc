<?php global $customer; ?>
<div class="modal fade" role="dialog" id="payment-form">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form id="form-payment" class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <div class="row gy-4">
                    <div class="col-md-12 my-3">
                        <div class="form-group">
                            <label class="form-label" for="full-name">Cantidad</label>
                            <select class="form-select" name="payment_method" id="payment_method">
                                <option selected disabled hidden value="" >--Metodo de pago--</option>
                                <?php foreach(Payment::metodAllSelect() as $payment) {?>
                                    <option value="<?php echo $payment->id ?>"><?php echo $payment->text ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 my-3">
                        <div class="form-group">
                            <label class="form-label" for="full-name">Total</label>
                            <input type="text" class="form-control form-control-lg" name="total" id="total" value="" placeholder="0.00">
                        </div>
                    </div>
                    <div class="col-12">
                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                            <li>
                                <button type="submit" class="btn btn-lg btn-primary">Pagar</button>
                            </li>
                            <li>
                                <a href="#" data-bs-dismiss="modal" class="link link-light">Cancel</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>