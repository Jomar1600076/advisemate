<?php

    $i=1;
    //Declare the year you started this on
    $yearStarted=2015;
    //Using PHP date("Y") to get the current year
    $currentYear= date("Y");

    //Difference of years from current time to when started
    $yearDifference=$currentYear-$yearStarted;

    //Adding the difference of years to your main variable
    $i=$i+$yearDifference;

    // print/echo your variable
    echo $i;
?>