<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
?>
<?php $this->title='entry';?>
<?php $form = ActiveForm::begin(); ?>
	
    <?= $form->field($model, 'name') ->label('姓名:') ?>    

    <?= $form->field($model, 'email') ->label('密码:'); ?>
    
    

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        
    </div>

<?php ActiveForm::end(); ?>