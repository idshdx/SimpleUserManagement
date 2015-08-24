<!DOCTYPE html>
<html>
<head>
	<title>Succes</title>
</head>
<body>
<h3>Succes!</h3>
<h6>The following records were updated in the database</h6>
<?php  
    if(!empty($data['name'])) {
      echo "Name: " . $data['name'] . "<br>";
    }
    if(!empty($data['email'])) {
      echo "Email: " . $data['email'] . "<br>";
    }
    if(!empty($data['phone_number'])) {
      echo "Phone Number: " . $data['phone_number'] . "<br>";
    }
    if(!empty($data['description'])) {
      echo "Description " . $data['description'] . "<br>";
    }
    if(!empty($data['age_id'])) {
      echo "Age Category: " . $data['age_id'] . "<br>";
    }
?>
</body>
</html>