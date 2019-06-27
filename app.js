$(document).ready(() => {

	// Esta funcion se ejecuta en cuanto inicia la app
	fetchBuses()

	// Listar los autobuses
	function fetchBuses() {
		$.ajax({
			url: 'ver_autobuses.php',
			type: 'GET',
			success: response => {
				let buses = JSON.parse(response)
				let result = ''
				buses.forEach(bus => {
					result += `
					<div class="autobus" busid="${bus.id}">
						<h3>Nombre: <span>${bus.nombre}</span><a href='#' class='editarBus'><img src='images/editar.png'/></a></h3>
						<h4>Color: <span>${bus.color}</span></h4>
						<h4>Capacidad: <span>${bus.capacidad}</span></h4>
					</div>
					`
				})
				$('#autobuses').html(result)
			}
		})
	}

	// Editar autobus
	$(document).on('click', '.editarBus', (e) => {
		let element = e.target.parentElement.parentElement.parentElement // Obtenemos el elemento que tiene el id del bus
		let id = $(element).attr('busid')
		$.post('editar_autobuses.php', {id}, response => {
			// Pendiente
		})
		e.preventDefault() // Evitar recarga
	})

	// Botón para abrir formulario para añadir un nuevo autobus
	$('.nuevobus').on('click', e => {
		showFormWindow()
		e.preventDefault()
	})

	// Botón para cerrar ventana de formulario
	$('#btn-cancelar').on('click', e => {
		hideFormWindow()
		e.preventDefault()
	})

	function showFormWindow() {
		$('#form-container').show()
	}

	function hideFormWindow() {
		$('#form-container').hide()
	}

})