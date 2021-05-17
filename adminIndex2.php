<?php
    session_start();
    include("function.php");
    if($_SESSION['login']!==true){
        header('location:adminLogin.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>
    Admin Control Page
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="bootstrap@4.5.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.css">
<!-- <link href="css2/bootstrap.css" rel="stylesheet">
<link href="css2/bootstrap.min.css" rel="stylesheet"> -->
<!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="adminStyle.css">
</head> 

<?php
      connectme();
      $result = mysql_query("SELECT * FROM spesdb.pesoadmin");
 ?>

<body>
	<script>

	function confirmDelete(id)
	{
		if(confirm("Are you sure you want to delete this record?"))
		{
			window.location.href='delete_admin.php?deluserids='+id;
			return true;
		}
	}
	</script>
</head>
<body>
     <?php
                if(isset($_POST['logout'])){
                    session_destroy();
                    header('location:adminIndex2.php');
                }
    
                ?>
     <div class="form-group">
      <div class="footer">
        <img src="top-banner.jpg">
        </div>
         <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="adminIndex.php"><b>SPES Admin</b></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="adminIndex.php">SPES Accounts</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="adminIndex2.php">Admin Account</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="SPESpending.php">SPES Pending Accounts</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="spesDeployment.php">SPES Deployment</a>
              </li>  
              </ul>
              <ul class="nav justify-content-end">
              <li class="nav-item">
                <form method="post">
                <button name="logout" class="btn btn-danger my-2">Logout</button>
              </form>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      </div>

	<div class="form-row">
		<div class="container">
		<div class="content">
			<form name="form1" method="post" action="adminIndex2.php">
				<!-- <h3>Accounts</h3> -->
				<a href='add_admin.php' id="wew" target="_blank" onclick="window.open('add_admin.php','pagename','resizable,height=400,width=500'); return false;">Add Account</a>
                <div class="table-responsive">
                	<table id="example" class="display table-striped" style="width:100%; height: 100%;">
            		<thead>		       
						<tr>
							<th>Action</th>
							<th>Username</th>
							<th>Password</th>
							<th>Full Name</th>
							<th>Position</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$result = mysql_query("SELECT * FROM pesoadmin"); 
						// $result=mysql_query($getusers);

						while($row=mysql_fetch_array($result)) 
						{ 

							$useridss = $row['userId'];
							$username = $row['adminUName'];
							$userpass = $row['adminPass'];
							$fName = $row['fullName'];
							$positon = $row['possition'];

							?>
							<tr>
								<td>
								<a href='update_adminuser.php' target="_blank" onclick="window.open('update_adminuser.php?userId=<?php echo $row['userId'] ?>','pagename','resizable,height=540,width=540'); return false;"><img src="images2/icon_view.png" height='18px'></a>
								 |
								<a href="javascript:confirmDelete(<?php echo $useridss; ?>)"><img src="images2/icon_delete.png" height='18px'></a>
								</td>
								<td><?php echo $username; ?></td>
								<td><?php echo $userpass; ?></td>								
								<td><?php echo $fName; ?></td>								
								<td><?php echo $positon; ?></td>
							</tr>
							<?php
						}
					?>
					</tbody>
					</table>
                </div>
                <input type="hidden" name="vftrmonth" id="vftrmonth" value="<?php echo $vftrmonth; ?>">
                <input type="hidden" name="vftryear" id="vftryear" value="<?php echo $vftryear; ?>">
			</form>
		</div>
	</div>
</div>
</div>

    
    <script src="bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
</body>
<script>
var addurl = 'add_user.php';
var demowin = 'demo_win';

$(document).ready(function() {
    $('#example').DataTable( { 
        "order": [[ 0, "desc" ]],
        scrollY:        '66vh',
        scrollCollapse: true,
        paging:         false,
        "scrollX": true,
        "dom": '<"toolbar">frtip'
    } );
    
    $("div.toolbar").html("<a href='javascript:void(0)' onclick='centerPopupWindow(500,550,20,add_user.php,demowin);'><img src='images2/clip_add.png' title='Add' height='30px'>");
} );

</script>
</html>