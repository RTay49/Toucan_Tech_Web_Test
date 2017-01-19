<?php
//shows details about a selected school
echo '<h2>'.$school['name'].'</h2>';
echo '<p> Address: '.$school['address'].'</p>';
 
?>
<h3>Members</h3>
<!-- loops through all members and provides links for view pages for each using the realtions-->
<?php foreach ($relations as $relation):?>

        <a href="http://localhost/index.php/members/view/<?php echo $relation['slug']; ?>"><h4><?php echo $relation['name']; ?></h4></a>
       

<?php endforeach; ?>
