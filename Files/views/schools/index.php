<h1><?php echo $title; ?></h1>

<?php foreach ($schools as $school)://loops through the list of schools providing links for each view page ?>

        <a href="http://localhost/index.php/schools/view/<?php echo $school['slug']; ?>"><h4><?php echo $school['name']; ?></h4></a>
       

<?php endforeach; ?>

