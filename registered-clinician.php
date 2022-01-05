<?php require_once 'backend/dbconn.php'; ?>
<?php require_once 'pages/header.php'; ?>
<?php require_once 'backend/clinician/registered-clinician.php'; ?>
<!-- Main Container -->
<main id="main-container" style="background: #333">
    <!-- Hero -->
    <div class="bg-body-black">
        <div class="content content-full">
            <div class="content-heading"><span class="fa fa-list"></span> REGISTERED CLINICIANS</div>
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
                        <th class="text-center" style="width: 80px;">ID</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Registered at</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Clinician ID</th>
                        <th class="d-none d-sm-table-cell">Name</th>
                        <th class="d-none d-sm-table-cell" style="width: 8%;">sex</th>
                        <th style="width: 10%;">Phone</th>
                        <th style="width: 7%;">Email</th>
                        <th style="width: 15%;">Address</th>
                        <th style="width: 10%;">Date of birth</th>
                        <th style="width: 5%;">actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($clinicianList as $row) { ?>
                    <tr>
                        <td class="text-center font-size-sm"><?=$i?></td>
                        <td class="font-w600 font-size-sm">
                            <a href="be_pages_generic_blank.html"><?=$row['date']?></a>
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm " style="display: flex">
                            CLN-<?=$row['uid']?>
                            <?php if ($row['type'] == "administrator") { ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-user"></span>
                            <?php } ?>
                        </td>
                        <td class="d-none d-sm-table-cell"><?=$row['uname']?></td>
                        <td><em class="text-muted font-size-sm"><?=$row['sex']?></em></td>
                        <td>
                            <em class="text-muted font-size-sm"><?=$row['phone']?></em>
                        </td>
                        <td>
                            <em class="text-muted font-size-sm"><?=$row['email']?></em>
                        </td>
                        <td>
                            <em class="text-muted font-size-sm"><?=$row['ward']?>, <?=$row['district']?>, <?=$row['region']?> (<?=$row['country']?>)</em>
                        </td>
                        <td>
                            <em class="text-muted font-size-sm"><?=$row['dob']?></em>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="edit-clinician.php?type=clinician&user_id=<?=$row['uid']?>" class="btn btn-sm" data-toggle="tooltip"
                                    title="Edit Clinician" style="background: transparent">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="backend/clinician/delete-user.php?type=clinician&user_id=<?=$row['uid']?>" class="btn btn-sm" data-toggle="tooltip"
                                    title="Remove Clinician" style="background: transparent">
                                    <i class="fa fa-fw fa-times"></i>
                                </a>
                            </div>
                        </td>
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