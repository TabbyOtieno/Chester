<html>

<head>
    <title>All Sales</title>
</head>

<body text="#000000" bgcolor="#6666FF" link="#0000EE" vlink="#551AB8B" alink="#FF0000">
    <div align="center">
        <h1>
            <center>All Sales</center>
        </h1>

        <?php
        //load the MBD2 library and connection file
        require_once 'MDB2.php';
        require_once 'connect.php';

        // No input required, just retrieving data
        // Store SQL statement in a variable
        $query = "select sale_id, product_id, product_name, product_cost, date from sales";

        // Execute statement and test status
        $result = $db->query($query);

        if (PEAR::isError($result)) {
            die($result->getMessage());
        }

        // Format table for output
        echo "<table border=5>";
        echo "<tr align = center bgcolor=white>
                <td><b>Sale ID</b></td>
                <td><b>Product ID</b></td>
                <td><b>Product Name</b></td>
                <td><b>Product Cost</b></td>
                <td><b>Date</b></td>
            </tr>";

        while ($row = $result->fetchrow(MDB2_FETCHMODE_ASSOC)) {
            // MDB2_FETCHMODE_ASSOC means columns are named after table attributes,rather than numeric
            $sale_id = $row['sale_id'];
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_cost = $row['product_cost'];
            $date = $row['date'];

            echo "<tr bgcolor=white>
                    <td>$sale_id</td>
                    <td>$product_id</td>
                    <td>$product_name</td>
                    <td>$product_cost</td>
                    <td>$date</td>
                </tr>";
        }

        echo "<table>";

        #clear the result set,and disconnect from oracle
        $result->free();

        $db->disconnect();

        ?>

        <h3><a href=admin.php>Back to Admin Page</a></h3>
    </div>
</body>

</html>