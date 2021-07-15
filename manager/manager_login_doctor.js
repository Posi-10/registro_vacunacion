const correo = /(\w|-|\.)+@(gmail|hotmail|live|yahoo|outlook)([\.a-z]+)/gim
let mensaje = ""
let mensaje_alerta = false

function vacio(id, nombre) {
    if ($(id).val() != "") {
        $(id).addClass('is-valid')
        $(id).removeClass('is-invalid')
    } else {
        $(id).addClass('is-invalid')
        $(id).removeClass('is-valid')
        mensaje += `${nombre}, `
        mensaje_alerta = true
    }
}

function swal_vacio(mensaje_vacio) {
    Swal.fire({
        icon: 'warning',
        html: `
            <p class="fs-2">Te faltan los siguientes campos:</p>
            <p class="fs-5">${mensaje_vacio}</p>
        `,
        showClass: {
            popup: 'animate__animated animate__fadeInDownBig'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutDownBig'
        }
    }).then(() => {
        mensaje = ""
        mensaje_alerta = false
    })
}

$(() => {

    $('#login_doctor_correo').keypress((e) => {
        if (correo.test($('#login_doctor_correo').val())) {
            $('#login_doctor_correo').addClass('is-valid')
            $('#login_doctor_correo').removeClass('is-invalid')
        } else {
            $('#login_doctor_correo').addClass('is-invalid')
            $('#login_doctor_correo').removeClass('is-valid')
        }
    })

    $('#btn_login').click(() => {
        vacio('#login_doctor_correo', 'Correo')
        vacio('#login_doctor_pass', 'Contraseña')
        if (mensaje_alerta) {
            mensaje = mensaje.substring(0, mensaje.length - 2)
            swal_vacio(mensaje)
        } else {
            $.ajax({
                type: "POST",
                data: {
                    "email": $('#login_doctor_correo').val(),
                    "pass": $('#login_doctor_pass').val()
                },
                url: "control/control_login_doctor.php",
                success: (resultado) => {
                    console.log(resultado)
                    if (resultado == 1) {
                        $('#frm_login_doctor')[0].reset()
                        Swal.fire({
                            icon: 'success',
                            html: `
                                <p class="fs-3">Exito</p>
                                <p class="fs-5">lo encontramos, bienvenido</p>
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
                            window.location = "inicio_doctor"
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            html: `
                                <p class="fs-3">Error</p>
                                <p class="fs-5">no te encontramos, puede ser que no estes registraso. <a href="registro_doctor" class="link-secondary">Registrate</a></p>
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
                        }).then(() => {
                            window.location.reload();
                        })
                    }
                }
            })

        }
    })
})