
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
    <title>Memeflorist.com New Invoice</title>
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
                        <h4 class="page-title">Pesanan Baru</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">New Order</li>
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
                                <form method="post" enctype="multipart/form-data" action="sales/create">
                                    <div class="">
                                        <div class="form-group">
                                            <div class="text-right">
                                                <button type="button" class="btn btn-primary btn-new" data-toggle="collapse" data-target="#addcustomer" aria-expanded="false" aria-controls="addcustomer">
                                                    <i class="fal fa-plus mr-1"></i>
                                                    New Customer 
                                                </button>
                                                <button type="button" class="btn btn-success btn-old" data-toggle="collapse" data-target="#addcustomer" aria-expanded="false" aria-controls="addcustomer">
                                                    <i class="fal fa-search mr-1"></i>
                                                    Cari Data
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-group" id="cari-customer">
                                            <label for="inlineFormInput">Cari Data Customer</label>
                                            <div class="col-12 px-0">

                                                <select class="form-control select2 custom-select" style="width: 100%; height:45px;" name="uid" required>
                                                    <option value="">Pilih Customer</option>
                                                    <?php foreach ($customers as $customer) { ?>

                                                        <option value="<?php echo $customer->id; ?>"><?php echo $customer->namapemesan." (".$customer->telppemesan.")"; ?></option>
                                                        
                                                    <?php } ?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="collapse bg-light mb-3 px-3 pt-3 pb-1" id="addcustomer">
                                            <div class="form-group">
                                                <label for="alamat">Nama Pemesan</label>
                                                <input type="text" id="namapemesan" name="namapemesan" aria-describedby="namaHelp" class="form-control" placeholder="Nama Pemesan">
                                                <small id="namaHelp" class="form-text text-danger">Cek dulu apakah nama customer sudah ada</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">No. Telepon</label>
                                                <input type="text" class="form-control" name="telppemesan" id="telppemesan" placeholder="Ex : 08123456789">
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat Email</label>
                                                <input type="text" class="form-control" name="emailpemesan" id="emailpemesan" placeholder="Alamat Email">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="alamat">Nama Pengirim</label>
                                            <input type="text" class="form-control" name="namapengirim" id="namapengirim" placeholder="Nama Pengirim" required>
                                            <small id="namaHelp" class="form-text text-danger">Nama yang tertulis di kartu / bunga papan</small>
                                            <!-- <textarea class="form-control" id="alamat" rows="3" placeholder="produk"></textarea> -->
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="alamat">Produk</label>
                                            <input type="text" class="form-control" name="produk" id="produk" placeholder="Ex : JKT DC 601" required>
                                            <!-- <textarea class="form-control" id="alamat" rows="3" placeholder="produk"></textarea> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="totalharga">Total Harga</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control harga" id="validationCustomUsername" name="harga" aria-describedby="inputGroupPrepend" required="">
                                            </div>

                                            
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12"><label for="totalharga">Payment Method</label></div>
                                            <div class="col-sm-6">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="creditcard" name="payment" class="custom-control-input" value="credit-card">
                                                    <label class="custom-control-label" for="creditcard">Credit Card</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">

                                            <?php foreach ($vas as $va) { ?>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="va-<?php echo strtolower($va['code']); ?>" name="payment" value="<?php echo $va['code']; ?>" class="custom-control-input">
                                                    <label class="custom-control-label" for="va-<?php echo strtolower($va['code']); ?>">Virtual Account <?php echo $va['code']; ?></label>
                                                </div>
                                            <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Notes</label>
                                            <textarea class="form-control" id="note" rows="3" name="catatan" placeholder=""></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-info waves-effect waves-light" name="submit" type="submit" id="simpanpesanan">
                                                <i class="fal fa-long-arrow-right mr-1"></i> CREATE INVOICE
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
    <script src="assets/js/custom.js"></script>
</body>

</html>