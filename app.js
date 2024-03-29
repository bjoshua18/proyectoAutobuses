$(document).ready(() => {

	hideFormWindow()
	let editBus = false

	// Esta funcion se ejecuta en cuanto inicia la app
	fetchBuses()

	// Listar los autobuses
	function fetchBuses() {
		hideFormWindow()
		$.ajax({
			url: 'ver_autobuses.php',
			type: 'GET',
			success: response => {
				let buses = JSON.parse(response)
				let result = ''
				buses.forEach(bus => {
					result += `
					<div class="autobus" busid="${bus.id}">
						<h3>
							Nombre: <span>${bus.nombre}</span>
							<a href='#' class='borrarBus'>Borrar</a>
							<a href='#' class='editarBus'>Editar</a>
						</h3>
						<h4>Color: <span>${bus.color}</span></h4>
						<h4>Capacidad: <span>${bus.capacidad}</span></h4>
					</div>
					`
				})
				$('#autobuses').html(result)
			}
		})
	}

	// Crear autobus, se ejecuta cuando se envía el formulario
	$('#buses-form').submit(e => {
		const postData = {
			nombre: $('#nombre').val(),
			color: $('#color').val(),
			capacidad: $('#capacidad').val(),
			id: $('#idBus').val()
		}

		// Estamos creando o editando un autobus?
		let url = !editBus ? 'alta_autobuses.php' : 'editar_autobuses.php'

		$.post(url, postData, response => {
			fetchBuses()
			edit = false
			$('#buses-form').trigger('reset')
			})
		
		e.preventDefault()
	})

	// Editar autobus
	$(document).on('click', '.editarBus', (e) => {
		let element = e.target.parentElement.parentElement // Obtenemos el elemento que tiene el id del bus
		let id = $(element).attr('busid')
		
		$.post('mostrar_autobus.php', {id}, response => {
			showFormWindow()
			const bus = JSON.parse(response)
			$('#nombre').val(bus.nombre)
			$('#color').val(bus.color)
			$('#capacidad').val(bus.capacidad)
			$('#idBus').val(bus.id)
			editBus = true
		})
		e.preventDefault() // Evitar recarga
	})

	$(document).on('click', '.borrarBus', e => {
		if(confirm("¿Estás seguro/a que quieres eliminarlo?")) {
			let element = e.target.parentElement.parentElement
			let id = $(element).attr('busid')
			$.post('eliminar_autobus.php', {id}, response => fetchBuses())
		}
		e.preventDefault()
	})

	// Botón para abrir formulario para añadir un nuevo autobus
	$('.nuevobus').on('click', e => {
		showFormWindow()
		e.preventDefault()
	})

	// Botón para cerrar ventana de formulario
	$('#btn-cancelar').on('click', e => {
		hideFormWindow()
		$('#buses-form').trigger('reset')
		editBus = false
		e.preventDefault()
	})

	function showFormWindow() {
		$('#form-container').show()
	}

	function hideFormWindow() {
		$('#form-container').hide()
	}

})