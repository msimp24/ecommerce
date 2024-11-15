<?php 

session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //check for the action to know which POST method to run
    $action = $_POST['action'] ?? null;

    if($action === 'add'){
            $product = $_POST['productName'];
            $price = $_POST['price'];
            $price = ltrim($price, '$');
            $quantity = intval($_POST['quantity']); 
            $id = $_POST['id'];

        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }


        $productFound = $false;

        foreach($_SESSION['cart'] as &$item){
            if($product === $item['product']){
                $item['quantity'] += $quantity;
                $productFound = true;
                break;
        }
        }
        if (!$productFound) {
            $_SESSION['cart'][] = [
            'product' => $product,
            'price' => $price,
            'quantity' => $quantity,
            'id' => $id
            ];
        }
    }

    if($action === 'delete'){
        $idToDelete = $_POST['id'] ?? null;

        if($idToDelete !== null && isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $index => $item){
                if($idToDelete == $item['id']){
                    unset($_SESSION['cart'][$index]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    echo json_encode(['status' => 'success', 'message' => 'Item removed from cart']);
                    exit;
                }
            }
        }
        echo json_encode(['status' => 'error', 'message' => 'Item not found in cart']);
        exit;

    }
    echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    exit;

}

?>
