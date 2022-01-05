<?php require_once 'pages/header.php'; ?>
<?php 
require "backend/dbconn.php";
?>
<!-- Main Container -->
<main id="main-container" style="background: #333">
    <!-- Hero -->
    <div class="bg-body-black">
        <div class="content content-full">
            <div class="content-heading">NEW CLINIC</div>
        </div>
    </div>

    <?php if (isset($_SESSION['alert'])) { ?>

    <div class="alert alert-success">
        <?=$_SESSION['alert']?>
    </div>

    <?php $_SESSION['alert'] = null; } ?>

    <div class="page-content" width="100%">

        <div class="block p-2">
            <!-- Pop In Block Modal -->
            <div class="moda" id="add-branch-modal" tabindex="-1" role="dialog" aria-labelledby="add-appliance-modal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-popin" role="document">
                    <div class="modal-content">
                        <form class="block block-themed block-transparent mb-0" action="backend/clinician/add-clinic.php" method="POST">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">New Clinic</h3>
                                
                            </div>
                            <div class="block-content font-size-sm">
                                <div class="col-lg-12">
                                    <!-- Form Labels on top - Default Style -->
                                    <div class="mb-5">
                                        <div class="form-group">
                                            <label for="appInput">Clinic Name</label>
                                            <input type="text" class="form-control" name="clinic"
                                                placeholder="Enter clinic name">
                                        </div>
                                    </div>
                                    <!-- END Form Labels on top - Default Style -->
                                </div>
                            </div>
                            <div class="block-content block-content-full text-right border-top">
                                <button type="submit" class="btn btn-sm btn-primary" id="submit-button"><i
                                        class="fa fa-save mr-1" name="submit"></i>Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END Pop In Block Modal -->

            <hr>

            <table width=250px cellpadding=5 class="table table-striped js-datatable">
                <tr>
                    <th>#</th>
                    <th>Clinic name</th>
                </tr>
                <?php 
                    $i = 1;
                    $select = $conn->query("SELECT * FROM branch WHERE id != 1");
                    foreach ($select as $row) {
                ?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$row['name']?></td>
                </tr>
                <?php } ?>
            </table>
        </div>

        

    </div>

</main>
<!-- END Main Container -->
</div>
<?php require_once 'pages/footer.php'; ?>