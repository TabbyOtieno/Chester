<?php
    $dsn = array(
        'phptype' => 'oci8', // Name of driver to be used, type of RDBMS
        'hostspec' => 'localhost', //Host specification
        'username' => 'system', //username
        'password' => 'MyDb2627' //password
        //'database' => 'MyDb' //Name of the actual database to connect to
    );

    /*
    Three methods to create an MDB2 object:
        $mdb2 =& MDB2::connect($dsn); // create an object and connect to db
        $mdb2 =& MDB2::factory($dsn); // create an object, won't connect to db until needed
        $mdb2 =& MDB2::singleton($dsn); // like factory() but makes sure only one MDB2 object exists with the same DSN
    */

    // Connect to database
    $db = MDB2::connect($dsn);

    // Handle failed connection
    if (PEAR::isError($db)){
        die('Could not create database connection' . $db->getMessage());
        
    }

    //To disconnect from the db
    //$db->disconnect();
?>