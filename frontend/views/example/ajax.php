<?php

?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style>
    .center{
width: 150px;
  margin: 40px auto;  
}
</style>

<div class="center">
    <div class="input-group">
          <span class="input-group-btn">
              <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                <span class="glyphicon glyphicon-minus"></span>
              </button>
          </span>
          <input type="text" name="quant[2]" class="form-control input-number" value="10" min="1" max="100">
          <span class="input-group-btn">
              <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                  <span class="glyphicon glyphicon-plus"></span>
              </button>
          </span>
      </div>
</div>

<script>
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type === 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) === input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type === 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) === input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
   </script>