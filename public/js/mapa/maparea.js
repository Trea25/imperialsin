 $listacarrers = $('#listacarrers');
 $mapimg = $('#mapimg');
$('#mapimg').mapster({
    fillOpacity: 1,
    render_highlight: {
        fillColor: '2aff00',
       // altImage: 'mapa2.png'
    },
    render_select: {
        fillColor: '013ADF',
       // altImage: 'mapa2.png'
    },
    fadeInterval: 0,
    mapValue: 'alt',
    mapKey:    'id',

});
/*
function addDropDown(items) {
            var item, selected;
            $listacarrers.children().remove();
            for (var i = 0; i < items.length; i++) {
                selected = items[i].isSelected();
                //item = $('<option name="' + items[i].key + '"' + (selected ? "checked" : "") + '><span class="sel" key="' + items[i].key + '">' + items[i].value + '</span></option>');
                $listacarrers.append(item);
            }
            $listacarrers.append('</select>');
            $listacarrers.find('span.sel').unbind('click').bind('click', function (e) {
                var key = $(this).attr('key');
                $mapimg.mapster('highlight', true, key);
            });
            // return the list to mapster so it can bind to it
            return $listacarrers.find('input:checkbox').unbind('click').click(function (e) {
                var selected = $(this).is(':checked');
                $mapimg.mapster('set', selected, $(this).attr('name'));
                styleCheckbox(selected, $(this));
            });
        }
    function styleCheckbox(selected, $checkbox) {
            nowWeight = selected ? "bold" : "normal";
            $checkbox.closest('div').css("font-weight", nowWeight);
        }
 function bindlinks() {
            $('*').unbind();
            $("#unbind_link").bind("click", function (e) {
                e.preventDefault();
                $mapimg.mapster("unbind");
                bindlinks();
            });
            $("#rebind_link").bind("click", function (e) {
                e.preventDefault();
                $mapimg.mapster(default_options);
            });

            $("#unbind_link_preserve").bind("click", function (e) {
                e.preventDefault();
                $mapimg.mapster("unbind", true);
                bindlinks();
            });
            $("#show_selected").bind("click", function (e) {
                e.preventDefault();
                $('#selections').text($("#usa_image").mapster("get"));
            });
            $("#single_select").bind("click", function (e) {
                e.preventDefault();
                var state = !$mapimg.mapster('get_options').singleSelect;
                $('#single_select_state').text(state ? "enabled" : "disabled");
                $mapimg.mapster("set_options", { singleSelect: state });
            });
 }      */
        
function toogleArea(item){

   $(item).toggleClass('selected');
}

 function showcarrer(item){

     $.ajax({
         url: "carrer/"+item.id,
         type: 'GET',
         dataType: 'json',
         success: function (resultat) {
           result=resultat.data;
             string="<div><h3>"+result.cnom+"</h3><h5>"+result.cany_inici+"</h5><div class='row social-icons'>";
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
             string+=""

             string+="<p>"+result.cdescripcio+"</p></div>";
             $("#result").html(string);
             fotoscarrers(result.id);
         }
     });
 }

 function OpenInNewTab(url) {
     var win = window.open(url, '_blank');
     win.focus();
 }

function search(){
     var carrers= new Array();
   $('.selected').each(function(){
       carrers.push(parseInt(this.id));
   });
    var dies= $("#altField").val();
    console.log(dies.indexOf(','));
    if(dies.indexOf(',')!=-1){
        dies = dies.split(", ");
    }
    if(dies == ""){
        dies = 0;
    }

    var event=parseInt($("#events").val());

    $.ajax({
        url: "searchresults",
        data: {carrers : carrers, dies : dies, event : event},
        type: 'GET',
        dataType : 'json',
        success: function(resultat){


            result = resultat.data;
            string=" <div id='tabs'><ul>";
            var carrer="";
           for(i in result){
               if(result[i].nom_carrer!=carrer) {
                   string += "<li><a href='#tab" + result[i].carrer_id + "'>" + result[i].nom_carrer + "</a></li>";
                   carrer=result[i].nom_carrer;
               }

               //console.log(result[i].edata_inici);
           }
            string+="</ul>";
            var carrer="";

            for(i in result){
                if(result[i].nom_carrer!=carrer) {
                    if(carrer!=""){
                        string+="</div>";
                    }
                    string += "<div id='tab" + result[i].carrer_id + "'><h3>"+result[i].nom_carrer+"</h3><p>" + result[i].etitol + "</p><p>"+result[i].edata_inici+"</p><p>"+result[i].tipus+"</p><br />";
                    carrer=result[i].nom_carrer;
                } else{
                    string+="<p>"+result[i].etitol+"</p><p>"+result[i].edata_inici+"</p><p>"+result[i].tipus+"</p><br />"
                }


            }
            string+="</div></div>";



            $("#result").html(string);

            $(function() {

                $( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
                $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );

            });





        }});

}

 function fotoscarrers(id){
     $.ajax({
         url: "carrer/foto/"+id,
         type: 'GET',
         dataType: 'json',
         success: function (result) {
             string=" <div id='gallery'>" +
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
             for(i=0;i<result.length;i++){
                 if(i==4||i==8){
                     string+="</ul></div><div class='item'><ul>";
                 }
                 string+="<li><img class='img-responsive' src='foto/"+result[i].id+"' alt=''></li>";
             }

             string+= "</ul> " +
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

