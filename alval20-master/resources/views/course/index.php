<html>
	<head>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo asset('css\main.css') ?>" />
	</head>
    <body>
		<p class = "success-message"><?php echo $message; ?></p>
		<?php
			foreach($courses as $course) {
				?>
				<div class = "course">
					<p><b>Name:</b></p>
					<p class = "name"><?php echo $course["name"] ?></p>
					<p><b>Code:</b></p>
					<p class = "code"><?php echo $course["code"] ?> </p>
					<p><b>ECTS:</b></p>
					<p class = "ects"><?php echo $course["ects"] ?> </p>
					<p><b>Department:</b></p>
					<p class = "department"><?php echo "<a href = ".route("dep.show", $course["department_id"]). ">".$course["department_name"]."</a>" ?></p>
					<p><b>Link:</b></p>
					<a class = "show" href = <?php echo route("course.show", $course["id"]) ?>><?php echo $course["name"] ?></a>
					<br>
				</div>
			<?php } ?>

			<p>Create course by clicking <a class = "new" href = <?php echo route("course.create") ?>>here</a></p>
	</body>
</html>