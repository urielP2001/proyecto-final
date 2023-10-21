document.addEventListener("DOMContentLoaded", function () {
    //fecha 30 dias para vencer


    // Obtén los elementos de entrada de fecha de emisión y fecha de vencimiento
    var fechaEmisionInput = document.getElementById("fechaEmision");
    var fechaVencimientoInput = document.getElementById("fechaVencimiento");

    // Agrega un event listener para el evento "input" en el campo de fecha de emisión
    fechaEmisionInput.addEventListener("input", function () {
        // Obtiene la fecha de emisión del campo de entrada
        var fechaEmision = new Date(fechaEmisionInput.value);

        // Verifica si la fecha de emisión es válida
        if (!isNaN(fechaEmision.getTime())) {
            // Calcula la fecha de vencimiento sumando 30 días a la fecha de emisión
            fechaEmision.setDate(fechaEmision.getDate() + 31);

            // Formatea la fecha de vencimiento en el formato "YYYY-MM-DD"
            var year = fechaEmision.getFullYear();
            var month = String(fechaEmision.getMonth() + 1).padStart(2, "0");
            var day = String(fechaEmision.getDate()).padStart(2, "0");
            var fechaVencimiento = year + "-" + month + "-" + day;

            // Establece la fecha calculada de vencimiento en el campo de fecha de vencimiento
            fechaVencimientoInput.value = fechaVencimiento;
        } else {
            // Si la fecha de emisión no es válida, muestra un mensaje de error (puedes personalizarlo)
            fechaVencimientoInput.value = "Fecha de emisión inválida";
        }
    });



});
    function eliminarNoti(id) {
        Swal.fire({
            title: '¿Quieres elimarlo?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrar!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
                window.location.href = '../controller/c_eliminar_noti.php?id=' + id;
                
            }
            })
                }
    function eliminarUsuario(id) {
        Swal.fire({
            title: '¿Quieres elimarlo?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrar!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
                window.location.href = '../controller/eliminar_u.php?id=' + id;
                
            }
            })
                }

    function eliminarAdmin(id) {
        Swal.fire({
            title: '¿Quieres elimarlo?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrar!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
                window.location.href = '../controller/c_eliminar_admin.php?id=' + id;
                
            }
            })
                }
    //alerta eliminar
    function eliminarAct(id) {
        Swal.fire({
            title: '¿Quieres elimarlo?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrar!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
                window.location.href = '../controller/c_eliminar_act.php?id=' + id;
                
            }
            })
                }
    function eliminarPlan(id) {
        Swal.fire({
            title: '¿Quieres elimarlo?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrar!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
                window.location.href = '../controller/eliminar.php?id_plan=' + id;
                
            }
            })
                }
    function eliminarSitio(id) {
        Swal.fire({
            title: '¿Quieres elimarlo?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrar!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
                window.location.href = '../controller/eliminar_sitio.php?id=' + id;
                
            }
            })
                }

    //rellenar id facturacion

    function rellenarId() {
        var select = document.getElementById("usuario"); // elemento select
        var id_usuario = document.getElementById("id_usuario"); //input a cambiar
        var plan = document.getElementById("plan"); //input a cambiar
        var total = document.getElementById("total"); //input a cambiar
        var selectedOption = select.options[select.selectedIndex]; //opcion seleccionada
        var opcion = plan.options[select.selectedIndex]; //opcion seleccionada uso la del select porque la de plan me da el valor anterior
        
        if (selectedOption.value === "") {
            id_usuario.value = ""; // No se ha seleccionado un usuario
        } else {
            id_usuario.value = selectedOption.value; // Establece el ID del usuario seleccionado
            plan.value = selectedOption.className;
        }

        if (opcion.value === "") {
            total.value = ""; // No se ha seleccionado un usuario
        } else {
            total.value = opcion.getAttribute("data-precio"); // Establece el ID del usuario seleccionado
        }
        
    }


    function calcularMonto() {
        var plan = document.getElementById("plan");
        var total = document.getElementById("total");

        var opcion = plan.options[plan.selectedIndex];

        if (opcion.value === "") {
            total.value = ""; // No se ha seleccionado un usuario
        } else {
            total.value = opcion.getAttribute("data-precio"); // Establece el ID del usuario seleccionado
        }
    }

    function rellenarId2() {
        var select = document.getElementById("usuario"); // elemento select
        var id_usuario = document.getElementById("id_usuario"); //input a cambiar
        var selectedOption = select.options[select.selectedIndex]; //opcion seleccionada
        
        
        if (selectedOption.value === "") {
            id_usuario.value = ""; // No se ha seleccionado un usuario
        } else {
            id_usuario.value = selectedOption.value; // Establece el ID del usuario seleccionado
        }
    }

    

