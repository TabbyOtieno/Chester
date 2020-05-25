<html>

<head>
    <title>All Products</title>
</head>

<body>
    <h1>
        <center>All Products</center>
    </h1>

    <?php
    //load the MBD2 library and connection file
    require_once 'MDB2.php';
    require_once 'connect.php';

    // No input required, just retrieving data
    // Store SQL statement in a variable
    $query = "select product_id, product_name, product_type, product_cost, store_id from products";

    // Execute statement and test status
    $result = $db->query($query);

    if (PEAR::isError($result)) {
        die($result->getMessage());
    }

    // Format table for output
    echo "<table border=5>";
    echo "<tr align = center bgcolor=white>
                <td><b>Product ID</b></td>
                <td><b>Product Name<b></td>
                <td><b>Product Type<b></td>
                <td><b>Product Cost<b></td>
                <td><b>Store ID<b></td>
            </tr>";

    while ($row = $result->fetchrow(MBD2_FETCHMODE_ASSOC)) {
        // MBD2_FETCHMODE_ASSOC means columns are named after table attributes,rather than numeric
        $product_id = $row('product_id');
        $product_name = $row('product_name');
        $product_type = $row('product_type');
        $product_cost = $row('product_cost');
        $store_id = $row('store_id');

        echo "<tr bgcolor=white>
                    <td>$product_id</td>
                    <td>$product_name</td>
                    <td>$product_type</td>
                    <td>$product_cost</td>
                    <td>$store_id</td>
                </tr>";
    }

    echo "<table>";

    #clear the result set,and disconnect from oracle
    $result->free();

    $db->disconnect

    ?>

    <form name="test" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="submit" name="submit" value="Click here to view all products"></a><br>
    </form>

    <a href=admin.php>Back to Admin Page</a><br><br><br>

</body>
</html>