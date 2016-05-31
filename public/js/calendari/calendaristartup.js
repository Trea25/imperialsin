/**
 * Created by Marc on 31/05/2016.
 */




var app = angular.module('myApp', ['multipleDatePicker']);
app.controller('myCtrl', function ($scope) {
    $scope.checkSelection = function (event, date) {
        date = date.date.format("YYYY-MM-DD");
        var hiddenfield = $("#altField").val();
        if (hiddenfield.indexOf(date) == -1) {
            hiddenfield = hiddenfield + date + ", ";
            $("#altField").val(hiddenfield);
        } else {
            hiddenfield = hiddenfield.replace(date + ", ", "");
            $("#altField").val(hiddenfield);
        }
        if ($("#altField").val().trim() == "undefined") {
            $("#altField").val(" ");
        }

        console.log(date);
        console.log(moment.locale());
    }
});