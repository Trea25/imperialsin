$listacarrers = $('#listacarrers');
$(document).ready(function () {

    var resizeTime = 0;     // total duration of the resize effect, 0 is instant
    var resizeDelay = 10;    // time to wait before checking the window size again
    // the shorter the time, the more reactive it will be.
    // short or 0 times could cause problems with old browsers.

    var image = $('#mapimg');
    $('#mapimg').mapster({
        fillOpacity: 1,
        render_highlight: {
            fillColor: 'FFFFFF',
            //altImage: '/img/mapa/hover.jpg'
        },
        render_select: {
            fillOpacity: 1,
            fillColor: '3f44ff',
            // altImage: 'mapa2.png'
        },
        fadeInterval: 0,
        mapValue: 'alt',
        mapKey: 'id',

    });

// Resize the map to fit within the boundaries provided

    function resize() {
        var div = $('#mapcontainer');

        var newWidth = div.width();

        //if (imgWidth/maxWidth>imgHeight/maxHeight) {
        //    newWidth = maxWidth;
        //} else {
        //    newHeight = maxHeight;
        // }
        image.mapster('resize', newWidth, 0, resizeTime);

    }


// Track window resizing events, but only actually call the map resize when the
// window isn't being resized any more

    function onWindowResize() {

        var win = $(window),
            curWidth = win.width(),
            curHeight = win.height(),
            checking = false;
        if (checking) {
            return;
        }
        checking = true;
        window.setTimeout(function () {
            var newWidth = win.width(),
                newHeight = win.height();
            if (newWidth === curWidth &&
                newHeight === curHeight) {
                resize(newWidth, newHeight);
            }
            checking = false;
        }, resizeDelay);
    }

    $(window).bind('resize', onWindowResize);

});

function toogleArea(item) {

    $(item).toggleClass('selected');
}

function showcarrer(item) {

    $.ajax({
        url: "carrer/" + item.id,
        type: 'GET',
        dataType: 'json',
        success: function (resultat) {
            result = resultat.data;
            string = "<div><h3>" + result.cnom + "</h3><br /><h5>" + result.cany_inici + "</h5><br /><p>" + result.cdescripcio + "</p></div>";
            $("#result").html(string);
            fotoscarrers(result.id);
        }
    });
}

function getHora(string){
    string = string.trim();
    string = string.split(" ");
    string[1] = string[1].substr(0, string[1].length -3);
    return string[1];
}
function getDia(string){
    data = new Date(string);
    console.log(data.toLocaleDateString());
    return data.toLocaleDateString();
}


function search() {
    var carrers = new Array();
    $('.selected').each(function () {
        carrers.push(parseInt(this.id));
    });
    var dies = $("#altField").val();
    console.log(dies.indexOf(','));
    console.log(dies.length);
    if (dies != null && dies.length > 0 && dies.charAt(dies.length - 2) == ',') {
        dies = dies.substring(0, dies.length - 2);
    }
    if (dies.indexOf(',') != -1) {
        dies = dies.trim();
        dies = dies.split(", ");
        console.log(dies);
    }
    if (dies == "") {
        dies = 0;
    }

    var event = parseInt($("#events").val());

    $.ajax({
        url: "searchresults",
        data: {carrers: carrers, dies: dies, event: event},
        type: 'GET',
        dataType: 'json',
        success: function (resultat) {
            result = resultat.data;
            string = '<div class="row"><div class="col-md-4 col-sm-5"><div class="tabs-left"><ul class="nav nav-tabs">';
            nomcarrer = "";
            dataevent = "";
            console.log(result);
            first = true;
            contador = 0;
            for (i in result) {
                if (result[i].nom_carrer != nomcarrer) {
                    contador ++;
                    nomcarrer = result[i].nom_carrer;
                    if (first) {
                        string += "<li class='active'><a href='#carrer" + contador+ "' data-toggle='tab'>" + result[i].nom_carrer + "</a></li>";
                        first = false;
                    } else {
                        string += "<li><a href='#carrer" + contador + "' data-toggle='tab'>" + result[i].nom_carrer + "</a></li>";
                    }
                }
            }
            nomcarrer = "";
            contador = 0;
            string += "</ul><div id='myTabContent' class='tab-content'>";
            first = true;
            for (i in result) {
                if (result[i].nom_carrer != nomcarrer) {
                    contador++;
                    if(nomcarrer!="" &&!first){
                        string += "</div>";
                    }
                    nomcarrer = result[i].nom_carrer;
                    if (first) {
                        first = false;

                        string += "<div class='tab-pane active' id='carrer" + contador + "'>";
                        string += "<p>" + result[i].nom_carrer;

                    }
                    else {
                        string += "<div class='tab-pane' id='carrer" + contador + "'>";
                        string += "<p>" + result[i].nom_carrer;
                    }

                }
                if (dataevent != getDia(result[i].edata_inici)) {
                    dataevent = getDia(result[i].edata_inici);
                    string += "<p>" + getDia(result[i].edata_inici) + "</p>";
                }
                string += "<p>" +getHora(result[i].edata_inici)+" - "+  result[i].etitol + "</p>";
            }
            string += "</div></div></div></div></div>";
            $("#result").html(string);
                       function init() {
                setHeight();
            }

            function setHeight() {
                var $tabPane = $('.tab-pane'),
                    tabsHeight = $('.nav-tabs').height();

                $tabPane.css({
                    height: tabsHeight
                });
            }

            $(init);

        }

    });

}
function activar(id) {
    $("#" + id).toggleClass('active');
}
function fotoscarrers(id) {
    $.ajax({
        url: "carrer/foto/" + id,
        type: 'GET',
        dataType: 'json',
        success: function (result) {
            string = " <div id='gallery'>" +
                "<div id='gallery-carousel' class='carousel slide' data-interval='false'>" +
                "<div class='container'>" +
                "<div class='row'>" +
                "<div class='col-sm-12'>" +
                "<h2>Fotos</h2>" +
                "<a class='gallery-control-left' href='#gallery-carousel' data-slide='prev'><i class='fa fa-angle-left'></i></a> " +
                "<a class='gallery-control-right' href='#gallery-carousel' data-slide='next'><i class='fa fa-angle-right'></i></a> " +
                "<div class='carousel-inner'> " +
                "<div class='item active'> " +
                "<ul>";
            for (i = 0; i < result.length; i++) {
                if (i == 4 || i == 8) {
                    string += "</ul></div><div class='item'><ul>";
                }
                string += "<li><img class='img-responsive' src='foto/" + result[i].id + "' alt=''></li>";
            }

            string += "</ul> " +
                "</div> " +
                "</div> " +
                "</div>" +
                "</div>" +
                "</div>" +
                "<div class='light'>" +
                "<img class='img-responsive' src='images/light.png' alt=''>" +
                "</div>" +
                "</div>" +
                "</div>";
            $("#fotos").html(string);

        }
    });
}

