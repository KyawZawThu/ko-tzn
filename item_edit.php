            <?php require("backend_header.php"); require("dbconnect.php"); 

            $id=$_POST['ieid'];
           


            $sql="SELECT * FROM items WHERE id=:value1";
            $stmt=$conn->prepare($sql);
            $stmt->bindParam(':value1',$id);
            $stmt->execute();

            $row=$stmt->fetch(PDO::FETCH_ASSOC);


            $bid=$row['brand_id'];
            $sid=$row['subcategory_id'];
            ?>
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Edit Item Form </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="item.php" class="btn btn-outline-primary">
                        <i class="icofont-double-left"></i>
                    </a>
                </ul>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                           
                            <form action="item_update.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <input type="hidden" name="photo1" value="<?= $row['photo'] ?>">
                                <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                                    <div class="col-sm-10">
                                      <input type="file" id="photo_id" name="photo" value="<?=$row['photo']?>">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name" value="<?=$row['name']?>">
                                    </div>
                                </div>


                                    <div class="form-group row">
                                        <div class="col-sm-2 "></div>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                    <a class="nav-link active" id="oldprofile-tab" data-toggle="tab" href="#oldprofile" role="tab" aria-controls="oldprofile" aria-selected="true"> Unit Price </a>
                                    </li>
      
                                    <li class="nav-item">
                                    <a class="nav-link" id="newprofile-tab" data-toggle="tab" href="#newprofile" role="tab" aria-controls="newprofile" aria-selected="false"> Discount</a>
                                    </li>
                                    </ul>
                                    </div>

                                    <div class="form-group row">
                                    <label for="priceid" class="col-sm-2 col-form-label"> Price </label>
                                    
                                    <div class="tab-content col-sm-10" id="myTabContent">
                                        <div class="tab-pane fade show active" id="oldprofile" role="tabpanel" aria-labelledby="oldprofile-tab">
                                            <input type="text" class="form-control" id="name_id" name="uprice" value="<?=$row['price']?>">
                                        </div>
                            
                                        <div class="tab-pane fade" id="newprofile" role="tabpanel" aria-labelledby="newprofile-tab">
                                            <input type="text" class="form-control" id="name_id" name="dprice" value="<?=$row['discount'] ?>">
                                        </div>
                                     </div>

                                </div>


                                <div class="form-group row">
                                <label for="desid" class="col-sm-2 col-form-label"> Description </label>
                                    <div class="col-sm-10">
                                      <textarea class="form-control" id="desid" name="desc"><?=$row['description']?></textarea>  
                                    </div>
                                </div>

                                <div class="form-group row">
                                <label for="desid" class="col-sm-2 col-form-label"> CodeNo </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="desid" name="codeno" value="<?=$row['codeno']?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-2 col-form-label"> Brand </label>
                                    <div class="col-sm-10">

                                        <?php 

                                        $sql="SELECT * FROM brands";
                                        $stmt=$conn->prepare($sql);
                                        $stmt->execute();

                                        $rows=$stmt->fetchAll();
                                        // var_dump($rows);


                                         ?>
                                        
                                        <select class="form-control" name="brand2">
                                        <?php 

                                        foreach ($rows as $row) {
                                            $id=$row['id'];
                                            $name=$row['name'];
                                        
                                         ?>
                                                                          
                                         <option <?php if ($id==$bid) echo "selected"; ?>value="<?php echo $id ?>"><?php echo $name ?></option>
                                         <?php } ?>
                                         </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-2 col-form-label"> Sub Category </label>
                                    <div class="col-sm-10">
                                        <?php 

                                        $sql="SELECT * FROM subcategories";
                                        $stmt=$conn->prepare($sql);
                                        $stmt->execute();

                                        $rows=$stmt->fetchAll();
                                        // var_dump($rows);

                                         ?>
                                        <select class="form-control" name="subcat">
                                        <?php 
                                        foreach ($rows as $row) {
                                            $id=$row['id'];
                                            $name=$row['name'];
                                        
                                         ?>
                                                                          
                                         <option <?php if ($id==$sid) echo "selected"; ?> value="<?php echo $id ?>"><?php echo $name ?></option>
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