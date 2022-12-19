<?php require_once('includes/header.php') ?>

<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Personal Data View</h1>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xl-12">
                    <div class="bg-white">

                        <?php
                        $select_personal = "SELECT * FROM `personal`";
                        $select_personal_impl = mysqli_query($db_connect, $select_personal);
                        ?>


                        <table class="table table-bordered text-center">
                            <thead>
                                <tr class="fw-bold">
                                    <td>Sl</td>
                                    <td>Personal Title</td>
                                    <td>Personal Description</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>


                            <?php
                            foreach ($select_personal_impl as $key=>$personal) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td><?=$personal['personal_title']?></td>
                                        <td><?=$personal['personal_description']?></td>
                                        <td ><a href="update_personal_btn_post.php?id=<?=$personal['id']?>" class="btn btn-<?=($personal['status']=='active'?'success':'danger')?>"><?=$personal['status']?></a><br>
                                        
                                            <span class="badge bg-<?=($personal['status']=='active'?'success':'danger')?>"><?=$personal['status']?></span>
                                    
                                        </td>
                                        <td>
                                            <a href="edit_personal.php?id=<?=$personal['id']?>"class="btn btn-warning" >Edit</a><br>
                                            <a href="delete_personal_post.php?id=<?=$personal['id']?>"class="btn btn-danger" >Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php
                            }
                            ?>

                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('includes/footer.php') ?>