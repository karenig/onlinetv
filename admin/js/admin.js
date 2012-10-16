
$(document).ready(function() {
    var current = $("#counter").val();
    $(".add_new_row").click(function() {
       current = parseInt(current)+1;
       $("#answer_div").append('<div><input type="text" name="answer['+current+'][arm]" /><input type="text" name="answer['+current+'][rus]" /><input type="text" name="answer['+current+'][eng]" /><input type="hidden" name="votes['+current+']" value="0" /><input type="button" class="entry" value="-" /></div>');
    });
    
    $(".entry").live("click", function() {
       $(this).parent().remove(); 
    });
});
