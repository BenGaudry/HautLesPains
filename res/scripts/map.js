// On initialise la latitude et la longitude du fournil (centre de la carte)
const lat = 45.79214582753273;
const lon = 4.4248785829709085;
var macarte = null;
var deposits = null;
// Fonction d'initialisation de la carte
function initMap(imgpath) {

	var requestURL = 'http://localhost/HautLesPains2/config/db/depots.json';
	var request = new XMLHttpRequest();
	request.open('GET', requestURL);
	request.responseType = 'json';
	request.send();
	request.onload = function () {
		deposits = request.response;
		addPinToMap(imgpath);
	}

	// Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
	macarte = L.map('map').setView([lat, lon], 17);
	// Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
	L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
		// Il est toujours bien de laisser le lien vers la source des données
		attribution: 'Données © <a href="//osm.org/copyright" target="_blank">OpenStreetMap</a> / ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
		minZoom: 10,
		maxZoom: 17
	}).addTo(macarte);
}

console.log(deposits);

function addPinToMap(imgpath) {
	for (i in deposits) {
		if (deposits[i].name === "Le fournil") {
			var myIcon = L.icon({
				iconUrl: imgpath + "fournil.png",
				iconSize: [50, 50],
				iconAnchor: [25, 50],
				popupAnchor: [-3, -76],
			});
			var marker = L.marker([deposits[i].lat, deposits[i].lon], { icon: myIcon }).addTo(macarte);
		} else {
			var myIcon = L.icon({
				iconUrl: imgpath + "pin.png",
				iconSize: [50, 50],
				iconAnchor: [25, 50],
				popupAnchor: [-3, -76],
			});
			var marker = L.marker([deposits[i].lat, deposits[i].lon], { icon: myIcon }).addTo(macarte);
		}
		marker.bindPopup(deposits[i].name);
	}
}