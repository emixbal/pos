<div class="row">
	<div class="col-lg-6">
		<p><?php echo validation_errors(); ?></p>
		<p>
			<?php
			if(isset($this->session->password_error_msg)){echo $this->session->password_error_msg;}
			?>		
		</p>
		<?=form_open('User/user_add_do')?>
		<div class="form-group">
			<label>Nama Depan</label>
			<input type="text" name="first_name" class="form-control" >
		</div>
		<div class="form-group">
			<label>Nama Belakang</label>
			<input type="text" name="last_name" class="form-control" >
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control" >
		</div>
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control" >
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control">
		</div>
		<div class="form-group">
			<label>Password Comfirm</label>
			<input type="password" name="password_confirm" class="form-control">
		</div>
		<button class="btn btn-primary pull-right">Simpan</button>
		<?=form_close()?>
	</div>
</div>