<html>

<head>
    <title>Stock Levels</title>
</head>

<body text="#000000" bgcolor="#6666FF" link="#0000EE" vlink="#551AB8B" alink="#FF0000">
    <div align="center">
        <h1>
            <center>Stock Levels</center>
        </h1>
        <?php
        //load the MBD2 library and connection file
        require_once 'MDB2.php';
        require_once 'connect.php';
        
        // store SQL statement in a variable
        $query = "select product_name, quantity from products";

        // execute statement and test status
        $result = $db->query($query);

        if (PEAR::isError($result)) {
            die($result->getMessage());
        }

        echo "<table border=5>";
        echo "<tr align=center bgcolor=white>
                <td><b>Product Name</b></td>
                <td><b>Quantity</b></td>
             </tr>";

        while($row = $result->fetchRow(MDB2_FETCHMODE_ASSOC)){
            $product_name = $row['product_name'];
            $quantity = $row['quantity'];

            echo "<tr bgcolor=white>
                    <td>$product_name</td>
                    <td>$quantity</td>
                </tr>";
                    
        }

        echo "</table>";


        ?>
        <h3><a href=admin.php>Back to Admin Page</a></h3>
    </div>
</body>

</html>