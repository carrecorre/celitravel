$(document).ready(function(){
    Select2.load();
});

var Select2 = function() {

    var loadBehaviourSelect2 = function () {
        // ensure select2 is called once
        $(".select2-multiple").each(function(){
            if(!$(this).data('select2-multiple-applied')) {
                $(this).select2();
            }
        });
        $(".select2-multiple").data('select2-multiple-applied','1');
    };

    return {
        load: function(){
            loadBehaviourSelect2();
        }
    }
}();