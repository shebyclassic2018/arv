<?php require_once 'pages/header.php'; ?>
<!-- Main Container -->
<main id="main-container" style="background: #333">
    <!-- Hero -->
    <div class="bg-body-black">
        <div class="content content-full">
            <div class="content-heading">REGISTER PATIENT</div>
        </div>
    </div>

    <?php if (isset($_SESSION['alert'])) { ?>

    <div class="alert alert-success">
        <?=$_SESSION['alert']?>
    </div>

    <?php $_SESSION['alert'] = null; } ?>

    <div class="page-content" width="100%">
        <!-- Progress Wizards -->
        <div class="row">
            <div class="col-xs-1 col-md-1 col-lg-1"></div>
            <div class="col-xs-10 col-md-10 col-lg-10">
                <!-- Progress Wizard -->
                <div class="js-wizard-simple block block">
                    <!-- Step Tabs -->
                    <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#wizard-progress-step1" data-toggle="tab">1. Personal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-progress-step2" data-toggle="tab">2. Fingerprint</a>
                        </li>
                    </ul>
                    <!-- END Step Tabs -->

                    <!-- Form -->
                    <form method="POST" action="backend/clinician/" class="patient-form">
                        <!-- Wizard Progress Bar -->
                        <div class="block-content block-content-sm">
                            <div class="progress" data-wizard="progress" style="height: 8px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                    role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                        <!-- END Wizard Progress Bar -->

                        <!-- Steps Content -->
                        <div class="block-content block-content-full tab-content px-md-5" style="min-height: 300px;">
                            <!-- Step 1 -->
                            <div class="tab-pane active" id="wizard-progress-step1" role="tabpanel">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="fname">First Name</label>
                                            <input class="form-control" type="text" id="fname" name="fname">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="mname">Middle Name</label>
                                            <input class="form-control" type="text" id="mname" name="mname">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="lname">Last Name</label>
                                            <input class="form-control" type="text" id="lname" name="lname">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="country">Country of residence</label>
                                            <input class="form-control" type="text" id="country" name="country">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="region">Region</label>
                                            <input class="form-control" type="text" id="region" name="region">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="state">State/Province</label>
                                            <input class="form-control" type="text" id="state" name="state">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="ward">Street/Ward</label>
                                            <input class="form-control" type="text" id="ward" name="ward">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="gender">Gender</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option disabled value selected>-- Choose --</option>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="dob">Date of birth</label>
                                            <input class="form-control" type="date" id="dob" name="dob">
                                        </div>


                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="phone">Phone number</label>
                                            <input class="form-control" type="text" id="phone" name="phone">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="email">Email</label>
                                            <input class="form-control" type="email" id="email" name="email">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- END Step 1 -->

                            <!-- Step 2 -->
                            <div class="tab-pane" id="wizard-progress-step2" role="tabpanel">
                                <div class="form-group">
                                    <div class="form-control flex-center" id="display"></div>
                                </div>
                                <br>
                                <div class="flex-center pos-rel">
                                    <img src="image/finger.png" width=100px alt="" class="fingerImage">
                                    <div class="hbar"></div>
                                </div>
                                <br>
                                <input type="hidden" name="fingerprint" id="fingerprinttemplate">
                                <br>
                                <div class=" flex-center ">
                                    <button class="btn btn-blue" type="button" id="scan-fingerprint">Scan</button>
                                </div>
                            </div>
                            <!-- END Step 2 -->
                        </div>
                        <!-- END Steps Content -->

                        <!-- Steps Navigation -->
                        <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-secondary" data-wizard="prev">
                                        <i class="fa fa-angle-left mr-1"></i> Previous
                                    </button>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="button" class="btn btn-secondary" data-wizard="next">
                                        Next <i class="fa fa-angle-right ml-1"></i>
                                    </button>
                                    <button name="submit" type="submit" class="btn btn-primary d-none submit-btn"
                                        data-wizard="finish">
                                        <i class="fa fa-check mr-1"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- END Steps Navigation -->
                    </form>
                    <!-- END Form -->
                </div>
                <!-- END Progress Wizard -->
            </div>

        </div>
        <!-- END Progress Wizards -->

    </div>

</main>
<!-- END Main Container -->
</div>
<?php require_once 'pages/footer.php'; ?>