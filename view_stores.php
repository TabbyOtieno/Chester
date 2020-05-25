<html>

<head>
    <title>All Stores</title>
</head>

<body>
    <h1>
        <center>All Stores</center>
    </h1>

    <?php
    //load the MBD2 library and connection file
    require_once 'MDB2.php';
    require_once 'connect.php';

    // No input required, just retrieving data
    // Store SQL statement in a variable
    $query = "select store_id, store_name from stores";

    // Execute statement and test status
    $result = $db->query($query);

    if (PEAR::isError($result)) {
        die($result->getMessage());
    }

    // Format table for output
    echo "<table border=5>";
    echo "<tr align = center bgcolor=white>
                <td><b>Store ID</b></td>
                <td><b>Store Name<b></td>
            </tr>";

    while ($row = $result->fetchrow(MBD2_FETCHMODE_ASSOC)) {
        // MBD2_FETCHMODE_ASSOC means columns are named after table attributes,rather than numeric
        $store_id = $row('store_id');
        $store_name = $row('store_name');

        echo "<tr bgcolor=white>
                    <td>$store_id</td>
                    <td>$store_name</td>
                </tr>";
    }

    echo "<table>";

    #clear the result set,and disconnect from oracle
    $result->free();

    $db->disconnect

    ?>

    <form name="test" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="submit" name="submit" value="Click here to view all stores"></a><br>
    </form>

    <a href=admin.php>Back to Admin Page</a><br><br><br>

</body>
</html>