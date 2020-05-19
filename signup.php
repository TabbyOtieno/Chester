<!DOCTYPE html>
<html>

<head>
    <title> Sign Up Page </title>
</head>

<body>
    <h1> Register Here </h1>
    <?php
    //load the MBD2 library and connection file
    require_once 'MDB2.php';
    require_once 'connect.php';

    //The isset() function to test whether the variable has been set with a value.  
            
    if (isset($_POST['register'])) {
        // Capture form values
        $full_name = $_POST['full_name'];
        $address = $_POST['address'];
        $tel_no = $_POST['tel_no'];
        $dob = $_POST['date_of_birth'];
        $bank_name = $_POST['bank_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // check if all the fields have values and proceed to enter data into the db table
        if ($full_name == "" || $address == "" || $tel_no == "" || $dob == "" || $bank_name == "" || $username == "" || $password == "") {
            echo "**ALL FIELDS MANDATORY";
        } 
        elseif (strlen($tel_no) != 10) {
            echo "**Telephone Number Must Contain 10 digits";
        }
        else {
            // Store SQL Statement in a variable
            $query = "insert into users(full_name, address, tel_no, date_of_birth, bank_name, username, password) 
                values('" . $full_name . "', '" . $address . "', '" . $tel_no . "', '" . $date_of_birth . "', 
                '" . $bank_name . "', '" . $username . "', '" . $password . "')";

            // Execute statement and test status
            $result = $db->query($query);

            if (PEAR::isError($result)) {
                die($result->getMessage());
            } 
            else {
                echo "<p>Successful Registration</p>";
                header("Location: login.php");
            }
            $result->free();
        } 
    }
    
    $db->commit(); // Commit changes to the database
    $db->disconnect();


    ?>
    <form name="test" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        Full Name:<br>
        <input type="text" name="full_name"></input><br><br>
        Address:<br>
        <input type="text" name="address"></input><br><br>
        Telephone Number:<br>
        <input type="text" name="tel_no"></input><br><br>
        Date of Birth:<br>
        <input type="text" name="date_of_birth"></input><br><br>
        Bank Name:<br>
        <input type="text" name="bank_name"></input><br><br>
        Username:<br>
        <input type="text" name="username"></input><br><br>
        Password:<br>
        <input type="password" name="password"></input><br><br>

        <input type="submit" name="register" value="Register"/><br><br>
    </form>

</body>

</html>