
<div class="modal fade" tabindex="-1" id="modal-flash" role="dialog" aria-labelledby="placeholderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content  modal-flash text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
            </div> 
                <div class="modal-body">
                <div id="<?php echo $key; ?>Message" class="<?php echo !empty($params['class']) ? $params['class'] : 'message'; ?>"><?php echo $message; ?></div>
                </div> 
            <div class="modal-footer">     

            </div>
        </div>
    </div>
</div>