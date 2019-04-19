<?php
require '../bootloader.php';

$form = [
    'fields' => [
        'x' => [
            'label' => '',
            'type' => 'number',
            'placeholder' => 'X koordinate',
            'validate' => [
                'validate_not_empty',
                'validate_is_number',
                'validate_coordinate'
            ]
        ],
        'y' => [
            'label' => '',
            'type' => 'number',
            'placeholder' => 'Y koordinate',
            'validate' => [
                'validate_not_empty',
                'validate_is_number',
                'validate_coordinate'
            ]
        ],
        'color' => [
            'label' => 'Choose wisely',
            'placeholder' => '',
            'type' => 'select',
            'options' => \App\PoopWall\Pixel::getColorOptions(),
            'validate' => [
                'validate_not_empty',
                'validate_select_option'
            ]
        ],
    ],
    'validate' => [],
    'buttons' => [
        'submit' => [
            'text' => 'Ideti pixeli!'
        ]
    ],
    'callbacks' => [
        'success' => [
            'form_success'
        ],
        'fail' => []
    ]
];

function form_success($safe_input, $form) {
    $pixel = new \App\PoopWall\Pixel([
        'x' => $safe_input['x'],
        'y' => $safe_input['y'],
        'color' => $safe_input['color'],
    ]);

    $connection = new Core\Database\Connection(DB_CREDENTIALS);
    $pdo = $connection->getPDO();
    $model_pixel = new \App\PoopWall\Model\ModelPixel($connection, DB_TABLE);
    $model_pixel->insert($pixel);
}

if (!empty($_POST)) {
    $safe_input = get_safe_input($form);
    $form_success = validate_form($safe_input, $form);

    if ($form_success) {
        $success_msg = 'Oho pridejai PIXELI';
    }
}
?>
<html>
    <head>
        <title>Add Pixel</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php require 'objects/navigation.php'; ?>
        <h1>Pixeliu detuve</h1>
        <div class="forma"><?php require '../core/views/form.php'; ?></div>
        <?php if (isset($success_msg)): ?>
            <h2><?php print $success_msg; ?></h2>
        <?php endif; ?>
    </body>
</html>