            <?php require("backend_header.php"); require("dbconnect.php") ?>
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Item </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="itemnew.php" class="btn btn-outline-primary">
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
                                          <th>Brand</th>
                                          <th>Price</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                        $sql="SELECT items.name'name',items.id as iid, items.codeno'codeno', items.photo'photo',items.discount'discount',items.description'description',items.subcategory_id'subcategory_id',items.price'price',brands.name'brandname' FROM items inner join brands on items.brand_id=brands.id";
                                        $stmt=$conn->prepare($sql);
                                        $stmt->execute();

                                        $rows=$stmt->fetchAll();

                                        // var_dump($rows);
                                        $i=1;
                                        foreach ($rows as $row){
                                            $id=$row['iid'];
                                            $name=$row['name'];
                                            $price=$row['price'];
                                            $brand=$row['brandname'];
                                            // $codeno=$row['codeno'];
                                            $photo=$row['photo'];
                                            $discount=$row['discount'];
                                            $description=$row['description'];
                                            $subcategory_id=$row['subcategory_id'];
                                         
                                        
                                        ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $name ?></td>
                                            <td><?= $brand ?></td>
                                            <td><?=$price ?></td>
                                            


                                            <td>
                                                 <form class="d-inline-block" method="POST" action="item_edit.php">
                                                    <input type="hidden" name="ieid" value="<?= $id ?>">
                                                    <button class="btn btn-warning"><i class="icofont-ui-settings"></i></button>
                                                </form>
                                                <!-- <a href="" class="btn btn-warning"> -->
                                                    
                                                <!--a-->
                                                <form class="d-inline-block" method="POST" action="item_delete.php">
                                                    <input type="hidden" name="id" value="<?=$id?>">
                                                    <button class="btn btn-outline-danger"><i class="icofont-close"></i></button>
                                                </form>
                                            <!--     <a href="" class="btn btn-outline-danger">
                                                    <i class="icofont-close"></i>
                                                </a> -->
                                            </td>

                                        </tr>
                                    <?php   } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require("backend_footer.php"); ?>