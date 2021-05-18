<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    
    <title>php crud</title>
</head>
<body>


  <?php require_once 'process.php'; ?>
<?php
if(isset($_SESSION['message'])): ?>
<div class="alert  alert-<?=$_SESSION['msg_type']?>">

<?php
   echo $_SESSION['message'];
   unset($_SESSION ['message']);
?>
</div>
<?php endif ?>  

<div class="container">
<?php 
    $mysqli = new mysqli('localhost','root','','crud');
    $result = $mysqli->query("SELECT * FROM data");
?>
       <div class="row justify-content-center">
          <table class="table">
               <thead>
                   <tr>
                       <th>Name</th>
                       <th>Location</th>
                       <th colspan="2">Action</th>
                   </tr>
              </thead>
              <?php
              while($row = mysqli_fetch_array($result)): ?>

              <tr>
              <td><?php echo $row['name']; ?> </td>
              <td><?php echo $row['location']; ?> </td>
              
              <td>
              <a href="index.php?edit=<?php echo $row['id']; ?>"
                     class="btn btn-info">Edit</a>
              <a href="process.php?delete=<?php echo $row['id']; ?>"
                     class="btn btn-danger">delete</a>
              </td>
              
              </tr>
              <?php endwhile; ?>
          </table>
       </div>
     
<div class="row justify-content-center">
<form action="process.php"method="POST">
<div class="form-group">
<input type="hidden"name="id" value="<?php echo $id ?>">
</div>
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
    </div>
   <div class="form-group">
       <label>location</label>
       <input type="text" class="form-control" name="location" value="<?php echo $location ?>">
   </div>
   <div class="form-group">
    <?php
    if($update == true):
        ?>
       <input type="submit"class="btn btn-info" name="update" value="update">
       <?php else: ?>
        <input type="submit"class="btn btn-primary"  name="submit" value="submit">
        <?php endif; ?>

    </div>
 </form>
</div>
</div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> 
</body>
</html>