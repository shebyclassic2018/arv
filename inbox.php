<?php
    require "backend/dbconn.php";
    $stmt = "SELECT a.id as id, name, date, status, branch_id FROM branch b, arv_request a WHERE b.id = a.branch_id ORDER BY a.id DESC";
    $request = $conn->query($stmt);
?>

<?php require_once 'pages/header.php'; ?>
<?php require_once 'backend/clinician/registered-clinician.php'; ?>
<!-- Main Container -->
<main id="main-container" style="background: #333">
    <!-- Hero -->
    <div class="bg-body-black">
        <div class="content content-full">
            <div class="content-heading"><span class="fa fa-list"></span> ARVs REQUEST</div>
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
                        <th class="d-none d-sm-table-cell" style="">Date</th>
                        <th class="d-none d-sm-table-cell" style="">Clinic</th>
                        <th colspan=2 class="d-none d-sm-table-cell" style="">status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($request as $row) { ?>
                    <tr>
                        <td class="text-center font-size-sm"><?=$i?></td>
                        <td class="font-w600 font-size-sm">
                            <?=$row['date']?>
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm " style="display: flex">
                            <?=$row['name']?>
                        </td>
                        <td><em class="text-muted font-size-sm"><?=$row['status']?></em></td>
                        <td align="center"><a href="arv-store.php?req_id=<?=$row['id']?>&branch_id=<?=$row['branch_id']?>">Serve</a></td>
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