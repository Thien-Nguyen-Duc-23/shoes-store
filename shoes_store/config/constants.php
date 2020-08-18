<?php
return [
    'active' => 1,
    'disable' => 0,
    'male' => 1,
    'female' => 0,
    'admin' => 1,
    'user' => 2,
    'password' => '123456789',
    'lengthDescription' => 55,
    'superAdmin' => 3,
    'paginate' => 15,
    'lengthTitle' => 6,
    'status' => [
        '0' => 'Deactivate',
        '1' => 'Active'
    ],
    'order_status' => [
        '1' => 'New', 
        '2' => 'Processing',
        '3' => 'Hold',
        '4' => 'Canceled',
        '5' => 'Done',
        '99' => 'Failed'
    ],
    'shipping_status' => [
        '1' => 'Not sent',
        '2' => 'Sending',
        '3' => 'Shipping done',
    ],
    'payment_status' => [
        '1' => 'Unpaid',
        '2' => 'Paid'
    ],
    'shipping_method' => [
        '1' => 'Shipping Standard',
        '99' => 'Orther'
    ],
    'payment_method' => [
        '1' => 'Cash on delivery',
        '2' => 'Paypal',
        '99' => 'Orther'
    ]
];
