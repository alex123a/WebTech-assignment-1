<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href="<?php echo asset('css\main.css') ?>" />
	</head>
    <body>
        <div>
            <form action = "<?php echo route("course.store") ?>" method = "POST">
                <?php echo csrf_field() ?>
                <?php 
                    if ($errors->get("name") != null) {
                        echo "<p class = 'error-message'>".implode("|", $errors->get("name")) . "</p>";
                    }
                ?>
                <label for = "name">Name of the course:</label>
                <br>
                <input name  = "name" type = "name">
                <br><br>
                <?php 
                    if ($errors->get("code") != null) {
                        echo "<p class = 'error-message'>".implode("|", $errors->get("code")) . "</p>";
                    }
                ?>
                <label for = "code">Course code:</label>
                <br>
                <input name = "code" type = "text">
                <br><br>
                <?php 
                    if ($errors->get("ects") != null) {
                        echo "<p class = 'error-message'>".implode("|", $errors->get("ects")) . "</p>";
                    }
                ?>
                <label for = "ects">Course ects:</label>
                <br>
                <input name = "ects" type = "number">
                <br><br>
                <label for = "department">Department</label>
                <br>
                <select name = "department">
                    <?php 
                        foreach($departments as $department) {
                            echo "<option value = ".$department["id"]."> Name: ".$department["name"]. " | Code: ".$department["code"]."</option>"; 
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
                <input name = "description">
                <br><br>
                <input class = "submit" type = "submit">
            </form>
        </div>
    </body>
</html>