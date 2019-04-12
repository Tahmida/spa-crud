<!-- <?php
//echo '<pre>';
//print_r($result);
//exit();

?> -->
<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Manage Category</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Category Name</th>
								  <th>Category Description</th>
								  <th>Publication Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php foreach($all_category as $category){?>
							<tr>
								<td><?php echo $category->category_name;?></td>
								<td class="center"><?php echo $category->category_description;?></td>
								<td>
								<?php 
                                  if($category->publication_status==1){?>
                                  	 <span class="label label-success">Published</span>
                                  <?php }
                                  else{ ?>
                                  <span class="label label-danger">Unpublished</span>
                              <?php }?>
                                 
									
								</td>
								
								<td class="center">
									<?php if($category->publication_status==1){?>

									<a class="btn btn-danger" href="<?php echo base_url()?>super_admin/unpublished_category_by_id/<?php echo $category->category_id;?>">
										<i class="halflings-icon white arrow-down"></i>                                            
									</a>
									<?php }
                                     else{
                                     	?>
                                     	<a class="btn btn-success" href="<?php echo base_url()?>super_admin/published_category_by_id/<?php echo $category->category_id;?>">
										<i class="halflings-icon white arrow-up"></i>                                            
									</a>
									 <?php }?>
									<a class="btn btn-info" href="<?php echo base_url();?>super_admin/edit_category/<?php echo $category->category_id; ?>">
										<i class="halflings-icon white edit"></i>                                            
									</a>
									<a class="btn btn-danger" href="<?php echo base_url();?>super_admin/delete_category_by_id/<?php echo $category->category_id;?>" onclick="return check_delete('<?php echo $category->category_name;?>')" >
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							<?php }?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			</div><!--/row-->