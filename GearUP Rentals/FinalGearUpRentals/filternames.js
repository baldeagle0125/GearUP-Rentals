//AUTHOR: IHOR ANTONOV
//STUDENT ID: C00291296
//DATE: 11/04/2024
function filterNamesBySearch() {//hidden property is used to find unsuitable names
            let searchbox = document.getElementById('searchbox');
            let listbox = document.getElementById('listbox');
            for (let i = 0; i < listbox.children.length; i++) {
                if (listbox.children[i].innerHTML.search(searchbox.value) == -1) {
                    listbox.children[i].setAttribute('hidden', '');
                } else {
                    listbox.children[i].removeAttribute('hidden');
                }
            }
}