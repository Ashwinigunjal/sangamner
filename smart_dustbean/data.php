	<?php 
		require_once('conn.php');
		$sth = $pdo->prepare("SELECT * FROM bins ORDER BY id DESC");
            $sth->execute();
            $todos = $sth->fetchAll(PDO::FETCH_ASSOC);
            foreach($todos as $row){
       			$fill = 60 * $row['filled'] / 100;
       			if($fill>45){$back = 'background-color: red;'; $under = 'border-bottom: 2px solid red;';}
       			elseif($fill>18 || $fill<45){$back = 'background-color: darkorange;'; $under = 'border-bottom: 2px solid orange;';} 
       			elseif($fill<18){$back = 'background-color: lime;'; $under = 'border-bottom: 2px solid lime;';}

			if($row['filled'] > 80){
				$to = "ashwinigunjal1994@gmail.com";
				$subject = "Dustbin Analyser";
				$txt = "Hello, \n\n Dustbin : " . $row['name'] . " \n Dustbin ID : " . $row['dust_id'] . " Dustbin Filled : " . $row['filled'];
				$headers = "From: ashwinigunjal1994@gmail.com" . "\r\n";

				//mail($to,$subject,$txt,$headers);
				
			}
	
            		echo '<div class="col-sm-4">
						<div id="co">
							<div id="del"><a href="delete.php?did='.$row['dust_id'].'">&#10005;</a></div>
							<div id="copy" style="height: '.$fill.'%; '.$back.'"></div>
							<img src="image/trash_can.png" class="img-responsive" alt="Image">
						</div><br>
						<div class="text-left">
							<p><b>Filled : </b> <span style="'. $under .'">'.ceil($row['filled']).'% </span></p>
							<p><b>Dustbin ID : </b>'.$row['dust_id'].'</p>
							<p><b>Name : </b>'.$row['name'].'</p>
						</div>
					</div>';
            }
	?>       
