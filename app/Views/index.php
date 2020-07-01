<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?= $this->include('layouts/navbar') ?>
    <div class="container mt-5">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8">
				<div class="text-right">
					<?php if(session()->get('role') == 1):?>
						<a href="" class="btn btn-warning btn-sm text-white font-weight-bolder" data-toggle="modal" data-target="#createPizza">
						<i class="material-icons float-left" data-toggle="tooltip" title="Add Pizza!" data-placement="left">add</i>&nbsp;Add
					</a>
					<?php endif ?>
				</div>
				<hr>
				<table class="table table-borderless table-hover">
					<tr>
						<th>Name</th>
						<th>Ingredients</th>
						<th>Price</th>
						
						<?php if(session()->get('role') == 1):?>
							<th>Status</th>
						<?php endif ?>
					</tr>
					
					<?php foreach($pizzas as $pizza) :?>
					<tr>
						<td class="pizzaName"><?= $pizza['name']?></td>
						<td><?= $pizza['ingredient']?></td>
						<td  class="text-success font-weight-bolder"><?= $pizza['price']?></td>
						
						<?php if(session()->get('role') == 1):?>
						<td>
							<a href="pizza/updateForm/<?= $pizza['id']?>" data-toggle="modal" data-target="#updatePizza"><i class="material-icons text-info editPizza" data-toggle="tooltip" title="Edit Pizza!" data-placement="left">edit</i></a>
							<a href="pizza/delete/<?= $pizza['id']?>" data-toggle="tooltip" title="Delete Pizza!" data-placement="right"><i class="material-icons text-danger">delete</i></a>
						</td>
					<?php endif ?>
					</tr>
					<?php endforeach?>
					
				</table>
			</div>
			<div class="col-2"></div>
		</div>
	</div>


<!-- ========================================START Model CREATE================================================ -->
	<!-- The Modal -->
	<div class="modal fade" id="createPizza">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Pizza</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-right">
		<form  action="pizza/create" method="post">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Pizza name" name = "name">
				</div>
				<div class="form-group">
					<textarea class="form-control" placeholder="Ingredient" name = "ingredient"></textarea>
				</div>
				<div class="form-group">
					<input type="number" class="form-control" placeholder="Prize in dollars" name = "price">
				</div>
				<?php if(isset($validation)): ?>
					<div class="alert alert-danger" role="alert">
						<?= $validation->listErrors(); ?>
					</div>
          		<?php endif; ?>
				<a data-dismiss="modal" class="closeModal">DISCARD</a>
				&nbsp;
				<input type="submit" value="CREATE" class="createBtn text-warning">
				
			</div>
      </div>
        </form>
      </div>
    </div>
  </div>
  <!-- =================================END MODEL CREATE==================================================== -->

  <!-- ========================================START Model UPDATE================================================ -->
	<!-- The Modal -->
	<div class="modal fade" id="updatePizza">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Pizza</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-right">
			<form  action="pizza/updatePizza" method="post">
			<input type="hidden" name = "id" id = "update_id" value = "4">

				<div class="form-group">
					<input type="text" class="form-control" name = "name" id = "name" value>
				</div>
				<div class="form-group">
					<textarea   class="form-control" name = "ingredient" id = "ingredient" ></textarea>
				</div>
				<div class="form-group">
					<input type="number" class="form-control" name = "price" id = "price" >
				</div>
				<?php if(isset($validation)): ?>
					<div class="alert alert-danger" role="alert">
						<?= $validation->listErrors(); ?>
					</div>
          		<?php endif; ?>
			<a data-dismiss="modal" class="closeModal">DISCARD</a>
		 	 &nbsp;
		  <input type="submit" value="UPDATE" class="createBtn text-warning">
        </div>
        </form>
      </div>
    </div>
  </div>
  <script>
	 $(document).ready(function(){
		$('.editPizza').on('click',function(){
			$tr = $(this).closest('tr');
			var data = $tr.children('td').map(function(){
				return $(this).text();
			}).get();
			console.log(data)
			//$('#update_id').val(data[]);
			$('#name').val(data[0]);
			$('#ingredient').val(data[1]);
			$('#price').val(data[2]);
		});
	})
 </script>
  <!-- =================================END MODEL UPDATE==================================================== -->
<?= $this->endSection() ?>
 