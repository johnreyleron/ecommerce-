<form action="newrecord.php" method="post">
                    <div class="mb-3">
                        <label for="new_item_name" class="form-label">Item Name</label>
                        <input type="text" id="new_item_name" required name="new_item_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="new_item_price" class="form-label">Item Price</label>
                        <input type="number" required id="new_item_price" name="new_item_price" class="form-control">
                    </div>
                    
                    <input type="submit" class="btn btn-primary">
                </form>

<?php
include_once "db_conn.php";

if(isset($_POST['new_item_name'])){
    $p_item_name=$_POST['new_item_name'];
    $p_item_price=$_POST['new_item_price'];
    
    $table = "products";
    $fields = array('item_name' => $p_item_name
                   , 'item_price' => $p_item_price
                   );
    
    if(insert($conn, $table, $fields) ){
        header("location: index.php?new_record=added");
        exit();
    }  
    else{
        header("location: index.php?new_record=failed");
        exit();
    }
}
