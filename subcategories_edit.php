            <?php require("backend_header.php"); require ("dbconnect.php"); 
            $id=$_GET['sid'];

            $sql="SELECT * FROM subcategories WHERE id=:value1";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':value1',$id);
            $stmt->execute();

            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            $said=$row['id'];
            $name=$row['name'];
            $cid=$row['category_id'];

            
            ?>
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Edit SubCategory Form </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="subcategories.php" class="btn btn-outline-primary">
                        <i class="icofont-double-left"></i>
                    </a>
                </ul>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <form action="subcategories_update.php" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="id" value="<?=$row['id']?>">
                                
                                
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name" value="<?=$row['name']?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-2 col-form-label"> Category </label>
                                    <div class="col-sm-10">
                                        <?php 

                                        $sql="SELECT * FROM categories";
                                        $stmt=$conn->prepare($sql);
                                        $stmt->execute();

                                        $rows=$stmt->fetchAll();

                                        // var_dump($rows);
                                        ?>
                                        <select class="form-control" name="opt">
                                            <?php
                                        foreach ($rows as $row) {
                                            $id=$row['id'];
                                            $name=$row['name'];
                                        ?>
                                         
                                         <option <?php if($id==$cid) echo "selected"; ?> value="<?php echo $id ?>"> <?php echo  $name?> </option>
                                <?php } ?>
                               </select>
                                    </div>
                                
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icofont-save"></i>
                                            Save
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php require("backend_footer.php"); ?>