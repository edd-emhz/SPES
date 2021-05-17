  <!-- CONNECTION -->
  <?php
    include 'connectDb.php';
    session_start();
    $id=$_SESSION['id'] ;
    $query=mysqli_query($db,"SELECT * FROM spesaccounts where id='$id'")or die(mysqli_error());
    $row=mysqli_fetch_array($query);
    if($_SESSION['login']!==true){
        header('location:index.php');
    }
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- STYLE -->
    <link rel="stylesheet" href="pStyle.css">

  <title>Student Profile</title>
  </head>

  <!-- BODY -->
  <body>
      <div class="footer">
      <img src="top-banner.jpg">
      </div>
                <?php
                if(isset($_POST['logout'])){
                    session_destroy();
                    header('location:index.php');
                }
    
                ?>

  <!--NAV BAR-->
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="home.php"><b>SPES</b></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="profile.php">Profile</a>
              </li>
<!--               <li class="nav-item">
                <a class="nav-link" href="#">Check Application</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="events.html">Events</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
              <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Downloadable Forms</a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">            
                      <li><a class="dropdown-item" href="/SPES/SPESforms" download="SPES FORM 2.pdf">SPES FORM 2</a></li>
                      <li><a class="dropdown-item" href="/SPES/SPESforms" download="NSRP.pdf">NSRP</a></li>
                      <li><a class="dropdown-item" href="/SPES/SPESforms" download="PESO AUTHORIZATION LETTER.pdf">PESO AUTHORIZATION LETTER</a></li>
                    </ul>
              </li>  
              </ul>
              <ul class="nav justify-content-end">
              <li class="nav-item">
                <button name="logout" class="btn btn-danger my-2" data-toggle="modal" data-target="#signoutModal">Logout</button>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      
<!-- Signin Modal -->
        <div class="modal fade" id="signoutModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="signinLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="signinlLabel">Are you sure to sign-out?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="modalFormWrapper">
                        <form action="logout.php" method="POST">
                          <button type="submit" class="btn btn-primary">Confirm</button>
                        </form>
                        </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<!--FORM-->
<hr>
<div class="form-group">
<div class="container">    
    <h1>Student Profile</h1>
    <br>
      <form action="editProfile.php" method="POST">
        <h6>Personal Information</h6>
        <div class="form-row">
        <div class="col-sm-3">
          <label class="col-form-label" for="sName">Surname:</label>
          <input type="text" class="form-control" name="sName" value="<?php echo $row['surName']; ?>" required>
        </div>
        <div class="col-sm-3">
          <label class="col-form-label" for="fName">First Name:</label>
          <input type="text" class="form-control" name="fName" value="<?php echo $row['firstName']; ?>" required>
        </div>
        <div class="col-sm-3">
          <label class="col-form-label" for="mName">Middle Name:</label>
          <input type="text" class="form-control" name="mName" value="<?php echo $row['mName']; ?>" required>
        </div>
        <div class="col">
            <label class="col-form-label" for="stat">Status:</label>
            <select name="stat"  class="form-control" value="<?php echo $row['status']; ?>">
            <option value="single">Single</option>
            <option value="married">Married</option>
            <option value="widow">Widow/er</option>
            <option value="seperated">Seperated</option>
          </select>
        </div>
        <div class="col">
          <label class="col-form-label" for="sex">Gender:</label>
          <select name="sex"  class="form-control" value="<?php echo $row['gender']; ?>">
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
        </div>
        <div class="form-row">
        <div class="col-sm-3">
          <label class="col-form-label" for="uName">Username:</label>
          <input type="text" class="form-control" name="uName" value="<?php echo $row['username']; ?>" required>
        </div>
        <div class="col-sm-3">
          <label class="col-form-label" for="pass">Password:</label>
          <input type="password" class="form-control" name="pass" pattern=".{6,}" title="Six or more characters" value="<?php echo $row['password']; ?>" required>
        </div>
        <div class="col">
          <label class="col-form-label" for="dob">Date of Birth:</label>
          <input type="date" class="form-control" name="dob" value="<?php echo $row['doBirth']; ?>" required>
        </div>
        <div class="col">
          <label class="col-form-label" for="pob">Place of Birth:</label>
          <input type="text" class="form-control" name="pob" value="<?php echo $row['poBirth']; ?>" required>
        </div>
        </div>
        <div class="form-row">
        <div class="col-sm-4">
          <label class="col-form-label" for="cship">Citizenship:</label>
          <input type="text" class="form-control" name="cship" value="<?php echo $row['cShip']; ?>" required>
        </div>
        <div class="col">
          <label class="col-form-label" for="gsis">GSIS Beneficiary:</label>
          <input type="text" class="form-control" name="gsis" value="<?php echo $row['gsisBeneficiary']; ?>" required>
        </div>
        <div class="col">
          <label class="col-form-label" for="relation">Relationship:</label>
          <input type="text" class="form-control" name="relation" value="<?php echo $row['relationship']; ?>" required>
        </div>
        </div>
        <br><br> 
        <h6>Contact Information</h6>
        <div class="form-row">
        <div class="col-sm-6">
          <label class="col-form-label" for="pAdd">Permanent Address:</label>
          <textarea class="form-control" name="pAdd" value="<?php echo $row['pAdd']; ?>" rows="1" style="background: transparent; font-size: 14px; border: none; border-bottom: 2px solid #000;"></textarea>
        </div>
        <div class="col-sm-6">
          <label class="col-form-label" for="cAdd">Current Address:</label>               
          <textarea class="form-control" name="cAdd" value="<?php echo $row['pAdd']; ?>" rows="1"style="background: transparent; font-size: 14px; border: none; border-bottom: 2px solid #000;"></textarea>
        </div>
        </div>
        <div class="form-row">
        <div class="col-sm-4">
          <label class="col-form-label" for="phone">Mobile No.:</label>
          <input type="text" class="form-control" name="phone" value="<?php echo $row['mNo']; ?>" required>
        </div>
        <div class="col-sm-4">
          <label class="col-form-label" for="email">Email:</label>
          <input type="email" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo $row['email']; ?>" required>
        </div>
        <div class="col-sm-4">
          <label class="col-form-label" for="socialmedia">Social Media Account:</label>
          <input type="text" class="form-control" name="socialmedia" value="<?php echo $row['socialAcc']; ?>" required> 
        </div>
        </div>
        <br><br> 
        <h6>Parents Information</h6>
        <div class="form-row">
        <div class="col-sm-2">
            <label class="col-form-label" for="pstat">Parent status:</label>
            <select name="pstat" class="form-control" value="<?php echo $row['pStatus']; ?>">
            <option value="living">Living Together</option>
            <option value="solo">Solo Parent</option>
            <option value="seperate">Seperated</option>
            </select>
        </div>
        </div>
        <div class="form-row">
        <div class="col-sm-4">
          <label class="col-form-label" for="father">Father's Name:</label>
          <input type="text" class="form-control" name="father" value="<?php echo $row['fatherName']; ?>" required>
        </div>
        <div class="col-sm">
          <label class="col-form-label" for="fcnumber">Contact #:</label>
          <input type="text" class="form-control" name="fcnumber" value="<?php echo $row['fCNo']; ?>" required>
        </div>
        <div class="col-sm">
          <label class="col-form-label" for="fpstat">Status:</label>
            <select name="fpstat" class="form-control" value="<?php echo $row['fStatus']; ?>">
            <option value="fnone">-------------------------</option>
            <option value="fpwd">Person With Disability</option>
            <option value="fsenior">Senior Citizen</option>
            <option value="fip">Indigeneous People</option>
            <option value="fdw">Displaced Worker</option>
            </select>
        </div>
        <div class="col">
          <label class="col-form-label" for="foccupation">Occupation:</label>
          <input type="text" class="form-control" name="foccupation" value="<?php echo $row['fOccu']; ?>" required>
        </div>
        <div class="col">
          <label class="col-form-label" for="fsalary">Salary:</label>
          <input type="text" class="form-control" name="fsalary" value="<?php echo $row['fSalary']; ?>" required>
        </div>
        </div>
        <br>
        <div class="form-row">
        <div class="col-sm-4">
          <label class="col-form-label" for="mother">Mother's Name:</label>
          <input type="text" class="form-control" name="mother" value="<?php echo $row['motherName']; ?>" required>
        </div>
        <div class="col-sm">
          <label class="col-form-label" for="mcnumber">Contact #:</label>
          <input type="text" class="form-control" name="mcnumber" value="<?php echo $row['mCNo']; ?>" required>
        </div>
        <div class="col-sm">
          <label class="col-form-label" for="mpstat">Status:</label>
            <select name="mpstat" class="form-control" value="<?php echo $row['mStatus']; ?>">
            <option value="mnone">-------------------------</option>
            <option value="mpwd">Person With Disability</option>
            <option value="msenior">Senior Citizen</option>
            <option value="mip">Indigeneous People</option>
            <option value="mdw">Displaced Worker</option>
            </select>
        </div>
        <div class="col">
          <label class="col-form-label" for="moccupation">Occupation:</label>
          <input type="text" class="form-control" name="moccupation" value="<?php echo $row['mOccu']; ?>" required>
        </div>
        <div class="col">
          <label class="col-form-label" for="msalary">Salary:</label>
          <input type="text" class="form-control" name="msalary" value="<?php echo $row['mSalary']; ?>" required>
        </div>
        </div>
        <br><br>
        <h6>Educational Information</h6>
        <div class="form-row">
        <div class="col-sm-1">
          <label>Elementary:</label>
        </div>
        <div class="col-sm">
          <input type="text" class="form-control" name="eSn" placeholder="School Name" value="<?php echo $row['elemSName']; ?>">
        </div>
        <div class="col-sm">
          <input type="text" class="form-control" name="eDec" placeholder="Degree Earned/Course" value="<?php echo $row['elemDegree']; ?>">
        </div>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="eYl" placeholder="Year/Level" value="<?php echo $row['elemYearLvl']; ?>">
        </div>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="eDa" placeholder="Date attended" value="<?php echo $row['elemDEnd']; ?>">
        </div>
        </div>
        <div class="form-row">
        <div class="col-sm-1">
          <label>Secondary: </label>
        </div>
        <div class="col-sm">
          <input type="text" class="form-control" name="sSm" placeholder="School Name" value="<?php echo $row['secondSName']; ?>">
        </div>
        <div class="col-sm">
          <input type="text" class="form-control" name="sDec" placeholder="Degree Earned/Course" value="<?php echo $row['secondDegree']; ?>">
        </div>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="sYl" placeholder="Year/Level" value="<?php echo $row['secondYearLvl']; ?>">
        </div>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="sDa" placeholder="Date attended" value="<?php echo $row['secondDEnd']; ?>">
        </div>
        </div>
        <div class="form-row">
        <div class="col-sm-1">
          <label>Tertiary : </label>
        </div>
        <div class="col-sm">
          <input type="text" class="form-control" name="tSm" placeholder="School Name" value="<?php echo $row['tertSName']; ?>">
        </div>
        <div class="col-sm">
          <input type="text" class="form-control" name="tDec" placeholder="Degree Earned/Course" value="<?php echo $row['tertDegree']; ?>">
        </div>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="tYl" placeholder="Year/Level" value="<?php echo $row['tertYearLvl']; ?>">
        </div>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="tDa" placeholder="Date attended" value="<?php echo $row['tertDEnd']; ?>">
        </div>
        </div>
        <div class="form-row">
        <div class="col-sm-1">
          <label>Tech-Voc : </label>
        </div>
        <div class="col-sm">
          <input type="text" class="form-control" name="tecSm" placeholder="School Name" value="<?php echo $row['tecSName']; ?>">
        </div>
        <div class="col-sm">
          <input type="text" class="form-control" name="tecDec" placeholder="Degree Earned/Course" value="<?php echo $row['tecDegree']; ?>">
        </div>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="tecYl" placeholder="Year/Level" value="<?php echo $row['tecYearLvl']; ?>">   
        </div>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="tecDa" placeholder="Date attended" value="<?php echo $row['tectDEnd']; ?>">
        </div>
        </div>
        <br><br>
        <div class="form-row">
        <div class="col-sm-4">
          <label class="col-form-label" for="spesAvail">History of SPES Availment:</label>
          <select name="spesAvail" class="form-control" value="<?php echo $row['historySpes']; ?>">
          <option value="one">1st Availment</option>
          <option value="two">2nd Availment</option>
          <option value="three">3rd Availment</option>
          <option value="four">4th Availment</option>
          </select>
        </div>
        <div class="col">
          <label class="col-form-label" for="spesYear">Year:</label>
          <input type="text" class="form-control" name="spesYear" value="<?php echo $row['historyYear']; ?>">
        </div>
        <div class="col">
          <label class="col-form-label" for="spesID">SPES ID No.:</label>
          <input type="text" class="form-control" name="spesID" value="<?php echo $row['spesID']; ?>">
        </div>
        </div>
        <br>
        <div class="form-row">
        <div class="col-5">
        </div>
        <div class="col-auto">
          <input type="submit" class="form-control" name="profileSubmit">
        </div>
        <div class="col-5">
        </div>
        </div>
        </form>
<!--    </form>-->

    <script src="bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>

  </body>
</html>
