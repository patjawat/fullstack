function closeModal(){
    $('#main-modal').modal('toggle');
  }
  function beforLoadModal(){
    $('#main-modal-label').html('Loadding...');
    $(".modal-dialog").removeClass('modal-sm modal-md modal-lg');
    $(".modal-dialog").addClass('modal-sm');
    $('#main-modal').removeClass('fade');
    $('#main-modal').modal('show');
    $('.modal-body').html('<div class=" text-center fa-3x"><i class="fas fa-spinner fa-pulse"></i></div>');
}