<?php
// ================================================================
//  SAVE_DATA.PHP - Menyimpan data ke data.json
// ================================================================

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = file_get_contents('php://input');
    $items = json_decode($data, true);
    
    if ($items !== null) {
        file_put_contents('data.json', json_encode($items, JSON_PRETTY_PRINT));
        echo json_encode(['success' => true]);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid data']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}
?>