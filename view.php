
    
<?php

$servername='localhost';
$username='root';
$password='';
$dbname = "gokulraj";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
  if(!$conn){
      die('Could not Connect MySql Server:' .mysql_error());
    }


  //   $sql="SELECT * FROM `img_data` "; 
  //   $result=mysqli_query($conn,$sql);

  //  if( $row=mysqli_fetch_assco($result)){
  //    echo 'data viewed';
  //  }else{
  //   echo 'not connected';
  //  }
     
  //   while($row=mysqli_fetch_assco($result)){
  //      $id=$row['id'];
  //      $name=$row['name'];
  //      $image=$row['image'];
   

  //     echo'data viewed';

  //      echo('<tr>');
  //      echo('<td>').$row ['id'].('</td>');
  //      echo('<td>').$row ['name'].('</td>');
  //      echo('<td>').<img src=".$row ['image']."/>.('</td>');
  //      echo('</tr>');
     
  //   };


// connect to db




$results = $conn->query("SELECT * FROM img_data");
?>

<?php while ($data = $results->fetch_assoc()): ?>

    <tr>
        <td><?php echo $data['id'] ?></td>
        <td><?php echo $data['name'] ?></td>
        <td><img src="<?php echo $data['image'] ?>"  alt="show image" /></td>
    </tr>
<?php endwhile; ?>




