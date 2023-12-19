<?php global $customer; ?>
<?php $address = Core::getAddress() ?>
<div class="modal fade" role="dialog" id="address-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form id="form-update-address-customer" class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Actualizar Dirreción</h5>
                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="provincia">Provincia</label>
                            <select class="form-select" name="id_provincia" id="id_provincia">
                                <option selected disabled hidden value="" >--PROVINCIA--</option>
                                <?php foreach($address->provincias as $provincia) { ?>
                                    <option <?php showArgument($provincia->id, $customer->id_provincia, 'selected') ?> value="<?php echo $provincia->id ?>"><?php echo $provincia->text ?></option>
                                    
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="distrito">Distrito</label>
                            <select class="form-select" name="id_distrito" id="id_distrito">
                                <option selected disabled hidden value="" >--DISTRITO--</option>
                                <?php foreach($address->distritos as $distrito) { ?>
                                    <option <?php showArgument($distrito->id, $customer->id_distrito, 'selected') ?> data-provincia="<?php echo $distrito->id_provincia ?>" value="<?php echo $distrito->id ?>"><?php echo $distrito->text ?></option>
                                    
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="provincia">Corregimiento</label>
                            <select class="form-select" name="id_corregimiento" id="id_corregimiento">
                                <option selected disabled hidden value="" >--Corregimiento--</option>
                                <?php foreach($address->corregimeintos as $corregimiento) { ?>
                                    <option <?php showArgument($corregimiento->id, $customer->id_corregimiento, 'selected') ?> data-provincia="<?php echo $corregimiento->id_provincia ?>" data-distrito="<?php echo $corregimiento->id_distrito ?>" value="<?php echo $corregimiento->id ?>"><?php echo $corregimiento->text ?></option>
                                    
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="address">Dirreción</label>
                            <textarea class="form-select" name="address" id="address"><?php echo $customer->address ?></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div style="width: 100%; height: 400px" lat="<?php echo $customer->lat ?>" lng="<?php echo $customer->lng ?>" new-lat="#lat" new-lng="#lng" class="google-maps" draggable="true">
                        </div>
                    </div>
                    <div class="d-flex">
                        <input type="hidden" name="lat" id="lat" value="<?php echo $customer->lat ?>">
                        <input type="hidden" name="lng" id="lng" value="<?php echo $customer->lng ?>">
                    </div>
                    <div class="col-12">
                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                            <li>
                                <button type="submit" class="btn btn-lg btn-primary">Guardar</button>
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