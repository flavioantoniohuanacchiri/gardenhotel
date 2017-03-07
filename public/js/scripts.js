$('.key-enter .form-control').keydown(function (e) {
        if (e.which === 13) {
                var index = $('.key-enter .form-control').index(this) + 1;
                $('.key-enter .form-control').eq(index).focus();
        }
});

getDropDownRequest = function (url, idTag, param, selectedOption) {
    var parameters = (param.length > 0)? '?' + param : '';
    $.get(url + parameters, function(data) {
        //$(idTag).empty();

        var select = $(idTag);
        if(select.prop) {
            // When tag is new
            var options = select.prop('options');
        } else {
            // When tag exists
            var options = select.attr('options');
        }
        $('option', select).remove();

        for(var index in data) {
            options[options.length] = new Option(data[index].name, data[index].id);
        }

        // Selected value
        if (selectedOption.length) {
            select.val(selectedOption);
        }

    });
};

postDropDownRequest = function (url, idTag, param) {
    alert('yet implement');
};