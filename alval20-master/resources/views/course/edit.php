<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href="<?php echo asset('css\main.css') ?>" />
    </head>
    <body>
        <div>
            <h2>Here you can edit the course with the code <?php echo $course["code"] ?></h2><br>
            <form action = "<?php echo route("course.update", $course["id"]) ?>" method = "POST">
                <?php 
                    echo csrf_field();
                    echo method_field('PUT');
                ?>
                <?php 
                    if ($errors->get("name") != null) {
                        echo "<p class = 'error-message'>".implode("|", $errors->get("name")) . "</p>";
                    }
                ?>
                <label for = "name">Name of the course:</label>
                <br>
                <input name  = "name" type = "name" value="<?php echo $course["name"] ?>">
                <br><br>
                <?php 
                    if ($errors->get("code") != null) {
                        echo "<p class = 'error-message'>".implode("|", $errors->get("code")) . "</p>";
                    }
                ?>
                <label for = "code">Course code:</label>
                <br>
                <input name = "code" type = "text" value="<?php echo $course["code"] ?>">
				<br><br>
				<label for = "ects">Ects:</label>
				<br>
                <?php 
                    if ($errors->get("ects") != null) {
						echo "<p class = 'error-message'>".implode("|", $errors->get("ects")) . "</p>";
                    }
					?>
				<input name = "ects" type = "number" value = "<?php echo $course["ects"] ?>">
				<br><br>
				<label for = "department">Department:</label>
                <br>
                <select name = "department">
                    <?php 
                        foreach($departments as $dep) {
							if ($dep["id"] == $course["department_id"]) {
								echo "<option value = ".$dep["id"]." selected>Name: ".$dep["name"]." | Code: ".$dep["code"]."</option>";
							} else {
								echo "<option value = ".$dep["id"]."> Name: ".$dep["name"]." | Code: ".$dep["code"]."</option>"; 
							}
                        }
                    ?>
                </select>
				<br><br>
                <?php 
                    if ($errors->get("description") != null) {
                        echo "<p class = 'error-message'>".implode("|", $errors->get("description")) . "</p>";
                    }
                ?>
                <label for = "description">Description of the course:</label>
                <br>
                <input name = "description" value="<?php echo $course["description"] ?>">
                <br><br>
                <input class = "submit" type = "submit">
            </form>
        </div>
    </body>
</html>