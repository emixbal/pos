<div class="row">
	<div class="col-lg-9">
		<table class="table">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Email</th>
					<th>Username</th>
					<th>Groups</th>
					<th>Status</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($users as $user){ ?>
				<tr>
					<td><?=$user->first_name?></td>
					<td><?=$user->email?></td>
					<td><?=$user->username?></td>
					<td>
					<?php foreach ($user->groups as $group) { ?>
						<span class="badge"><?=$group->name?></span>
					<?php } ?>
					</td>
					<td>
						<?php
						if($user->active==1){echo "Aktif";}
						elseif ($user->active==0) {echo "Non-aktif";}
						?>		
					</td>
					<td><a href="<?=site_url('User/user_edit/'.$user->id)?>"><i class="fa fa-gear"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>