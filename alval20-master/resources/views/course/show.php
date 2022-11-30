<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href="<?php echo asset('css\main.css') ?>" />
    </head>
    <body>
        <div>
            <p class = "success-message"><?php echo $message ?></p>
            <p class = "name">Course name: <?php echo $course["name"] ?></p>
            <p class="code">Course code is: <?php echo $course["code"] ?></p>
            <p class = "ects">Course ects: <?php echo $course["ects"] ?></p>
            <p class = "department">Courses department name: <?php echo "<a href = ".route("dep.show", $course["department_id"]). ">".$department["name"]."</a>" ?></p>
            <p class = "description">Course description: <?php echo $course["description"] ?></p>
        </div>
		<div>
            <a class = "edit" href = <?php echo route("course.edit", $course["id"]) ?>>Edit course</a> 
			<form method="POST" action="<?php echo route("course.delete", $course["id"]) ?>">
				<?php 
					echo csrf_field();
					echo method_field('DELETE');
				?>
				<button class="remove" type="submit">Delete course</button>
			</form>
		</div>
    </body>
</html>