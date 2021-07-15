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

function select(id_select) {
    $(id_select).select2()
}

function compara(id_accion, id_compara) {
    $(id_accion).on('change', () => {
        if ($(id_compara).val().trim() === $(id_accion).val()) {
            $(id_accion).addClass('is-valid')
            $(id_accion).removeClass('is-invalid')
        } else {
            $(id_accion).addClass('is-invalid')
            $(id_accion).removeClass('is-valid')
        }
    })
}

function lleno(id) {
    $(id).on('change', () => {
        if ($(id).val().trim() !== "") {
            $(id).addClass('is-valid')
            $(id).removeClass('is-invalid')
        }
    })
}

function cambiarAMayuscula(elemento) {
    let curp = elemento.value
    elemento.value = curp.toUpperCase()
}

$(() => {

    //select('#registro_estado')

    $.ajax({
        type: "POST",
        url: "control/control_estado.php",
        success: (resultado) => {
            console.log(resultado)
            $('#registro_doctor_estado').html(resultado)
        }
    })

    lleno('#registro_doctor_nombre')
    lleno('#registro_doctor_a_paterno')
    lleno('#registro_doctor_a_materno')
    lleno('#registro_doctor_hospital')
    lleno('#registro_doctor_sexo')
    lleno('#registro_doctor_cedula')
    lleno('#registro_doctor_estado')
    lleno('#registro_doctor_municipio')
    lleno('#registro_doctor_colonia')
    lleno('#registro_doctor_direccion')
    lleno('#registro_doctor_cp')
    lleno('#registro_doctor_correo')
    lleno('#registro_doctor_pass')

    $('#registro_doctor_estado').on('change', () => {
        $('#registro_doctor_municipio').removeAttr('disabled')
        $.ajax({
            type: "POST",
            data: "estado=" + $('#registro_doctor_estado').val(),
            url: "control/control_municipio.php",
            success: (resultado) => {
                $('#registro_doctor_municipio').html(resultado)
            }
        })
    })

    $('#registro_doctor_municipio').on('change', () => {
        $('#registro_doctor_colonia').removeAttr('disabled')
        $.ajax({
            type: "POST",
            data: "municipio=" + $('#registro_doctor_municipio').val(),
            url: "control/control_colonia.php",
            success: (resultado) => {
                $('#registro_doctor_colonia').html(resultado)
            }
        })
    })

    $('#registro_doctor_colonia').on('change', () => {
        $.ajax({
            type: "POST",
            data: "codigoPostal=" + $('#registro_doctor_colonia').val(),
            url: "control/control_cdigoPostal.php",
            success: (resultado) => {
                $('#registro_doctor_cp').val(resultado)
            }
        })
    })

    $('#registro_doctor_correo').keypress((e) => {
        if (correo.test($('#registro_doctor_correo').val())) {
            $('#registro_doctor_correo').addClass('is-valid')
            $('#registro_doctor_correo').removeClass('is-invalid')
        } else {
            $('#registro_doctor_correo').addClass('is-invalid')
            $('#registro_doctor_correo').removeClass('is-valid')
        }
    })

    compara('#registro_doctor_confir_correo', '#registro_doctor_correo')
    compara('#registro_doctor_confir_pass', '#registro_doctor_pass')

    $('#btn_registro').click(() => {
        vacio('#registro_doctor_nombre', 'Nombre')
        vacio('#registro_doctor_a_paterno', 'Apellido paterno')
        vacio('#registro_doctor_a_materno', 'Apellido materno')
        vacio('#registro_doctor_fecha', 'Fecha de nacimiento')
        vacio('#registro_doctor_sexo', 'Sexo')
        vacio('#registro_doctor_curp', 'CURP')
        vacio('#registro_doctor_estado', 'Estado')
        vacio('#registro_doctor_municipio', 'Municipio')
        vacio('#registro_doctor_colonia', 'Colonia')
        vacio('#registro_doctor_direccion', 'Direccion')
        vacio('#registro_doctor_cp', 'Codigo postal')
        vacio('#registro_doctor_correo', 'Correo electronico')
        vacio('#registro_doctor_confir_correo', 'Confirmar correo electronico')
        vacio('#registro_doctor_pass', 'Contraseña')
        vacio('#registro_doctor_confir_pass', 'Confirmar contraseña')
        if (mensaje_alerta) {
            mensaje = mensaje.substring(0, mensaje.length - 2)
            swal_vacio(mensaje)
        } else {
            $.ajax({
                type: "POST",
                data: {
                    "nombre": $('#registro_doctor_nombre').val(),
                    "apaterno": $('#registro_doctor_a_paterno').val(),
                    "amaterno": $('#registro_doctor_a_materno').val(),
                    "sexo": $('#registro_doctor_sexo').val(),
                    "hospital": $('#registro_doctor_hospital').val(),
                    "cedula": $('#registro_doctor_cedula').val(),
                    "estado": $('#registro_doctor_estado').val(),
                    "municipio": $('#registro_doctor_municipio').val(),
                    "colonia": $('#registro_doctor_colonia').val(),
                    "direccion": $('#registro_doctor_direccion').val(),
                    "codigopostal": $('#registro_doctor_cp').val(),
                    "correo": $('#registro_doctor_correo').val(),
                    "pass": $('#registro_doctor_pass').val()
                },
                url: "control/control_registro_doctor.php",
                success: (resultado) => {
                    resultado = resultado.trim()
                    console.log(resultado)
                    if (resultado == 1) {
                        $('#frm_registro_doctor')[0].reset()
                        Swal.fire({
                            icon: 'success',
                            html: `
                                <p class="fs-3">Exito</p>
                                <p class="fs-5">Los datos furon guardados con exito</p>
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
                    } else if (resultado == 2) {
                        $('#registro_doctor_correo').removeClass('is-valid')
                        $('#registro_doctor_correo').addClass('is-invalid')
                        Swal.fire({
                            icon: 'warning',
                            html: `
                                <p class="fs-3">Alvertencia</p>
                                <p class="fs-5">EL correo ya esta registrado</p>
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
                    } else if (resultado == 3) {
                        $('#registro_doctor_cedula').removeClass('is-valid')
                        $('#registro_doctor_cedula').addClass('is-invalid')
                        Swal.fire({
                            icon: 'warning',
                            html: `
                                <p class="fs-3">Alvertencia</p>
                                <p class="fs-5">la Cedula ya esta registrado</p>
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
                    } else {
                        Swal.fire({
                            icon: 'error',
                            html: `
                                <p class="fs-3">Error</p>
                                <p class="fs-5">Los datos tubieron un error al guardar</p>
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
    })
})