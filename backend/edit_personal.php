<?php require_once('includes/header.php')


?>

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

                <?php
                $id = $_GET['id'];
                $select_personal = "SELECT * FROM personal WHERE id='$id'";
                $select_personal_impl = mysqli_query($db_connect, $select_personal);
                $assoc = mysqli_fetch_assoc($select_personal_impl);


                ?>

                <div class="col-xl-6">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="card-header">
                                Personal Data Update
                            </div>
                            <form action="edit_personal_post.php" method="POST">

                                <input type="hidden" name="id" value="<?= $assoc['id'] ?>">

                                <input type="text" class="form-control m-b-md" name="personal_title" placeholder="Personal Title" value="<?= $assoc['personal_title'] ?>">


                                <textarea class="form-control m-b-md" rows="5" placeholder="Service Description" name="personal_description"><?= $assoc['personal_description'] ?></textarea>

                                <select name="status" class="form-control">
                                    <option value="active" <?= ($assoc['status'] == 'active' ? 'selected' : '') ?>>Active</option>
                                    <option value="deactive" <?= ($assoc['status'] == 'deactive' ? 'selected' : '') ?>>Deactive</option>

                                </select>

                                <button type="submit" class="form-control m-b-md btn btn-success" class="form-control m-b-md">Update Personal Data
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