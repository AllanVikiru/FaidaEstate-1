<?php 
	$connect=mysqli_connect("localhost","root","","estate");
	$output='';
	$from='$_POST["from"]';
	$to='$_POST["to"]';


	if (isset($_POST["export_excel"])) 
	{
		$sql="SELECT * FROM estate_forum ";
		$result=mysqli_query($connect,$sql);
		if (mysqli_num_rows($result) > 0)
		{
			$output .='
				<table class="table" bordered="1">
					<tr>
						<th> Sender </th>
						<th> Chat Message </th>
						<th> Time </th>
					</tr>
			';
			while ($row = mysqli_fetch_array($result))
			{
				$output .='
				<table class="table" bordered="1">
					<tr>
						<td>'.$row['Sender'].'</th>
					    <td>'.$row['chat_message'].'</th>
						<td>'.$row['timestamp'].'</th>
					</tr>
			';
			}
			$output .='</table>';
			header("Content-Type: application/xls");
			header("Content-Disposition:attachment; filename=minutes.xls");	
			echo $output;
		}
	}
 ?>