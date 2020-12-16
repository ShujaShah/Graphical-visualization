<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome To Graphical Visualisation </title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>


    <![endif]-->

    <script type="text/javascript">
      function relocate(location) {
        window.location = location;
      }
    </script>

</head>

<body >

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Welcome to Graphical Visualization of Data</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
               
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="../pages/index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                       
                       <li>
                            <a href="../php/mainphp.php"><i class="fa fa-dashboard fa-fw"></i>Main Page</a>
                        </li>
                     
                        <li>
                            <a href="../pages/Registration.html"><i class="fa fa-file-text fa-fw"></i> Registration</a>
                        </li>
                        <li>
                            <a href="../pages/Attendence.html"><i class="fa  fa-book fa-fw"></i> Attendence</a>
                        </li>
                         <li>
                            <a href="../pages/ProgressReport.html"><i class="fa  fa-book fa-fw"></i> Progress Report</a>
                        </li>
                         <li>
                            <a href="../pages/SyllabusStats.html"><i class="fa  fa-book fa-fw"></i> Syallabus stats</a>
                        </li>
                    
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="panel-body">
          <table width="100%" class="table table-striped table-bordered table-hover" id="MyTable">
           <thead>
            <tr>
             
              <th>ID</th>
              <th>Name</th>
              <th>Enroll</th>
              <th>Semester</th>
              <th>Section</th>
              <th>Address</th>
              <th>Visualise</th>
           </tr>
          </thead>
          <tbody>
                                        
            <?php 
               include 'DBconnection.php';

                $qry ="select * from registered_students";

                $result = $cn->query($qry);

                while ($row = $result->fetch_assoc())
    
             {?>
              <tr >
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['studentname'];?></td>
              <td><?php echo $row['enroll']; ?></td>
              <td><?php echo $row['semester']; ?></td>
              <td><?php echo $row['section']; ?></td>
              <td><?php echo $row['stdaddress']; ?></td>
              <td><button name="<?php $row['studentname']; ?>" onclick="relocate('collective.php?enroll=<?php echo $row['enroll'];?>');">visualise<?php  echo " ". $row['studentname']; ?></button></td>
              </tr> 
             <?php 
              }

            ?>

        </tbody>
     </table>
     </div>


                <!-- /.col-lg-12 -->
            
        </div>

             
                
        <!-- /#page-wrapper -->

    
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/mymorris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
