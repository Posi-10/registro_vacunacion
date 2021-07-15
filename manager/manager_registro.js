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
            $('#registro_estado').html(resultado)
        }
    })

    lleno('#registro_nombre')
    lleno('#registro_a_paterno')
    lleno('#registro_a_materno')
    lleno('#registro_fecha')
    lleno('#registro_sexo')
    lleno('#registro_curp')
    lleno('#registro_estado')
    lleno('#registro_municipio')
    lleno('#registro_colonia')
    lleno('#registro_direccion')
    lleno('#registro_cp')
    lleno('#registro_correo')
    lleno('#registro_pass')

    $('#registro_estado').on('change', () => {
        $('#registro_municipio').removeAttr('disabled')
        $.ajax({
            type: "POST",
            data: "estado=" + $('#registro_estado').val(),
            url: "control/control_municipio.php",
            success: (resultado) => {
                $('#registro_municipio').html(resultado)
            }
        })
    })

    $('#registro_municipio').on('change', () => {
        $('#registro_colonia').removeAttr('disabled')
        $.ajax({
            type: "POST",
            data: "municipio=" + $('#registro_municipio').val(),
            url: "control/control_colonia.php",
            success: (resultado) => {
                $('#registro_colonia').html(resultado)
            }
        })
    })

    $('#registro_colonia').on('change', () => {
        $.ajax({
            type: "POST",
            data: "codigoPostal=" + $('#registro_colonia').val(),
            url: "control/control_cdigoPostal.php",
            success: (resultado) => {
                $('#registro_cp').val(resultado)
            }
        })
    })

    $('#registro_correo').keypress((e) => {
        if (correo.test($('#registro_correo').val())) {
            $('#registro_correo').addClass('is-valid')
            $('#registro_correo').removeClass('is-invalid')
        } else {
            $('#registro_correo').addClass('is-invalid')
            $('#registro_correo').removeClass('is-valid')
        }
    })

    compara('#registro_confir_correo', '#registro_correo')
    compara('#registro_confir_pass', '#registro_pass')

    $('#btn_registro').click(() => {
        vacio('#registro_nombre', 'Nombre')
        vacio('#registro_a_paterno', 'Apellido paterno')
        vacio('#registro_a_materno', 'Apellido materno')
        vacio('#registro_fecha', 'Fecha de nacimiento')
        vacio('#registro_sexo', 'Sexo')
        vacio('#registro_curp', 'CURP')
        vacio('#registro_estado', 'Estado')
        vacio('#registro_municipio', 'Municipio')
        vacio('#registro_colonia', 'Colonia')
        vacio('#registro_direccion', 'Direccion')
        vacio('#registro_cp', 'Codigo postal')
        vacio('#registro_correo', 'Correo electronico')
        vacio('#registro_confir_correo', 'Confirmar correo electronico')
        vacio('#registro_pass', 'Contraseña')
        vacio('#registro_confir_pass', 'Confirmar contraseña')
        if (mensaje_alerta) {
            mensaje = mensaje.substring(0, mensaje.length - 2)
            swal_vacio(mensaje)
        } else {
            $.ajax({
                type: "POST",
                data: {
                    "nombre": $('#registro_nombre').val(),
                    "apaterno": $('#registro_a_paterno').val(),
                    "amaterno": $('#registro_a_materno').val(),
                    "fecha": $('#registro_fecha').val(),
                    "sexo": $('#registro_sexo').val(),
                    "curp": $('#registro_curp').val(),
                    "estado": $('#registro_estado').val(),
                    "municipio": $('#registro_municipio').val(),
                    "colonia": $('#registro_colonia').val(),
                    "direccion": $('#registro_direccion').val(),
                    "codigopostal": $('#registro_cp').val(),
                    "correo": $('#registro_correo').val(),
                    "pass": $('#registro_pass').val()
                },
                url: "control/control_registro.php",
                success: (resultado) => {
                    resultado = resultado.trim()
                    console.log(resultado)
                    if (resultado == 1) {
                        $('#frm_registro')[0].reset()
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
                        $('#registro_correo').removeClass('is-valid')
                        $('#registro_correo').addClass('is-invalid')
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
                        $('#registro_correo').removeClass('is-valid')
                        $('#registro_correo').addClass('is-invalid')
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