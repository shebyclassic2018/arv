<?php require_once 'pages/header.php'; ?>
<?php require_once 'backend/clinician/arv_batch.php'; ?>
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
            <form method="POST" action="backend/clinician/new-batch.php?req=<?=$_GET['req_id']?>" class="row">
                
                <div class="col-md-2">
                    <label for="qty">Quantity</label>
                    <input class="form-control" type="number" id="qty" name="qty">
                </div>
                <div class="col-md-2">
                    <label for="branch">Branch</label>
                    <select name="branch" id="branch" class="form-control">
                        <option disabled >-- Choose --</option>
                        <?php foreach ($branch as $row) { ?>
                            <option value="<?=$row['id']?>" ><?=$row['name']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="adate">Arrival date</label>
                    <input class="form-control" type="date" id="adate" name="adate">
                </div>
                <div class="col-md-1 ">
                    <label for="rdate" style="color:white;">-</label>
                    <button class="form-control btn btn-blue"><span class="fa fa-save"></span></button>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-2 flex-center">
                    <spaN class="txt-red bold">ARVs stock avalaible : </spaN> &nbsp; <b
                        class='badge badge-warning pad-15'><?=$remainsARVs?></b>
                </div>
            </form>
        </div>


        <!-- Dynamic Table with Export Buttons -->
        <div class="block">

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                    <thead>
                        <tr>
                            <th colspan="3" class="alert alert-warning">BATCH</th>
                            <th colspan="6" class="alert alert-success">ADMINISTRATOR</th>
                        </tr>
                        <tr>
                            <th class="text-center" style="width: 20px;">ID</th>
                            <th class="d-none d-sm-table-cell" style="width: 10%;">Date</th>
                            <th class="d-none d-sm-table-cell" style="width: 10%;">Quantity</th>
                            
                            <th style="width: 10%;">ID</th>
                            <th>NAME</th>
                            <th class="d-none d-sm-table-cell" style="width: 5%;">sex</th>
                            <th>phone</th>
                            <th>Email</th>
                            <th>BRANCH</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($batch as $row) { ?>
                        <tr>
                            <td class="text-center font-size-sm"><?=$i?></td>
                            <td class="font-w600 font-size-sm">
                                <a href="be_pages_generic_blank.html"><?=$row['arr_date']?></a>
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm text-center"><?=$row['qty']?></td>
                            <td class="d-none d-sm-table-cell">CLN-<?=$row['uid']?></td>
                            <td class="text-center"><em class="text-muted font-size-sm"><?=$row['uname']?></em></td>
                            <td class="text-center">
                                <em class="text-muted font-size-sm "><?=$row['sex']?></em>
                            </td>
                            <td>
                                <em class="text-muted font-size-sm"><?=$row['phone']?></em>
                            </td>
                            <td>
                                <em class="text-muted font-size-sm"><?=$row['email']?></em>
                            </td>
                            <td><em class="text-muted font-size-sm"><?=$row['branch']?></em></td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
</main>
<!-- END Main Container -->
</div>
<?php require_once 'pages/footer.php'; ?>