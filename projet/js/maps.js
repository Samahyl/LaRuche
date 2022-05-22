var map = L.map('map').setView([48.0921798, -1.63333], 13);

var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
  maxZoom: 18,
  attribution: '',
  id: 'mapbox/streets-v11',
  tileSize: 512,
  zoomOffset: -1
}).addTo(map);

L.marker([48.0921798, -1.63333]).addTo(map)
  .bindPopup('19 rue Louis Kérautret Botmel<br>35000 Rennes')
  .openPopup();