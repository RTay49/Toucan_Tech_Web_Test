<?php
//shows details about a selected member
echo '<h2>'.$member['name'].'</h2>';
echo '<p> Email: '.$member['email'].'</p>';
?>
<h3>Schools</h3>
<!-- loops through all school and provides links for view pages for each using the realtions-->
<?php foreach ($relations as $relation):?>

        <a href="http://localhost/index.php/schools/view/<?php echo $relation['slug']; ?>"><h4><?php echo $relation['name']; ?></h4></a>
       

<?php endforeach; ?>
