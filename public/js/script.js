setTimeout(() => {
    document.getElementById('noti').style.display = 'none';
}, 3000);

// Crud Author
function AuthorEdit(id){
    url = "index.php?action=authorEdit&id=" + id;
}
