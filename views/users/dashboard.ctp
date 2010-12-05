<?php echo $this->Html->h2(__('Dashboard', true)); ?>
<?php echo $this->Session->flash(); ?>
<?php if (Authsome::get('group') == 'admin') : ?>
<div class="meta_listing information">
	<div><?php echo $this->Html->link(__('Github User Index', true),
			array('controller' => 'github', 'action' => 'index')); ?></div>
<?php endif; ?>
	<div><?php echo $this->Clearance->link(__('Change Password', true),
			array('controller' => 'users', 'action' => 'change_password')); ?></div>
	<div><?php echo $this->Clearance->link(__('Logout', true),
			array('controller' => 'users', 'action' => 'logout')); ?></div>
</div>