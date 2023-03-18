//Display all items having active status.
SELECT * FROM items WHERE status = 'active';

//Display all users that are inactive.
SELECT * FROM items WHERE status = 'inactive';

//Display the list of order's Descriptive information:

order_id, date_ordered, username, item_name, total_amount

Note: total_amount = SUM(item_qty * item_price)
SELECT 
  o.order_id,
  o.date_ordered,
  u.username,
  oi.item_name,
  SUM(oi.item_qty * oi.item_price) AS total_amount
FROM orders o
JOIN order_items oi ON o.order_id = oi.order_id
JOIN users u ON o.user_id = u.user_id
GROUP BY o.order_id, o.date_ordered, u.username, oi.item_name;

//Display all the order information having "Delivered" status


order_status, order_id, user_name, item_name, total_amount, total_qty

Note: total_qty = SUM(item_qty)
SELECT 
  o.order_status,
  o.order_id,
  u.user_name,
  oi.item_name,
  SUM(oi.item_qty * oi.item_price) AS total_amount,
  SUM(oi.item_qty) AS total_qty
FROM orders o
JOIN order_items oi ON o.order_id = oi.order_id
JOIN users u ON o.user_id = u.user_id
WHERE o.order_status = 'Delivered'
GROUP BY o.order_status, o.order_id, u.user_name, oi.item_name;

//Write the html/php script that will display the list of Products. a sample output is provided for the users display, you need to display products. put an action button similar to the below image.
Captionless Image
<html>
<?php include_once "db_conn.php"; ?>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
 <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>
    <div class="container">
        <div class="row">
            
            <div class="col-9">
               <h3>PRODUCT LIST</h3>
                <?php
            
                  $productlist = query($conn, "select item_id, item_name, item_price from products where item_status='A'");
                 // var_dump($userlist);
                  echo "<hr>";
                       if(isset($_GET['update_status'])){
                            switch($_GET['update_status']){
                                case "success": echo "<div class='alert alert-success'>User Updated.</div>";
                                      break;
                                case "failed":  echo "<div class='alert alert-danger'>User Failed to be updated.</div>";
                                      break;
                                        
                            }
                       }
                  echo "<hr>";
                  
                  
                    echo "<table class='table table-bordered'>";
                    echo "<thead>";
                         echo "<th>Item Name</th>";
                         echo "<th>Item Price</th>";
                         echo "<th>Action</th>";
                    echo "</thead>";
                  foreach($productlist as $key => $row){
                      echo "<tr>";
                         echo "<td>" . $row['item_name'] . "</td>";
                         echo "<td>" . $row['item_price'] . "</td>";
                         echo "<td> <a class='btn btn-success' href='submit.php?&item_name=" .$row['item_name'] . "&item_price=" . $row['item_price']. "&item_id=". $row['item_id'] ."' > Update </a> </td>";
                         echo "<td> <a class='btn btn-danger' href='delete_item.php?item_id=". $row['item_id'] ." ' > Delete </a> </td>";
                    echo "</tr>";
                  }
                   echo "</table>";
                
                ?>
                
            </div>
            
        </div>
    </div>
</body>
<script src="js/bootstrap.js"></script>
</html>
