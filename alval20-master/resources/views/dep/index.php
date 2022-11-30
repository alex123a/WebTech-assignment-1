<html>
	<head>
    <link rel = "stylesheet" type = "text/css" href="<?php echo asset('css\main.css') ?>" />
	</head>
    <body>
		<p class = "success-message"><?php echo $message; ?></p>
		<?php
			foreach($departments as $department) {
				?>
				<div class = "department">
					<p><b>Name:</b></p>
					<p class = "name"><?php echo $department["name"] ?></p>
					<p><b>Code:</b></p>
					<p class = "code"><?php echo $department["code"] ?> </p>
					<p><b>Number of courses:</b></p>
					<p class = "courses"><?php echo $department["numOfCourses"] ?></p>
					<p><b>Link:</b></p>
					<a class = "show" href = <?php echo route("dep.show", $department["id"]) ?>><?php echo $department["name"] ?></a>
					<br>
				</div>
			<?php } ?>

			<p>Create department by clicking <a class = "new" href = <?php echo route("dep.create") ?>>here</a></p>
	</body>
</html>