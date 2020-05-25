<html>

<head>
    <title>Customer Page</title>
</head>

<body text="#000000" bgcolor="#6666FF" link="#0000EE" vlink="#551AB8B" alink="#FF0000">
    <div align="center">
        <h1>
            <center>Chester Cycling Outlet
                <br><br>
                Products Information
            </center>
        </h1>
        <?php

        // Load MDB2 library  
        require_once 'MDB2.php';

        // connection file
        require_once 'connect.php';

        // store SQL statement in a variable
        $query = "select product_id, product_name from products";

        // execute statement and test status
        $result = $db->query($query);

        if (PEAR::isError($result)) {
            die($result->getMessage());
        }

        // Format table for output
        echo "<table border=5>";
        echo "<tr align = center bgcolor=white>
                    <td><b>Product ID</b></td>
                    <td><b>Product Name</b></td>
                </tr>";

        while ($row = $result->fetchrow(MDB2_FETCHMODE_ASSOC)) {
            // MDB2_FETCHMODE_ASSOC means columns are named after table attributes,rather than numeric
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];

            echo "<tr bgcolor=white>
                    <td>$product_id</td>
                    <td>$product_name</td>
                </tr>";
        }

        echo "<table>";

        echo "<form method='post' action='purchase.php'><br>";
        echo "Enter Product id: ";
        echo "<input type='text' name='p_id'/><br><br>";
        echo "<input type='submit' name='submit' value='Submit'/><br>";
        echo "</form>";

        // clear the result set,and disconnect from oracle
        $result->free();

        $db->disconnect();

        ?>
    </div>

    <br><br>
    <form method="post" action="logout.php">
        <button type="submit" name="logout">Logout</button>
    </form>

</body>

</html>