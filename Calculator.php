<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="calculator.css">
	<title> Calculator</title>
</head>
<body>
	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
		<label for="A">A: <input type="text" name="A" id ="A"></label>
			<span>
				<label for="B">B: <input type="text" name="B" id ="B">
				</label> 
			</span>	
			<br>
			<input type="radio" name="op" value ="add">A+B<br>
			<input type="radio" name="op" value ="sub">A-B<br>
			<input type="radio" name="op" value ="multp">A*B<br>
			<input type="radio" name="op" value ="div">A/B<br>
			<input type="radio" name="op" value ="mod">A%B<br>
		<input type="submit" value="Calculate">
	</form>

	<?php
	if (!isset($_POST['A'])
	 || !isset($_POST['B']) || !isset($_POST['op'])) {
		exit("");
	}
	$A = (float) $_POST['A'];
	$B = (float) $_POST['B'];

	$operation = (string) $_POST['op'];
	$symbol = "+";
	$result = "result";
	switch ($operation) {
		case 'add':
			$result = $A + $B;
			break;
		case 'sub':
			$result = $A - $B;
			$symbol = "-";
			break;
		case 'multp':
			$result = $A * $B;
			$symbol = "*";
			break;
	    case 'div':
	    	if($B == 0){
	    		exit(htmlentities("Cannot divide by zero"));
	    	}
	    	$result = $A / $B;
	    	$symbol = "/";
	    	break;
	    case 'mod':
	    	if($B == 0){
	    		exit(htmlentities("Cannot take modulus if dividing by zero"));
	    	}
	    	$result = $A % $B;
	    	$symbol = "%";
	    	break;
		default:
		exit(htmlentities("Please select an operation"));
			break;
	}
	echo htmlentities("($A) $symbol ($B) = $result");
	?>
</body>
</html>