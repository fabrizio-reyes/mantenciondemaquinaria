<script type="text/javascript">
  function confirmFunction(formulario, nombre) {
    console.log(formulario);
    event.preventDefault();
    const swalWithBootstrapButtons = Swal.mixin({
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false,
    })

  swalWithBootstrapButtons({
    title: 'Está seguro que desea realizar ésta acción?',
    text: "Esta acción no se puede revertir",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Si, eliminar!',
    cancelButtonText: 'No, cancelar!',
    reverseButtons: true
  }).then((result) => {
    if (result.value) {
      swalWithBootstrapButtons({
        title: 'Eliminado!',
        text: 'La eliminación ha sido exitosa',
        type: 'success',
        showConfirmButton: false
      });
      setTimeout(function(){
        $('#'+formulario).submit();
      }, 600);

    } else if (
      // Read more about handling dismissals
      result.dismiss === Swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons(
        'Cancelado',
        'La eliminación se ha cancelado',
        'error'
      )
    }
  })
  }
  </script>