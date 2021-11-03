<?php
    require_once 'configs/db.php';
    include('includes/header.php'); 
    include('includes/navbar.php'); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>
<body>
	<div class="container">
		<form action="includes/create.php" 
		      method="post">
            
		   <h4 class="display-4 text-center">Create</h4><hr><br>
		   <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>
		   <div class="form-group">
		     <label for="username">Name</label>
		     <input type="username" 
		           class="form-control" 
		           id="username" 
		           name="username" 
		           value="<?php if(isset($_GET['username']))
		                           echo($_GET['username']); ?>" 
		           placeholder="Enter username">
		   </div>

		   <div class="form-group">
		     <label for="email">Email</label>
		     <input type="email" 
		           class="form-control" 
		           id="email" 
		           name="email" 
		           value="<?php if(isset($_GET['email']))
		                           echo($_GET['email']); ?>"
		           placeholder="Enter email">
		   </div>

		   <button type="submit" 
		          class="btn btn-primary"
		          name="create">Create</button>
		    <a href="layoutUser.php" class="link-primary">View</a>
	    </form>
	</div>
</body>
</html>