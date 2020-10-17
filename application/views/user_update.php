
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Memeflorist.com Akses User</title>
    <!-- Custom CSS -->
	<base href="<?php echo base_url(); ?>">
    <link href="assets/css/style.min.css" rel="stylesheet">
    <link href="assets/css/select2.min.css" rel="stylesheet">
    <link href="assets/css/fontawesome-all.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->

        <?php $this->load->view("header.php") ?>
        
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Update Account</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Account</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- <h4 class="card-title">Add Order</h4> -->
                                <div class="small text-danger"><?php echo $this->session->flashdata('message'); ?></div>
                                <form method="post" enctype="multipart/form-data" action="user/update">
                                    <div class="">
                                        
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $login['nama']; ?>" required>
                                            <!-- <textarea class="form-control" id="alamat" rows="3" placeholder="produk"></textarea> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $login['username']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Password Lama</label>
                                            <input type="password" class="form-control" name="oldpwd" id="oldpwd" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Password Baru</label>
                                            <input type="password" class="form-control" name="pwd" id="pwd" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Confirm Password Baru</label>
                                            <input type="password" class="form-control" name="pwd2" id="pwd2" required>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-info waves-effect waves-light" name="submit" type="submit" id="simpanpesanan"><i class="fal fa-long-arrow-right mr-1"></i> SUBMIT
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php $this->load->view("footer.php") ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- mask -->
    <script src="assets/js/mask.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $(".select2").select2({

                placeholder: '--- Pilih Customer ---',
                ajax: { 
                    url: 'customer/search',
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                    },
                    processResults: function (response) {
                    return {
                        results: response
                    };
                    },
                    cache: true
                }
            });

            $(".btn-old").hide();
            // Format mata uang.
            $( '.harga' ).mask('000.000.000.000.000', {reverse: true});
            $(".collapse").on('show.bs.collapse', function(){
                $("#addcustomer input").prop('required',true);
                $(".select2").prop('required',false);
                $("#cari-customer").slideUp(400);
                $(".btn-new").hide();
                $(".btn-old").show();
                
            });
            $(".collapse").on('hide.bs.collapse', function(){
                $("#addcustomer input").prop('required',false);
                $(".select2").prop('required',true);
                $("#cari-customer").slideDown(400)
                $(".btn-new").show();
                $(".btn-old").hide();
            });
        })
    </script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- apps -->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/app.init.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="assets/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/select2.init.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>