<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- wrap @s -->
        <div class="nk-wrap nk-wrap-nosidebar">
            <!-- content @s -->
            <div class="nk-content ">
                <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                    <div class="brand-logo pb-4 text-center">
                        <a href="<?php echo URL ?>" class="logo-link">
                            <img class="logo-light logo-img logo-img-lg" src="assets/img/logo.ligt.png" alt="logo">
                            <img class="logo-dark logo-img logo-img-lg" src="assets/img/logo.png"   alt="logo-dark">
                        </a>
                    </div>
                    <div class="card">
                        <div class="card-inner card-inner-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title">Reset password</h5>
                                    <div class="nk-block-des">
                                        <p>Por favor, introduce una nueva contraseña segura para tu cuenta.</p>
                                    </div>
                                </div>
                            </div>
                            <form >
                                <input type="hidden" name="token" value="<?php echo $_GET['token'] ?>" >
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="default-01">Contraseña</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="****">
                                    </div>
                                    <div class="form-label-group my-3">
                                        <label class="form-label" for="default-01">Confirmar contraseña</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <input type="password" class="form-control form-control-lg" name="password2" id="password2" placeholder="****">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-primary btn-block">Guardar Contraseña</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- wrap @e -->
        </div>
        <!-- content @e -->
    </div>
    <!-- main @e -->
</div>