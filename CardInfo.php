<?php
// Interface for Payment Method
interface PaymentMethod {
    public function storeData($cardNumber): void;
}

// Concrete class for Credit Card Payment
class CreditCardPayment implements PaymentMethod {
    public function storeData($cardNumber): void {
        // Code to store credit card data in MySQL database
        // Implement the database logic here
        echo "Storing credit card number $cardNumber in the database...\n";
    }
}

// Concrete class for Debit Card Payment
class DebitCardPayment implements PaymentMethod {
    public function storeData($cardNumber): void {
        // Code to store debit card data in MySQL database
       
        echo "Storing debit card number $cardNumber in the database...\n";
    }
}

// Payment Factory
class PaymentFactory {
    public static function createPaymentMethod($type): PaymentMethod {
        if ($type === 'creditCard') {
            return new CreditCardPayment();
        } elseif ($type === 'debitCard') {
            return new DebitCardPayment();
        } else {
            throw new InvalidArgumentException("Invalid payment method");
        }
    }
}

// Usage
try {
    $paymentMethodType = $_POST["paymentMethod"]; 
    $cardNumber = $_POST["cardNumber"]; 

    $payment = PaymentFactory::createPaymentMethod($paymentMethodType);
    $payment->storeData($cardNumber);
} catch (InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage();
}

?>
