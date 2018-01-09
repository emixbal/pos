<div class="row">
	<div class="col-lg-6">
		<p><?php echo validation_errors(); ?></p>
		<p>
			<?php
			if(isset($this->session->password_error_msg)){echo $this->session->password_error_msg;}
			?>		
		</p>
		<?=form_open('User/user_edit_do')?>
		<input type="text" name="id" value="<?=$user->id?>" hidden>
		<div class="form-group">
			<label>Nama Depan</label>
			<input type="text" name="first_name" class="form-control" value="<?=$user->first_name?>">
		</div>
		<div class="form-group">
			<label>Nama Belakang</label>
			<input type="text" name="last_name" class="form-control" value="<?=$user->last_name?>">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control" value="<?=$user->email?>">
		</div>
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control" value="<?=$user->username?>">
		</div>
		<div class="form-group">
		    <label>Status</label>
		    <label class="radio-inline">
		    <input type="radio" name="active" value="1" <?php if($user->active==1){echo "checked";}?>>Active
		    </label>
		    <label class="radio-inline">
		    <input type="radio" name="active" value="0" <?php if($user->active==0){echo "checked";}?>>Non-Active
		    </label>
		</div>

		<div class="form-group">
			<label>Group Level</label>
			<div class="checkbox">
				<?php foreach($groups as $group): ?>
				<label>
					<?php
					$group_id=$group->id;
					$checked = null;
					$item = null;
					foreach($user_groups as $grp) {
						if ($group_id == $grp->id) {
							$checked= ' checked="checked"';
							break;
						}
					}
					?>					
					<input type="checkbox" name="groups[]" value="<?=$group->id?>" <?=$checked?> ><?=$group->name?>
				</label>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control">
		</div>
		<div class="form-group">
			<label>Password Comfirm</label>
			<input type="password" name="password_confirm" class="form-control">
		</div>

		<button class="btn btn-warning pull-right">Simpan</button>
		<?=form_close()?>
	</div>
</div>