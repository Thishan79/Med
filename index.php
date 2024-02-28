<?php
    include "pMongoDB.php";         // Declaration of Database $client

    //dispMemDet($client);

    $MemIdToFind = 'FS/M-V/006';
    // To Extract the result records from datadabe    
    $result = $client->Diyatha->Members->findOne(['Memberid' => $MemIdToFind]);

    if (isset($_GET['hello'])) {
        $MemIdToFind = $_GET['memid1'];
        $result = $client->Diyatha->Members->findOne(['Memberid' => $MemIdToFind]);
        //dispMemID($result);
    }
        
    function dispMemID($result1) {
        // To Extract the result records from datadabe    
        // $result = $dataBase->Diyatha->Members->findOne(['Memberid' => $MemIdToFind1]);
        // To display extracted result
        echo $result1 -> Memberid ;
    }
    function dispMemNickName($result1) {
        echo $result1 -> NickName ;
    }
    function dispMemFullName($result1) {
        echo $result1 -> FullName ;
    }
    function dispMemNIC($result1) {
        echo $result1 -> NIC ;
    }
    function dispMemAddress($result1) {
        echo $result1 -> Address ;
    }
    function dispMemTelephone($result1) {
        echo $result1 -> Telephone ;
    }
    // To find no of days between 2 dates
    function dateDiffInDays($date1, $date2) { 
    
        // Calculating the difference in timestamps 
        $diff = strtotime($date2) - strtotime($date1); 
      
        // 1 day = 24 hours 
        // 24 * 60 * 60 = 86400 seconds 
        return abs(round($diff / 86400)); 
    } 


    $defaultDate="2024-01-05"; //Start date of group B
    $defaultGroup=2;  // Group B
    // echo "<script>localStorage.setItem('defaultDate', '$defaultDate');</script>";
    // echo "<script>localStorage.setItem('defaultGroup', '$defaultGroup');</script>";
    // echo "<script>localStorage.removeItem('defaultDate', '$defaultDate');</script>";
    // echo "<script>localStorage.removeItem('defaultGroup', '$defaultGroup');</script>";
    // $defaultDate = "<script>document.write(localStorage.getItem('defaultDate'));</script>";
    // $defaultGroup = "<script>document.write(localStorage.getItem('defaultGroup'));</script>";
    // $defaultDate = '"'.$defaultDate.'"';
    // echo $defaultDate ;
    // echo gettype($defaultDate);

    $showStartDate1 = date_create($defaultDate);
    echo gettype($showStartDate1);
    $showEndDate1 = date_create($defaultDate);
    $defaultGroup1 = $defaultGroup;
    $showStartDate1 = date_format($showStartDate1,"Y/m/d");
    //date_add($showEndDate1,date_interval_create_from_date_string("2 days"));
    //$showEndDate1 = date_format($showEndDate1,"Y-m-d");
    $todaysDate = date("Y/m/d");
    //$noofDays = (int)($todaysDate) - (int)($showStartDate1); //this method is not valid for dates
    $noofDays = dateDiffInDays($todaysDate, $showStartDate1);
    $noofWeeks = ceil($noofDays/7);
    $thisWeekGroup = fmod(($defaultGroup1 + $noofWeeks - 1),4)+1;
    $strNoOfDays = strval($noofWeeks*7) . " days";
    echo $noofWeeks;

    $showStartDate =  date_create($defaultDate);
    date_add($showStartDate,date_interval_create_from_date_string($strNoOfDays));
    $showEndDate = $showStartDate;
    $showStartDate = date_format($showStartDate,"Y/m/d");
    date_add($showEndDate,date_interval_create_from_date_string("2 days"));
    $showEndDate = date_format($showEndDate,"Y-m-d");
    // $d1=strtotime("+2 days");
    // $date2 = date("Y/m/d",$d0);
  
    $value1 = $showStartDate;
    
    // To run JavaScript Commands in PHP
    // Store data to local Starage using PHP
    echo "<script>localStorage.setItem('groupDate', '$value1');</script>";
    // Retrieve data from local Starage using PHP
    $value2 = "<script>document.write(localStorage.getItem('groupDate'));</script>";

function add($a,$b){
  $c=$a+$b;
  return $c;
}
function mult($a,$b){
  $c=$a*$b;
  return $c;
}
function divide($a,$b){
  $c=$a/$b;
  return $c;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="CONTENT-TYPE" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="styles.css"/>
    <title>Diyatha Uyana Reservations</title>
    <script src="scripts.js"></script> 
    <style>
       table, td, th {
           border: 2px solid black;
           padding: 6px;
       }
       #table1 {
           border-collapse: separate;
           border-spacing: 10px;
       }
       tr:hover {background-color: coral;}
    </style>
</head>
<body>
    <h2>Stall Assignment of Diyatha Uyana - Stage 1</h2>
    <a href="pAddCustomer.php"><button>Add New Customer</button></a>
    <a href="pViewCustomer.php"><button >View Customer List</button></a>
    <button onclick="setGroupDate()" >Settings</button>
    <div style="margin-top:10px"> <!-- display group info -->
        <a href="pGroupList"><input type="radio" id="groupA" name="groupID" <?php if($thisWeekGroup==1) echo "checked" ?>>Group A
            <span id="spanIDB" style="color:brown"><?php if($thisWeekGroup==1) echo "=> $showStartDate to "."$showEndDate" ?></span></a>;
        <a href="pGroupList"><input type="radio" id="groupB" name="groupID" <?php if($thisWeekGroup==2) echo "checked" ?>>Group B
            <span id="spanIDB" style="color:brown"><?php if($thisWeekGroup==2) echo "=> $showStartDate to "."$showEndDate" ?></span></a>;
        <a href="pGroupList"><input type="radio" id="groupC" name="groupID" <?php if($thisWeekGroup==3) echo "checked" ?>>Group C
            <span id="spanIDC" style="color:brown"><?php if($thisWeekGroup==3) echo "=> $showStartDate to "."$showEndDate" ?></span></a>;
        <a href="pGroupList"><input type="radio" id="groupD" name="groupID" <?php if($thisWeekGroup==4) echo "checked" ?>>Group D
            <span id="spanIDD" style="color:brown"><?php if($thisWeekGroup==4) echo "=> $showStartDate to "."$showEndDate" ?></span></a>;
        <p id="weekNo">Start date of the week and Group of the Week</p>
    </div>
    <div class="groundContainer">
        <div class="section1">
            Sec1<br>
            <a href="index.php?hello=true&memid1=FS/M-V/001" ><button >1</button></a>
            <!-- <button onclick="changeText('1')">1</button> -->
            <button onclick="changeText('2')">2</button>
            <button onclick="changeText('3')">3</button>
            <button onclick="changeText('4')">4</button>
            <a href="index.php?hello=true&memid1=FS/M-V/005" ><button >5</button></a>
            <!-- <button >5</button> -->
            <a href="index.php?hello=true&memid1=FS/M-V/006" ><button >6</button></a>
            <!-- <button >6</button> -->
            <button >7</button>
            <button >8</button>
            <button >9</button>
            <button >10</button>
            <button >11</button>
            <p id="demo"></p> 
        </div>
        <div class="section2">
            Sec2<br>
            <div><button onclick="changeText()">12</button></div>
            <div><button >13</button></div>
            <div><button >14</button></div>
            <div><button >15</button></div>
            <div><button >16</button></div>
            <div><button >17</button></div>
            <div><button >18</button></div>
            <div><button >19</button></div>
            <div><button >20</button></div>
            <div><button >21</button></div>
            <div><button >22</button></div>
            <div><button >23</button></div>
            <div><button >24</button></div>
        </div>
        <div class="section3">
            Sec3<br>
            <div><button onclick="changeText()">25</button></div>
            <div><button >26</button></div>
            <div><button >27</button></div>
            <div><button >28</button></div>
            <div><button >29</button></div>
            <div><button >30</button></div>
        </div>
        <div class="section4">
            Sec4<br>
            <div><button onclick="changeText()">31</button></div>
            <div><button >32</button></div>
            <div><button >33</button></div>
            <div><button >34</button></div>
            <div><button >35</button></div>
            <div><button >36</button></div>
            <div><button >37</button></div>
            <div><button >38</button></div>
            <div><button >39</button></div>
            <div><button >40</button></div>
            <div><button >41</button></div>
            <div><button >42</button></div>
            <div><button >43</button></div>
            <div><button >44</button></div>
            <div><button >45</button></div>
            <div><button >46</button></div>
            <div><button >47</button></div>
            <div><button >48</button></div>
        </div>
        <div class="section5">
            Sec5<br>
            <div><button onclick="changeText()">49</button></div>
            <div><button >50</button></div>
            <div><button >51</button></div>
            <div><button >52</button></div>
            <div><button >53</button></div>
            <div><button >54</button></div>
            <div><button >55</button></div>
            <div><button >56</button></div>
            <div><button >57</button></div>
            <div><button >58</button></div>
            <div><button >59</button></div>
            <div><button >60</button></div>
            <div><button >61</button></div>
            <div><button >62</button></div>
            <div><button >63</button></div>
        </div>
        <div class="section6">
            Sec6<br>
            <div><button onclick="changeText()">64</button></div>
            <div><button >65</button></div>
            <div><button >66</button></div>
            <div><button >67</button></div>
            <div><button >68</button></div>
            <div><button >69</button></div>
            <div><button >70</button></div>
            <div><button >71</button></div>
            <div><button >72</button></div>
            <div><button >73</button></div>
            <div><button >74</button></div>
            <div><button >75</button></div>
        </div>
        <div class="section7">
            Sec7<br>
            <div><button onclick="changeText()">76</button></div>
            <div><button >77</button></div>
            <div><button >78</button></div>
            <div><button >79</button></div>
            <div><button >80</button></div>
            <div><button >81</button></div>
            <div><button >82</button></div>
            <div><button >83</button></div>
            <div><button >84</button></div>
        </div>
        <div class="details" style="overflow-y: auto;" >
            <table height="100%" width="100%" >
                <colgroup>
                    <col />
                    <col style="background-color: lightgreen" />
                </colgroup>
                <tr><th colspan="2">Member Details</th></tr>
                <tr><td>Member ID :</td><td id="memID">
                    <?php 
                        dispMemID($result);
                    ?></td></tr>
                <tr><td>Nick Name :</td><td id="memNickName">
                    <?php 
                        dispMemNickName($result);
                    ?></td></tr>
                <tr><td>Full Name :</td><td id="memRealName" >
                    <?php 
                        dispMemFullName($result);
                    ?></td></tr>
                <tr><td>Full NIC :</td><td id="memNIC">
                    <?php 
                        dispMemNIC($result);
                    ?></td></tr>
                <tr><td>Address :</td><td id="memAddress">
                    <?php 
                        dispMemAddress($result);
                    ?></td></tr>
                <tr><td>Telephone :</td><td id="memTel">
                    <?php 
                        dispMemTelephone($result);
                    ?></td></tr>
            </table>
        </div>
    </div>
    
    <h1 class="bigHeading">
        App for Registration
    </h1>
    <div>
        <table id="table1" style='border : 2px solid black; border-spacing: 5px; padding:2px;' >
            <tr>
                <td>Mytable1</td>
                <td>mytab2</td>
                <td>This</td>
            </tr>
            <tr>
                <td>Abc</td>
                <td>Sdf</td>
                <td>mhj</td>
            </tr>
        </table>
    </div>

    <script>
        
    </script>

</body>
</html>





