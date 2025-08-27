<?php
class AuthorController {
    public function index(){
        $authorManager = new AuthorManager();
        $allAuthorResult = $authorManager->allAuthor();
        require_once "View/files/author.php";
    }

    public function store($name, $nationality){
        $author = new Author($name, $nationality);
        $authorManager = new AuthorManager();
        $authorManager->authorStore($author);
        header("Location: authorIndex");
    }

    public function edit($id){
        $authorManager = new AuthorManager();
        $authorResult = $authorManager->authorConsult($id);
        require_once "View/files/authorEdit.php";
    }

    public function update($id, $name, $nationality){
        $authorManager = new AuthorManager();
        $authorManager->authorUpdate($id, $name, $nationality);
        header("Location: authorIndex");
    }

    public function destroy($id){
        $authorManager = new AuthorManager();
        $authorManager->authorDestroy($id);
        header("Location: authorIndex");
    }
}
