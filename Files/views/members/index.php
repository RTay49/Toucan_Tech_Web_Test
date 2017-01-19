<h1><?php echo $title; ?></h1>

<?php foreach ($members as $member)://loops through the list of members providing links for each view page ?>

        <a href="http://localhost/index.php/members/view/<?php echo $member['slug']; ?>"><h4><?php echo $member['name']; ?></h4></a>
       

<?php endforeach; ?>

