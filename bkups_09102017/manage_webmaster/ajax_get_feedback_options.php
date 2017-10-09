<?php
include_once('../admin_includes/config.php');
include_once('../admin_includes/common_functions.php');

if(!empty($_POST["sub_category_id"])) {
	$query ="SELECT * FROM sub_categories WHERE id = '" . $_POST["sub_category_id"] . "'";
	$results = $conn->query($query);
	$getFOptions = $results->fetch_assoc();
	$getAllOptions = $getFOptions['subcat_feedback_options'];
	$expOpt = explode(",",$getAllOptions);
	//echo "<pre>"; print_r($expOpt); die;
?>

<label for="form-control-2" class="control-label">Feedback Options : </label><br />
<?php foreach ($expOpt as $key => $value) { 
	  $getfeedbackOpt = getDataFromTables('feedback_options',$status=NULL,'id',$value,$activeStatus=NULL,$activeTop=NULL);
	  $row = $getfeedbackOpt->fetch_assoc()
?>
	<input type="checkbox" name="feedback_options[]" value="<?php echo $value ?>"> <?php echo $row['feedback_option']; ?>
<?php
	}
}
?>
