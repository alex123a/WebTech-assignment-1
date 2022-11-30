<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "<?php echo asset('css\main.css') ?>" />
	</head>
    <body>
        <div>
            <h2>Here you can edit the department with the code <?php echo $department["code"] ?></h2><br>
            <form action="<?php echo route("dep.update", $department["id"]) ?>" method = "POST">
                <?php 
                    echo csrf_field();
					echo method_field('PUT');
				?>
                <?php 
                    if ($errors->get("name") != null) {
                        echo "<p class = 'error-message'>".implode("|", $errors->get("name")) . "</p>";
                    }
                ?>
                <label for = "name">Name of the department:</label>
                <br>
                <input name  = "name" type = "name" value="<?php echo $department["name"] ?>">
                <br><br>
                <?php 
                    if ($errors->get("code") != null) {
                        echo "<p class = 'error-message'>".implode("|", $errors->get("code")) . "</p>";
                    }
                ?>
                <label for = "code">Department code:</label>
                <br>
                <input name = "code" type = "text" value="<?php echo $department["code"] ?>">
                <br><br>
                <?php 
                    if ($errors->get("description") != null) {
                        echo "<p class = 'error-message'>".implode("|", $errors->get("description")) . "</p>";
                    }
                ?>
                <label for = "description">Description of the department:</label>
                <br>
                <input name = "description" value="<?php echo $department["description"] ?>">
                <br><br>
                <input class = "submit" type = "submit">
            </form>
        </div>
    </body>
</html>