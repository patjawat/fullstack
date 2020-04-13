function saveModels(){
    var form = $('#form-models');
    $.ajax({
        type: "post",
        url: form.attr("action"),
        data: form.serialize(),
        dataType: "json",
        success: function (response) {
            $.pjax.reload({container:'#bands-container-pjax'});
            closeModal();
        }
    });
}
