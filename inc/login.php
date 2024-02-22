<div class="nk-main ">
    <!-- wrap @s -->
    <div class="nk-wrap nk-wrap-nosidebar">
        <!-- content @s -->
        <div class="nk-content ">
            <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                <div class="brand-logo pb-4 text-center">
                    <a href="<?php echo URL?>" class="logo-link">
                        <img class="logo-light logo-img logo-img-lg" src="assets/img/logo.ligt.png"  alt="logo">
                        <img class="logo-dark logo-img logo-img-lg" src="assets/img/logo.png"alt="logo-dark">
                    </a>
                </div>
                <div class="card">
                    <div class="card-inner card-inner-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Sign-In</h4>
                                <div class="nk-block-des">
                                    <p>Acceda al panel usando su correo electrónico o casillero y contraseña.</p>
                                </div>
                            </div>
                        </div>
                        <form action="html/index.html">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="default-01">Email or Casillero</label>
                                </div>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control form-control-lg" name="username" id="username" placeholder="Enter your email address or Locker">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="password">Passcode</label>
                                    <a class="link link-primary link-sm" href="html/pages/auths/auth-reset-v2.html">Forgot Code?</a>
                                </div>
                                <div class="form-control-wrap">
                                    <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                    </a>
                                    <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="********">
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-lg btn-primary btn-block">Login</button>
                            </div>
                        </form>
                        <div class="form-note-s2 text-center pt-4"> Aun no tienes tu casillero?  <a href="https://ylcboxespanama.com/registrate/">Create an account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wrap @e -->
    </div>
    <!-- content @e -->
</div>