<?php
require 'd:/OSPanel/home/mayan-n/wp-load.php';
$payload = array(
    'page_id' => 4,
    'name' => 'Jad Nassif',
    'phone' => '+97431540220',
    'email' => 'jad_nassif@outlook.com',
    'event_date' => '2026-07-18',
    'selected_options' => array(),
    'countries' => array(),
    'additional_services' => array(),
    'custom_wishes' => 'Wedding by the sea with a calm and elegant atmosphere.',
    'total' => 1470,
    'currency' => '$',
    'pdf_items' => array(
        array(
            'badge' => 'Format',
            'title' => 'Registration without ceremony',
            'description' => 'A simple legal registration package for the selected destination.',
            'price' => 500,
            'quantity' => 1,
        ),
        array(
            'badge' => 'Country',
            'title' => 'American Samoa',
            'description' => 'First selected country for the marriage registration.',
            'price' => 0,
            'quantity' => 1,
        ),
        array(
            'badge' => 'Country',
            'title' => 'Afghanistan',
            'description' => 'Additional selected country.',
            'price' => 150,
            'quantity' => 1,
        ),
        array(
            'badge' => 'Photographer',
            'title' => '6 hours photo session',
            'description' => 'Coverage of the key moments of the wedding day, including ceremony and portraits.',
            'price' => 720,
            'quantity' => 1,
        ),
        array(
            'badge' => 'Transfer',
            'title' => 'Private transfer',
            'description' => 'Comfortable transfer for the couple between the hotel and ceremony location.',
            'price' => 100,
            'quantity' => 1,
        ),
    ),
);
$result = mayan_wedding_calculator_generate_pdf_files($payload);
if (is_wp_error($result)) {
    fwrite(STDERR, 'ERROR: ' . $result->get_error_message());
    exit(1);
}
copy($result['image_path'], 'd:/OSPanel/home/mayan-n/.codex-fonts-temp/test-render.jpg');
copy($result['pdf_path'], 'd:/OSPanel/home/mayan-n/.codex-fonts-temp/test-render.pdf');
echo 'OK';
