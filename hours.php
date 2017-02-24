


<div class = "container_row">	
		<div class = "hours">
			<h2>Hours of Operation: </h2 >
				<?php
					if (admin_loggedin()) {?>
						<form method = "post">
						<label>Monday: </label>
						<select name = "openhours" type = "openhours">
							<option value="0">12:00 am</option>
							<option value="50">12:30 am</option>
							<option value="100">1:00 am</option>
							<option value="150">1:30 am</option>
							<option value="200">2:00 am</option>
							<option value="250">2:30 am</option>
							<option value="300">3:00 am</option>
							<option value="350">3:30 am</option>
							<option value="400">4:00 am</option>
							<option value="450">4:30 am</option>
							<option value="500">5:00 am</option>
							<option value="550">5:30 am</option>
							<option value="600">6:00 am</option>
							<option value="650">6:30 am</option>
							<option value="700">7:00 am</option>
							<option value="750">7:30 am</option>
							<option value="800">8:00 am</option>
							<option value="850">8:30 am</option>
							<option value="900">9:00 am</option>
							<option value="950">9:30 am</option>
							<option value="1000">10:00 am</option>
							<option value="1050">10:30 am</option>
							<option value="1100">11:00 am</option>
							<option value="1150">11:30 am</option>
							<option value="1200">12:00 pm</option>
							<option value="1250">12:30 pm</option>
							<option value="1300">1:00 pm</option>
							<option value="1350">1:30 pm</option>
							<option value="1400">2:00 pm</option>
							<option value="1450">2:30 pm</option>
							<option value="1500">3:00 pm</option>
							<option value="1550">3:30 pm</option>
							<option value="1600">4:00 pm</option>
							<option value="1650">4:30 pm</option>
							<option value="1700">5:00 pm</option>
							<option value="1750">5:30 pm</option>
							<option value="1800">6:00 pm</option>
							<option value="1850">6:30 pm</option>
							<option value="1900">7:00 pm</option>
							<option value="1950">7:30 pm</option>
							<option value="2000">8:00 pm</option>
							<option value="2050">8:30 pm</option>
							<option value="2100">9:00 pm</option>
							<option value="2150">9:30 pm</option>
							<option value="2200">10:00 pm</option>
							<option value="2250">10:30 pm</option>
							<option value="2300">11:00 pm</option>
							<option value="2350">11:30 pm</option>
						</select>
						</form>
						
						<form method = "post">
						<label>Monday: </label>
						<select name = "o" type = "openhours">
							<option value="0">12:00 am</option>
							<option value="50">12:30 am</option>
							<option value="100">1:00 am</option>
							<option value="150">1:30 am</option>
							<option value="200">2:00 am</option>
							<option value="250">2:30 am</option>
							<option value="300">3:00 am</option>
							<option value="350">3:30 am</option>
							<option value="400">4:00 am</option>
							<option value="450">4:30 am</option>
							<option value="500">5:00 am</option>
							<option value="550">5:30 am</option>
							<option value="600">6:00 am</option>
							<option value="650">6:30 am</option>
							<option value="700">7:00 am</option>
							<option value="750">7:30 am</option>
							<option value="800">8:00 am</option>
							<option value="850">8:30 am</option>
							<option value="900">9:00 am</option>
							<option value="950">9:30 am</option>
							<option value="1000">10:00 am</option>
							<option value="1050">10:30 am</option>
							<option value="1100">11:00 am</option>
							<option value="1150">11:30 am</option>
							<option value="1200">12:00 pm</option>
							<option value="1250">12:30 pm</option>
							<option value="1300">1:00 pm</option>
							<option value="1350">1:30 pm</option>
							<option value="1400">2:00 pm</option>
							<option value="1450">2:30 pm</option>
							<option value="1500">3:00 pm</option>
							<option value="1550">3:30 pm</option>
							<option value="1600">4:00 pm</option>
							<option value="1650">4:30 pm</option>
							<option value="1700">5:00 pm</option>
							<option value="1750">5:30 pm</option>
							<option value="1800">6:00 pm</option>
							<option value="1850">6:30 pm</option>
							<option value="1900">7:00 pm</option>
							<option value="1950">7:30 pm</option>
							<option value="2000">8:00 pm</option>
							<option value="2050">8:30 pm</option>
							<option value="2100">9:00 pm</option>
							<option value="2150">9:30 pm</option>
							<option value="2200">10:00 pm</option>
							<option value="2250">10:30 pm</option>
							<option value="2300">11:00 pm</option>
							<option value="2350">11:30 pm</option>
						</select>
						</form>
					<?php
					}
					
				/*	if (!admin_loggedin()) {
						
						$query="SELECT * FROM business_hours";
						$results = mysqli_query(connection(), $query);
						
						while ($row = mysqli_fetch_array($results)) {
							$i = 0;
						while (1=1){
							echo $row[$i];
							$i = $i+1;
						}
						
					}
					}*/
				?>
		</div>
</div>