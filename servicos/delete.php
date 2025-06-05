
<?php
header('Content-Type: application/json');
require 'conexão.php';

$data = json_decode(file_get_contents('php://input'), true);
$userId = $data['id'] ?? null; // Obtém o ID do usuário do corpo da requisição

if (!$userId) {
    http_response_code(400);
    echo json_encode(['error' => 'serviço não encontrado ou fornecido']);
    exit;
}

try {
    // Verifica se serviço associado ao usuário existe
    $stmt = $pdo->prepare("SELECT id FROM users WHERE id = ?");
    $stmt->execute([$userId]);
    if ($stmt->rowCount() === 0) {
        http_response_code(404);
        echo json_encode(['error' => 'serviço não encontrado']);
        exit;
    }

    // Deleta serviço associado ao usuário
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$userId]);

    echo json_encode(['message' => 'serviço deletado com sucesso']);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao deletar usuário: ' . $e->getMessage()]);
}