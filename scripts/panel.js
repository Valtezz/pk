async function tasklist(){
    let url = 'valtezz.ru/pk/api/api.php';
let response = await fetch(url);

let commits = await response.json();
console.log(commits);
};

tasklist();