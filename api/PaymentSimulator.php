<?php

class PaymentSimulator
{
    public function processPayment($items)
    {
        // Validar que el arreglo no esté vacío
        if (empty($items)) {
            return [
                'status' => 'error',
                'message' => 'El arreglo de items no puede estar vacío'
            ];
        }

        // Calcular el total
        $total = 0;
        foreach ($items as $item) {
            if (isset($item['price'])) {
                $total += $item['price'];
            }
        }

        // Simular respuesta de un servicio de pago externo
        $paymentResponse = [
            'status' => 'success',
            'payment_id' => uniqid('pay_'),
            'amount' => $total,
            'currency' => 'ARG',
            'payment_method' => 'credit_card',
            'description' => 'Pago simulado para ' . count($items) . ' items',
            'paid_at' => date('Y-m-d H:i:s'),
        ];

        return $paymentResponse;
    }
}

header('Content-Type: application/json');

// Obtener datos de la solicitud
$input = json_decode(file_get_contents('php://input'), true);

// Instanciar la clase PaymentSimulator
$paymentSimulator = new PaymentSimulator();

// Procesar el pago
$response = $paymentSimulator->processPayment($input['items'] ?? []);

// Devolver la respuesta en formato JSON
echo json_encode($response);
?>
