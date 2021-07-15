function accion(id_usuario, vacunado) {
    $.ajax({
        type: "POST",
        data: {
            'id_usuario': id_usuario,
            'vacunado': vacunado
        },
        url: "control/control_vacunado.php",
        success: (resultado) => {
            if (resultado == 1) {
                Swal.fire({
                    icon: 'success',
                    html: `
                        <p class="fs-3">Exito</p>
                        <p class="fs-5">El vacunado fue actualizados con exito</p>
                    `,
                    showClass: {
                        popup: 'animate__animated animate__rotateInDownLeft'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__rotateOutDownLeft'
                    },
                    showConfirmButton: false,
                    timer: 5000
                }).then(() => {
                    window.location.reload()
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    html: `
                        <p class="fs-3">Error</p>
                        <p class="fs-5">error al actualizar</p>
                    `,
                    showClass: {
                        popup: 'animate__animated animate__rotateInDownLeft'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__rotateOutDownLeft'
                    },
                    showConfirmButton: false,
                    toast: true,
                    timer: 5000
                })
            }
        }
    })

}

$(() => {
    $('#vacunados').DataTable({
        language: {
            url: 'raw/json/sp-mx.json'
        }
    })

    $('#btn_salir').click(() => {
        $.ajax({
            type: "POST",
            url: "control/control_salir.php",
            success: (r) => {
                console.log(r)
                Swal.fire({
                    icon: 'success',
                    html: `
                    <p class="fs-3">Adios</p>
                    <p class="fs-5">bye bye doctor</p>
                    `,
                    showClass: {
                        popup: 'animate__animated animate__rotateInDownLeft'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__rotateOutDownLeft'
                    },
                    showConfirmButton: false,
                    timer: 5000
                }).then(() => {
                    window.location = 'login'
                })
            }
        })
    })
})