<html>

<head>
    <title> Login Page </title>
</head>

<body>
    <h1><center>Log in</center></h1>

    <br>
    <?php session_start(); ?>
    <?php
    //load the MBD2 library and connection file
    require_once 'MDB2.php';
    require_once 'connect.php';

    //check that input has been entered
    if (isset($_POST['login'])) {
        
        // Capture form values
        $username = $_POST['username'];
        $password = $_POST['password'];

        // check if all the fields have values and proceed to retrieve data from the database
        if ($username == "" || $password == "") {
            echo "**ALL FIELDS MANDATORY";
        } 
        else{
            //Store SQL statement in a variable
            $query = "select username,password from users where username = '$username' && password = '$password'";

            // Execute statement and test status
            $result = $db->query($query);

            if (PEAR::isError($result)) {
                die($result->getMessage());
            }

            //fetch data from the database
            while ($row = $result->fetchrow(MDB2_FETCHMODE_ASSOC)) {
                # MDB2_FETCHMODE_ASSOC means columns are named after table attributes,rather than numeric
                $db_username = $row['username'];
                $db_user_password = $row['password'];
                $db_user_role = $row['user_role'];

                if ($username === $db_username && $password === $db_user_password) {

                    $_SESSION['s_username'] = $db_username;

                    if ($db_user_role == 'customer') {
                        header("Location: customer.php");
                        exit;
                    } 
                    
                    else {
                        header("Location: admin.php");
                        exit;
                    }
                
                } 
                else {
                    header("Location: index.php");
                    exit;
                }
            
            }     
        }
    }
    ?>

    <form name="test" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        Username:<br>
        <input type="text" name="username"></input><br><br>
        Password:
        <input type="password" name="password"></input><br><br>

        <input type="submit" name="login" value="Login"></input><br><br>
    </form>

</body>

</html>