<?php
require_once "Model/AuthorManager.php";

class LibraryApiController {
    private $authorManager;

    public function __construct() {
        $this->authorManager = new AuthorManager();
    }

    // Detecta el tipo de request y redirige al método correcto
    public function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'GET':
                if (isset($_GET['id'])) {
                    $this->getOne($_GET['id']);
                } else {
                    $this->getAll();
                }
                break;

            case 'POST':
                $data = json_decode(file_get_contents("php://input"), true);
                $this->create($data);
                break;

            case 'PUT':
                $data = json_decode(file_get_contents("php://input"), true);
                $this->update($data);
                break;

            case 'DELETE':
                if (isset($_GET['id'])) {
                    $this->delete($_GET['id']);
                }
                break;

            default:
                http_response_code(405);
                echo json_encode(["error" => "Método no permitido"]);
                break;
        }
    }

    // ================== Métodos API ==================
    private function getAll() {
        $authors = $this->authorManager->allAuthor();
        echo json_encode($authors);
    }

    private function getOne($id) {
        $author = $this->authorManager->authorConsult($id);
        echo json_encode($author);
    }

    private function create($data) {
        $this->authorManager->authorCreate($data['name'], $data['nationality']);
        echo json_encode(["message" => "Autor creado"]);
    }

    private function update($data) {
        $this->authorManager->authorUpdate($data['id'], $data['name'], $data['nationality']);
        echo json_encode(["message" => "Autor actualizado"]);
    }

    private function delete($id) {
        $this->authorManager->authorDestroy($id);
        echo json_encode(["message" => "Autor eliminado"]);
    }
}
