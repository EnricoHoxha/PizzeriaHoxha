<?php
session_start();

// Verifica se i dati del piatto sono stati ricevuti
if (isset($_POST['nome'], $_POST['prezzo'], $_POST['ingredienti'])) {
    // Aggiungi i dettagli del piatto al carrello
    $piatto = [
        'nome' => $_POST['nome'],
        'prezzo' => $_POST['prezzo'],
        'ingredienti' => isset($_POST['ingredienti']) ? $_POST['ingredienti'] : []
    ];

    // Aggiungi il piatto al carrello (memorizzato nella sessione)
    $_SESSION['carrello'][] = $piatto;

    // Messaggio di conferma
    echo 'Piatto aggiunto al carrello.';
} else {
    // Messaggio di errore
    echo 'Errore: Dati mancanti.';
}
?>