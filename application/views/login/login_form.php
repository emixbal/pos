<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<br>
<br>
<div class="col-sm-12 col-md-4 col-md-offset-4">
    <div class="panel panel-success">
        <div class="panel-heading"><?=$title?></div>
        <div class="panel-body">
            <p><?php echo validation_errors(); ?></p>
            <p><?php if(isset($this->session->login_error)){echo $this->session->login_error;} ?></p>
            <?=form_open('Login/login_process')?>
                <div class="form-group">
                    <label for="identity">Email/username</label>
                    <input type="text" class="form-control" name="identity">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <input type="submit" value="Login" name="login_bt" class="btn btn-success pull-right">
            <?=form_close()?>
        </div>
        <div class="panel-footer">
            <small><a href="<?=site_url('Login/register')?>">Belum punya akun? Daftar di sini</a></small>
        </div>
    </div>    
</div>
