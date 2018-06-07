$('#search_mini_form button').click(function(e){
    e.preventDefault();
    //forward user to the search result page
    var search_value = $('#search_mini_form input#search').val();
    window.location.href = 'https://nisumusa.vtexcommercestable.com.br/_secure/?lid=8d54c01b-2256-4ff9-9551-252c39d189e2&search=' + search_value;
});


