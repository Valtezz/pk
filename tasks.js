window.onload = GetResult();


async function GetResult(){
    let content = document.querySelector('.content');
    content.innerHTML='';
    let url = "./api/api.php"
    let response = await fetch(url);
    let result = await response.json();
    for (let i = 0; i < result.length; i++){
        let card = document.createElement('div');
        let contentBody = document.querySelector('.content');
        card.classList = 'container';
        if (Number(result[i].done) == 0){
        card.innerHTML += '<ul><li id="place">' + result[i].place +'</li><li id="problem">'+ result[i].problem +'</li><li id="name">'+ result[i].name +'</li><li id="kab">'+ result[i].kab +'</li><li id="email">'+ result[i].email +'</li><button class="btn" id="' + result[i].id + '" onClick="taskDone(this.id,\'' + result[i].place + '\',' + result[i].kab + ')"><i class="fa fa-check fa-flip"></i></button></ul>'
        contentBody.append(card);
    };

    };
};
setInterval(GetResult,300000);

async function taskDone(id,place,kab){
    let url = "./api/api.php"
    let body = JSON.stringify({"id":id , "place":place , "kab":kab});
    let response = await fetch(url,{
        method: 'PATCH',
        body
    });
    GetResult();
};

