/**
 * Created by Marc on 23/05/2016.
 */
$('#tipus').hide();
$('#cnom').hide();

function valtipus(val){
    if(val.length<3||val.length>30){
        $('#tipus').show();
    } else{
        $('#tipus').hide();
    }
}

function valcnom(val){
    if(val.length<3||val.length>255){
        $('#cnom').show();
    } else{
        $('#cnom').hide();
    }
}

function valany(val){
    if(val.length!=4){
        $('#any').show();
    } else{
        $('#any').hide();
    }
}

function valface(val){
    if(val.length>255){
        $('#face').show();
    } else{
        $('#face').hide();
    }
}

function valtwitter(val){
    if(val.length>255){
        $('#twitter').show();
    } else{
        $('#twitter').hide();
    }
}

function valins(val){
    if(val.length>255){
        $('#ins').show();
    } else{
        $('#ins').hide();
    }
}


function valtitol(val){

    if(val.length<3||val.length>255){
        $('#titol').show();
    } else{
        $('#titol').hide();
    }
}

function valdata(val){
    var regex=/^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/;
    if(!regex.test(val)){
        $('#data').show();
    } else{
        $('#data').hide();
    }
}
function valhora(val){
    var regex=/^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/;
    if(!regex.test(val)){
        $('#hora').show();
    } else{
        $('#hora').hide();
    }
}