/**
 * To hide the placeholder in input field.
 */
var input = document.querySelectorAll('form input');
for(var i=0;i<input.length;i++){
    input[i].onfocus = function(){
        this.setAttribute('data-input', this.getAttribute('placeholder'));
        this.setAttribute('placeholder', '');
    }
    input[i].onblur = function(){
        this.setAttribute('placeholder', this.getAttribute('data-input'));
    }
}
var dels = document.getElementsByClassName('confirm');
for(var i=0;i<dels.length;i++){
    dels[i].onclick = function(){
        return confirm('Are you sure to delete this doctor?');
    }
}
var search = document.querySelector('.search-div .search-engine'),
    searchOut = document.getElementById('search-output'),
    addDoctor = document.getElementById('add-doctor');
search.oninput = function(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            searchOut.innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open('GET', 'includes/search.php?search=' + search.value, true);
    xmlhttp.send();
}