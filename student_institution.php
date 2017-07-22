<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <script type="text/javascript">
			document.addEventListener('contextmenu', event => event.preventDefault());
		</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/navbar-fixed-side.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <!--<link rel="stylesheet" type="text/css" href="css/main.css">-->
    <link rel="stylesheet" type="text/css" href="css/viz.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <!-- new map-->
    <script src="https://d3js.org/d3.v4.min.js"></script>
    <script src="//d3plus.org/js/d3.js"></script>
    <script src='http://35.154.87.54/viz1/js/census-2011.js'></script>
    <script src="//d3plus.org/js/d3plus.js"></script>
    <script src='https://api.tiles.mapbox.com/mapbox.js/v2.1.5/mapbox.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox.js/v2.1.5/mapbox.css' rel='stylesheet' />
    <!-- -->
    <title>View Institution</title>
    <style>
    body {
      background-color: rgb(235, 245, 251);
    }
    .dp {
      background: url(
      <?php
        $servername = "127.0.0.1";
        $username = "root";
        $password = "$@!Sai5171";
        $database = "hackindia";
        $con =  mysqli_connect($servername, $username, $password,$database);
        $email = $_SESSION['email'];
        $extract= mysqli_query($con,"select image from users where email='$email'");
        $row = mysqli_fetch_assoc($extract);
        echo '"data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"';
      ?>
      );
      background-position: center;
      background-size: cover;
      border-radius: 25%;
      /*border:1px solid white;*/
      width: 45px;
      height: 45px;
      cursor: pointer;
      margin-top:10px;
      -webkit-transition: -webkit-transform .3s ease-in-out;
      -ms-transition: -ms-transform .3s ease-in-out;
      transition: transform .3s ease-in-out;
    }
    .dp:hover {
      transform:rotate(360deg);
      -ms-transform:rotate(360deg);
      -webkit-transform:rotate(360deg);
    }
    .navbar-brand {
      float: left;
      padding: 5px 0px 7px 3px;
      font-size: 19px;
      line-height: 21px;
      height: 50px;
    }
    li a:hover {
      cursor: pointer;
    }
    </style>
  </head>
  <body onload="visualize();">
    <header>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3 col-lg-2">
            <nav class="navbar navbar-inverse navbar-fixed-side">
              <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" onclick="myFunction(this)">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                  </button>
                  <a class="navbar-brand" href="#"><h4><b>Smart Career </b><br>Student Profile</span></h4></a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                  <ul class="nav navbar-nav">
                    <li><a href="#" class="dropdown-toggle dp" style="margin-left:10px" data-toggle="dropdown" role="button" aria-expanded="false"></a><?php
                      $email = $_SESSION['email'];
                      $extract = mysqli_query($con,"select * from users where email='$email'");
                      $row = mysqli_fetch_assoc($extract);
                      echo "<p style='margin-left:10px;margin-top:10px;margin-bottom:-10px;color:white;'>".$row['namef']."</p>";
                    ?></li>
                    <br>
                    <li><a href="student_personal">Personal Details</a></li>
                    <li><a href="student_academic">Academic Details</a></li>
                    <li><a href="student_patent">Patent Details</a></li>
                    <li><a href="student_publication">Publication Details</a></li>
                    <li><a href="student_thesis">Thesis Details</a></li>
                    <li><a href="student_jobs">View Vacancy / Jobs</a></li>
                    <li><a href="student_search_guide.php">Search Guide/Equipment</a></li>
                    <li class="active"><a href="student_institution.php">View Institution</a></li>
                    <li><a href="student_setting">Profile Settings</a></li>
                    <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
          <div class="col-sm-9 col-lg-10">
            <!-- your page content -->
            <div class="progress progress-striped active" style="margin-top:10px;">
              <?php
                $servername = "127.0.0.1";
                $username = "root";
                $password = "$@!Sai5171";
                $database = "hackindia";
                $con =  mysqli_connect($servername, $username, $password,$database);
                $email = $_SESSION['email'];
                $bar = 0;
                $extract = mysqli_query($con,"select * from student_personal where email='$email'");
                $count = mysqli_num_rows($extract);
                if($count)
                  $bar++;
                $extract = mysqli_query($con,"select * from student_academic where email='$email'");
                $count = mysqli_num_rows($extract);
                if($count)
                  $bar++;
                $extract = mysqli_query($con,"select * from student_patent where email='$email'");
                $count = mysqli_num_rows($extract);
                if($count)
                  $bar++;
                $extract = mysqli_query($con,"select * from student_publication where email='$email'");
                $count = mysqli_num_rows($extract);
                if($count)
                  $bar++;
                $extract = mysqli_query($con,"select * from student_thesis where email='$email'");
                $count = mysqli_num_rows($extract);
                if($count)
                  $bar++;
                $bar = $bar * 20;
                echo "<div class='progress-bar progress-bar-success' style='width:$bar%'></div>";
              ?>
            </div>
            <div style="margin-bottom:10px;" class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
							<div class="modal-dialog" style="height:80vh;width:95vw;">
								<div class="modal-content">
									<div class="modal-header" align="center">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
										<h3 class="modal-title1">Chart</h3>
									</div>
									<br><div class="modal-body1" style="margin:auto;width:90vw;">
									</div><br>
								</div>
							</div>
						</div>
            <div style="margin-bottom:10px;" class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
							<div class="modal-dialog" style="height:80vh;width:95vw;">
								<div class="modal-content">
									<div class="modal-header" align="center">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
										<h3 class="modal-title2">Chart</h3>
									</div>
									<br><div class="modal-body2" style="margin:auto;width:90vw;">
									</div><br>
								</div>
							</div>
						</div>
            <div style="margin-bottom:10px;" class="modal fade" id="Modal3" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
							<div class="modal-dialog" style="height:80vh;width:95vw;">
								<div class="modal-content">
									<div class="modal-header" align="center">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
										<h3 class="modal-title3">Chart</h3>
									</div>
									<br><div class="modal-body3" style="margin:auto;width:90vw;">
									</div><br>
								</div>
							</div>
						</div>
            <!-- row 1 -->
            <div class="row">
              <div class="col-sm-12 col-sm-offset-0">
                <h3 style="text-align:center;"><b>Consolidated Details of Institutes offering PhD in Bio-Technology</b></h3>
              </div>
              <div class="col-sm-10 col-sm-offset-0" style="display:none;">
                <div class="container-fluid">
                  <div style="margin:0px 10px 0px 0px;float:left;">
                    <label style="margin:10px 0px 0px 0px;">Year</label>
                    <select class="form-control input-sm" id="year" name="year" style="width: 115px;margin:10px 0px 10px 0px;" autofocus required>
                      <option value='%'>All Year</option>
                      <option value="2000">2000</option>
                      <option value="2001">2001</option>
                      <option value="2002">2002</option>
                      <option value="2003">2003</option>
                      <option value="2004">2004</option>
                      <option value="2005">2005</option>
                      <option value="2006">2006</option>
                      <option value="2007">2007</option>
                      <option value="2008">2008</option>
                      <option value="2009">2009</option>
                      <option value="2010">2010</option>
                      <option value="2011">2011</option>
                      <option value="2012">2012</option>
                      <option value="2013">2013</option>
                      <option value="2014">2014</option>
                      <option value="2015">2015</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                    </select>
                  </div>
                  <div style="margin:0px 10px 0px 0px;float:left;">
                    <label style="margin:10px 0px 0px 0px;">Gender</label>
                    <select class="form-control input-sm" id="sex" name="sex" style="width: 125px;margin:10px 0px 10px 0px;" required>
                      <option value='%'>All Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Transgender">Transgender</option>
                    </select>
                  </div>
                  <div style="margin:0px 10px 0px 0px;float:left;">
                    <label style="margin:10px 0px 0px 0px;">State</label>
                    <select class="form-control input-sm" id="state" name="state" style="width: 150px;margin:10px 0px 10px 0px;" required>
                      <?php
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "$@!Sai5171";
                        $database = "hackindia";
                        $con =  mysqli_connect($servername, $username, $password,$database);
                        $extract = mysqli_query($con,"select * from state_codes");
                        echo "<option value='%'>All State</option>";
                        while($row = mysqli_fetch_array($extract))
                        {
                          $name = $row['name'];
                          echo "<option value='$name'>$name</option>";
                        }
                      ?>
                    </select>
                  </div>
                  <div style="margin:0px 10px 0px 0px;float:left;">
                    <label style="margin:10px 0px 0px 0px;">Research Area</label>
                    <select class="form-control input-sm" id="area" name="area" style="width: 175px;margin:10px 0px 10px 0px;" required>
                      <?php
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "$@!Sai5171";
                        $database = "hackindia";
                        $con =  mysqli_connect($servername, $username, $password,$database);
                        $extract = mysqli_query($con,"select DISTINCT area from research_area");
                        echo "<option value='%'>All Research Area</option>";
                        while($row = mysqli_fetch_array($extract))
                        {
                          $area = $row['area'];
                          echo "<option value='$area'>$area</option>";
                        }
                      ?>
                    </select>
                  </div>
                  <div style="margin:0px 10px 0px 0px;float:left;">
                    <label style="margin:10px 0px 0px 0px;">Status</label>
                    <select class="form-control input-sm" id="status" name="status" style="width: 150px;margin:10px 0px 10px 0px;" required>
                      <option value='%'>All Status</option>
                      <option value='Freshly Registered'>Freshly Registered</option>
                      <option value='On going'>On going</option>
                      <option value='Waiting For viva'>Waiting For viva</option>
                      <option value='Completed'>Completed</option>
                    </select>
                  </div>
                  <div style="margin:0px 10px 0px 0px;float:left;">
                    <input style="width:150px;margin:40px 0px 10px 0px;" class="btn btn-default btn-sm" type="submit" onClick="visualize();" value="Visualize"/>
                  </div>
                </div>
              </div>
            </div>
            <!-- row 1 end -->
            <!-- row 2 -->
            <div class="row" style="display: flex;flex:1 0 auto;height:900px;">
              <div class="col-sm-5" style="float:left;margin:1px;border:1px solid black;">
                <br><div><!-- new map-->
                  <div id='map' class='map'> </div>

                   <!--<div id="container" style="color:red;position:fixed;right:0px;top:0px;width:735px;height:650px;background-color:#f5f5f5;z-index:3;">
                      <center>States Vs Number of Phd's</center>
                      <div id="viz" style="margin-left:10px;background-color:white;width:720px;height:320px;">
                      </div><br>
                  </div>-->
                   <script id="popup-template" type="text/template">
                   <h2>{{state}}</h2>
                    <h2>dxfdfdxfdf:</h2><h2>{{density}}</h2>
                </script>
                   <!-- <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script> -->
               <script type="text/javascript" src="census-2011.js"></script>
               <script>
                   L.mapbox.accessToken = 'pk.eyJ1IjoiaHVuZ3J5c291bDEyMyIsImEiOiJjaXkxYnR3amowMDFxMzNwZzJ1N295d2hkIn0.lzC_CfX5ho-6IQ5R9bUeHw';
                    var map = L.mapbox.map('map', 'light-v9').setView([20.95, 102.824707],4.7),
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
                   d3.json( "http://35.154.87.54/viz1/india-states.json", function (statesData) {
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
                    d3.json("http://35.154.87.54/viz1/empdata.json", function(error,data) {

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
                  <!-- -->

                </div><br>
                <div id="viz_under">
                </div>
              </div>
              <div class="col-sm-7" style="float:left;margin:1px;border:1px solid black;background-image: url('../images/background.png');background-repeat: repeat;">
                <div class="container-fluid">
                  <div class="row">
                    <div class="panel panel-primary" style="margin-top:15px;">
                      <div class="panel-heading">
                        <h3 class="panel-title" id="title1"></h3>
                      </div>
                      <div class="panel-body">
                        <div id="result1" style="height:350px;">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="panel panel-primary" style="margin-top:-15px;">
                      <div class="panel-heading">
                        <h3 class="panel-title" id="title2"></h3>
                      </div>
                      <div class="panel-body">
                        <div id="result2" style="height:270px;">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- row 2 end -->
            <!-- row 3 -->
            <div class="row">
              <div class="col-sm-8 col-sm-offset-4">
                <div style="margin:0px 10px 0px 0px;float:left;">
                  <input style="width:150px;margin:40px 0px 10px 0px;" class="btn btn-primary btn-sm" type="submit" onClick="tree_map_chart();" value="Tree Map Chart"/>
                </div>
                <div style="margin:0px 10px 0px 0px;float:left;">
                  <input style="width:150px;margin:40px 0px 10px 0px;" class="btn btn-success btn-sm" type="button" onClick="bubble_chart();" value="Bubble Chart"/>
                </div>
                <div style="margin:0px 10px 0px 0px;float:left;">
                  <input style="width:150px;margin:40px 0px 10px 0px;" class="btn btn-default btn-sm" type="button" onClick="line_chart();" value="Scatter Chart"/>
                </div>
              </div>
            </div>
            <!-- row 3 end -->
            <!-- row 4 -->
            <div class="row">
              <br><br><br>
              <div class="col-sm-12" id="table_info">
              </div>
            </div>
            <!-- row 4 end -->
            <!-- end your page content -->
          </div>
        </div>
      </div>
    </header>
    <section>

    </section>
    <footer>
    </footer>
  </body>
</html>
<script type="text/javascript">

</script>
<script src="//d3plus.org/js/d3.js"></script>
<script src="http://d3js.org/topojson.v1.min.js"></script>
<script src="//d3plus.org/js/d3plus.js"></script>
