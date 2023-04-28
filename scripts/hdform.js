function show(val){
    if (val != '--'){
        document.getElementById('problem').style.display = 'block';
        document.getElementById('problemLabel').style.display = 'block';
    }
    else{
        document.getElementById('problem').style.display = 'none';
        document.getElementById('problemLabel').style.display = 'none';
    }
}