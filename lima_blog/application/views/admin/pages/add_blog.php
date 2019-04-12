<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Blog</h2>
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
						<form class="form-horizontal" action="<?php echo base_url();?>Super_admin/save_blog" method="post">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Blog Title </label>
							  <div class="controls">
								<input type="text" name="blog_title" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
							  </div>
							</div>
						       	<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Blog Category</label>
							  <div class="controls">
							  <select name="category_id">
							  	<option>select category</option>
                                <?php foreach($published_category as $category){ ?>
							  	<option value="<?php echo $category->category_id;?>"><?php echo $category->category_name;?></option>
                                <?php }?>
							  </select>
							  </div>
							</div>  
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Blog Short Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="blog_short_description" id="textarea2" rows="3"></textarea>
							  </div>
							</div>
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Blog Long Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="blog_long_description" id="textarea2" rows="3"></textarea>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Author Name </label>
							  <div class="controls">
								<input type="text" name="author_name" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
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
							  <button type="submit" class="btn btn-primary">Save</button>
							  <button type="reset" class="btn">reset</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

