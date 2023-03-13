$('.form_delete').submit(function(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Estas seguro?',
        text: "Esta acción no se podrá revertir!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonCcdolor: '#e01f32',
        cancelButtonColor: '#e01f32',
        confirmButtonText: 'Si, borrar!'
    }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
    })
})
