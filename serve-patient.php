<?php require_once 'pages/header.php'; ?>
<?php require_once 'backend/clinician/patient-record.php'; ?>
<!-- Main Container -->
<main id="main-container" style="background: #333">
    <!-- Hero -->
    <div class="bg-body-black">
        <div class="content content-full">
            <div class="content-heading"><span class="fas fa-syringe"></span> SERVE PATIENT</div>
        </div>
    </div>
    <div class="page-content">
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

        <div class="block pad-lr-15" width="100%">
            <form method="POST" action="backend/clinician/add-record.php" class="row">
                <input class="form-control" type="hidden" id="pid" name="pid" value="<?=$_GET['pid']?>">
                <div class="col-md-2">
                    <label for="qty">Quantity taken</label>
                    <input class="form-control" type="number" id="qty" name="qty">
                </div>
                <div class="col-md-2">
                    <label for="weight">Body weight (kgs)</label>
                    <input class="form-control" type="number" id="weight" name="weight">
                </div>
                <div class="col-md-2">
                    <label for="rdate">Return date</label>
                    <input class="form-control" type="date" id="rdate" name="rdate">
                </div>
                <div class="col-md-1 ">
                    <label for="rdate" style="color:white;">-</label>
                    <button class="form-control btn btn-blue"><span class="fa fa-save"></span></button>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2 flex-center">
                    <spaN class="txt-red bold">ARVs stock avalaible : </spaN> &nbsp; <b
                        class='badge badge-warning pad-15'><?=$remainsARVs?></b>
                </div>
            </form>
        </div>
        
        <?php $i=1; $user_id = substr($_GET['pid'], 2, 10); foreach($conn->query("SELECT * FROM user WHERE id = '$user_id'") as $row) { }?>
        <div class="bg-fff pad-15">
            <div class="row">
                <div class="col-md-4">PATIENT NAME</div>
                <div class="col-md-4"><?=$row['name']?></div>
            </div>
            <div class="row">
                <div class="col-md-4">PATIENT ID</div>
                <div class="col-md-4"><?=$_GET['pid']?></div>
            </div>
            <div class="row">
                <div class="col-md-4">GENDER</div>
                <div class="col-md-4"><?=$row['sex']?></div>
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
                            <th colspan="5" class="alert alert-warning">PATIENT DETAILS</th>
                            <th colspan="4" class="alert alert-success">CLINICIAN DETAILS</th>
                        </tr>
                        <tr>
                            <th class="text-center" style="width: 20px;">#</th>
                            <th class="d-none d-sm-table-cell" style="width: 10%;">Date</th>
                            <th style="width: 5%;">Body Weight (Kgs)</th>
                            <th style="width: 5%;">ARV Qty</th>
                            <th style="width: 10%;">Return date</th>
                            <th style="width: 10%;">ID</th>
                            <th>NAME</th>
                            <th>phone</th>
                            <th>BRANCH</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($record as $row) { ?>
                        <tr>
                            <td class="text-center font-size-sm"><?=$i?></td>
                            <td class="font-w600 font-size-sm">
                                <a href="be_pages_generic_blank.html"><?=$row['date']?></a>
                            </td>
                            <td class="text-center">
                                <em class="text-muted font-size-sm "><?=$row['weight']?></em>
                            </td>
                            <td>
                                <em class="text-muted font-size-sm"><?=$row['quantity_used']?></em>
                            </td>
                            <td>
                                <em class="text-muted font-size-sm"><?=$row['return_date']?></em>
                            </td>
                            <td>CLN-<?=$row['did']?></td>
                            <td><?=$row['dname']?></td>
                            <td><em class="text-muted font-size-sm"><?=$row['phone']?></em></td>
                            <td><em class="text-muted font-size-sm"><?=$row['branch']?></em></td>
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