<html>

<head>
    <title>Purchase Page</title>
</head>

<body text="#000000" bgcolor="#6666FF" link="#0000EE" vlink="#551AB8B" alink="#FF0000">
    <div align="center">
        <h1>
            <center>Product Details<br><br>Product Information to purchase</center>
        </h1>

        <?php

        // Load MDB2 library  
        require_once 'MDB2.php';

        // connection file
        require_once 'connect.php';

        // Access the data from the previous PHP script
        $p_id = $_POST['p_id'];

        // Store SQL statement in variable
        $query = "select product_id, product_name, product_cost from products where product_id =$p_id";

        // Execute statement and test status
        $result = $db->query($query);

        if (PEAR::isError($result)) {
            die($result->getMessage());
        }

        // Format form for output
        echo '<form method="post" action="sales.php">'; 
        /*echo "<input type='text' name='date' value='<?php echo date("Y-m-d");; ?>' />";*/


        // Retrieve data from products table into an array and process each record - there should be only one!
        while ($row = $result->fetchrow(MDB2_FETCHMODE_ASSOC)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_cost = $row['product_cost'];

            echo "Product ID $product_id<input type='hidden' name='product_id' value='$product_id'/><br>";
            echo "Product Name $product_name<input type='hidden' name='product_name' value='$product_name'></input><br>";
            echo "Product Cost $product_cost<input type='hidden 'name='product_cost' value='$product_cost'></input><br>";
        }

        echo "<input type='submit' name='submit' value='Submit'></input></form>";

        $result->free();
        $db->disconnect();

        ?>
    </div>
</BODY>

</HTML>