$('button.btnSignUp').click(function(e){
    var searchTerm = $('#textSearch').val();
    e.preventDefault();
    search(searchTerm);
});

var listResults = function(term, searchResult){
    var html = '';
    html += '<h3>Results for search term: ' + term + '</h3>';
    html += '<ul>';
    for(var i = 0; i < searchResult.length; i++){
        html += '<li>';
        html += '<p>';
        html += '<img alt="' + searchResult[i].items[0].images[0].imageText + '" src="' + searchResult[i].items[0].images[0].imageUrl + '"/><br/>';
        html += '<a href="' + searchResult[i].link + '"><h5>' + searchResult[i].productReference + ' - ' + searchResult[i].productName + '</h5></a><br/>';
        html += '<p>' + searchResult[i].description + '</p>';
        html += '</p>';
        html += '</li>';
    }
    html += '</ul>';
    console.log(html);
    $('#searchResults').html(html);
};

var search = function(value){
    $.ajax({
        url: 'https://216.218.200.215/api_productSearch.php',
        type: 'GET',
        dataType: 'JSON',
        data: 'search=' + value
    }).done(function(result){
        listResults(value, result);
    }).fail(function(xhr){
        alert('error', xhr);
    });
};