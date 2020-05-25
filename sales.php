<html>

<head>
    <title>Sales Page</title>
</head>

<body text="#000000" bgcolor="#6666FF" link="#0000EE" vlink="#551AB8B" alink="#FF0000">
    <div align="center">
        <h1>
            <center>Chester Cycling Outlet
                <br><br>
                Record Sales
            </center>
        </h1>

        <?php
        // Load MDB2 library  
        require_once 'MDB2.php';

        // connection file
        require_once 'connect.php';

        // Access the data from the previous PHP script
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_cost = $_POST['product_cost'];
        $date = $_POST['date'];

        // Store SQL statement in variable
        $query = "update sales set product_id ='$product_id', product_name = '$product_name', product_cost ='$product_cost', date = '$date'";
        //$query = "insert into sales values('" . $product_id . "','" . $product_name . "','" . $product_cost . "', '" . $date . "')";

        // Execute statement and test status
        $result = $db->query($query);

        if (PEAR::isError($result)) {
            die($result->getMessage());
        }
        else{
            echo "<h1><br>Successfully Purchased!<br><h1>";
        }

        $result->free();

        $db->commit(); // Extra line to ensure the changes are permanently committed
        $db->disconnect();

       ?>
    </div>

</body>

</html>