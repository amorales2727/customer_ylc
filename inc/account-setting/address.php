<?php global $customer; ?>
<div class="card-inner card-inner-lg hidden config-content" id="address">
    <div class="text-end my-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#address-edit" ><em class="mx-1 icon ni ni-edit"></em>Editar</button>
    </div>
    <div class="nk-block">
        <div class="nk-data data-list">
            <div class="data-head">
                <h6 class="overline-title">Dirrecion</h6>
            </div>
            <div class="nk-block p-3">
                <div class="profile-ud-list">
                    <div class="profile-ud-item">
                        <div class="profile-ud wider">
                            <span class="profile-ud-label">Provincia</span>
                            <span class="profile-ud-value"><?php echo $customer->provincia ?></span>
                        </div>
                    </div>
                    <div class="profile-ud-item">
                        <div class="profile-ud wider">
                            <span class="profile-ud-label">Distrito</span>
                            <span class="profile-ud-value"><?php echo $customer->distrito ?></span>
                        </div>
                    </div>
                    <div class="profile-ud-item">
                        <div class="profile-ud wider">
                            <span class="profile-ud-label">Corregimiento</span>
                            <span class="profile-ud-value"><?php echo $customer->corregimiento ?></span>
                        </div>
                    </div>
                </div>
            </div><!-- .nk-block -->
            <div class="nk-divider divider md"></div>
            <div class="nk-block">
                <div class="bq-note">
                    <div class="bq-note-item">
                        <div class="bq-note-text">
                            <p><?php echo $customer->address ?></p>
                        </div>
                        <div class="card card-bordered w-100 mt-3">
                            <div style="width: 100%; height: 400px" lat="<?php echo $customer->lat ?>" lng="<?php echo $customer->lng ?>" class="google-maps"></div>
                        </div>;
                    </div><!-- .bq-note-item -->
                </div><!-- .bq-note -->
            </div><!-- .nk-block -->
        </div>
    </div>
</div>
<?php inc('modal/address-edit') ?>