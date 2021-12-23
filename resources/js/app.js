require('./bootstrap');

function removeSpace(str) {
    return str.replace(/\s/g, '');
}

function removeSpaceValues(e) {
    return e.value?.replace(/\s/g, '');
}

function separateNumber(e) {
    const donnee = parseFloat(str);
    return Number(donnee).toLocaleString();
}
