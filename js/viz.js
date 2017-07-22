//Map dimensions (in pixels)
var width = 528,
    height = 600,
    active=d3.select("null");

//Map projection
var projection = d3.geo.mercator()
    //.scale(983.5869955347179)
    .scale(850)
    //.center([82.80077083015976,22.75088461627577])
    .center([86,21])
    .translate([width/2,height/2]) //translate to center the map in view

//Generate paths based on projection
var path = d3.geo.path()
    .projection(projection);

//Create an SVG
var svg = d3.select("#viz").append("svg")
    .attr("width", "100%")
    .attr("height", height);

//Group for the map features
var features = svg.append("g")
    .attr("class","features");

//Create zoom/pan listener
//Change [1,Infinity] to adjust the min/max zoom scale
var zoom = d3.behavior.zoom()
    .scaleExtent([1, Infinity])
    .on("zoom",zoomed);

svg.call(zoom);

var g = svg.append("g")
    .style("stroke-width", "1.5px");


d3.json("viz/India-States.topojson",function(error,geodata) {
  if (error) return console.log(error); //unknown error, check the console

  //Create a path for each map feature in the data
  features.selectAll("path")

    .data(topojson.feature(geodata,geodata.objects.collection).features) //generate features from TopoJSON
    .enter()
    .append("path")
    .attr("d",path)
    .on("click",clicked);

});

// Add optional onClick events for features here
// d.properties contains the attributes (e.g. d.properties.name, d.properties.population)

function clicked(d,i) {
  $("#state").val(d.properties.ST_NM);
    visualize();
  if (active.node() === this) return reset();
active.classed("active", false);
active = d3.select(this).classed("active", true);
var bounds = path.bounds(d),
      dx = bounds[1][0] - bounds[0][0],
      dy = bounds[1][1] - bounds[0][1],
      x = (bounds[0][0] + bounds[1][0]) / 2,
      y = (bounds[0][1] + bounds[1][1]) / 2,
      scale = .6 / Math.max(dx / width, dy / height),
      translate = [width / 2 - scale * x, height / 2 - scale * y];
  g.transition()
      .duration(750)
      .style("stroke-width", 1.5 / scale + "px")
      features.attr("transform", "translate(" + translate + ")scale(" + scale + ")");
}

function reset() {
  var g = svg.append("g")
      .style("stroke-width", "1.5px");
  active.classed("active", false);
  active = d3.select(null);
  g.transition()
      .duration(750)
      .style("stroke-width", "1.5px")
      features.attr("transform", "");
}
//Update map on zoom/pan
function zoomed() {

  features.attr("transform", "translate(" + zoom.translate() + ")scale(" + zoom.scale() + ")")
      .selectAll("path").style("stroke-width", 1 / zoom.scale() + "px" );

}

// d3plus
function visualize()
{
  console.log("visss  ");
  var year = $("#year").val();
  var sex = $("#sex").val();
  var state = $("#state").val();
  var area = $("#area").val();
  var status = $("#status").val();
  var data;
  //bar
  $("#title1").html("");
  $("#result1").html("");
  $(".modal-title1").html("");
  $(".modal-body1").html("");
  $.ajax({
    type : 'post' ,
    async : false ,
    url : 'viz/chart.php' ,
    data : {year:year,sex:sex,state:state,area:area,status:status} ,
    success:function(output)
    {
      data = JSON.parse(output);
      //table
      /*;
      <?php $servername = "127.0.0.1"; $username = "root"; $password = "$@!Sai5171"; $database = "hackindia"; $con =  mysqli_connect($servername, $username, $password, $database); $extract = mysqli_query($con,"SELECT COUNT(DISTINCT research_area.name) AS sum from research_area"); $row = mysqli_fetch_assoc($extract); echo $row['sum']?>*/
      var cnoco = 0;
      var cnophd = 0;
      $("#table_info").html("");
      if(state == "%")
      {
        var tb=$("<table class='table table-striped table-hover'><caption><legend style='text-align:center;'>All States &nbsp; | &nbsp; Tabular Information</legend></caption><thead><tr><th style='text-align:center;border:1px solid black;'>Name of the state</th><th style='text-align:center;border:1px solid black;'>Number of colleges</th><th style='text-align:center;border:1px solid black;'>Number of PHD scholars</th><th style='text-align:center;border:1px solid black;'>State code</th></tr><thead/>").attr("id","mytable");
        $("#table_info").append(tb);
        for(var i=0;i<data.length;i++)
        {
          cnoco += data[i]["Number of colleges"];
          cnophd += data[i]["Number of phd's"];
          var td1="<tr><td style='text-align:center;border:1px solid black;'>"+data[i]["state name"]+"</td>";
          var td2="<td style='text-align:center;border:1px solid black;'>"+data[i]["Number of colleges"]+"</td>";
          var td3="<td style='text-align:center;border:1px solid black;'>"+data[i]["Number of phd's"]+"</td>";
          var td4="<td style='text-align:center;border:1px solid black;'>"+data[i]["codes"]+"</td></tr>";
          $("#mytable").append("<tbody class='table-group1'>"+td1+td2+td3+td4+"</table></tbody>");
        }
        //viz_under
        $("#viz_under").html("");
        $("#viz_under").append(
          '<ul class="list-group">'+
            '<li class="list-group-item">'+
              '<span class="badge">'+'158'+'</span>'+
              'Total number of institutions offering PhD in biotechnology'+
            '</li>'+
            '<li class="list-group-item">'+
              '<span class="badge">'+cnoco+'</span>'+
              'Total number of institutions (registered)'+
            '</li>'+
            '<li class="list-group-item">'+
              '<span class="badge">'+cnophd+'</span>'+
              'Total number of PhD candidates'+
            '</li>'+
          '</ul>');
      }
      else
      {
        var tb=$("<table class='table table-striped table-hover'><caption><legend style='text-align:center;'>"+state+" &nbsp; | &nbsp; Tabular Information</legend></caption><thead><tr><th style='text-align:center;border:1px solid black;'>State code</th><th style='text-align:center;border:1px solid black;'>College ID</th><th style='text-align:center;border:1px solid black;'>Name of the college</th><th style='text-align:center;border:1px solid black;'>Total Number of research area's</th><th  style='text-align:center;border:1px solid black;'>Number of phd's</th></tr><thead/>").attr("id","mytable");
        $("#table_info").append(tb);
        for(var i=0;i<data.length;i++)
        {
          var td1="<tr style='text-align:center;border:1px solid black;'><td>"+data[i]["codes"]+"</td>";
          var td2="<td style='text-align:center;border:1px solid black;'>"+data[i]["College Id"]+"</td>";
          var td3="<td style='text-align:center;border:1px solid black;'>"+data[i]["College name"]+"</td>";
          var td4="<td style='text-align:center;border:1px solid black;'>"+data[i]["Total Number of research area's"]+"</td>";
          var td5="<td style='text-align:center;border:1px solid black;'>"+data[i]["Number of phd's"]+"</td></tr>";
          $("#mytable").append("<tbody class='table-group1'>"+td1+td2+td3+td4+td5+"</table></tbody>");
        }
      }
      //table end
      if(state == "%")
      {
        state = "All State";
        $("#title1").html("Bar Chart&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;"+state+"&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;Number of phd <span style='float:right;' class='glyphicon glyphicon-triangle-bottom'></span> <a onclick='$(\"#result1\").toggle();' href='#table_info' style='padding:0px 25px 0px 0px;float:right;'>View Information</a>");
        $(".modal-title1").html("Bar Chart&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;"+state+"&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;Number of phd");
        d3plus.viz()
        .container("#result1")
        .data(data)
        .type("bar")
        .id("codes")
        .x("state name")
        .y("Number of phd's")
        .font({ "family": "Times" })
        .legend({"size": 50})
        .tooltip(["state name"])
        .color(function(d)
        {
          return Math.random();
        })
        .draw()
        d3plus.viz()
        .container(".modal-body1")
        .data(data)
        .type("bar")
        .id("codes")
        .x("state name")
        .y("Number of phd's")
        .font({ "family": "Times" })
        .legend({"size": 50})
        .tooltip(["state name"])
        .color(function(d)
        {
          return Math.random();
        })
        .draw()
      }
      else
      {
        $("#title1").html("Bar Chart&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;"+state+"&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;Number of phd <span style='float:right;' class='glyphicon glyphicon-triangle-bottom'></span> <a onclick='$(\"#result1\").toggle();' href='#table_info' style='padding:0px 25px 0px 0px;float:right;'>View Information</a>");
        $(".modal-title1").html("Bar Chart&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;"+state+"&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;Number of phd");
        d3plus.viz()
        .container("#result1")
        .data(data)
        .type("bar")
        .id("College Id")
        .x("College name")
        .y("Number of phd's")
        .font({ "family": "Times" })
        .legend({"size": 50})
        .tooltip(["state name"])
        .color(function(d)
        {
          return Math.random();
        })
        .draw()
        d3plus.viz()
        .container(".modal-body1")
        .data(data)
        .type("bar")
        .id("College Id")
        .x("College name")
        .y("Number of phd's")
        .font({ "family": "Times" })
        .legend({"size": 50})
        .tooltip(["state name"])
        .color(function(d)
        {
          return Math.random();
        })
        .draw()
      }
    }
  });
  //pie
  $("#title2").html("");
  $("#result2").html("");
  $(".modal-title2").html("");
  $(".modal-body2").html("");
  if(state == "All State")
  {
    $("#title2").html("Pie Chart&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;"+state+"&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;Number of phd <span style='float:right;' class='glyphicon glyphicon-triangle-bottom'></span> <a onclick='$(\"#result2\").toggle();' href='#table_info' style='padding:0px 25px 0px 0px;float:right;'>View Information</a>");
    $(".modal-title2").html("Pie Chart&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;"+state+"&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;Number of phd");
    d3plus.viz()
    .container("#result2")
    .data(data)
    .type("pie")
    .id("codes")
    .size("Number of phd's")
    .font({ "family": "Times" })
    .legend({"size": 50})
    .tooltip(["state name"])
    .color(function(d)
    {
      return Math.random();
    })
    .draw()
    d3plus.viz()
    .container(".modal-body2")
    .data(data)
    .type("pie")
    .id("codes")
    .size("Number of phd's")
    .font({ "family": "Times" })
    .legend({"size": 50})
    .tooltip(["state name"])
    .color(function(d)
    {
      return Math.random();
    })
    .draw()
  }
  else
  {
    $("#title2").html("Pie Chart&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;"+state+"&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;Number of phd <span style='float:right;' class='glyphicon glyphicon-triangle-bottom'></span> <a onclick='$(\"#result2\").toggle();' href='#table_info' style='padding:0px 25px 0px 0px;float:right;'>View Information</a>");
    $(".modal-title2").html("Pie Chart&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;"+state+"&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;Number of phd");
    d3plus.viz()
    .container("#result2")
    .data(data)
    .type("pie")
    .id("College Id")
    .size("Number of phd's")
    .font({ "family": "Times" })
    .legend({"size": 50})
    .tooltip(["College name"])
    .color(function(d)
    {
      return Math.random();
    })
    .draw()
    d3plus.viz()
    .container(".modal-body2")
    .data(data)
    .type("pie")
    .id("College Id")
    .size("Number of phd's")
    .font({ "family": "Times" })
    .legend({"size": 50})
    .tooltip(["College name"])
    .color(function(d)
    {
      return Math.random();
    })
    .draw()
  }

}
$("#title1").click(function (){
  $('#result1').toggle();
});
$("#result1").click(function(){
  $("#Modal1").modal("show");
});
$("#title2").click(function (){
  $('#result2').toggle();
});
$("#result2").click(function(){
  $('#Modal2').modal('show');
});
function tree_map_chart()
{
  var year = $("#year").val();
  var sex = $("#sex").val();
  var state = $("#state").val();
  var area = $("#area").val();
  var status = $("#status").val();
  var data;
  $(".modal-title3").html("");
  $(".modal-body3").html("");
  $.ajax({
    type : 'post' ,
    async : false ,
    url : 'viz/chart.php' ,
    data : {year:year,sex:sex,state:state,area:area,status:status} ,
    success:function(output) {
      if(state == "%")
      {
        state = "All State";
        data = JSON.parse(output);
        $(".modal-title3").html("Tree Map Chart&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;"+state+"&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;Number of phd's");
        var visualization = d3plus.viz()
        .container(".modal-body3")
        .data(data)
        .type("tree_map")
        .id("codes")
        .size("Number of phd's")
        .font({ "family": "Times" })
        .legend({"size": 50})
        .tooltip(["state name"])
        .style("color", function(d){
          return "red";
        })
        .color(function(d){
          return Math.random();
        })
        .draw()
      }
      else
      {
        data = JSON.parse(output);
        $(".modal-title3").html("Tree Map Chart&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;"+state+"&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;Number of phd's");
        var visualization = d3plus.viz()
        .container(".modal-body3")
        .data(data)
        .type("tree_map")
        .id("College name")
        .size("Number of phd's")
        .font({ "family": "Times" })
        .legend({"size": 50})
        .tooltip(["state name"])
        .style("color", function(d){
          return "red";
        })
        .color(function(d){
          return Math.random();
        })
        .draw()
      }
    }
  });
  $('#Modal3').modal('show');
}
function bubble_chart()
{
  var year = $("#year").val();
  var sex = $("#sex").val();
  var state = $("#state").val();
  var area = $("#area").val();
  var status = $("#status").val();
  var data;
  $(".modal-title3").html("");
  $(".modal-body3").html("");
  $.ajax({
    type : 'post' ,
    async : false ,
    url : 'viz/chart.php' ,
    data : {year:year,sex:sex,state:state,area:area,status:status} ,
    success:function(output) {
      if(state == "%")
      {
        state = "All State";
        data = JSON.parse(output);
        $(".modal-title3").html("Bubble Chart&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;"+state+"&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;Number of phd's");
        var visualization = d3plus.viz()
        .container(".modal-body3")
        .data(data)
        .type("bubbles")
        .id(["codes"])
        .depth(1)
        .size("Number of phd's")
        .font({ "family": "Times" })
        .legend({"size": 50})
        .tooltip(["state name"])
        .color(function(d){
          return Math.random();
        })
        .draw()
      }
      else
      {
        data = JSON.parse(output);
        $(".modal-title3").html("Bubble Chart&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;"+state+"&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;Number of phd's");
        var visualization = d3plus.viz()
        .container(".modal-body3")
        .data(data)
        .type("bubbles")
        .id(["College name"])
        .depth(1)
        .size("Number of phd's")
        .font({ "family": "Times" })
        .legend({"size": 50})
        .tooltip(["state name"])
        .color(function(d){
          return Math.random();
        })
        .draw()
      }
    }
  });
  $('#Modal3').modal('show');
}
function line_chart()
{
  var year = $("#year").val();
  var sex = $("#sex").val();
  var state = $("#state").val();
  var area = $("#area").val();
  var status = $("#status").val();
  var data;
  $(".modal-title3").html("");
  $(".modal-body3").html("");
  $.ajax({
    type : 'post' ,
    async : false ,
    url : 'viz/chart.php' ,
    data : {year:year,sex:sex,state:state,area:area,status:status} ,
    success:function(output) {
      if(state == "%")
      {
        state = "All State";
        data = JSON.parse(output);
        $(".modal-title3").html("Scatter Chart&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;"+state+"&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;Number of phd's");
        var visualization = d3plus.viz()
        .container(".modal-body3")
        .data(data)
        .type("scatter")
        .id("codes")
        .x("Number of colleges")
        .y("Number of phd's")
        .font({ "family": "Times" })
        .legend({"size": 50})
        .tooltip(["state name","Number of colleges","Number of phd's"])
        .color(function(d){
          return Math.random();
        })
        .draw()
      }
      else
      {
        data = JSON.parse(output);
        $(".modal-title3").html("Scatter Chart&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;"+state+"&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;Number of phd's");
        var visualization = d3plus.viz()
        .container(".modal-body3")
        .data(data)
        .type("scatter")
        .id("College name")
        .x("Total Number of research area's")
        .y("Number of phd's")
        .font({ "family": "Times" })
        .legend({"size": 50})
        .tooltip(["state name","Number of colleges","Number of phd's"])
        .color(function(d){
          return Math.random();
        })
        .draw()
      }
    }
  });
  $('#Modal3').modal('show');
}
function male_female()
{
  var year = $("#year").val();
  $.ajax({
    type : 'post' ,
    async : false ,
    url : 'viz/male_female.php' ,
    data : {year:year} ,
    success:function(output) {
      //data = JSON.parse(output);
      console.log(output);
    }
  });
}
