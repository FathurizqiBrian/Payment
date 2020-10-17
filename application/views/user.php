
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
                        <h4 class="page-title">Akses User</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Manage User</li>
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
                    
                    <!-- column -->
                    <div class="col-12 col-lg-7">
                    <div class="text-danger mb-2"><?php echo $this->session->flashdata('message'); ?></div>
                        <?php if($users) {

                            foreach($users as $user) {
                        ?>
                        <div class="card mb-2">
                            <div class="media p-3 p-r-2 my-auto">
                                <div class="media-body mr-2">
                                    <h5><i class="fa fa-user mr-2"></i> 
                                        <?php echo $user->nama; ?> 
                                        <span class="label label-rounded label-primary ml-1"><?php echo ucfirst(strtolower($user->role)); ?></span>
                                        <?php 
                                            if($user->status == 0) {

                                                echo '<span class="label label-rounded label-danger">Non-aktif</span>';
                                            }
                                        ?>
                                    </h5>
                                    <p class="mb-0"><i class="fa fa-envelope mr-2"></i> <?php echo $user->username; ?></p>

                                </div>
                                
                                <div class="p-2 mx-auto">
                                    <button type="button" class="btn btn-danger btn-sm mr-1" data-toggle="modal" data-target="#hapusModal<?php echo $user->id; ?> "><i class="fa fa-trash"></i></button>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal<?php echo $user->id; ?>"><i class="fa fa-cog"></i></button>
                                    
                                </div>
                            </div>
                            
                            <!-- Hapus Modal -->
                            <div class="modal fade" id="hapusModal<?php echo $user->id; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalHapus" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalHapus"><i class="fas fa-exclamation-triangle text-danger"></i> Warning</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin untuk menonaktifkan akses akun <?php echo $user->nama; ?>? <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                                            
                                            <a href="user/delete/<?php echo $user->id; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Akses</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal<?php echo $user->id; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalEdit" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p class="modal-title" id="ModalLongTitle">Edit Akun <?php echo $user->nama; ?></p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="user/edit/<?php echo $user->id; ?>" method="post" enctype="multipart/form-data" >
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $user->nama; ?>" required>
                                                <!-- <textarea class="form-control" id="alamat" rows="3" placeholder="produk"></textarea> -->
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select class="custom-select mr-sm-2" id="role" name="role" required>
                                                    <option selected="">Choose...</option>
                                                    
                                                    
                                                    <option <?php if ($user->role == 'staff') {echo 'selected';} ?> value="Sales">Sales</option>
                                                     <option <?php if ($user->role == 'staff') {echo 'selected';} ?> value="Finance">Finance</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select class="custom-select mr-sm-2" id="role" name="status" required>
                                                    <option selected="">Choose...</option>
                                                    <option <?php if ($user->status == 1) {echo 'selected';} ?> value="1">Aktif</option>
                                                    <option <?php if ($user->status == 0) {echo 'selected';} ?> value="0">Non Aktif</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $user->username; ?>" >
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">New Password</label>
                                                <input type="password" class="form-control" name="pwd" id="pwd" >
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Confirm New Password</label>
                                                <input type="password" class="form-control" name="pwd2" id="pwd2" >
                                            </div>                               
                                        </div>
                                        <div class="modal-footer">
                                                <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>


                        <?php
                            }
                        }
                        ?>
                        
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
            <footer class="footer text-center">
                All Rights Reserved by Nice admin. Designed and Developed by
                <a href="#">WrapPixel</a>.
            </footer>
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