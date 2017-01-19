<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>


<?php echo form_open('members/signup');//creates a form for member sign up ?>

    <label for="name">Name</label>
    <input type="input" name="name" /><br />

    <label for="email">Email</label>
    <input type="input" name="email" /><br />

    <p>Schools</P>

    <?php foreach ($schools as $school)://loops through all the schools from the database for the checkboxs?>
	
	<input type="checkbox" name="school[]" value="<?php echo $school['schID']?>"><?php echo $school['name'] ?><br>  
    
    <?php endforeach; ?>

    <input type="submit" name="submit" value="Submit" />

</form>

