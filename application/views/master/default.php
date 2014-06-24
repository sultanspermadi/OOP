<div class='boxContent row'>
	<h2 class='pull-left'><?php echo ucfirst($this->uri->segment(1))." ".ucfirst($this->uri->segment(2)); ?></h2>
	<div class='pull-right'><?php echo anchor($page."/add","<button class='btn btn-danger'>Add New</button>"); ?></div>
</div>
<div class='boxContent'>
	<?php 
	
	//mengecek apakah terdapat data
	if(!empty($data)) { 
	?>
	
	<table class='table table-striped'>
		<thead>
			<?php foreach($structure as $th)
			{
				echo "<th align='left'>".$th."</th>";
			}
			echo "<th>action</th>";
			?>
		</thead>
		<tbody>
			<?php
			foreach($data as $row)
			{
				echo "<tr>";
				foreach($structure as $key=>$val)
				{
					echo "<td align='left'>".$row[$key]."</td>";
				}
				echo "<td align='left'><div class='btn-group'>
				<button class='btn dropdown-toggle btn-default' data-toggle='dropdown'>Action<span class='caret'></span></button>
					<ul class='dropdown-menu'>								
						<li>".anchor($page.'/add/'.$row['id'],'Edit')."</li>
						<li>".anchor($page.'/delete/'.$row['id'],'Delete','class="deleteData"')."</li>
					</ul>
				</div></td>";
				echo "</tr>";	
			}
			?>
		</tbody>
	</table>
	
	<?php } else { echo "Maaf, Data Belum Tersedia"; } ?>
	
</div>