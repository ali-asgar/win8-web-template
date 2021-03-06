<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Insert &middot; Template</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Insert">
		<meta name="author" content="Ali">

		<!-- Le styles -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js'></script>
		<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.js'></script>
		<script src="js/bootstrap.min.js"></script>
	</head>

	<body>

		<div class="navbar navbar-fixed-top" id = "navbar_top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="#">
						Template
					</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li><a href="index.php">View</a></li>
						</ul>
						<ul class="nav">
							<li class="active"><a href="insert.php">Insert</a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
		<hr>
		<div class = "row" style = "margin-top:1em;">
		</div>

		<div class="container"> 
			<header class="jumbotron subhead" id="overview">
				<div class="row-fluid">
					<div class="span6 page-header">
						<h1>
							Template
							<small>Insert Page</small>
						</h1>
					</div>
				</div>
			</header>

			<div class = "row-fluid">
				<div class="span12">

					<section>
						<div class="page-header">
							<h2>Insert</h2>
						</div>
						<div class="row">
							<div class="span7 offset1">
								<div class="alert alert-success">
									<a class="close">&times;</a>
									<?php
									
										include_once('config.ini');
										$result = pg_query($db, "select * from $tname limit 1");
										$i = 1;
										$field_name_row = array();
										$field_value_row = array();
										while($i < pg_num_fields($result)) 
										{
											$fieldName = pg_field_name($result, $i);
											
											$value = $_POST[$fieldName];
											if($value) {
												$field_name_row[] = $fieldName;
												$field_value_row[] = $value;
											}
											$i++;
										}

										$query = "INSERT INTO template (".implode(", ",$field_name_row).") VALUES ('".implode("', '",$field_value_row)."');";

										$result = pg_query($db, $query);

										echo "Inserted Successfully";
									
									?>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</body>
</html>