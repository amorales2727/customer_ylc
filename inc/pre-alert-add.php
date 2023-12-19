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
                        <div class="nk-block">
                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    <form id="form-prealert-add" class="preview-block">
                                        <div class="row gy-4">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label" form="tracking">Número de tracking</label>
                                                    <div class="form-control-wrap">
                                                        <div class="form-icon form-icon-left">
                                                            <em class="icon fa-solid fa-barcode"></em>
                                                        </div>
                                                        <input type="text" class="form-control" name="tracking" id="tracking" placeholder="000000000" data-alert-message="Favor de agregar numero de tracking">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label" form="cost">Valor del producto</label>
                                                    <div class="form-control-wrap">
                                                        <div class="form-icon form-icon-left">
                                                            <em class="icon fa-solid fa-dollar-sign"></em>
                                                        </div>
                                                        <input type="text" class="form-control input-currency" name="cost" id="cost" placeholder="0.00" data-alert-message="Favor de agregar costo del producto">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label" form="cost">Valor del producto</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select" name="id_category"  id="id_category" data-alert-message="Favor selecionar la categoria">
                                                            <option selected disabled hidden value>--CATEGORIA--</option>
                                                            <?php foreach(Packages::getCategorySelect() as $cat) { ?>
                                                                <option value="<?php echo $cat->id ?>"><?php echo $cat->text ?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3 d-flex justify-content-center">
                                                <div class="d-none">
                                                    <input type="file" name="file" id="file" accept="image/*" data-alert-message="Favor agregar factura de compra" >
                                                </div>
                                                <div style="border: 2px dashed #dfdfdf;" class="p-5 col-12 col-md-8"  >
                                                    <div class="pointer-on upload-file">
                                                        <div class="text-center fs-80px">
                                                            <em class="icon ni ni-upload"></em>
                                                        </div>
                                                        <div class="text-center fs-12px">
                                                            <span>Click para cargar</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="preview-file hidden">
                                                    <img style="width: 70px;" src="assets/img/file-type-pdf.svg" >
                                                    <span>AAAAAA</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end mt-3">
                                            <button type="submit" class="btn btn-primary">Crear PreAlerta</button>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- .card-preview -->
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