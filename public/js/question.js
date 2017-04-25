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
        var html = $(".add_answer").first().clone();
        var remove=$('<input>').attr({
            type: "button",
            value: "delete",
            id: "remove",
            class: "btn btn-danger remove"

        });
        $(".add_answer").last().after(html).after(remove);
    });
    $('#dkm').click(function(){
        debugger;
        alert("here is remove");
        // $(this).parents(".add_answer").remove();
    });
});