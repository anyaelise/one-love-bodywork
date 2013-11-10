<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>		
	<script type="text/javascript">
	$(document).ready(function(){	
		$(function() {
			$( "#services" ).tabs();
		});
	 });
	</script>
</head>

<body>

<div id="services">
	<ul>
		<li><a href="#services-1">Traditional Services</a></li>
		<li><a href="#services-2">Signature Services</a></li>
		<li><a href="#services-3">Targeted Services</a></li>
	</ul>
	<div id="services-1"> 
	<?php foreach($services as $key => $val) {
			if($val == 1) {
				echo "<h3>$key</h3>";
				echo "<p>$descs[$key]</p>";
				
				if($types[$key] == 0) {
					echo "<div class=\"twohands\">";
					echo "<h4>Single Therapist</h4><br>";				
					foreach($rates[$key] as $length => $rate) {
						echo "<p class=\"rates\">$length minutes - \$".($rate/2)."<br></p>";
					}
					echo "</div>";
				}
				if($types[$key] == 2) {
					echo "<div class=\"twohands\">";
					echo "<h4>&nbsp;Two Therapists&nbsp;</h4><br>";				
					foreach($rates[$key] as $length => $rate) {
						echo "<p class=\"rates\">$length minutes - \$$rate<br></p>";
					}
					echo "</div>";
				}
				if($types[$key] == 0 || $types[$key] == 1) {
					echo "<div class=\"fourhands\">";
					echo "<h4>Four Hands</h4><br>";
					foreach($rates[$key] as $length => $rate) {
						echo "<p class=\"rates\">$length minutes - \$$rate<br></p>";
					}
					echo "</div>";				
				}
			}
 		  }	
	?>
	</div>
	<div id="services-2">
	<?php foreach($services as $key => $val) {
			if($val == 2) {
				echo "<h3>$key</h3>";
				echo "<p>$descs[$key]</p>";
				
				if($types[$key] == 0 ) {
					echo "<div class=\"twohands\">";
					echo "<h4>Single Therapist</h4><br>";				
					foreach($rates[$key] as $length => $rate) {
						echo "<p class=\"rates\">$length minutes - \$".($rate/2)."<br></p>";
					}
					echo "</div>";
				}
				if($types[$key] == 2) {
					echo "<div class=\"twohands\">";
					echo "<h4>Single Therapist</h4><br>";				
					foreach($rates[$key] as $length => $rate) {
						echo "<p class=\"rates\">$length minutes - \$$rate<br></p>";
					}
					echo "</div>";
				}
				if($types[$key] == 0 || $types[$key] == 1) {
					echo "<div class=\"fourhands\">";
					echo "<h4>Four Hands</h4><br>";
					foreach($rates[$key] as $length => $rate) {
						echo "<p class=\"rates\">$length minutes - \$$rate<br></p>";
					}
					echo "</div>";				
				}
			}
 		  }	
	?>
	</div>
	<div id="services-3">
	<?php foreach($services as $key => $val) {
			if($val == 3) {
				echo "<h3>$key</h3>";
				echo "<p>$descs[$key]</p>";
				
				if($types[$key] == 0 || $types[$key] == 2) {
					echo "<div class=\"twohands\">";
					echo "<h4>Single Therapist</h4><br>";				
					foreach($rates[$key] as $length => $rate) {
						echo "<p class=\"rates\">$length minutes - \$".($rate/2)."<br></p>";
					}
					echo "</div>";
				}
				if($types[$key] == 0 || $types[$key] == 1) {
					echo "<div class=\"fourhands\">";
					echo "<h4>Four Hands</h4><br>";
					foreach($rates[$key] as $length => $rate) {
						echo "<p class=\"rates\">$length minutes - \$$rate<br></p>";						
					}
					echo "</div>";				
				}
			}
 		  }	
	?>	
	</div>
</div><!-- services -->