<?php
 include 'new.php';
?>
<!DOCTYPE html>
<head>
   <title>Visualisation info</title>
    <meta charset=utf-8 />
    <script src="https://d3js.org/d3.v4.min.js"></script>
    <script src="//d3plus.org/js/d3.js"></script>
    <script src='js/census-2011.js'></script>
    <script src="//d3plus.org/js/d3plus.js"></script>
    <script src='https://api.tiles.mapbox.com/mapbox.js/v2.1.5/mapbox.js'></script>
    <script src='js/census-2011.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox.js/v2.1.5/mapbox.css' rel='stylesheet' />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
  <div style="width:50vw;height:100vh;" id='map' class='map'> </div>
  <div class="row" style="background-color:red;">

  </div>

    <!--<div id="container" style="color:red;position:fixed;right:0px;top:0px;width:735px;height:650px;background-color:#f5f5f5;z-index:3;">
       <center>States Vs Number of Phd's</center>
       <div id="viz" style="margin-left:10px;background-color:white;width:720px;height:320px;">
       </div><br>
   </div>-->
    <script id="popup-template" type="text/template">
    <h2>{{state}}</h2>
     <h2></h2><h2></h2>
 </script>
    <!-- <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script> -->
<script type="text/javascript" src="census-2011.js"></script>
<script>
    L.mapbox.accessToken = 'pk.eyJ1IjoiaHVuZ3J5c291bDEyMyIsImEiOiJjaXkxYnR3amowMDFxMzNwZzJ1N295d2hkIn0.lzC_CfX5ho-6IQ5R9bUeHw';
     var map = L.mapbox.map('map', 'light-v9').setView([20.95, 82.824707],4.7),
        // color reference from color brewer
        mapBrew = ['rgb(255,255,204)','rgb(217,240,163)','rgb(173,221,142)','rgb(120,198,121)','rgb(65,171,93)','rgb(35,132,67)','rgb(0,90,50)'],
        // population density range used for choropleth and legend
        mapRange = [2000, 1000, 800, 500, 300, 100, 0 ];
    // map legend for population density
    var legend = L.mapbox.legendControl( { position: "bottomleft" } ).addLegend( getLegendHTML() ).addTo(map),
        // popup for displaying state census details
        popup = new L.Popup({ autoPan: false, className: 'statsPopup' }),
        // layer for each state feature from geojson
        statesLayer,
        closeTooltip;
    // fetch the state geojson data
    d3.json( "india-states.json", function (statesData) {
        statesLayer = L.geoJson(statesData,  {
            style: getStyle,
            onEachFeature: onEachFeature
        }).addTo(map);
    } );
    function getStyle(feature) {
        return {
            weight: 2,
            opacity: 0.1,
            color: 'black',
            fillOpacity: 0.85,
            fillColor: getDensityColor( indiaCensus.states[feature.properties.code].density )
        };
    }
// get color depending on population density value
    function getDensityColor(d) {
        var colors = Array.prototype.slice.call(mapBrew).reverse(), // creates a copy of the mapBrew array and reverses it
             range = mapRange;

        return  d > range[0] ? colors[0] :
                d > range[1] ? colors[1] :
                d > range[2] ? colors[2] :
                d > range[3] ? colors[3] :
                d > range[4] ? colors[4] :
                d > range[5] ? colors[5] :
                colors[6];
    }
  // sample data array
     d3.json("empdata.json", function(error,data) {

         make_viz(data);});
//below animation is not used in html
   function make_viz(data){
     var visualization = d3plus.viz()
     .container("#viz")   // container DIV to hold the visualization
     .data(data)         // data to use with the visualization
     .type("bar")
     .id("id")  // visualization type
     .x("name")         // key for which our data is unique on
     .y("value")
    .font({ "family": "Bodoni" })
    .color(function(d){
       return Math.random();
     })// sizing of blocks
     .draw()
    }
//main function used in visualisation
    function make_viz1(data){
     d3plus.viz()
    .container("#viz1")  // container DIV to hold the visualization
    .data(data)
    .type("bar")
    .id("code")
    .x("name")
    .y("id")
//important function for coloring
     .color(function(d){
        return Math.random();
      })
    .draw()
}
      function onEachFeature(feature, layer) {
          layer.on({
             mousemove: mousemove,
             mouseout: mouseout,
          });
        }

      function mousemove(e) {
         var nikhil;
         var layer = e.target;
         var i;
         d3.json("data.json", function(error, data) {
        for (i in data)
      {
        //alert(data[i].value);
         if(data[i].name==layer.feature.id)
           {
             //alert(data[i].value);
             nikhil=data[i].value;
            //alert(nikhil);
          }
        }
        });
    //  alert(nikhil);
     var popupData = {
            state: indiaCensus.states[layer.feature.properties.code].name,
            density: "nikhil"+nikhil,
            area: indiaCensus.states[layer.feature.properties.code].area,
           growth: indiaCensus.states[layer.feature.properties.code].growth,
            population: indiaCensus.states[layer.feature.properties.code].population,
            capital: indiaCensus.states[layer.feature.properties.code].capital.name
        };
      //  alert(nikhil);
 console.log(popupData.density);
        popup.setLatLng(e.latlng);
        //alert(e.latlng);
        var popContent = L.mapbox.template( d3.select("#popup-template").text() , popupData );


           popup.setContent( popContent );
        if (!popup._map) popup.openOn(map);
           window.clearTimeout(closeTooltip);
        // highlight feature
         layer.setStyle({
            weight: 2,
            opacity: 0.3,
           fillOpacity: 0.9
          });
        if (!L.Browser.ie && !L.Browser.opera) {
            layer.bringToFront();
        }
        // update the graph with literacy and sex ratio data
      updateGraph( indiaCensus.states[layer.feature.properties.code] );
      }
//mouse out function
    function mouseout(e) {
        statesLayer.resetStyle(e.target);
        closeTooltip = window.setTimeout(function() {
            // ref: https://www.mapbox.com/mapbox.js/api/v2.1.6/l-map-class/
           map.closePopup( popup ); // close only the state details popup
        }, 100);
    }
   function zoomToFeature(e) {
        map.fitBounds(e.target.getBounds());
    }
    function getLegendHTML() {
        var grades = Array.prototype.slice.call(mapRange).reverse(), // creates a copy of ranges and reverses it
            labels = [],
            from, to;
        // color reference from color brewer
        var brew = mapBrew;

        for (var i = 0; i < grades.length; i++) {
            from = grades[i];
            to = grades[i + 1];

            labels.push(
                '<i style="background:' + brew[i] + '"></i> ' +
                from + (to ? '&ndash;' + to : '+'));
        }


    }

    // draw the layer with capital markers
    var capitalLayer;
    drawCapitalMarkers();
    // add the capitals toggle checkbox
    var capitalFilter = document.getElementById("capitals-filter"),
        capitalFilterDiv = document.getElementById("capitals-filter-div");
    capitalFilter.addEventListener("change", function(){
        this.checked ? map.addLayer(capitalLayer) : map.removeLayer(capitalLayer);
    });
    setCapitalFilterPosition();
    function drawCapitalMarkers () {
        var capitalGeoJson = [];
        for (var state in indiaCensus.states) {
            var capitalData = indiaCensus.states[state].capital;
            // capital marker geojson data
            capitalData.details.forEach( function ( capital, index ) {
                // location is normally in (latitude, longitude) format
                // but for geojson the format is  (longitude, latitude)
                capitalGeoJson.push({
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      // make an array copy and reverse the co-ordinates to (long,lat) for geojson
                      "coordinates": Array.prototype.slice.call(capital.coordinates).reverse()
                    },
                    "properties": {
                      "title": capital.name,
                      "description": capital.population ? "<strong>Population: </strong>" + capital.population : "(census data not available)",
                      "data": capital,
                      "marker-color": "#ffb90f",
                      "marker-size": "small",
                      "marker-symbol": "star"
                    }
                });
            } ); // end of 'forEach'
        } // end of 'for in'
        // add the marker layer
        capitalLayer = L.mapbox.featureLayer( capitalGeoJson ).addTo( map );
        // open the popup on hover
        capitalLayer.on('mouseover', function(e) {
            e.layer.openPopup();
            // update the graph if census details is present
            if (e.layer.feature.properties.data.sexratio) {
                updateGraph( e.layer.feature.properties.data );
            }
        });
        capitalLayer.on('mouseout', function(e) {
            e.layer.closePopup();
        });
     }
     function setCapitalFilterPosition () {
        var gistWidth = 960,
            gistHeight = 707;
        capitalFilterDiv.style.top = 0.5*gistHeight + "px";
        capitalFilterDiv.style.left = 0.78*gistWidth + "px";
        // adjust the defalut gist preview height
        d3.select(self.frameElement).style("height", gistHeight + "px");
      }
       </script>
    </body>
</html>
