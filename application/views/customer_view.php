
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
    <title>Customer - <?php echo $customer->namapemesan; ?></title>
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
                        <h4 class="page-title"><a href="customer"><i class="fal fa-long-arrow-left"></i></a> Customer</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Customer</li>
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
                    <div class="col-lg-6 col-md-6">

                        <div class="card card-hover">
                            <div class="card-body">
                                <div class="media my-auto">
                                    <img class="mr-3 p-1" src="assets/images/user.png" alt="Bank BCA">
                                    <div class="media-body mr-2">
                                        <h3 class="mb-2"><?php echo $customer->namapemesan; ?></h3>
                                        <p class="my-0"><?php echo $customer->telppemesan; ?></p>
                                        <p class="my-0"><?php echo $customer->emailpemesan; ?></p>
                                    </div>
                                    <div class="mx-1 my-auto">
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#UpdateModal"><i class="fa fa-cog"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Update-->
                        <div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form action="customer/update_customer/<?php echo $customer->id; ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                    
                                                <div class="form-group mb-1">
                                                    <label for="namapemesan">Nama Customer</label>
                                                    <input type="text" class="form-control" id="namapemesan" name="namapemesan" value="<?php echo $customer->namapemesan; ?>">
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="telppemesan">Nomor HP</label>
                                                    <input type="text" class="form-control" id="telppemesan" name="telppemesan" value="<?php echo $customer->telppemesan; ?>">
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="emailpemesan">Email</label>
                                                    <input type="text" class="form-control" id="emailpemesan" name="emailpemesan" value="<?php echo $customer->emailpemesan; ?>">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-lg-6 col-md-6 produk-list">
                        
                        <div class="card card-hover">
                            <div class="card-body">
                                <div class="media my-auto">
                                    <img class="mr-3 p-1" src="assets/images/transaction.png" alt="Bank BCA">
                                    <div class="media-body mr-2">
                                        <h5 class="mb-1 bold">Total Transaksi</h5>
                                        <h2 class="mt-2 mb-0"><?php echo number_format($jumlah->total_transaksi,0,',','.'); ?></h2>
                                        <small>Sejak : <?php echo  date_format(date_create($customer->join_date), "d M Y H.i" ); ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive no-wrap">
                                    <table id="TabelData" class="display nowrap table table-hover vm no-th-brd pro-of-month" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Invoice</th>
                                                <th>Produk</th>
                                                <th>Payment</th>
                                                <th>Status</th>
                                                <th>Sales</th>
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
                                                    <td><?php echo $sale->invoice; ?></td>
                                                    <td><?php echo $sale->produk; ?></td>
                                                    <td><?php echo strtoupper(str_replace("-"," ",$sale->payment)); ?></td>
                                                    <td>
                                                        <?php if($sale->status == 'SETTLED' || $sale->status == 'PAID' ) {
                                                            echo '<span class="text-success"><b>LUNAS</b></span>';
                                                        }else{
                                                            echo '<span class="text-danger"><b>UNPAID</b></span>';
                                                        } ?>
                                                    </td>
                                                    <td><?php echo $sale->nama; ?></td>
                                                    <td><?php echo number_format($sale->harga,0,',','.'); ?></td>
                                                    <td><a class="btn-sm btn-info" href="sales/view/<?php echo $sale->sid; ?>">View</a></td>
                                                </tr>

                                            <?php
                                               }
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
    <script src="assets/js/jquery.dataTables.min.js"></script>
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