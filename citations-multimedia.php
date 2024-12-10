<?php
/*
Plugin Name: Citations Multimédia
Description: Affiche des citations populaires dans le domaine du multimédia via un shortcode.
Version: 1.0
Author: Alexander Rankov
*/

if (!defined('ABSPATH')) {
    exit; // Empêche l'accès direct au fichier.
}

// Fonction pour récupérer une citation aléatoire.
function get_random_multimedia_quote() {
    $quotes = [
        "Le design n'est pas seulement ce à quoi il ressemble, mais aussi comment il fonctionne. - Steve Jobs",
        "La créativité, c'est l'intelligence qui s'amuse. - Albert Einstein",
        "La simplicité est l'ultime sophistication. - Léonard de Vinci",
        "Les détails ne sont pas les détails. Ils font le design. - Charles Eames",
        "L'inspiration existe, mais elle doit te trouver en train de travailler. - Pablo Picasso",
        "Vous ne pouvez pas épuiser la créativité. Plus vous l'utilisez, plus vous en avez. - Maya Angelou",
        "Un bon design est évident. Un grand design est transparent. - Joe Sparano",
        "Le meilleur moyen de prédire l'avenir, c'est de le créer. - Peter Drucker"
    ];

    // Retourne une citation aléatoire.
    return $quotes[array_rand($quotes)];
}

// Fonction pour afficher la citation via un shortcode.
function display_multimedia_quote_shortcode() {
    $quote = get_random_multimedia_quote();
    return "<blockquote><p>{$quote}</p></blockquote>";
}

// Ajout du shortcode [citation_multimedia].
add_shortcode('citation_multimedia', 'display_multimedia_quote_shortcode');

// Fonction pour ajouter un menu dans l'administration (optionnel).
function multimedia_quotes_admin_menu() {
    add_menu_page(
        'Citations Multimédia',
        'Citations Multimédia',
        'manage_options',
        'citations-multimedia',
        'multimedia_quotes_settings_page',
        'dashicons-format-quote',
        100
    );
}

// Page d'administration (vide pour l'instant).
function multimedia_quotes_settings_page() {
    echo '<div class="wrap"><h1>Citations Multimédia</h1><p>Ce plugin affiche des citations aléatoires dans vos contenus via un shortcode.</p></div>';
}

// Ajout du menu d'administration (optionnel).
add_action('admin_menu', 'multimedia_quotes_admin_menu');