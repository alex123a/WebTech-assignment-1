<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href="<?php echo asset('css\main.css') ?>" />
    </head>
    <body>
        <h2 class="welcome">Welcome to LearningForEngineers</>
        <a class = "departments-link" href = <?php echo route("dep.index") ?> >Departments</a>
        <a class = "courses-link" href = <?php echo route("course.index") ?> >Courses</a>
    </body>
</html> 