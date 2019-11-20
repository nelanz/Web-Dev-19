document.addEventListener('DOMContentLoaded', domloaded, false);

function domloaded() {
    var url = document.getElementById('url');
    var search = document.getElementById('search')

    url.addEventListener('focus', () => {
        document.getElementById('url-info').innerHTML = 'Podaj stronę, która inspiruje Cię do działań na rzecz Ziemi';
    }, true);

    url.addEventListener('blur', () => {
        event.target.style.background = '';
        document.getElementById('url-info').innerHTML = '';
    }, true);

    search.addEventListener('focus', () => {
        document.getElementById('search-info').innerHTML = 'Chcemy wiedziec jakie jest Twoje ulubione zwierzę!';
    }, true);
    
    search.addEventListener('blur', () => {
        event.target.style.background = '';
        document.getElementById('search-info').innerHTML = '';
    }, true);
}