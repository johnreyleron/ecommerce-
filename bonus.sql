//BONUS: Write any other Situational Cases that you will encounter with your own Web Systems - related to your Systems Database. Provide similar solution using Display
Situation: A user has accidentally deleted some important data from their account.

Solution: Make a display that allows users to recover deleted data. The display should prompt users to select the data to be restored and show a list of available backups. When a user selects a backup to restore, the system should restore the data and display a message confirming the action. 
SELECT * FROM deleted data WHERE user id = [user id] ORDER BY deleted date DESC; Once the user has selected the data they want to restore, you can use an INSERT statement to insert the data back into the database INSERT INTO user data (user id, data) VALUES ([user id], [restored data]);

//BONUS: Write any other Situational Cases that you will encounter with your own Web Systems - related to your Systems Database. Provide similar solution using Insert
Situation: A new supplier has recently been added to the Sheesh-lingan supplier list, and their product inventory must be entered into the system database.

Solution using Insert: To add the new supplier and their products to the database, the INSERT statement can be used.   
                                                                                                                                          INSERT INTO suppliers (supplier_name, supplier_address, supplier_contact)
VALUES ('New Supplier', '420 Main Street', '123-4444');

INSERT INTO products (product_name, supplier_id, price, quantity)
VALUES ('Pork', LAST_INSERT_ID(), 20000, 50),
('Beef', LAST_INSERT_ID(), 25000, 50);

//BONUS: Write any other Situational Cases that you will encounter with your own Web Systems - related to your Systems Database. Provide similar solution using Update
Situation:
Suppose I own a Sizzling House and I have a database system that stores all your customer data, including their orders and the products they have purchased. One day, a customer contacts me and says that they have made a mistake in their order and would like to add an item to their purchase.

Solution:
To update the database to reflect the customer's request, I would need to follow these steps:

Identify the customer's record in the database using their unique ID or email address.
Retrieve the existing order details for that customer.
Add the new item to the order details, ensuring that all relevant information such as product name, quantity, and price are included.
Calculate the updated total cost of the order, taking into account any applicable discounts or taxes.
Update the order total and the order details in the customer's record in the database.
Send a confirmation email to the customer with the updated order details.                                         
UPDATE customers
SET order_details = CONCAT(order_details, ', New Product'),
total_cost = (total_cost + New_Product_Price)
WHERE customer_id = 'customer_id';

//BONUS: Write any other Situational Cases that you will encounter with your own Web Systems - related to your Systems Database. Provide similar solution using Delete
Delete a product that is no longer being sold or has been discontinued. To accomplish this, you can use the DELETE SQL statement to remove the product information from the database.                                                                                                                                  DELETE FROM products
WHERE product_id = [product_id];
