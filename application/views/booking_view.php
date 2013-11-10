<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
	<title>One Love Bodywork - Your four hands massage specialists</title>
		
	<script type="text/javascript">
	$(document).ready(function(){	
		var draping = new Array();
		<?php
		$i=0;
		foreach($draping->result() as $row) {
			echo "draping[$i] = \"$row->desc\";\n";
			$i++;
		}
		?>
		$(function() {
			$("#booking").tabs();
			$( "#date" ).datepicker({
				inline: true
			});			
			$("select option").attr( "title", "" );
   	 		$("#draping option").each(function(i){
      			this.title = draping[i];
    		})
    		//$("#draping option").tooltip({ show: { effect: "blind", duration: 800 } }, {track: true});
    		$("#draping option").tooltip({position: {my: "left+5 bottom", at: "right top", collision: "flipfit" }});
    		//$("#basic_info label").last().css('font-style', 'italic');
    		
    		<?php if($errors == 1) {
				echo "\$(\"#validation_errors\").addClass(\"ui-state-error\")";
			}
			?>			
		});
	 });
	</script>
</head>

<body>

<div id="booking">	
	<ul>
		<li><a href="#booking-1">Request a Reservation</a></li>
	</ul>
	<br>
	<p class="directions">Please supply the information requested below. <span style="color:red">All fields are required.</span></p>
	<div id="validation_errors" class="ui-corner-all">
	<?php 
	echo validation_errors();
	?>
	</div><!-- validation_errors -->
	
	<?php
	echo form_open('main/booking/create');
	$data = array();	
	?>
	
	<div id="basic_info">
	<?php
	$data['name'] = "email";
	$data['id'] = "email";
	$data['size'] = 27;
	$data['value'] = set_value('email');
	
	echo "<div>".form_label('First Name: ','first_name')."<br>".form_input('first_name',set_value('first_name'))."</div>";
	echo "<div>".form_label('Last Name: ','last_name')."<br>".form_input('last_name',set_value('last_name'))."</div>";
	echo "<div>".form_label('Telephone: ','phone')."<br>".form_input('phone',set_value('phone'))."</div>";
	echo "<div>".form_label('Email: ','email')."<br>".form_input($data)."</div>";
	
	$data['name'] = "date";
	$data['id'] = "date";
	$data['size'] = 20;
	$data['value'] = set_value('date');
	echo "<div>".form_label('Date: ','date')."<br>".form_input($data)."</div>";
	$time_array = array();
	$start_time = 50400;
	$end_time = 61200;
	for($i=0; $i<10; $i++) {
		$time_array[$i] = date("h:ia", $start_time)." - ".date("h:ia", $end_time);
		$start_time += 3600;
		$end_time += 3600;
	}	
	
	if(isset($_POST)) {
		echo "<div>".form_label('Time Window:','time')."<br>".form_dropdown('time',$time_array,$_POST['time'])."</div>";
	}
	else {
		echo "<div>".form_label('Time Window:','time')."<br>".form_dropdown('time',$time_array,0)."</div>";
	}
	
	echo "<div style=\"display:block;float:none;clear:both;\">".form_label('Location: ','location')."<br>";
	$data = array(
		'name'        => 'location',
    	'value'       => '0',
    	'checked'     => set_radio('location','0'),
    	'class'       => 'radios',
    	);
	echo form_radio($data)."In-call @ ".anchor("http://www.educatinghands.com/", "Educating Hands Professional Clinic").", 3883 Biscayne Blvd, Miami FL 33137 <span style=\"color:green\">(additional $20)</span><br>";
	$data = array(
		'name'        => 'location',
    	'value'       => '1',
    	'checked'     => set_radio('location','1'),
    	'class'       => 'radios',
    	);
	echo form_radio($data)."Out-call @ ";	
	if(isset($_POST)) {
		$address = $_POST['address'];
	}
	else {
		$address = '';
	}
	$data = array(
		'name' => "address",
		'value' => $address,
		'size' => 73,
		);
	echo form_label('Street Address: ','address').form_input($data)."</div>";	
	
	$four_service_array = array(); $i = 0;
	$two_service_array = array(); $j = 0;
	foreach($services->result() as $row) {
		if($row->type == 0) {
			$four_service_array[$i] = "$row->name, $row->length minutes, \$$row->rate";
			$two_service_array[$j] = "$row->name, $row->length minutes, \$".($row->rate)/2;
			$i++;
			$j++;
		}
		else if($row->type == 1) {
			$four_service_array[$i] = "$row->name, $row->length minutes, \$$row->rate";
			$i++;
		}		
		else if($row->type == 2) {
			$two_service_array[$j] = "$row->name, $row->length minutes, \$$row->rate";
			$j++;
		}
	}
	echo "<div style=\"display:block;float:none;clear:both;\">".form_label('Type of Service: ','type')."<br>";
	$data = array(
		'name'        => 'type',
    	'value'       => '0',
    	'checked'     => set_radio('type','0'),
    	'class'       => 'radios',
    	);
	if(isset($_POST)) {
		echo form_radio($data)."Four Hands &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".form_dropdown('four_service', $four_service_array, $_POST['four_service'])."<br>";
	}
	else {
		echo form_radio($data)."Four Hands &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".form_dropdown('four_service', $four_service_array, 0)."<br>";
	}
	$data = array(
		'name'        => 'type',
    	'value'       => '1',
    	'checked'     => set_radio('type','1'),
    	'class'       => 'radios',
    	);
	if(isset($_POST)) {
		echo form_radio($data)."Single Therapist ".form_dropdown('two_service', $two_service_array, $_POST['two_service'])."</div>";
	}
	else {
		echo form_radio($data)."Single Therapist ".form_dropdown('two_service', $two_service_array, 0)."</div>";
	}
	echo "<div style=\"display:block;float:none;clear:both;\">".form_label('Method of Payment: ','type')."<br>";
	$data = array(
		'name'        => 'payment',
    	'value'       => '0',
    	'checked'     => set_radio('payment','0'),
    	'class'       => 'radios',
    	);
	echo form_radio($data)."Cash<br>";
	$data = array(
		'name'        => 'payment',
    	'value'       => '1',
    	'checked'     => set_radio('payment','1'),
    	'class'       => 'radios',
    	);
	echo form_radio($data)."Credit/Debit card (<span style=\"color:green\">3% service fee</span>)</div>";
	
	
	echo "<br>";
	?>
	</div><!-- basic_info -->
	
	<p class="directions">Please customize your service from the options below.</p>
	<div id="customizations">
	<?php
	$aromatherapy_array = array(); $i=0;
	foreach($aromatherapy->result() as $row) {
		$aromatherapy_array[$i] = "$row->name";
		$i++;
	}
	if(isset($_POST)) {
		echo "<div>".form_label('Aromatherapy Preference: ','aromatherapy')."<br>".form_dropdown('aromatherapy', $aromatherapy_array, $_POST['aromatherapy'])." </div>";
	}
	else {
		echo "<div>".form_label('Aromatherapy Preference: ','aromatherapy')."<br>".form_dropdown('aromatherapy', $aromatherapy_array, 0)." </div>";
	}
	
	$music_array = array(); $i=0;
	foreach($music->result() as $row) {
		$music_array[$i] = "$row->name";
		$i++;
	}
	if(isset($_POST)) {
		echo "<div>".form_label('Music Preference: ','music')."<br>".form_dropdown('music', $music_array, $_POST['music'])." </div>";
	}
	else {
		echo "<div>".form_label('Music Preference: ','music')."<br>".form_dropdown('music', $music_array, 0)." </div>";
	}
	
	$draping_array = array(); $i=0;
	foreach($draping->result() as $row) {
		$draping_array[$i]  = "$row->name";
		$i++;
	}
	$js = 'id="draping"';
	if(isset($_POST)) {
		echo "<div> ".form_label('Draping Preference: ','draping')."<br>".form_dropdown('draping', $draping_array, $_POST['draping'], $js)." </div>";
	}
	else {
		echo "<div> ".form_label('Draping Preference: ','draping')."<br>".form_dropdown('draping', $draping_array, 0, $js)." </div>";
	}
	if(isset($_POST)) {
		if($_POST['paraffin'] == 1) {
			$checked = TRUE;
		}
		else {
			$checked = FALSE;
		}
	}
	$data = array(
		'name'		=> 'paraffin',
		'id'		=> 'paraffin',
		'value'		=> '1',
		'checked'	=> $checked,
		);
	echo "<div style=\"display:block;clear:both;margin:5px 0px 15px 60px;\"> ".form_checkbox($data).form_label('Add paraffin treatment ($20)', 'paraffin')."</div>";
	?>
	</div><!-- customizations -->
	
	<br>
	<p class="directions"> If you have skin allergies or sensitive skin we recommend our hypoallergenic options. </p>
	<div id="allergy_info">
	<?php
	$data = array(
		'name'        => 'allergies',
    	'value'       => '0',
    	'checked'     => set_radio('allergies','0'),
    	'class'       => 'radios',
    	); 
	echo "<div>".form_radio($data).'Please use hypoallergenic products.<br>';
	$data = array(
		'name'        => 'allergies',
    	'value'       => '1',
    	'checked'     => set_radio('allergies','1'),
    	'class'       => 'radios',
    	); 
	echo form_radio($data).'Regular products are fine.</div>';
	
	echo "<br>";
	?>
	</div><!-- allergy_info -->
	<p class="directions">Special Requests:</p>
	<div id="notes">
		<?php
		if(isset($_POST)) {
			$reqs = $_POST['requests'];
		}
		else {
			$reqs = '';
		}
		$data = array();
		$data['name'] = 'requests';
		$data['value'] = $reqs;
		$data['rows'] = 2;
		$data['cols'] = 70;
		echo "<div>".form_textarea($data)."</div>";
		?>
	</div>
	
	<br>
	
	<div id="submit_button">
	<?php
	echo "<p>".form_submit('booking_submit', "Request Reservation")." </p>";	
	?>
	</div><!-- submit_button -->
	
	</form>
</div><!-- booking -->