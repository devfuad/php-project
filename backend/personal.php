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
                                Personal Data Add
                            </div>
                            <form action="personal_post.php" method="POST">
                                <input type="text" class="form-control m-b-md" name="personal_title" placeholder="Personal Title">


                                <textarea class="form-control m-b-md" rows="5" placeholder="Service Description" name="personal_description"></textarea>

                                <select name="status" class="form-control m-b-md">
                                    <option value="active">Active</option>
                                    <option value="deactive">Deactive</option>

                                </select>

                                <button type="submit" class="form-control m-b-md btn btn-success" class="form-control m-b-md">Add Personal
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