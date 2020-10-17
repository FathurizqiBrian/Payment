
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
    <title>Memeflorist.com - Dashboard</title>
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
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Hello, <?php echo $login['nama']; ?></h4>
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

                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="customer">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <i class="fal fa-user font-20 text-muted"></i>
                                            <p class="font-16 m-b-5 text-primary">Total Customer</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h1 class="font-light text-right text-primary"><?php echo $customer->jumlah; ?></h1>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="sales">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <i class="fal fa-money-bill font-20  text-muted"></i>
                                            <p class="font-16 m-b-5 text-success">Jumlah Transaksi</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h1 class="font-light text-right text-success"><?php echo $transaksi->jumlah; ?></h1>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="sales/transaksi/paid">
                                        <div class="d-flex no-block align-items-center">
                                            <div>
                                                <i class="fal fa-receipt font-20 text-muted"></i>
                                                <p class="font-16 m-b-5 text-info">Transaksi Lunas</p>
                                            </div>
                                            <div class="ml-auto">
                                                <h1 class="font-light text-right text-info"><?php echo $paid->jumlah; ?></h1>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="sales/transaksi/unpaid">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <i class="fal fa-receipt font-20 text-muted"></i>
                                            <p class="font-16 m-b-5 text-danger">Transaksi Unpaid</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h1 class="font-light text-right text-danger"><?php echo $unpaid->jumlah; ?></h1>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- End Of Stats -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center  mb-3">
                                    <div>
                                        <h4 class="card-title m-b-0">Invoice Terbaru</h4>
                                    </div>
                                    <div class="ml-auto">
                                        <a class="btn btn-info btn-sm" href="sales">Lihat Semua</a>
                                    </div>
                                </div>
                                <div class="todo-widget scrollable ps-container ps-theme-default" style="height:435px;" data-ps-id="0df81819-2999-6da2-2b96-1ca2e86c9c50">
                                <?php if ($sales) { ?>
                                    <div class="table-responsive-lg">
                                        <table class="table table-fixed">
                                            
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">No. Invoice</th>
                                                    <th scope="col">Customer</th>
                                                    <th scope="col">Produk</th>
                                                    <th scope="col">Total</th>
                                                    <th class="text-right" scope="col">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                $i = 0;
                                                foreach($sales as $sale) {
                                                    $i++;
                                                    if($i <= 10 ) {
                                            ?>
                                                <tr>
                                                    <td width="25" class="text-center"><?php echo $i; ?></td>
                                                    <td><?php echo $sale->invoice ?></td>
                                                    <td><?php echo $sale->namapemesan ?></td>
                                                    <td><?php echo $sale->produk ?></td>
                                                    <td><?php echo $sale->harga ?></td>
                                                    <td class="text-right"><a class="btn-sm btn-info" href="sales/view/<?php echo $sale->sid; ?>">View</a></td>
                                                </tr>

                                            <?php
                                                    } else {
                                                        break;
                                                    }
                                               }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php
                                }else{
                                    echo "Belum ada transaksi";
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Customer Baru</h4>
                                <div class="todo-widget scrollable ps-container ps-theme-default" style="height:435px;" data-ps-id="0df81819-2999-6da2-2b96-1ca2e86c9c50">
                                <?php if ($sales) { ?>
                                    <div class="table-responsive-lg">
                                        <table class="table table-fixed">
                                            
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Customer</th>
                                                    <th scope="col" class="text-right">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $i = 0;
                                                foreach($customers as $item) {
                                                    $i++;
                                                    if($i <= 10 ) {
                                            ?>
                                                <tr>
                                                    <td width="25" class="text-center"><?php echo $i ?></td>
                                                    <td><?php echo $item->namapemesan ?></td>
                                                    <td class="text-right"><a class="btn-sm btn-info" href="customer/view/<?php echo $item->id; ?>">View</a></td>
                                                </tr>

                                            <?php
                                                    } else {
                                                        break;
                                                    }
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php
                                }else{
                                    echo "Belum ada customer";
                                }
                                ?>
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
    
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/app.init.js"></script>
    <script src="assets/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/js/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="assets/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="assets/js/custom.js"></script>
    <!--Form Repeater -->
</body>

</html>