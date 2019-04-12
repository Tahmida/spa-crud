<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Category</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<h2 style="color: green;">
						<?php 
                           $message=$this->session->userdata('message');
                           if($message){
                           	echo $message;
                           	$this->session->unset_userdata('message');
                           }
                         
						?>
					</h2>
					<div class="box-content">
						<form name="edit_category"class="form-horizontal" action="<?php echo base_url();?>Super_admin/update_category" method="post">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Category Name </label>
							  <div class="controls">
								<input type="text" name="category_name" value="<?php echo $category_info->category_name;?>" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
								<input type="hidden" name="category_id" value="<?php echo $category_info->category_id;?>" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
							  </div>
							</div>
						         
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Category Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="category_description" id="textarea2" rows="3"><?php echo $category_info->category_description; ?></textarea>
							  </div>
							</div>
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
							  <select name="publication_status">
							  	<option>select status</option>

							  	<option value="1">published</option>
							    <option value="0">unpublished</option>

							  </select>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">update</button>
							  <button type="reset" class="btn">reset</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

<script type="text/javascript">
	document.forms['edit_category'].elements['publication_status'].value=<?php echo $category_info->publication_status;?>
</script>