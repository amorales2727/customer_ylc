<?php global $customer; ?>
<div class="modal fade" role="dialog" id="profile-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form id="form-update-customer" class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Actualizar Cuenta </h5>
                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="full-name">Nombre</label>
                            <input type="text" class="form-control form-control-lg" name="name" id="name" value="<?php echo $customer->name ?>" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="phone-no">Corrreo</label>
                            <input type="text" class="form-control form-control-lg" name="email" id="email" value="<?php echo $customer->email ?>" placeholder="Correro">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="phone-no">Telefono</label>
                            <input type="text" class="form-control form-control-lg input-phone" name="phone" id="phone" value="<?php echo $customer->phone ?>" placeholder="Telefono">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="phone-no">Cedula</label>
                            <input type="text" class="form-control form-control-lg" name="dni" id="dni" value="<?php echo $customer->dni ?>" placeholder="Cedula">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="phone-no">Nacionalidad</label>
                            <input type="text" class="form-control form-control-lg" name="nationality" id="nationality" value="<?php echo $customer->nationality ?>" placeholder="Nacionalidad">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="phone-no">Sucursal de retiro</label>
                            <select class="form-select" name="" id="">
                                <option selected disabled hidden value="" >--SUCURSAL--</option>
                                <?php foreach(Oficces::allSelect() as $office) { ?>
                                    <option <?php showArgument($office->id, $customer->id_office, 'selected') ?> value="<?php echo $office->id ?>"><?php echo $office->text ?></option>
                                <?php } ?>
                            </select>
                        </div>
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