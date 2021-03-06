
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
    <title>Memeflorist.com Invoice</title>
    <!-- Custom CSS -->
	<base href="<?php echo base_url(); ?>">
    <link href="assets/css/style.min.css" rel="stylesheet">
    <link href="assets/css/datatable.css" rel="stylesheet">
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
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Transaksi</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive no-wrap">
                                    <table id="TabelData" class="display nowrap table table-hover vm no-th-brd pro-of-month" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Invoice</th>
                                                <th>Customer</th>
                                                <th>Produk</th>
                                                <th>Payment</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            
                                            <?php
                                            if ($sales) {
                                                foreach($sales as $sale) {
                                            ?>

                                                <tr>
                                                    <td><a href="sales/view/<?php echo $sale->sid; ?>" ><?php echo $sale->invoice; ?></a> </td>
                                                    <td><a href="customer/view/<?php echo $sale->cid; ?>" ><?php echo $sale->namapemesan; ?></a></td>
                                                    <td><?php echo $sale->produk; ?></td>
                                                    <td><?php echo strtoupper(str_replace("-"," ",$sale->payment)); ?></td>
                                                    <td>
                                                        <?php if($sale->status == 'SETTLED' || $sale->status == 'PAID' ) {
                                                            echo '<span class="text-success"><b>LUNAS</b></span>';
                                                        }else{
                                                            echo '<span class="text-danger"><b>UNPAID</b></span>';
                                                        } ?>
                                                    </td>
                                                    <td><?php echo number_format($sale->harga,0,',','.'); ?></td>
                                                    <td><a class="btn-sm btn-info" href="sales/view/<?php echo $sale->sid; ?>">View</a></td>
                                                </tr>

                                            <?php
                                               }
                                            }else{
                                                echo "belum ada penjualan";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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
    <script src="assets/js/jquery.dataTables.min.js"></script>
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
    
    <script>
        $('#TabelData').DataTable({
            dom: 'Bfrtip',
            displayLength: 10,
            order: [[ 0, "desc" ]]
        });
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