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
  <h1>Jumbotron Example</h1>
  <p>Lorem ipsum...</p>
</div>
<!-- /navbar -->
<div class="container mt-5">
<div class="row">
    <div class="col-sm">
        <h1>ICT User Equipment List</h1>
    </div>
</div>
<body>
    <!-- container -->
    <div class="container">
        <div class="page-header">
            <h1>Read Product</h1>
        </div>
        <?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
//include database connection
include 'config/database.php';
// read current record's data
try {
	// prepare select query
	$query = "SELECT id, nama, jawatan, gred, No_KP, No_Telefon, sektor, unit, model_pc, model_laptop, model_printer, catatan FROM user_info WHERE id = ? LIMIT 0,1";
	$stmt = $con->prepare( $query );
	// this is the first question mark
	$stmt->bindParam(1, $id);
	// execute our query
	$stmt->execute();
	// store retrieved row to a variable
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	// values to fill up our form
	$nama = $row['nama'];
	$jawatan = $row['jawatan'];
	$gred = $row['gred'];
	$No_KP = $row['No_KP'];
	$No_Telefon = $row['No_Telefon'];
	$sektor = $row['sektor'];
	$unit = $row['unit'];
	$model_pc = $row['model_pc'];
	$model_laptop = $row['model_laptop'];
	$model_printer = $row['model_printer'];
	$catatan = $row['catatan'];
	
}
// show error
catch(PDOException $exception){
	die('ERROR: ' . $exception->getMessage());
}
?>
       <!--we have our html table here where the record will be displayed-->
<table class='table table-hover table-responsive table-bordered'>
	<tr>
		<td>Nama</td>
		<td><?php echo htmlspecialchars($nama, ENT_QUOTES);  ?></td>
	</tr>
	<tr>
		<td>Jawatan</td>
		<td><?php echo htmlspecialchars($jawatan, ENT_QUOTES);  ?></td>
	</tr>
	<tr>
		<td>Gred</td>
		<td><?php echo htmlspecialchars($gred, ENT_QUOTES);		?></td>
	</tr>
	<tr>
		<td>No K/P</td>
		<td><?php echo htmlspecialchars($No_KP, ENT_QUOTES);  ?></td>
	</tr>
	<tr>
		<td>No Telefon</td>
		<td><?php echo htmlspecialchars($No_Telefon, ENT_QUOTES);  ?></td>
	</tr>
	<tr>
		<td>Unit</td>
		<td><?php echo htmlspecialchars($unit, ENT_QUOTES);  ?></td>
	</tr>
	<tr>
		<td>Model PC</td>
		<td><?php echo htmlspecialchars($model_pc, ENT_QUOTES);  ?></td>
	</tr>
	<tr>
		<td>Model Laptop</td>
		<td><?php echo htmlspecialchars($model_laptop, ENT_QUOTES);		?></td>
	</tr>
	<tr>
		<td>Model Printer</td>
		<td><?php echo htmlspecialchars($model_printer, ENT_QUOTES);  ?></td>
	</tr>
	<tr>
		<td>Catatan</td>
		<td><?php echo htmlspecialchars($catatan, ENT_QUOTES);  ?></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<a href='index.php' class='btn btn-danger'>Back to read products</a>
		</td>
	</tr>
</table>
	</div> <!-- end .container -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

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