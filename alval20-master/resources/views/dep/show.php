<html>
    <head>
		<link rel = "stylesheet" type = "text/css" href="<?php echo asset('css\main.css') ?>" />
    </head>
    <body>
        <div>
			<p class = "success-message"><?php echo $message ?></p>
            <p class = "name">Department name: <?php echo $department["name"] ?></p>
			<p class = "code">Department code: <?php echo $department["code"] ?></p>
			<p class = "description">Department description: <?php echo $department["description"] ?></p>
            <div>
				<ol>
					<?php 
						foreach ($courses as $course) {
							echo "<li class = 'course'>";
								echo $course["name"];
								echo "<ul>";
                                    echo "<li> Code: ".$course["code"]."</li>";
                                    echo "<li> Ects: ".$course["ects"]."</li>";
                                    echo "<li> Show: <a class = 'show' href = ".route("course.show",$course["id"]).">".$course['name']."</a></li>";
								echo "</ul>";
							echo "</li>";
						}
					?>
				</ol>
            </div>
            <div>
                <a class = "edit" href = <?php echo route("dep.edit", $department["id"]) ?>>Edit department</a> 
                <form method="POST" action="<?php echo route("dep.delete", $department["id"]) ?>">
                    <?php 
                        echo csrf_field();
                        echo method_field('DELETE');
                    ?>
                    <button class="remove" type="submit">Delete department</button>
                </form>
            </div>
        </div>
    </body>
</html>