
	<div class='boxcontent row'>
		<h2 class='pull-left'>Add / Edit <?php echo ucfirst($this->uri->segment(1))." ".ucfirst($this->uri->segment(2)); ?></h2>
		<div class='pull-right'><?php echo form_submit('submit','SAVE','class="btn btn-danger" form="masterform"'); ?> <?php echo anchor($page,'BACK','class="btn btn-success"'); ?></div>
	</div>
	<div class='boxContent'>
	<form class="form-horizontal" role="form" action="<?php echo site_url($page); ?>" method="post" id='masterform'>
		<?php 
		foreach($structure as $key=>$val): 
			$isHidden = $this->inputfields->isHidden($val);
			if(empty($isHidden)): 
		?>
			 <div class="form-group">
				<label class="col-sm-2 control-label <?php echo ($val == "hidden" ? "hide" : ""); ?>"><?php echo str_replace("_"," ",ucfirst($key)); ?></label>
				<div class="col-sm-10">
					<?php 
						echo $this->inputfields->defineInput($key,(!empty($data[$key]) ? $data[$key] : ""),array("placeHolder"=>str_replace("_"," ",ucfirst($key)),"type"=>$val,"class"=>"form-control"));
					?>
				</div>
			  </div>
		<?php 	
			else: 
				echo $this->inputfields->defineInput($key,(!empty($data[$key]) ? $data[$key] : ""),array("placeHolder"=>$key,"type"=>$val,"class"=>"form-control"));
			endif; 
		endforeach; 
		?>
		<?php echo form_hidden('action','save'); ?>
		<?php echo form_hidden('id',(!empty($data['id']) ? $data['id'] : "")); ?>
	</form>
	</div>
