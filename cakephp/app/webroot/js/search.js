$(document).ready(function(){
    
    $('#input-search').autocomplete({
        minLength: 2,
        select: function(event, ui){
            $('#input-search').val(ui.item.label);
        },
        source: function(request, response){
            $.ajax({
                url: basePath + 'restaurants/searchjson',
                data: {
                    term: request.term
                },
                dataType: 'json',
                success: function(data){
                    console.log(request);
                    response($.map(data, function(el, index){
                        return {
                            value: el.Restaurant.name,
                            name: el.Restaurant.name,
                            address: el.Restaurant.address +', '+ el.Restaurant.town
                        }
                    }));
                }
            });
        }
    }).data('ui-autocomplete')._renderItem = function(ul, item){    
        return $('<li class="list-group-item"></li>')
        .data('item.autocomplete', item)
        .append('<a>'+ item.name +' - '+item.address+'</a>')
        .appendTo(ul)
    };

    $('#input-search-town').autocomplete({
        minLength: 2,
        select: function(event, ui){
            $('#input-search-town').val(ui.item.label);
        },
        source: function(request, response){
            $.ajax({
                url: basePath + 'restaurants/searchtownjson',
                data: {
                    term: request.term
                },
                dataType: 'json',
                success: function(data){
                    console.log(request);
                    response($.map(data, function(el, index){
                        return {
                            value: el.Restaurant.town,
                            name: el.Restaurant.town,
                        }
                    }));
                }
            });
        }
    }).data('ui-autocomplete')._renderItem = function(ul, item){    
        return $('<li class="list-group-item"></li>')
        .data('item.autocomplete', item)
        .append('<a>'+ item.name +'</a>')
        .appendTo(ul)
    };
});