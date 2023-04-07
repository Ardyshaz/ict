<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>PPDKU User ICT Equipment List</title>
 
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">UNIT ICT PPDKU</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://www.codeofaninja.com/2014/05/bootstrap-tutorial-beginners-step-step.html" target="_blank">Tutorial</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://www.codeofaninja.com" target="_blank">Blog</a>
        </li>
        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Something else here</a>
    </div>
</li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
</form>
</div>
</nav>
<div class="mt-0 p-5 bg-primary text-white rounded-0">
  <h1>Maklumat Pegawai PPDKU, beserta Aset ICT-nya</h1>
  <p>Lorem ipsum...</p>
</div>
<!-- /navbar -->
<div class="container mt-5">
<div class="row">
    <div class="col-sm">
        <h1>PPDKU User ICT Equipment List</h1>
    </div>
</div>

<?php
// include database connection
include 'config/database.php';
// PAGINATION VARIABLES
// page is the current page, if there's nothing set, default is page 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;
// set records or rows of data per page
$records_per_page = 5;
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;
// delete message prompt will be here
// select all data
// select data for current page
$query = "SELECT id, nama, jawatan, gred, No_KP, No_Telefon, sektor, unit, model_pc, model_laptop, model_printer, catatan FROM user_info ORDER BY id DESC
	LIMIT :from_record_num, :records_per_page";
$stmt = $con->prepare($query);
$stmt->bindParam(":from_record_num", $from_record_num, PDO::PARAM_INT);
$stmt->bindParam(":records_per_page", $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// this is how to get number of rows returned
$num = $stmt->rowCount();
// link to create record form
echo "<a href='create.php' class='btn btn-primary m-b-1em'>Create New User</a>";
//check if more than 0 record found
if($num>0){
	//start table
    echo "<table class='table table-hover table-responsive table-bordered table-sm table-striped'>";
//creating our table heading
    echo "<tr>
	        <th>ID</th>
	        <th>Nama</th>
	        <th>Jawatan</th>
	        <th>Gred</th>
	        <th>No KP</th>
	        <th>No Telefon</th>
	        <th>Sektor</th>
	        <th>Unit</th>
	        <th>Model PC</th>
	        <th>Model Laptop</th>
	        <th>Model Printer</th>
	        <th>Catatan</th>
        </tr>";
// retrieve our table contents
// fetch() is faster than fetchAll()
// http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	// extract row
	// this will make $row['firstname'] to
	// just $firstname only
	extract($row);
	// creating new table row per record
	echo "<tr>
		<td>{$id}</td>
		<td>{$nama}</td>
		<td>{$jawatan}</td>
		<td>{$gred}</td>
		<td>{$No_KP}</td>
		<td>{$No_Telefon}</td>
		<td>{$sektor}</td>
		<td>{$unit}</td>
		<td>{$model_pc}</td>
		<td>{$model_laptop}</td>
		<td>{$model_printer}</td>
		<td>{$catatan}</td>
		<td>";
			// read one record
			echo "<a href='read_one.php?id={$id}' class='btn btn-info m-r-1em'>Read</a>";
			// we will use this links on next part of this post
			echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";
			// we will use this links on next part of this post
			echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Delete</a>";
		echo "</td>";
	echo "</tr>";
}
// end table
// PAGINATION
// count total number of rows
$query = "SELECT COUNT(*) as total_rows FROM user_info";
$stmt = $con->prepare($query);
// execute query
$stmt->execute();
// get total rows
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_rows = $row['total_rows'];
// paginate records
$page_url="index.php?";
include_once "paging.php";
echo "</table>";
}
// if no records found
else{
	echo "<div class='alert alert-danger'>No records found.</div>";
}
?>
    <!-- alert will be here -->
    <!-- table will be here -->
	
</div>
	
 
<!-- javascript for bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
 
</body>
</html>