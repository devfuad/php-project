<?php require_once('includes/header.php')?>

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
                                        Name
                                    </div>
                                    <form action="profile_post.php" method="POST">
                                        <input type="text" class="form-control m-b-md" name="name_cng" value="<?php
                                        if (isset($_SESSION['db_name'])) {
                                            echo $_SESSION['db_name'];
                                        } ?>">
                                        <button type="submit" class="btn btn-success" name="name_cng_btn">Change Name
                                        </button>
                                        <br>


                                        <?php
                                        if (isset($_SESSION['name_cng_success'])) {
                                            ?>


                                            <div class="alert alert-success" style="width:50%">
                                                <?php
                                                echo $_SESSION['name_cng_success'];
                                                ?>
                                            </div>


                                            <?php
                                            unset($_SESSION['name_cng_success']);
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card widget widget-stats">
                                <div class="card-body">
                                    <div class="card-header">
                                        Profile Pic
                                    </div>
                                    <div><img src="uploads/profile_photos/<?=$default_img;?>" width="150"></div>
                                    <form action="profile_post.php" method="POST" enctype="multipart/form-data">
                                        <input type="file" class="form-control m-b-md" name="img_up">
                                        <button type="submit" class="btn btn-success" name="img_up_btn">Upload File
                                        </button>
                                        <?php
                                        if (isset($_SESSION['pro_pic_success'])) {
                                            ?>


                                            <div class="alert alert-success" style="width:50%">
                                                <?php
                                                echo $_SESSION['pro_pic_success'];
                                                ?>
                                            </div>


                                            <?php
                                            unset($_SESSION['pro_pic_success']);
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card widget widget-stats">
                                <div class="card-body">
                                    <div class="card-header">
                                        Password change
                                    </div>
                                    <form action="profile_post.php" method="POST">
                                        <input type="password" class="form-control m-b-md" name="old_password"
                                               placeholder="Old Password">
                                        <?php
                                        if (isset($_SESSION['old_pass_error'])) {
                                            ?>


                                            <div class="alert alert-danger" style="width:50%">
                                                <?php
                                                echo $_SESSION['old_pass_error'];
                                                ?>
                                            </div>


                                            <?php
                                            unset($_SESSION['old_pass_error']);
                                        }
                                        ?>

                                        <input type="password" class="form-control m-b-md" name="new_password"
                                               placeholder="New Password">
                                        <?php
                                        if (isset($_SESSION['new_confirm_pass_error'])) {
                                            ?>


                                            <div class="alert alert-danger" style="width:50%">
                                                <?php
                                                echo $_SESSION['new_confirm_pass_error'];
                                                ?>
                                            </div>


                                            <?php
                                            unset($_SESSION['new_confirm_pass_error']);
                                        }
                                        ?>


                                        <input type="password" class="form-control m-b-md" name="confirm_password"
                                               placeholder="Confirm Password">
                                        <button type="submit" class="btn btn-success" name="pass_cng_btn">Change
                                            Password
                                        </button>
                                        <?php
                                        if (isset($_SESSION['new_confirm_pass_success'])) {
                                            ?>


                                            <div class="alert alert-success" style="width:50%">
                                                <?php
                                                echo $_SESSION['new_confirm_pass_success'];
                                                ?>
                                            </div>


                                            <?php
                                            unset($_SESSION['new_confirm_pass_success']);
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<?php require_once('includes/footer.php')?>