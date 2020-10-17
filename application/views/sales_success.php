
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
                    <div class="col-12 col-lg-6 offset-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12 text-center">
                                    <h2>Success</h2>
                                    <p>Invoice berhasil dibuat. </p>
                                    <hr>
                                </div>
                                <div class="mt-lg-2 py-2 ">
                                    <div class="col-12 col-lg-5">
                                        <table class="w-100 mb-3">
                                            <tbody>
                                                <tr>
                                                    <td><b>No. Invoice </b></td>
                                                    <td class="text-right"><b><?php echo $sales->invoice; ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>A.N </td>
                                                    <td class="text-right"><?php echo $sales->namapemesan; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Pengirim </td>
                                                    <td class="text-right"><?php echo $sales->namapengirim; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>No. Telepon </td>
                                                    <td class="text-right"><?php echo $sales->telppemesan; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Email </td>
                                                    <td class="text-right"><?php echo $sales->emailpemesan; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Produk</th>
                                                    <th class="text-right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $sales->produk; ?><br><br>
                                                        Notes : <br>
                                                        <small><?php echo $sales->notes; ?></small>
                                                    </td>
                                                    <td class="text-right">Rp. <?php echo number_format($sales->harga,0,',','.'); ?> </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="text-right">
                                        <h4><b>Total : Rp. <?php echo number_format($sales->harga,0,',','.'); ?></b></h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <label>
                                            <b>Link Invoice</b><br>
                                            <span>Copy link dibawah ini dan berikan pada customer Anda</span>
                                        
                                        </label>
                                        <input class="form-control text-center" id="result-short" readonly value="<?php echo base_url(); ?>invoice/<?php echo strtolower($sales->invoice); ?>"></input>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12 mt-3">
                                    <div class="text-center">
                                        <a href="sales/view/<?php echo $sales->sid; ?>" class="btn btn-success" > <span><i class="fal fa-receipt"></i> View Invoice</span> </a>
                                        <a href="javascript:void(0);" class="btn btn-info copy" data-clipboard-target="#result-short" data-original-title="" title=""> <span><i class="fal fa-copy"></i> Copy Link</a>
                                    </div>
                                </div>
                                
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
    <script src="assets/js/clipboard.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            var clipboard = new Clipboard('.copy');
                        
            // Tooltip
            $('.copy').tooltip({
                trigger: 'click',
                placement: 'bottom'
            });
            function setTooltip(el, message) {
            $(el).tooltip('hide')
                .attr('data-original-title', message)
                .tooltip('show');
            }
            function hideTooltip(el) {
            setTimeout(function() {
                $(el).tooltip('hide');
            }, 1000);
            }

            // Clipboard
            clipboard.on('success', function(e) {
            setTooltip(e.trigger, 'Copied!');
            hideTooltip(e.trigger);
            });

            clipboard.on('error', function(e) {
            setTooltip(e.trigger, 'Failed!');
            hideTooltip(e.trigger);
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
    <script src="assets/js/custom.js"></script>
</body>

</html>