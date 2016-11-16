<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Painel Administrativo</title>
    <meta name="theme-color" content="#a02037">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?dashRoot()?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?dashRoot();?>plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?dashRoot();?>plugins/datatables/extensions/Responsive/css/dataTables.responsive.css">
    <link rel="stylesheet" href="<?dashRoot();?>plugins/datatables/extensions/FixedColumns/css/dataTables.fixedColumns.css">
    <link rel="stylesheet" href="<?dashRoot();?>plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.css">
    <!-- TagsInout -->
    <link rel="stylesheet" href="<?dashRoot();?>plugins/tagsinput/bootstrap-tagsinput.css">
    
    <!-- Bootstrap Chosen -->
    <link rel="stylesheet" href="<?dashRoot();?>plugins/bootstrap-chosen/chosen.css">

    <!-- jQuery 2.1.4 -->
    <script src="<? dashRoot();?>plugins/jQuery/jQuery-2.1.4.min.js"></script>

    <!-- Sweet Alerts -->
    <link rel="stylesheet" href="<?dashRoot();?>plugins/sweetalert/sweetalert.css">
    <script src="<?dashRoot();?>plugins/sweetalert/sweetalert.js"></script>

    <!-- DatePicker -->
    <link rel="stylesheet" href="<?dashRoot();?>plugins/datepicker/datepicker3.css">

    <!-- CropIt -->
    <script src="<?dashRoot();?>plugins/cropit/jquery.cropit.js"></script>

    <!-- Bootstrap Chosen -->
    <script src="<?dashRoot();?>plugins/bootstrap-chosen/chosen.js"></script>



    <!-- Theme style -->
    <link rel="stylesheet" href="<?dashRoot();?>dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <!-- <link rel="stylesheet" href="<?dashRoot();?>dist/css/skins/skin-black.min.css"> -->
    <link rel="stylesheet" href="<?dashRoot();?>dist/css/skins/skin-black.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?dashRoot();?>dist/css/custom.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="hold-transition skin-black fixed sidebar-mini">
    <div class="wrapper">