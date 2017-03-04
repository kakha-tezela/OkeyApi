<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>განვადება</title>

    <link rel="stylesheet" type="text/css" href="build/style.bundle.css">

</head>
<body id="app">

    <?php  require getcwd().'/../resources/src/components/installment-loading.vue' ?>

    <div class="Step-container" v-show-after-load>

        <installment-header></installment-header>

        <installment-step-payment_options></installment-step-payment_options>

        <installment-step-personalinfo></installment-step-personalinfo>

        <installment-step-contactpersoninfo></installment-step-contactpersoninfo>

        <installment-step-verification></installment-step-verification>

    </div>


<script src="build/vendorInstallment.bundle.js"></script>
<script src="build/mainInstallment.bundle.js"></script>

</body>
</html>