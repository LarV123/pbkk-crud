<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/project_list.css">
<script src="<?php echo base_url(); ?>js/project_list.js"></script>
<script>
var url = "<?php echo base_url()?>";
</script>
</head>
<body>
    <div class="container">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2>Manage <b>Projects</b></h2>
						</div>
						<div class="col-xs-6">
							<a href="#addProjectModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Project</span></a>					
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Status</th>
							<th>Type</th>
							<th>Deadline</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
                        <?php foreach ($projects as $project_item): ?>
						<tr>
							<td><?php echo $project_item['name'];?></td>
							<td><?php echo $project_item['status'];?></td>
							<td><?php echo $project_item['types'];?></td>
							<td><?php echo date("d/m/Y", strtotime($project_item['deadline']));?></td>
							<td>
								<a href="#editProjectModal" onclick="editProject(<?php echo $project_item['id'];?>)" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#deleteProjectModal" onclick="deleteProject(<?php echo $project_item['id'];?>)" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>
                        <?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>        
    </div>
	<!-- Edit Modal HTML -->
	<div id="addProjectModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
                <?php echo form_open('projects/create'); ?>
					<div class="modal-header">						
						<h4 class="modal-title">Add Project</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Status</label>
                            <select name="status" class="form-control">
                                <option value="Pending">Pending</option>
                                <option value="In progress">In Progress</option>
                                <option value="Review">Review</option>
                                <option value="Done">Done</option>
                            </select>
						</div>
						<div class="form-group">
							<label>Type</label>
							<input type="text" name="type" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Deadline</label>
							<input type="date" name="deadline" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editProjectModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
                <?php echo form_open('projects/edit'); ?>
                    <input id="editParam" type="hidden" name="id" value="">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Project</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Status</label>
                            <select name="status" class="form-control">
                                <option value="Pending">Pending</option>
                                <option value="In progress">In Progress</option>
                                <option value="Review">Review</option>
                                <option value="Done">Done</option>
                            </select>
						</div>
						<div class="form-group">
							<label>Type</label>
							<input type="text" name="type" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Deadline</label>
							<input type="date" name="deadline" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteProjectModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
                <?php echo form_open('projects/delete'); ?>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Project</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
                        <input type="hidden" id="deleteParam" name="id" value="">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>