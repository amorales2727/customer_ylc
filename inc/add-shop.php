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
                            <div class="nk-content ">

                                <div class="card card-bordered card-preview">
                                    <div class="card-inner">
                                        <form class="preview-block">
                                            <div class="row gy-4">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="url">URL del producto</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-text-hint">
                                                                <em class="icon ni ni-link-alt"></em>
                                                            </div>
                                                            <input type="url" class="form-control" name="url" id="url">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="product_cost">Precio del producto</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-text-hint">
                                                                <em class="icon ni ni-money"></em>
                                                            </div>
                                                            <input type="text" class="form-control input-currency" name="product_cost" id="product_cost">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label" form="id_category">Valor del producto</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select" name="id_category" id="id_category" data-alert-message="Favor selecionar la categoria">
                                                                <option selected disabled hidden value>--CATEGORIA--</option>
                                                                <?php foreach (Packages::getCategorySelect() as $cat) { ?>
                                                                    <option value="<?php echo $cat->id ?>"><?php echo $cat->text ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label" form="description">Descripción</label>
                                                        <div class="form-control-wrap">
                                                            <textarea class="form-control" name="description" id="description" value=""></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="my-3 text-end">
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
        <!-- content @e -->
        <!-- footer @s -->
        <?php inc('footer') ?>
        <!-- footer @e -->
    </div>
    <!-- wrap @e -->
</div>