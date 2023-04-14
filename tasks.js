window.onload = GetResult();


async function GetResult(){
let url = "http://www.valtezz.ru/pk/api/api.php"
let response = await fetch(url);
let result = await response.json();
// console.log(result[1].name);

for (let i = 0; i < result.length; i++){
    let contentBody = document.querySelector('.content');
    let card = document.createElement('div');
    card.classList = 'container';
    card.innerHTML = '<ul><li id="place">' + result[i].place +'</li><li id="problem">'+ result[i].problem +'</li><li id="name">'+ result[i].name +'</li><li id="kab">'+ result[i].kab +'</li><li id="email">'+ result[i].email +'</li><button class="btn"><i class="fa fa-check fa-flip"></i></button></ul>'
    contentBody.append(card);

}

}