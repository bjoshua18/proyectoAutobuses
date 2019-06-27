$(document).ready(() => {

	// Esta funcion se ejecuta en cuanto inicia la app
	fetchBuses();

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
					<h3>Nombre: <span>${bus.nombre}</span><a href='editar_autobuses.php?id=${bus.id}' class='editar'><img src='images/editar.png'/></a></h3>
					<h4>Color: <span>${bus.color}</span></h4>
					<h4>Capacidad: <span>${bus.capacidad}</span></h4>
					`
				})
				$('#autobuses').html(result)
			}
		})
	}

})