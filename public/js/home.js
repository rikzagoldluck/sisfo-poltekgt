$('#button-search-jurnal').click(function () {
    let input = $('.searchbar-jurnal').val();
    if(input === ''){
        $('.container-jurnal').html('<h4 class="text-center">Masukkan kata kunci</h4>');
        exit();
    }
    $.getJSON(`https://serpapi.com/search.json?engine=google_scholar&q=${input}&hl=en&api_key=f66667854b04476a980ddd655345d125c47d63c1bcd0b04fc08f76fa8aee477f`, function (data) {
        console.log(data)
    })
})