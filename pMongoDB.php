<?php // Declaration and assign of MongoDB Client

// This php file is included in 
    //      myphp.php
    //      pAddCustomer.php
    //      pViewCustomer.php
    //      pMemberDetails.php

    require_once __DIR__ . '/vendor/autoload.php';

    // Assign $uri -> mongo DB database location
    $uri = 'mongodb+srv://thishanw71:Thishanw123@cluster0.gyyolkc.mongodb.net/?retryWrites=true&w=majority';
    // Create a new client and connect to the server
    $client  = new MongoDB\Client($uri);
    
?>