            <?php require("backend_header.php"); require("dbconnect.php") ?>
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Subcategory </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="subcategories_new.php" class="btn btn-outline-primary">
                        <i class="icofont-plus"></i>
                    </a>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="sampleTable">
                                    <thead>
                                        <tr>
                                          <th>#</th>
                                          <th>Name</th>
                                          <th>Category</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                        $sql="SELECT subcategories.id'id', subcategories.name'name',categories.name'catid' FROM subcategories inner join categories on subcategories.category_id=categories.id";
                                        $stmt=$conn->prepare($sql);
                                        $stmt->execute();

                                        $rows=$stmt->fetchAll();

                                        // var_dump($rows);
                                        $i=1;
                                        foreach ($rows as $row) {
                                            $id=$row['id'];
                                            $name=$row['name'];
                                            $categoryid=$row['catid'];
                                        

                                         ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td> <?php echo $name ?></td>
                                            <td><?php echo $categoryid ?></td>
                                            <td>
                                                <a href="subcategories_edit.php?sid=<?=$id?>" class="btn btn-warning">
                                                    <i class="icofont-ui-settings"></i>
                                                </a>

                                                <a href="subcategories_delete.php?sdid=<?=$id?>" class="btn btn-outline-danger">
                                                    <i class="icofont-close"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require("backend_footer.php"); ?>