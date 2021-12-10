<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NCDA | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('files') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('files') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- START: Page CSS-->
    <?= $this->renderSection('pagestyles') ?>
    <!-- END: Page CSS-->
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('files') ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?= site_url('dashboard') ?>" class="h1"><b>NCDA</b>Eval</a>
            </div>
            <?= $this->renderSection('content') ?>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('files') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('files') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!--  App -->
    <script src="<?= base_url('files') ?>/dist/js/adminlte.min.js"></script>
    <!-- START: Page JS-->
    <?= $this->renderSection('pagescript') ?>
    <!-- END: Page JS-->
</body>

</html>