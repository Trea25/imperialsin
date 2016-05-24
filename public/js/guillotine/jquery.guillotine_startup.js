function carregarImatge(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#thepicture').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

window.onload = function () {
    var picture = $('#thepicture');  // Must be already loaded or cached!

    picture.on('load', function() {
        if (picture.guillotine('instance')) picture.guillotine('remove');
        picture.guillotine({width: 600, height: 400, eventOnChange: 'guillotinechange', init:{scale:1}});
        picture.guillotine('fit');
// Display inital data
        var data = picture.guillotine('getData');
        for (var key in data) {
            $('#' + key).html(data[key]);
        }

// Bind button actions
        $('#rotate_left').click(function () {
            picture.guillotine('rotateLeft');
        });
        $('#rotate_right').click(function () {
            picture.guillotine('rotateRight');
        });
        $('#fit').click(function () {
            picture.guillotine('fit');
        });
        $('#zoom_in').click(function () {
            picture.guillotine('zoomIn');
        });
        $('#zoom_out').click(function () {
            picture.guillotine('zoomOut');
        });
    })
    // Update data on change
    picture.on('guillotinechange', function (ev, data, action) {

        console.log(data);

        data.scale = parseFloat(data.scale.toFixed(4));
        for (var k in data) {
            $('#' + k).val(data[k]);
        }
    });
// Make sure the 'load' event is triggered at least once (for cached images)
    if (picture.prop('complete')) picture.trigger('load')

    $("#inputImg").change(function(){
        carregarImatge(this);
    });
    $("#thepicture").scroll(function(){
        console.log('scrolling');
    });
    $( '#thepicture' ).bind( 'mousewheel DOMMouseScroll', function ( e ) {
        var e0 = e.originalEvent,
            delta = e0.wheelDelta || -e0.detail;

        this.scrollTop += ( delta < 0 ? 1 : -1 ) * 30;
        e.preventDefault();
    });
    $('#thepicture').bind('mousewheel', function(e) {
        if(e.originalEvent.wheelDelta / 120 > 0) {
            picture.guillotine('zoomIn');
        } else {
            picture.guillotine('zoomOut');
        }
    });
}
