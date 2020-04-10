function saveMeetingRoom(){
        var form =  $('#events-form');
        $.ajax({
             url: form.attr('action'),
             type: 'post',
             data: form.serialize(),
             success: function (response) {
                 console.log(response);
                  if(response){
                   closeModal()
                  }else{
                   alert(response)
                  }
             }
        });

}