<?php
require_once '../bootloader.php';
$form = [
    'fields' => [],
    'buttons' => [
        'submit' => [
            'text' => 'Clear all pixels!'
        ]
    ],
    'validate' => [],
    'callbacks' => [
        'success' => [],
        'fail' => []
    ]
];

if (!empty($_POST)) {
    $safe_input = get_safe_input($form);
    $form_success = validate_form($safe_input, $form);
    if ($form_success) {
        //pabaigti
        $success_msg = 'PIXELIAI istrinti';
    }
}
?>
<html>
    <head>
        <title>Clear pixels</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>
    <body>
        <?php require 'objects/navigation.php'; ?>
        <div>
            <h1>Clear PoopWall</h1>
            <div class="forma"><?php require '../core/views/form.php'; ?></div>
            <?php if (isset($success_msg)): ?>
                <h2><?php print $success_msg; ?></h2>
            <?php endif; ?>
        </div>
    </body>
</html>
