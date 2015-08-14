<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php echo form_open('login/edit');
	echo form_label('Name');
	echo form_input();
	echo form_submit('submit');
	echo form_close();
?>
</body>
</html>