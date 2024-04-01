<?= $this->include('partials/main') ?>

<head>

<?= $title_meta ?>

        <!-- ION Slider -->
        <link href="assets/libs/ion-rangeslider/css/ion.rangeSlider.min.css" rel="stylesheet" type="text/css"/>

        <?= $this->include('partials/head-css') ?>

    </head>

    <?= $this->include('partials/body') ?>

        <!-- Begin page -->
        <div id="layout-wrapper">

        <?= $this->include('partials/menu') ?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                            <?= $page_title ?>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-3 col-lg-4">
                                <div class="card">
                                    <div class="card-header bg-transparent border-bottom">
                                        <h5 class="mb-0">Filters</h5>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="font-size-14 mb-3">Categories</h5>

                                        <div class="accordion ecommerce" id="accordionExample">
                                            <div class="accordion-item">
                                              <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <i class="mdi mdi-desktop-classic font-size-16 align-middle me-2"></i> Electronic
                                                </button>
                                              </h2>
                                              <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <ul class="list-unstyled categories-list mb-0">
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Mobile</a></li>
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Mobile accessories</a></li>
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Computers</a></li>
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Laptops</a></li>
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Speakers</a></li>
                                                    </ul>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="accordion-item">
                                              <h2 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    <i class="mdi mdi-hanger font-size-16 align-middle me-2"></i> Fashion
                                                </button>
                                              </h2>
                                              <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <ul class="list-unstyled categories-list mb-0">
                                                        <li class="active"><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Clothing</a></li>
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Footwear</a></li>
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Watches</a></li>
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Sportswear</a></li>
                                                    </ul>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="accordion-item">
                                              <h2 class="accordion-header" id="headingThree">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    <i class="mdi mdi-pinwheel-outline font-size-16 align-middle me-2"></i> Baby & Kids
                                                </button>
                                              </h2>
                                              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <ul class="list-unstyled categories-list mb-0">
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Clothing</a></li>
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Footwear</a></li>
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Toys</a></li>
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Baby care</a></li>
                                                    </ul>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="accordion-item mb-3">
                                                <h2 class="accordion-header" id="headingFour">
                                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                    <i class="mdi mdi-dumbbell font-size-16 align-middle me-2"></i> Fitness
                                                  </button>
                                                </h2>
                                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                  <div class="accordion-body">
                                                    <ul class="list-unstyled categories-list mb-0">
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Gym equipment</a></li>
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Yoga mat</a></li>
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Dumbbells</a></li>
                                                        <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Protein supplements</a></li>
                                                    </ul>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="card-body border-top">
                                        <div>
                                            <h5 class="font-size-14 mb-4">Price</h5>

                                            <input type="text" id="pricerange">
                                        </div>
                                    </div>

                                    <div class="custom-accordion">
                                        <div class="card-body border-top">
                                            <div>
                                                <h5 class="font-size-14 mb-0"><a href="#collapseExample1" class="text-dark d-block" data-bs-toggle="collapse" >Discount <i class="mdi mdi-minus float-end accor-plus-icon"></i></a></h5>
    
                                                <div class="collapse show" id="collapseExample1">
        
                                                    <div class="mt-4">
                                                        <div class="form-check mt-2">
                                                            <input type="radio" id="productdiscountRadio6" name="productdiscountRadio1" class="form-check-input">
                                                            <label class="form-check-label" for="productdiscountRadio6">50% or more</label>
                                                        </div>
                                                        <div class="form-check mt-2">
                                                            <input type="radio" id="productdiscountRadio5" name="productdiscountRadio1" class="form-check-input">
                                                            <label class="form-check-label" for="productdiscountRadio5">40% or more</label>
                                                        </div>
                                                        <div class="form-check mt-2">
                                                            <input type="radio" id="productdiscountRadio4" name="productdiscountRadio1" class="form-check-input">
                                                            <label class="form-check-label" for="productdiscountRadio4">30% or more</label>
                                                        </div>
                                                        <div class="form-check mt-2">
                                                            <input type="radio" id="productdiscountRadio3" name="productdiscountRadio1" class="form-check-input">
                                                            <label class="form-check-label" for="productdiscountRadio3">20% or more</label>
                                                        </div>
                                                        <div class="form-check mt-2">
                                                            <input type="radio" id="productdiscountRadio2" name="productdiscountRadio1" class="form-check-input">
                                                            <label class="form-check-label" for="productdiscountRadio2">10% or more</label>
                                                        </div>
                                                        <div class="form-check mt-2">
                                                            <input type="radio" id="productdiscountRadio1" name="productdiscountRadio1" class="form-check-input">
                                                            <label class="form-check-label" for="productdiscountRadio1">Less than 10%</label>
                                                        </div>
                                                    </div>
        
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="card-body border-top">
                                            <div>
                                                <h5 class="font-size-14 mb-0"><a href="#collapseExample2" class="text-dark d-block" data-bs-toggle="collapse">Size <i class="mdi mdi-minus float-end accor-plus-icon"></i></a></h5>
    
                                                <div class="collapse show" id="collapseExample2">
        
                                                    <div class="mt-4">
                                                        <div class="form-check mt-2">
                                                            <input type="radio" id="productsizeRadio1" name="productsizeRadio" class="form-check-input">
                                                            <label class="form-check-label" for="productsizeRadio1">X-Large</label>
                                                        </div>
                                                        <div class="form-check mt-2">
                                                            <input type="radio" id="productsizeRadio2" name="productsizeRadio" class="form-check-input">
                                                            <label class="form-check-label" for="productsizeRadio2">Large</label>
                                                        </div>
                                                        <div class="form-check mt-2">
                                                            <input type="radio" id="productsizeRadio3" name="productsizeRadio" class="form-check-input">
                                                            <label class="form-check-label" for="productsizeRadio3">Medium</label>
                                                        </div>
                                                        <div class="form-check mt-2">
                                                            <input type="radio" id="productsizeRadio4" name="productsizeRadio" class="form-check-input">
                                                            <label class="form-check-label" for="productsizeRadio4">Small</label>
                                                        </div>
                                                    </div>
        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body border-top">
                                            <div>
                                                <h5 class="font-size-14 mb-0"><a href="#collapseExample3" class="collapsed text-dark d-block" data-bs-toggle="collapse">Customer Rating <i class="mdi mdi-minus float-end accor-plus-icon"></i></a></h5>
    
                                                <div class="collapse" id="collapseExample3">
        
                                                    <div class="mt-4">
                                                        <div class="form-check mt-2">
                                                            <input type="radio" id="productratingRadio1" name="productratingRadio1" class="form-check-input">
                                                            <label class="form-check-label" for="productratingRadio1">4 <i class="mdi mdi-star text-warning"></i>  & Above</label>
                                                        </div>
                                                        <div class="form-check mt-2">
                                                            <input type="radio" id="productratingRadio2" name="productratingRadio1" class="form-check-input">
                                                            <label class="form-check-label" for="productratingRadio2">3 <i class="mdi mdi-star text-warning"></i>  & Above</label>
                                                        </div>
                                                        <div class="form-check mt-2">
                                                            <input type="radio" id="productratingRadio3" name="productratingRadio1" class="form-check-input">
                                                            <label class="form-check-label" for="productratingRadio3">2 <i class="mdi mdi-star text-warning"></i>  & Above</label>
                                                        </div>
                                                        <div class="form-check mt-2">
                                                            <input type="radio" id="productratingRadio4" name="productratingRadio1" class="form-check-input">
                                                            <label class="form-check-label" for="productratingRadio4">1 <i class="mdi mdi-star text-warning"></i></label>
                                                        </div>
                                                    </div>
        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div>
                                                        <h5>Clothes & Accessories</h5>
                                                        <ol class="breadcrumb p-0 bg-transparent mb-2">
                                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Fashion</a></li>
                                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Clothing</a></li>
                                                            <li class="breadcrumb-item active">T-shirts</li>
                                                        </ol>
                                                    </div>
                                                </div>
            
                                                <div class="col-md-6">
                                                    <div class="form-inline float-md-end">
                                                        <div class="search-box ms-2">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control rounded" placeholder="Search...">
                                                                <i class="mdi mdi-magnify search-icon"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <ul class="list-inline my-3 ecommerce-sortby-list">
                                                <li class="list-inline-item"><span class="fw-medium font-family-secondary">Sort by:</span></li>
                                                <li class="list-inline-item active"><a href="#">Popularity</a></li>
                                                <li class="list-inline-item"><a href="#">Newest</a></li>
                                                <li class="list-inline-item"><a href="#">Discount</a></li>
                                            </ul>

                                            <div class="row g-0">
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="product-box">
                                                        <div class="product-img">
                                                            <div class="product-ribbon badge bg-warning">
                                                                Trending
                                                            </div>
                                                            <div class="product-like">
                                                                <a href="#">
                                                                    <i class="mdi mdi-heart-outline"></i>
                                                                </a>
                                                            </div>
                                                            <img src="assets/images/product/img-1.png" alt="img-1" class="img-fluid mx-auto d-block">
                                                        </div>
                                                        
                                                        <div class="text-center">
                                                            <p class="font-size-12 mb-1">Blue color, T-shirt</p>
                                                            <h5 class="font-size-15"><a href="#" class="text-dark">Full sleeve T-shirt</a></h5>

                                                            <h5 class="mt-3 mb-0">$240</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="product-box">
                                                        <div class="product-img">
                                                            <div class="product-ribbon badge bg-primary">
                                                                - 25 %
                                                            </div>
                                                            <div class="product-like">
                                                                <a href="#">
                                                                    <i class="mdi mdi-heart-outline"></i>
                                                                </a>
                                                            </div>
                                                            <img src="assets/images/product/img-2.png" alt="img-2" class="img-fluid mx-auto d-block">
                                                        </div>
                                                        
                                                        <div class="text-center">
                                                            <p class="font-size-12 mb-1">Half sleeve, T-shirt</p>
                                                            <h5 class="font-size-15"><a href="#" class="text-dark">Half sleeve T-shirt </a></h5>

                                                            <h5 class="mt-3 mb-0"><span class="text-muted me-2"><del>$240</del></span>$225</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="product-box">
                                                        <div class="product-img">
                                                            <div class="product-like">
                                                                <a href="#">
                                                                    <i class="mdi mdi-heart text-danger"></i>
                                                                </a>
                                                            </div>
                                                            <img src="assets/images/product/img-3.png" alt="img-3" class="img-fluid mx-auto d-block">
                                                        </div>
                                                        
                                                        <div class="text-center">
                                                            <p class="font-size-12 mb-1">Green color, Hoodie</p>
                                                            <h5 class="font-size-15"><a href="#" class="text-dark">Hoodie (Green)</a></h5>

                                                            <h5 class="mt-3 mb-0"><span class="text-muted me-2"><del>$290</del></span>$275</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="product-box">
                                                        <div class="product-img">
                                                            <div class="product-like">
                                                                <a href="#">
                                                                    <i class="mdi mdi-heart-outline"></i>
                                                                </a>
                                                            </div>
                                                            <img src="assets/images/product/img-4.png" alt="img-4" class="img-fluid mx-auto d-block">
                                                        </div>
                                                        
                                                        <div class="text-center">
                                                            <p class="font-size-12 mb-1">Gray color, Hoodie</p>
                                                            <h5 class="font-size-15"><a href="#" class="text-dark">Hoodie (Green)</a></h5>

                                                            <h5 class="mt-3 mb-0"><span class="text-muted me-2"><del>$290</del></span>$275</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="product-box">
                                                        <div class="product-img">
                                                            <div class="product-like">
                                                                <a href="#">
                                                                    <i class="mdi mdi-heart text-danger"></i>
                                                                </a>
                                                            </div>
                                                            <img src="assets/images/product/img-5.png" alt="img-5" class="img-fluid mx-auto d-block">
                                                        </div>
                                                        
                                                        <div class="text-center">
                                                            <p class="font-size-12 mb-1">Blue color, T-shirt</p>
                                                            <h5 class="font-size-15"><a href="#" class="text-dark">Full sleeve T-shirt</a></h5>

                                                            <h5 class="mt-3 mb-0">$242</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="product-box">
                                                        <div class="product-img">
                                                            <div class="product-ribbon badge bg-primary">
                                                                - 22 %
                                                            </div>
                                                            <div class="product-like">
                                                                <a href="#">
                                                                    <i class="mdi mdi-heart-outline"></i>
                                                                </a>
                                                            </div>
                                                            <img src="assets/images/product/img-6.png" alt="img-6" class="img-fluid mx-auto d-block">
                                                            
                                                        </div>
                                                        
                                                        <div class="text-center">
                                                            <p class="font-size-12 mb-1">Black color, T-shirt</p>
                                                            <h5 class="font-size-15"><a href="#" class="text-dark">Half sleeve T-shirt </a></h5>

                                                            <h5 class="mt-3 mb-0"><span class="text-muted me-2"><del>$240</del></span>$225</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-sm-6">
                                                    <div>
                                                        <p class="mb-sm-0 mt-2">Page <span class="fw-bold">2</span> Of <span class="fw-bold">113</span></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="float-sm-end">
                                                        <ul class="pagination pagination-rounded mb-sm-0">
                                                            <li class="page-item disabled">
                                                                <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                                            </li>
                                                            <li class="page-item">
                                                                <a href="#" class="page-link">1</a>
                                                            </li>
                                                            <li class="page-item active">
                                                                <a href="#" class="page-link">2</a>
                                                            </li>
                                                            <li class="page-item">
                                                                <a href="#" class="page-link">3</a>
                                                            </li>
                                                            <li class="page-item">
                                                                <a href="#" class="page-link">4</a>
                                                            </li>
                                                            <li class="page-item">
                                                                <a href="#" class="page-link">5</a>
                                                            </li>
                                                            <li class="page-item">
                                                                <a href="#" class="page-link"><i class="mdi mdi-chevron-end"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                
                <?= $this->include('partials/footer') ?>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <?= $this->include('partials/right-sidebar') ?>
        <!-- /Right-bar -->

        <!-- JAVASCRIPT -->
        <?= $this->include('partials/vendor-scripts') ?>

        <!-- Ion Range Slider-->
        <script src="assets/libs/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

        <!-- init js -->
        <script src="assets/js/pages/product-filter-range.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
