<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <link rel="shortcut icon" type="image/png" href="<?= $logo; ?>" />
    <title>QrCode Generator</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/dist/css/adminlte.min.css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>/dist/css/signin.css" rel="stylesheet">
</head>

<body class="text-left">
    <div class="card mx-auto" style="width: 23rem;">
        <div class="card-header">
            <center>QR Code</center>
        </div>
        <div class="card-body table-responsive">
            <center><img src="<?= $qr; ?>" alt="" width="300" height="300"></center>
            <a class="w-100 btn btn-lg btn-primary" href="<?= $qr; ?>" download="QrCode"><i class="nav-icon fas fa-download"></i> Download</a>
            <center><a href="<?= base_url(); ?>"><i class="nav-icon fas fa-chevron-circle-left"></i> Kembali</a></center>
        </div>
        <div class="card-footer">
            <center>
                <p class="text-muted">&copy; <?php echo date("Y"); ?> Prakom Kabupaten Tangerang.
                </p>
            </center>
        </div>
    </div>
    <!-- REQUIRED SCRIPTS -->
</body>

</html>