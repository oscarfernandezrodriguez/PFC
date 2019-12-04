// Creamos el mapa si existe la capa
	if ( $("#mapa").length !== 0 ) {
		var mapa = L.map('mapa').setView([43.48555,-8.2219087], 15);
				L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiZXJlc21hbG8iLCJhIjoiY2pncDVvc3BzMDB0bTMzb2ZhYWZoZWswcyJ9.BG1bIJ-J9TlF6HQVHORvVg', {
					maxZoom: 15,
				id: 'mapbox.streets',
				accessToken: 'pk.eyJ1IjoiZXJlc21hbG8iLCJhIjoiY2pncDVvc3BzMDB0bTMzb2ZhYWZoZWswcyJ9.BG1bIJ-J9TlF6HQVHORvVg'
				}).addTo(mapa);
		// Creamos el icono
					icono=L.marker([43.48555,-8.2219087]);
					icono.addTo(mapa);
					icono.bindPopup('<b>FerroFarma, Tu parafarmacia online</b><br><ul><li><i class="fa fa-map-marker-alt"></i> Avenida de Esteiro 121-123 1º K, Ferrol</li><li><i class="fas fa-phone-square-alt"></i> Llámenos: 98166666</li><li><i class="fab fa-whatsapp"></i> Whatsapp Disponible: 666666666</li></ul>').openPopup();
	}
