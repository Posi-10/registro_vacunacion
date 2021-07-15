function obtenerDatos() {
    $.ajax({
        type: "POST",
        url: "control/control_datos.php",
        success: (resultado) => {
            resultado = JSON.parse(resultado)
            $('#datos_nombre').val(resultado['nombre'])
            $('#datos_a_paterno').val(resultado['apaterno'])
            $('#datos_a_materno').val(resultado['amaterno'])
            $('#datos_fecha').val(resultado['fecha'])
            $('#datos_sexo').val(resultado['sexo'])
            $('#datos_curp').val(resultado['curp'])
            $('#datos_estado').val(resultado['estado'])
            $('#datos_municipio').val(resultado['municipio'])
            $('#datos_colonia').val(resultado['colonia'])
            $('#datos_direccion').val(resultado['direccion'])
            $('#datos_cp').val(resultado['codigopostal'])
            let estado = resultado['estado']
            let municipio = resultado['municipio']
            let colonia = resultado['colonia']
            $.ajax({
                type: "POST",
                url: "control/control_estado.php",
                success: (resultado) => {
                    $('#datos_estado').html(resultado)
                    $(`#datos_estado > option[value='${estado}']`).attr("selected", true)
                }
            })
            $.ajax({
                type: "POST",
                data: "estado=" + estado,
                url: "control/control_municipio.php",
                success: (resultado) => {
                    $('#datos_municipio').html(resultado)
                    $(`#datos_municipio > option[value='${municipio}']`).attr("selected", true)
                }
            })
            $.ajax({
                type: "POST",
                data: "municipio=" + municipio,
                url: "control/control_colonia.php",
                success: (resultado) => {
                    $('#datos_colonia').html(resultado)
                    $(`#datos_colonia > option[value='${colonia}']`).attr("selected", true)
                }
            })
        }
    })

}
$(() => {

    $.ajax({
        type: "POST",
        url: "control/control_estado.php",
        success: (resultado) => {
            $('#datos_estado').html(resultado)
        }
    })
    $('#datos_estado').on('change', () => {
        $('#datos_municipio').removeAttr('disabled')
        $.ajax({
            type: "POST",
            data: "estado=" + $('#datos_estado').val(),
            url: "control/control_municipio.php",
            success: (resultado) => {
                $('#datos_municipio').html(resultado)
            }
        })
    })
    $('#datos_municipio').on('change', () => {
        $('#datos_colonia').removeAttr('disabled')
        $.ajax({
            type: "POST",
            data: "municipio=" + $('#datos_municipio').val(),
            url: "control/control_colonia.php",
            success: (resultado) => {
                $('#datos_colonia').html(resultado)
            }
        })
    })
    $('#datos_colonia').on('change', () => {
        $.ajax({
            type: "POST",
            data: "codigoPostal=" + $('#datos_colonia').val(),
            url: "control/control_cdigoPostal.php",
            success: (resultado) => {
                $('#datos_cp').val(resultado)
            }
        })
    })

    obtenerDatos()

    $('#activar_actualizacion').click(() => {
        if ($('#activar_actualizacion').is(':checked')) {
            $('#datos_nombre').removeAttr('disabled')
            $('#datos_a_paterno').removeAttr('disabled')
            $('#datos_a_materno').removeAttr('disabled')
            $('#datos_fecha').removeAttr('disabled')
            $('#datos_sexo').removeAttr('disabled')
            $('#datos_curp').removeAttr('disabled')
            $('#datos_estado').removeAttr('disabled')
            $('#datos_municipio').removeAttr('disabled')
            $('#datos_colonia').removeAttr('disabled')
            $('#datos_direccion').removeAttr('disabled')
            $('#btn_actualizar').removeAttr('hidden')
        } else {
            $('#datos_nombre').attr('disabled', 'disabled')
            $('#datos_a_paterno').attr('disabled', 'disabled')
            $('#datos_a_materno').attr('disabled', 'disabled')
            $('#datos_fecha').attr('disabled', 'disabled')
            $('#datos_sexo').attr('disabled', 'disabled')
            $('#datos_curp').attr('disabled', 'disabled')
            $('#datos_estado').attr('disabled', 'disabled')
            $('#datos_municipio').attr('disabled', 'disabled')
            $('#datos_colonia').attr('disabled', 'disabled')
            $('#datos_direccion').attr('disabled', 'disabled')
            $('#btn_actualizar').attr('hidden', 'hidden')
        }
    })

    $('#btn_actualizar').click(() => {
        $.ajax({
            type: "POST",
            data: {
                "nombre": $('#datos_nombre').val(),
                "apaterno": $('#datos_a_paterno').val(),
                "amaterno": $('#datos_a_materno').val(),
                "fecha": $('#datos_fecha').val(),
                "sexo": $('#datos_sexo').val(),
                "curp": $('#datos_curp').val(),
                "estado": $('#datos_estado').val(),
                "municipio": $('#datos_municipio').val(),
                "colonia": $('#datos_colonia').val(),
                "direccion": $('#datos_direccion').val(),
                "codigopostal": $('#datos_cp').val()
            },
            url: "control/control_actualizar_datos.php",
            success: (resultado) => {
                console.log(resultado)
                if (resultado == 1) {
                    $('#frm_registro')[0].reset()
                    Swal.fire({
                        icon: 'success',
                        html: `
                            <p class="fs-3">Exito</p>
                            <p class="fs-5">Los datos furon actualizados con exito</p>
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
                            <p class="fs-5">Los datos tubieron un error al actualizar</p>
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
                        <p class="fs-5">Nos da gusto que se ponga al pendiente de su salud</p>
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