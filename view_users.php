<html>

<head>
    <title>All Users</title>
</head>

<body>
    <h1>
        <center>All Users</center>
    </h1>

    <?php
    //load the MBD2 library and connection file
    require_once 'MDB2.php';
    require_once 'connect.php';

    // No input required, just retrieving data
    // Store SQL statement in a variable
    $query = "select full_name, address, tel_no, dob, bank_name from users";

    // Execute statement and test status
    $result = $db->query($query);

    if (PEAR::isError($result)) {
        die($result->getMessage());
    }

    // Format table for output
    echo "<table border=5>";
    echo "<tr align = center bgcolor=white>
                <td><b>Full Name</b></td>
                <td><b>Address<b></td>
                <td><b>Telephone Number<b></td>
                <td><b>Date of Birth<b></td>
                <td><b>Bank Name<b></td>
            </tr>";

    while ($row = $result->fetchrow(MBD2_FETCHMODE_ASSOC)) {
        // MBD2_FETCHMODE_ASSOC means columns are named after table attributes,rather than numeric
        $full_name = $row('full_name');
        $address = $row('address');
        $tel_no = $row('tel_no');
        $dob = $row('dob');
        $bank_name = $row('bank_name');

        echo "<tr bgcolor=white>
                    <td>$fullname</td>
                    <td>$address</td>
                    <td>$tel_no</td>
                    <td>$dob</td>
                    <td>$bank_name</td>
                </tr>";
    }

    echo "<table>";

    #clear the result set,and disconnect from oracle
    $result->free();

    $db->disconnect

    ?>

    <form name="test" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="submit" name="submit" value="Click here to view all users"></a><br>
    </form> 

    <a href=admin.php>Back to Admin Page</a><br><br><br>
</body>
</html>