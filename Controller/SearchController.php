<?php
class SearchController{
    public function searchValidate($option, $input){
        if($input == 'activos' || $input == 'activo' || $input == '1' || $input == 'active'){
            $input = 1;
        }else if($input == 'inactivos' || $input == 'inactivo' || $input == '0' || $input == 'borrado'){
            $input = 0;
        }else{
            // input sin cambios
        }
        $searchManager = new SearchManager();
        // Consultas para una sola tabla
        if($option == 1){
            // 
        }
        // Consultas en todas las tablas
        else{
            $authorResult = $searchManager->searchAuthors($input);
            $bookResult = $searchManager->searchBooks($input);
            $libraryResult = $searchManager->searchLibraries($input);
            require_once "View/files/searchResult.php";
        }
        
    }
}
?>