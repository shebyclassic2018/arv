<?php
    require "backend/dbconn.php";
    $uid = $_GET['user_id'];
    $select = $conn->query("SELECT * FROM user u, email e, phone p, role r, address a WHERE r.id = u.role_id AND u.id = a.user_id AND u.id = e.user_id AND u.id = p.user_id AND u.id = '$uid'");
    foreach ($select as $row);
?>
<?php require_once 'pages/header.php'; ?>
<!-- Main Container -->
<main id="main-container" style="background: #333">
    <!-- Hero -->
    <div class="bg-body-black">
        <div class="content content-full">
            <div class="content-heading">EDIT CLINICIAN</div>
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
                    </ul>
                    <!-- END Step Tabs -->

                    <!-- Form -->
                    <form method="POST" action="backend/clinician/edit-user.php">
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
                            <input type="hidden" name="user_id" value="<?=$_GET['user_id']?>">
                            <input type="hidden" name="type" value="clinician">
                            <div class="tab-pane active" id="wizard-progress-step1" role="tabpanel">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="fname">Full Name</label>
                                            <input class="form-control" type="text" id="fname" name="fname" value="<?=$row['name']?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="country">Country of residence</label>
                                            <input class="form-control" type="text" id="country" name="country" value="<?=$row['country']?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="region">Region</label>
                                            <input class="form-control" type="text" id="region" name="region" value="<?=$row['region']?>">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="state">State/Province</label>
                                            <input class="form-control" type="text" id="state" name="state" value="<?=$row['district']?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="ward">Street/Ward</label>
                                            <input class="form-control" type="text" id="ward" name="ward"  value="<?=$row['ward']?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="gender">Gender</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <?php if ($row['sex'] == 'M') {?>
                                                    <option value="M">Male</option>
                                                    <option value="F">Female</option>
                                                <?php } else { ?>
                                                    <option value="F">Female</option>
                                                    <option value="M">Male</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="dob">Date of birth</label>
                                            <input class="form-control" type="date" id="dob" name="dob" value="<?=$row['dob']?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="phone">Phone number</label>
                                            <input class="form-control" type="text" id="phone" name="phone" value="<?=$row['pno']?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="email">Email</label>
                                            <input class="form-control" type="email" id="email" name="email" value="<?=$row['address']?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="role">Role</label>
                                            <select name="role" id="role" class="form-control">
                                                <?php if ($row['type'] == 'clinician') {?>
                                                    <option value="2">Clinician</option>
                                                    <option value="3">Administrator</option>
                                                <?php } else {?>
                                                <option value="3">Administrator</option>
                                                <option value="2">Clinician</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label for="branch">Clinic</label>
                                            <select name="branch" id="branch" class="form-control">
                                                <option disabled value selected>-- Choose --</option>
                                                <?php 
                                                    require "backend/dbconn.php";
                                                    $select = $conn->query("SELECT * FROM branch WHERE id != 1");
                                                    foreach ($select as $row) {
                                                ?>
                                                <option value="<?=$row['id']?>"><?=$row['name']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary form-control">
                                        <i class="fa fa-check mr-1"></i> Submit
                                    </button>
                                </div>

                                <div class="form-group">
                                
                                </div>

                            </div>
                            <!-- END Step 1 -->

                            
                        </div>
                        <!-- END Steps Content -->

                        <!-- Steps Navigation -->
                        <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                            <div class="row">
                                <div class="col-6 text-right">
                                    <button type="button" class="btn btn-secondary" data-wizard="next">
                                        Next <i class="fa fa-angle-right ml-1"></i>
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