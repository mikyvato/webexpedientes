<?php

?>

<h1>Agregar Observacion: </h1>

<p> <?php echo CHtml::submitButton('<< Volver', array('submit' => CHttpRequest::getUrlReferrer(), 'class'=>"btn btn-inverse")); ?></p>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>