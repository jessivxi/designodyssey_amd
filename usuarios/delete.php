<?php
require_once '../conexao.php';

header('Content-Type: application/json');

// Verifica se o ID foi enviado
$dados = json_decode(file_get_contents('php://input'), true);

if (empty($dados['id'])) {
    http_response_code(400);
    echo json_encode(['erro' => 'ID do usuário não fornecido']);
    exit;
}

try {
    // Primeiro verifica se o usuário existe
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE id = ?");
    $stmt->execute([$dados['id']]);
    
    if ($stmt->rowCount() === 0) {
        http_response_code(404);
        echo json_encode(['erro' => 'Usuário não encontrado']);
        exit;
    }

    // Depois executa a exclusão
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->execute([$dados['id']]);
    
    echo json_encode(['sucesso' => true]);
    
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['erro' => 'Erro ao excluir usuário: ' . $e->getMessage()]);
}