<?php require_once 'pages/header.php'; ?>
<?php require_once 'backend/clinician/registered-patient.php'; ?>

<!-- Main Container -->
<main id="main-container" style="background: #333">
    <!-- Hero -->
    <div class="bg-body-black">
        <div class="content content-full">
            <div class="content-heading"><span class="fa fa-list"></span> REGISTERED PATIENTS</div>
        </div>
    </div>
    <!-- Dynamic Table with Export Buttons -->
    <div class="block">

        <div class="block-content block-content-full">
        <div class="table-responsive">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 60px;">ID</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Registered at</th>
                        <th class="d-none d-sm-table-cell">Patient ID</th>
                        <th class="d-none d-sm-table-cell">Name</th>
                        <th class="d-none d-sm-table-cell" style="width: 5%;">sex</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th style="width: 10%;">Date of birth</th>
                        <?php if ($_SESSION['role'] == 'administrator') { ?>
                        <th style="width: 10%;">Actions</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach($patientList as $key => $row) { ?>
                    <tr>
                        <td class="text-center font-size-sm"><?=$i?></td>
                        <td class="font-w600 font-size-sm">
                            <a href="be_pages_generic_blank.html"><?=$row['date']?></a>
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                            PAT-<?=$row['uid']?>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <?=$row['uname']?>
                        </td>
                        <td class="text-center">
                            <?=$row['sex']?>
                        </td>
                        <td>
                            <em class="text-muted font-size-sm"><?=$row['phone']?></em>
                        </td>
                        <td>
                            <em class="text-muted font-size-sm"><?=$row['email']?></em>
                        </td>
                        <td>
                            <em class="text-muted font-size-sm"><?=$row['ward']?>, <?=$row['district']?>,
                                <?=$row['region']?> (<?=$row['country']?>)</em>
                        </td>
                        <td class="text-center">
                            <em class="text-muted font-size-sm"><?=$row['dob']?></em>
                        </td>

                        <?php if ($_SESSION['role'] == 'administrator') { ?>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="edit-patient.php?type=clinician&user_id=<?=$row['uid']?>" class="btn btn-sm"
                                    data-toggle="tooltip" title="Edit Clinician" style="background: transparent">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="backend/clinician/delete-user.php?type=patient&user_id=<?=$row['uid']?>" class="btn btn-sm"
                                    data-toggle="tooltip" title="Remove Clinician" style="background: transparent">
                                    <i class="fa fa-fw fa-times"></i>
                                </a>
                            </div>
                        </td>
                        <?php  } ?>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
    </div>
</main>
<!-- END Main Container -->
</div>
<?php require_once 'pages/footer.php'; ?>