<?= $this->include('partials/main') ?>

    <head>
        
    <?= $title_meta ?>

    <?= $this->include('partials/head-css') ?>

    </head>

    <body class="auth-body-bg">
        <div class="home-btn d-none d-sm-block">
            <a href="index.php"><i class="mdi mdi-home-variant h2 text-white"></i></a>
        </div>
        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-4">
                        <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                            <div class="w-100">
                                <div class="row justify-content-center">
                                    <div class="col-lg-9">
                                        <div>
                                            <div class="text-center">
                                                <div>
                                                    <a href="index.php" class="logo"><img src="assets/images/logo-dark.png" height="20" alt="logo"></a>
                                                </div>
    
                                                <h4 class="font-size-18 mt-4">Lock screen</h4>
                                                <p class="text-muted">Enter your password to unlock the screen!</p>
                                            </div>

                                            <div class="p-2 mt-5">
                                                <form class="" action="index.php">

                                                    <div class="user-thumb text-center mb-5">
                                                        <img src="assets/images/users/avatar-2.jpg" class="rounded-circle img-thumbnail avatar-md" alt="thumbnail">
                                                        <h5 class="font-size-15 mt-3">Jacob Lopez</h5>
                                                    </div>
                            
                                                    <div class="mb-3 auth-form-group-custom mb-4">
                                                        <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                        <label class="form-label" for="userpassword">Password</label>
                                                        <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                                    </div>

                                                    <div class="mt-4 text-center">
                                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Unlock</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="mt-5 text-center">
                                                <p>Not you ? return <a href="auth-login" class="fw-medium text-primary"> Log in </a> </p>
                                                <p>© <script>document.write(new Date().getFullYear())</script> Nazox. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="authentication-bg">
                            <div class="bg-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        <!-- JAVASCRIPT -->
        <?= $this->include('partials/vendor-scripts') ?>

        <script src="assets/js/app.js"></script>

    </body>
</html>
