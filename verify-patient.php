<?php require_once 'pages/header.php'; ?>
<!-- Main Container -->
<main id="main-container" style="background: #333">
    <!-- Hero -->
    <div class="bg-body-black">
        <div class="content content-full">
            <div class="content-heading"><span class="fas fa-lock"></span> VERIFY PATIENT</div>
        </div>
    </div>
    <div class="page-content ht-100">
        <!-- alert success -->
        <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success">
            <?=$_SESSION['success']?>
        </div>
        <?php $_SESSION['success'] = null; } ?>

        <!-- alert danger -->
        <?php if (isset($_SESSION['danger'])) { ?>
        <div class="alert alert-danger">
            <?=$_SESSION['danger']?>
        </div>
        <?php $_SESSION['danger'] = null; } ?>

        


        <!-- Dynamic Table with Export Buttons -->
        <div class="bg-fff ht-100 flex-center"> 
            <div class="wt-250">
                <div class="flex">
                    <input type="text" class="" id="pid" placeholder="Patient ID: e.g PTXXXX">&nbsp;
                    <button id="verify" class="btn"><span class="fa fa-long-arrow-right"></div>
                </div>
                <div class="pad-18" id="display" style="display: none"></div>
            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
</main>
<!-- END Main Container -->
</div>
<?php require_once 'pages/footer.php'; ?>