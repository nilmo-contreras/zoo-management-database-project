<link rel="stylesheet" href="tableCss.css"/>
<style>
body { 
  background: url('https://images.unsplash.com/photo-1611418612389-3e442c6c8a26?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8c2F2YW5hfGVufDB8fDB8fA%3D%3D&w=1000&q=80') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.vis {
  background-color: CornflowerBlue;
  color: black;
  border: 2px solid black;
  text-align: center;
}
.btn-group button {
  background-color: CornflowerBlue; 
  color: black; 
  padding: 10px 24px; 
  cursor: pointer; 
  float: left; 
}

.btn-group:after {
  content: "";
  clear: both;
  display: table;
}

.btn-group button:not(:last-child) {
  border-right: none;
}

</style>
<div class="btn-group">
<form  action="ZooHomepage.html">
  <button>Go back to Homepage</button>
</form>
<form  action="animals.php">
  <button>View Animals</button>
</form>
<form  action="staff.php">
  <button>View Staff</button>
</form>
<form  action="zoo.php">
  <button>View Zoos</button>
</form>
</div>
<?php
include 'connectDB.php';
$sql = "SELECT * FROM `zoo` INNER JOIN `enclosures` WHERE `enclosures`.`zookey`=`zoo`.`zookey`";;

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Enclosure ID</th>";
                echo "<th>Zoo Name</th>";
                echo "<th>Biome</th>";
                echo "<th>Address</th>";
                echo "<th>Comments</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row[5] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[8] . "</td>";
                echo "<td>" . $row[2] . "</td>";
		    echo "<td>" . $row[9] . "</td>";
                echo "</tr>";
        }
        echo "</table>";

        mysqli_free_result($result);
    }else{
        echo '<script>alert("No Stylists Were Founds")</script>';
    } 
}else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 

mysqli_close($link);
?>