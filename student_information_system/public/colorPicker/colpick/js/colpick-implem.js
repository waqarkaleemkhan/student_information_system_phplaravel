
var getVariablesSuccess = function(response) {

    if (response.success) {
        $('#lessVariables').html('');
        var allVariables = response.allVariables;

        for (var i in allVariables) {
            if (i === 0) {
                $('#colorpicker-full').css('background-color',
                        allVariables[i].hex);
                $('#colorpicker-full').colpickSetColor(
                        allVariables[i].hex);
            }

            var optn = '<option data-hex="' +
                    allVariables[i].hex + '" value="' + i +
                    '">' + allVariables[i].label + '</option>';
            $('#lessVariables').append(optn);

        }
    }
};

var changeVariableSuccess = function(response) {

    if (response.success == "success") {

        $('.preloader-wrapper').fadeOut();
          
        $('#skinCss').attr('href',
                'colorPicker/theme-bootstrap.css?ver=' + Math.random());
        $('#themeCss').attr('href',
                'colorPicker/theme.css?ver=' + Math.random());
    } else if (response.error === "error") {
        console.log(response.error);

    }
};

$(document).ready(function() {

    $('.custom-check input').ezMark();

    $('#btnResetLess').click(function() {
        $('#btnResetLess').attr('disabled', 1);
        $.ajax({
            type: "POST",
            url: "colorPicker/color-picker.php",
            success: function() {
                $('#btnResetLess').removeAttr('disabled');
                window.location.reload();
            },
            error: function() {
                $('#btnResetLess').removeAttr('disabled');
            },
            data: {variable: 0, action: 'reset'},
            dataType: "JSON"
        });
    })

    $('#lessVariables').select2({
        placeholder: "Select variable"
    }).change(function(e) {
        $('#colorpicker-full').css('background-color', $(
                '#lessVariables option[value="' + e.val + '"]').
                data('hex'));
        $('#colorpicker-full').colpickSetColor($(
                '#lessVariables option[value="' + e.val + '"]').
                data('hex'));
    }).on('select2-loaded', function(e) {
        $('#colorpicker-full').css('background-color', $(
                '#lessVariables option[value="0"]').
                data('hex'));
        $('#colorpicker-full').colpickSetColor($(
                '#lessVariables option[value="0"]').
                data('hex'));
    });

    var variableData={
        color:-999,
        selectedOption:-999,
        variable:-999,
        isReady:false

    };

    var serverLoading = false;


    $('#btnConfirmLess').click(function(){
        
        if(variableData.isReady){
            
            $('.preloader-wrapper').show();
            $('.preloader-wrapper').children().children('p').text("uploading");
            $.ajax({
                type: "POST",
                url: "colorPicker/color-picker.php",
                success: function(response) {
                    serverLoading = false;
                    changeVariableSuccess(response);
                },
                error: function() {
                    serverLoading = false;
                },
                data: {'color': variableData.color,
                        'variable': variableData.variable,
                        'selectedOption': variableData.selectedOption
                },
                dataType: "JSON"
            });
            // alert(variableData.color+" "+variableData.selectedOption);
            
            // variableData.color=-999;
            // variableData.selectedOption=-999;
            // variableData.variable=-999;
            variableData.isReady=false;

        }else{
            
        }
        // var e = document.getElementById("lessVariables");

        // $('#lessVariables option[value="' + e.selectedIndex + '"]').attr('data-hex', hex);
        // $('#lessVariables option[value="' + e.selectedIndex + '"]').data('hex', hex);   
        // var selectedOption = e.options[e.selectedIndex].text;
        // alert(selectedOption);
    });

    $('#colorpicker-full').colpick({
        layout: 'hex',
        submit: 0,
        colorScheme: 'dark',
        onChange: function(hsb, hex, rgb, el, bySetColor) {
            if (bySetColor) return;
            try {
                var color = hex;
                $('#colorpicker-full').css('background-color',
                        '#' + hex);

                var e = document.getElementById("lessVariables");

                $('#lessVariables option[value="' + e.selectedIndex + '"]').
                        attr('data-hex', hex);
                $('#lessVariables option[value="' + e.selectedIndex + '"]').
                        data('hex', hex);

                var selectedOption =
                        e.options[e.selectedIndex].text;
                if (selectedOption == "Select a variable") {
                    alert("Please Choose a color first");
                    return;
                } else {

                    //alert(color+" "+selectedOption);
                    setTimeout(function() {
                        if (!serverLoading) {
                            serverLoading = true;
                            variableData.color=color;
                            variableData.selectedOption=selectedOption;
                            variableData.variable=1;
                            variableData.isReady=true;
                            // $.ajax({
                            //     type: "POST",
                            //     url: "colorPicker/color-picker.php",
                            //     success: function(response) {
                            //         serverLoading = false;
                            //         changeVariableSuccess(
                            //                 response);
                            //     },
                            //     error: function() {
                            //         serverLoading = false;
                            //     },
                            //     data: {'color': color,
                            //         'variable': 1,
                            //         'selectedOption': selectedOption
                            //     },
                            //     dataType: "JSON"
                            // });
                        }
                    }, 500);
                }
            } catch (ex) {
            }
        }
    }).keyup(function() {
        $(this).colpickSetColor(this.value);
    });

    $('#colorPickerIgniter').click(function() {
        $('#colorPickerDiv').slideToggle();
        if ($('#lessVariables option').size() <= 1) {
            $.ajax({
                type: "POST",
                url: "colorPicker/color-picker.php",
                success: getVariablesSuccess,
                data: {'variable': 0},
                dataType: "JSON"
            });
        }
    });

    var currentUrl = location.href;
    var sURLVariables = currentUrl.split('#');
    var parameter = sURLVariables[sURLVariables.length - 1];
    if (parameter != "panels.html" && parameter !=
            "panels.html#") {

        $('.sidebar-nav').children('li').each(function() {
            if ($(this).attr('id') == "menu") {
                $(this).children('a').removeClass('active-title');
                $(this).children('ul').hide();
            }
            if ("?" + $(this).attr('id') == parameter) {
                $(this).children('a').addClass('active-title');
                $(this).children('ul').show();
            }
        });
    }

    $('.sidebar-nav').children('li').click(function() {

        var userClick = $(this).attr('id');
        location.hash = "?" + userClick;
    });

});