require('./bootstrap');

function removeSpace(str) {
    return str.replace(/\s/g, '');
}

function removeSpaceValues(e){
    return e.value?.replace(/\s/g, '');
}
