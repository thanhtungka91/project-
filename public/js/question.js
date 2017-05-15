$(document).ready(function(){
    $('#question_type').change(function(){
        if($(this).val() == 1){
            $("#answer_text").show();
            $("#answer_select").hide();
            $(".answer_select").hide();
            $("#answer_map").hide();
        }
        if($(this).val() == 2){
            $("#answer_text").hide();
            $("#answer_map").hide();
            $("#answer_select").show();
            $(".answer_select").show();
        }
        if($(this).val() == 3){
            $("#answer_text").hide();
            $("#answer_select").hide();
            $(".answer_select").hide();
            $("#answer_map").show();
        }
    });
    $('#add_answer').click(function(){
        var include = '<div class="add_answer"><input type="text" /><span class="btn btn-default remove_button"> Delete</span></div>';
        $(".add_answer").last().after(include);

    });
    $('.answer_select').on('click','.remove_button',function() {
        $(this).parent().remove();
    });
});