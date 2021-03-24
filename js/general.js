$( document ).ready(function() {
    let url      = window.location.href;
    let page = url.split('#');
    if(page['1'] == 'fav'){
        $('#page').load('gui/favorite_page.php');
    }
    else if(page['1'] == 'user'){
        $('#page').load('gui/user.php');

    }
    else{
        $('#page').load('gui/all_country.php');
    }
    $(document).on("click", ".menu",function() {
        $('#page').empty();
        var page = $(this).attr('href');
        page = page.split('#');
        if(page['1'] == 'fav'){
            $('#page').load('gui/favorite_page.php');
        }
        else if(page['1'] == 'user'){
            $('#page').load('gui/user.php');

        }
        else{
            $('#page').load('gui/all_country.php');
        }

    })


});