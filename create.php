<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>ICT User Equipment List</title>
 
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
 
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
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
<!-- /navbar -->
<div class="container mt-5">
<div class="row">
    <div class="col-sm">
        <h1>ICT User Equipment List</h1>
    </div>
</div>
    <!-- alert will be here -->
    <!-- table will be here -->
</div>
<!-- container -->
<div class="container">
        <div class="page-header">
            <h1>Create New User</h1>
        </div>
        <?php
if($_POST){
	// include database connection
	include 'config/database.php';
	try{
		// insert query
		$query = "INSERT INTO user_info SET nama=:nama, jawatan=:jawatan, gred=:gred, No_KP=:No_KP, No_Telefon=:No_Telefon, sektor=:sektor, unit=:unit, model_pc=:model_pc, model_laptop=:model_laptop, model_printer=:model_printer, catatan=:catatan, created=:created";
		// prepare query for execution
		$stmt = $con->prepare($query);
		// posted values
		$nama=htmlspecialchars(strip_tags($_POST['nama']));
		$jawatan=htmlspecialchars(strip_tags($_POST['jawatan']));
		$gred=htmlspecialchars(strip_tags($_POST['gred']));
		$No_KP=htmlspecialchars(strip_tags($_POST['No_KP']));
		$No_Telefon=htmlspecialchars(strip_tags($_POST['No_Telefon']));
		$sektor=htmlspecialchars(strip_tags($_POST['sektor']));
		$unit=htmlspecialchars(strip_tags($_POST['unit']));
		$model_pc=htmlspecialchars(strip_tags($_POST['model_pc']));
		$model_laptop=htmlspecialchars(strip_tags($_POST['model_laptop']));
		$model_printer=htmlspecialchars(strip_tags($_POST['model_printer']));
		$catatan=htmlspecialchars(strip_tags($_POST['catatan']));
		// bind the parameters
		$stmt->bindParam(':nama', $nama);
		$stmt->bindParam(':jawatan', $jawatan);
		$stmt->bindParam(':gred', $gred);
		$stmt->bindParam(':No_KP', $No_KP);
		$stmt->bindParam(':No_Telefon', $No_Telefon);
		$stmt->bindParam(':sektor', $sektor);
		$stmt->bindParam(':unit', $unit);
		$stmt->bindParam(':model_pc', $model_pc);
		$stmt->bindParam(':model_laptop', $model_laptop);
		$stmt->bindParam(':model_printer', $model_printer);
		$stmt->bindParam(':catatan', $catatan);
		// specify when this record was inserted to the database
		$created=date('Y-m-d H:i:s');
		$stmt->bindParam(':created', $created);
		// Execute the query
		if($stmt->execute()){
			echo "<div class='alert alert-success'>Record was saved.</div>";
		}else{
			echo "<div class='alert alert-danger'>Unable to save record.</div>";
		}
	}
	// show error
	catch(PDOException $exception){
		die('ERROR: ' . $exception->getMessage());
	}
}
?>
<!-- html form here where the product information will be entered -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<table class='table table-hover table-responsive table-bordered'>
		<tr>
			<td>Nama</td>
			<td><input type='text' name='nama' class='form-control' /></td>
		</tr>
		<tr>
			<td>Jawatan</td>
			<td><textarea name='jawatan' class='form-control'></textarea></td>
		</tr>
		<tr>
			<td>Gred</td>
			<td><input type='text' name='gred' class='form-control' /></td>
		</tr>
        <tr>
			<td>No K/P</td>
			<td><input type='text' name='No_KP' class='form-control' /></td>
		</tr>
		<tr>
			<td>No Telefon</td>
			<td><textarea name='No_Telefon' class='form-control'></textarea></td>
		</tr>
		<tr>
			<td>Sektor</td>
			<td><input type='text' name='sektor' class='form-control' /></td>
		</tr>
        <tr>
			<td>Unit</td>
			<td><input type='text' name='unit' class='form-control' /></td>
		</tr>
		<tr>
			<td>Model PC</td>
			<td><textarea name='model_pc' class='form-control'></textarea></td>
		</tr>
		<tr>
			<td>Model Laptop</td>
			<td><input type='text' name='model_laptop' class='form-control' /></td>
		</tr>
        <tr>
			<td>Model Printer</td>
			<td><input type='text' name='model_printer' class='form-control' /></td>
		</tr>
		<tr>
			<td>Catatan</td>
			<td><textarea name='catatan' class='form-control'></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type='submit' value='Save' class='btn btn-primary' />
				<a href='index.php' class='btn btn-danger'>Back to read products</a>
			</td>
		</tr>
	</table>
</form>
    </div> <!-- end .container -->
 
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