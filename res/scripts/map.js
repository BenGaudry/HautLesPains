// Initialisation de marqueurs
  var depots = {
      "Le fournil": { "lat": 45.79217721237921, "lon": 4.424878720066065 },
      "Dépôt d'Essertines-en-Donzy": { "lat": 45.753799751447076, "lon": 4.345199476898543 },
      "Dépot de St-Martin-en-Haut - Les jardins d'avenir"  : {"lat": 45.66043284674929, "lon": 4.559343236687274},
      "Dépôt de St-Barthélémy-Lestra - L'art oseur" : {"lat": 45.720527565466604, "lon" : 4.340534770468566},
      "Dépôt de St-Symphorien-sur-Coise - Bleu Charrette" : {"lat": 45.63103204879151, "lon": 4.455750200002097},
      "Dépôt de St-Clément-les-Places - Le p'tit clem" : {"lat": 45.7526041167981, "lon": 4.423363069308346},
      "Dépôt de St-Laurent-de-Chamousset - Aux produits d'antan" : {"lat": 45.73809537156266, "lon": 4.464254457672914},
      "Dépôt de Montromant" : {"lat": 45.70872393060651, "lon": 4.524676621709805},
      "Dépôt de Duerne" : {"lat": 45.684360234741675, "lon": 4.527180720556517}
  };
  // On initialise la latitude et la longitude du fournil (centre de la carte)
  var lat = 45.79214582753273;
  var lon = 4.4248785829709085;
  var macarte = null;
  // Fonction d'initialisation de la carte
  function initMap(imgpath) {
      // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
      macarte = L.map('map').setView([lat, lon], 17);
      // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
      L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
          // Il est toujours bien de laisser le lien vers la source des données
          attribution: 'Données © <a href="//osm.org/copyright" target="_blank">OpenStreetMap</a> / ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
          minZoom: 10,
          maxZoom: 17
      }).addTo(macarte);

      console.log('path: ', imgpath + 'fournil.png')
      console.log('path: ', imgpath + 'pin.png')
      
      for (depot in depots) {
          if(depot == "Le fournil"){
              var myIcon = L.icon({
                  iconUrl: imgpath + "fournil.png",
                  iconSize: [50, 50],
                  iconAnchor: [25, 50],
                  popupAnchor: [-3, -76],
              });
              var marker = L.marker([depots[depot].lat, depots[depot].lon], { icon: myIcon }).addTo(macarte);
          } else {
              var myIcon = L.icon({
                  iconUrl: imgpath + "pin.png",
                  iconSize: [50, 50],
                  iconAnchor: [25, 50],
                  popupAnchor: [-3, -76],
              });
              var marker = L.marker([depots[depot].lat, depots[depot].lon], { icon: myIcon }).addTo(macarte);
          }
          marker.bindPopup(depot);
      }  
  }