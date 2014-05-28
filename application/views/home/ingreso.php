 <?= form_open('home/ingresar', array('class'=>'form-horizontal')); ?>

  <legend>Ingreso al sistema</legend>

  <?= my_validation_errors(validation_errors()); ?>

  <div class="control-group">
   <?= form_label('Usuario :', 'login', array('class'=>'control-label')); ?>
   <?= form_input(array('type'=>'text', 'name'=>'login', 'id'=>'login', 'placeholder' => 'Usuario...', 'value'=>set_value('login')));?>
  </div>

  <div class="control-group">
   <?= form_label('Password :', 'password', array('class'=>'control-label')); ?>
   <?= form_input(array('type'=>'password', 'name'=>'password', 'id'=>'password', 'value'=>set_value('password')));?>
  </div>

  <div class="form-actions">
   <?= form_button(array('type'=>'submit', 'content'=>'Ingresar', 'class'=>'btn btn-primary')); ?>
   <?= anchor('home/index', 'Cancelar', array('class'=>'btn')); ?>
  </div>

 <?= form_close(); ?>
