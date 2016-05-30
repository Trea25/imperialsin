$listacarrers = $('#listacarrers');
$(document).ready(function () {
    $("#altField").val("");
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
    $('.unselect').mapster('set',false,'key');
    $.ajax({
        url: "carrer/" + item.id,
        type: 'GET',
        dataType: 'json',
        success: function (resultat) {
            result=resultat.data;
            string="<div><titol>"+result.cnom+"</titol><h5>"+result.cany_inici+"</h5><div class='row social-icons'>";
            if(result.cfacebook!=""){
                string+="<span class='social-icon' onclick='OpenInNewTab(\""+result.cfacebook+"\")'>" +
                    "<i class='fa fa-facebook fa-2x'></i></span>";
            }
            if(result.ctwitter!=""){
                string+="<span class='social-icon' onclick='OpenInNewTab(\""+result.ctwitter+"\")'>" +
                    "<i class='fa fa-twitter fa-2x'></i></span>";
            }
            if(result.cinstagram!=""){
                string+="<span class='social-icon' onclick='OpenInNewTab(\""+result.cinstagram+"\")'>" +
                    "<i class='fa fa-instagram fa-2x'></i></span>";
            }

            string+="</div><p>"+result.cdescripcio+"</p></div>";
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
    data = "";
    if(navigator.userAgent.indexOf("Firefox") != -1 ){
        string = string.split(" ");
        console.log("string 1:" + string[1]);
        tmpdata = string[0].split("-");
        data = new Date(tmpdata[0], tmpdata[1]-1, tmpdata[2]);

    }else{
        data = new Date(string);
    }

    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    data = data.toLocaleDateString('ca-ES', options);
    return data.charAt(0).toUpperCase() + data.slice(1);
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
            string = '<div class="row"><div class="col-md-12"><div class="tabs-left"><ul class="nav nav-tabs">';
            nomcarrer = "";
            dataevent = "";
            console.log(result);
            first = true;
            firstevent = true;
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
                    dataevent = "";
                    contador++;
                    if(nomcarrer!="" &&!first){
                        string += "<hr />";
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
                    string += "<hr />";
                    if(firstevent){
                        firstevent = false;
                    }else{
                        string+="</ul>";

                    }
                    dataevent = getDia(result[i].edata_inici);
                    string += "<p class='data-event'>" + getDia(result[i].edata_inici) + "</p><br /><ul>";
                }
                string += "<li class='event text-marro'><span class='hora-event class='text-marro''> - " +getHora(result[i].edata_inici)+"</span> - <span class='titol-event text-marro'>"+  result[i].etitol + "</span></li>";
            }

            string += "<hr></div></div></div></div></div>";
            $("#result").html(string);
                       function init() {
                setHeight();
            }

            function setHeight() {
                var $tabPane = $('.tab-pane'),
                    tabsHeight = $('.nav-tabs').height();
                if(tabsHeight<500)tabsHeight=500;
                $tabPane.css({
                    height: tabsHeight
                });
            }

            $(init);
            $("#result").show();
        },
        error:function (){

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
                string += "<li><img class='img img-responsive' src='/foto/" + result[i] + "' alt=''></li>";
            }

            string += "</ul> " +
                "</div> " +
                "</div> " +
                "</div>" +
                "</div>" +
                "</div>" +
               
                "</div>" +
                "</div>";
            $("#fotos").html(string);

        }
    });
}

