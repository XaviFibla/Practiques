
$(function () {
        $("#target").keypress(function () {
                console.log("Handler for .keypress() called.");
        });

        $('#target').bind('keypress', function (e) {
                console.log(e.keyCode);
                if (e.keyCode == 13) {
                        alert("ENTER");
                        harryPotter();
                }
        });

        function harryPotter(){
                $.ajax({
                        url: 'https://fedeperin-harry-potter-api.herokuapp.com/libros/3',
                        dataType: 'json',
                        success: function (data) {
                                console.log(data);
                        }
                });
        }

});


