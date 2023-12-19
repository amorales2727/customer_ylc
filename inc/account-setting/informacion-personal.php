<?php global $customer; ?>
<div class="card-inner card-inner-lg active config-content">
    <div class="nk-block-head nk-block-head-lg">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Informacion Personal</h4>
            </div>
            <div class="nk-block-head-content align-self-start d-lg-none">
                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="nk-data data-list">
            <div class="data-head">
                <h6 class="overline-title">Basics</h6>
            </div>
            <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">Nombre</span>
                    <span class="data-value"><?php echo $customer->name ?></span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-edit pointer-on"></em></span></div>
            </div>
            <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">Correo</span>
                    <span class="data-value"><?php echo $customer->email ?></span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-edit pointer-on"></em></span></div>
            </div>
            <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">Telefono</span>
                    <span class="data-value text-soft"><?php echo $customer->phone ?></span>
                </div>
                <div class="data-col data-col-end"><span class="data-more">
                        <em class="icon ni ni-edit pointer-on"></em></span></div>
            </div>
            <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">Cedula</span>
                    <span class="data-value text-soft"><?php echo $customer->dni ?></span>
                </div>
                <div class="data-col data-col-end">
                    <span class="data-more">
                        <em class="icon ni ni-edit pointer-on"></em>
                    </span>
                </div>
            </div>
            <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">Nacionalidad</span>
                    <span class="data-value text-soft"><?php echo $customer->nationality ?></span>
                </div>
                <div class="data-col data-col-end">
                    <span class="data-more">
                        <em class="icon ni ni-edit pointer-on"></em>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php inc('modal/edit-profile') ?>