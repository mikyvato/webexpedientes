<?php

?>



<div class="row-fluid">
    <div class="span12">
        <div class="page-header text-center">
            <h1>Nuevo Expediente</h1>
        </div>
    </div>
</div>


<div class="row-fluid">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>