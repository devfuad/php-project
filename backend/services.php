<?php require_once('includes/header.php') ?>

<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Profile</h1>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xl-6">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="card-header">
                                Service Update
                            </div>
                            <form action="services_post.php" method="POST">
                                <input type="text" class="form-control m-b-md" name="service_title" placeholder="Service Title">


                                <textarea class="form-control m-b-md" rows="5" placeholder="Service Description" name="service_description"></textarea>


                                <input type="text" class="form-control m-b-md" name="service_icon" placeholder="Service Icon">

                                <select name="status" class="form-control m-b-md">
                                    <option value="active">Active</option>
                                    <option value="Deactive">Deactive</option>

                                </select>

                                <?php
                                        if (isset($_SESSION['operation_success'])) {
                                            ?>


                                            <div class="alert alert-success" style="width:50%">
                                                <?php
                                                echo $_SESSION['operation_success'];
                                                ?>
                                            </div>


                                            <?php
                                            unset($_SESSION['operation_success']);
                                        }
                                        ?>

                                <button type="submit" class="form-control m-b-md btn btn-success" class="form-control m-b-md">Add Service
                                </button>

                                

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('includes/footer.php') ?>