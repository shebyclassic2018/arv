<?php require_once 'pages/header.php'; ?>
<!-- Main Container -->
<main id="main-container" style="background: #333">
    <!-- Hero -->
    <div class="bg-body-black">
        <div class="content content-full">
            <div class="content-heading">CHANGE PASSWORD</div>
        </div>
    </div>

    <?php if (isset($_SESSION['alert'])) { ?>

    <div class="alert alert-success">
        <?=$_SESSION['alert']?>
    </div>

    <?php $_SESSION['alert'] = null; } ?>

    <div class="page-content" width="100%">

        <form method="post"action="backend/clinician/change-pwd.php" class="block">
            <div class="block-content">
                <div class="form-group p-1">
                    <div class="row">
                        <div class="col-md-2 d-none d-sm-block"></div>
                        <div class="col-md-4 ">Current Password</div>
                        <div class="col-md-4 "><input type="password" name="opwd" class="form-control"></div>
                    </div>
                </div>

                <div class="form-group p-1">
                    <div class="row">
                        <div class="col-md-2 d-none d-sm-block"></div>
                        <div class="col-md-4">New Password</div>
                        <div class="col-md-4"><input type="password" name="npwd" class="form-control"></div>
                    </div>
                </div>

                <div class="form-group p-1">
                    <div class="row">
                        <div class="col-md-2 d-none d-sm-block"></div>
                        <div class="col-md-4">Confirm Password</div>
                        <div class="col-md-4"><input type="password" name="cpwd" class="form-control"></div>
                    </div>
                </div>
                <div class="form-group p-1">
                    <div class="row">
                        <div class="col-md-6 d-none d-sm-block"></div>
                        <div class="col-md-4"><button class="btn btn-primary">Change</button></div>
                    </div>
                </div>
            </div>
        </form>

    </div>

</main>
<!-- END Main Container -->
</div>
<?php require_once 'pages/footer.php'; ?>