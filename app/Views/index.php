<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <link rel="shortcut icon" type="image/png" href="<?= $logo; ?>" />
    <title>QRCode Generator</title>

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

<body class="text-center">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <main class="form-signin">
        <form action="<?= base_url(); ?>generate" method="POST" enctype="multipart/form-data">
            <img class="mb-4" src="<?= $logo; ?>" alt="" width="72" height="72">
            <h1 class="h3 mb-3 fw-normal">QRCode Generator</h1>

            <div class="form-group">
                <input type="text" class="form-control" name="url" id="url" placeholder="Masukan Konten" required>
            </div>
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="logo" name="logo" onchange="previewImg()">
                    <label class="custom-file-label text-left" for="file">Upload Logo</label>
                </div>
            </div>
            <div class="form-group">
                <img src="data:image/png;base64,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a/lefDbcivK/fMRxpnDf0B9IS8tgqv+equyX5pgEe54IpB+2l5sq28ztO4f+EbCTpij3pU07U1uovq3884UNzz31771OOu26Z62VvfcR46tMUfZa3kmekHueCaQgNQw6h9HnMMXz67+zZcWeyuj30i47t/lA2EYNozsO+VJtSSCFqRWpVIx/HSYaSeq0dRgttYpdQ6n2y+zysmtp45Gw9oFQl9Dd5cMJhNExAilQHUErFeO5YTcV486p57y0UKr9Se8ddreudR0qf2Tbit0unetTST43zB+oHyjnm/xeufNMIIVqFaM++2yuSl1bMLPdY9aC4cHyHr44LCZ/ztU3V4PosSnfRzvWL0855+mE2iq6L2nmegqBFOxYpa6TJ985TBNMtY9qZ7dxtPPc1eZCvXsYP5q1Sg3Tz889m7m1VP++/PMtw+Jm5G2nHtTRuE8e6izsHocWSL2Lf0Vpn9i1af9gm9/y+qH/cUH107guY1GfU/+lffVVtGB6Vyl/HWKvZR/zHmpFrpev9Wbkp3f5Htq56iTUT7d5UW8aFku39JS7zgL/8rBYPmblfDFe6qACaYr7qPatddheOf611vo46WpiR2kr05Xh2HtokzhvXrF71Htofz91+/4s8xZSJx8r/oLw2cxBBdJFdd77IlronMv3cBE+5JIIJCCGQAJiCCQghkACYggkIIZAAmIIJCCGQAJiCCQghkACYggkIIZAAmIIJCCGQAJiCCQghkACYggkIIZAAmIIJCCGQAJiCCQghkACYggkIIZAAmIIJCCGQAJiCCQghkACYggkIIZAAmIIJCCGQAJiCCQghkACYggkIIZAAmIIJCCGQAJiCCQghkACYggkIIZAAmIIJCCGQAJiCCQghkACYggkIIZAAmIIJCCGQAJiCCQghkACYggkIIZAAmIIJCCGQAJiCCQghkACYggkIIZAAmIIJCCGQAJiCCQghkACYggkIIZAAmIIJCCGQAJiCCQghkACYggkIIZAAmIIJCCGQAJiCCQghkACYggkIIZAAmIIJCCGQAJiCCQghkACYggkIIZAAmIIJCCGQAJiCCQghkACYggkIIZAAmIIJCCGQAJiCCQghkACYggkIIZAAmIIJCCGQAJiCCQghkACYggkIIZAAmIIJCCGQAJiCCQghkACYggkIIZAAmIIJCCGQAJiCCQghkACYggkIEZPIN10dHT0v7OXBDgEP3LWN3sC6YsTFQTgTC7ZgBgCCYghkIAYAgmIIZCAGAIJiFED6atl+8N9FwQ4eM/9P13H+ZOM8k6rAAAAAElFTkSuQmCC" class="img-thumbnail img-preview logo" width="72" height="72">
            </div>
            <button class="w-100 btn btn-primary" type="submit"><i class="nav-icon fas fa-qrcode"></i> Generate</button>
        </form>
        <p class="mt-5 mb-3 text-muted">&copy; <?php echo date("Y"); ?> Prakom Kabupaten Tangerang.
        </p>
    </main>
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?= base_url(); ?>/plugins/jquery/jquery.min.js"></script>
    <script>
        function previewImg() {
            const img = document.querySelector('.custom-file-input');
            const imgLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            imgLabel.textContent = img.files[0].name;

            const fileimg = new FileReader();
            fileimg.readAsDataURL(img.files[0]);

            fileimg.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
</body>

</html>