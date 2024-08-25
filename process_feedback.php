<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rating = $_POST['rating'];
    $favoritePart = $_POST['favoritePart'];
    $suggestions = $_POST['suggestions'];
    $timestamp = date('Y-m-d H:i:s');

    // E-Mail-Einstellungen
    $to = 'hikimetti.tk@gmail.com'; // Empfänger-E-Mail-Adresse
    $from = 'hikimetti.tk+Feedback@gmail.com'; // Absender-E-Mail-Adresse
    $subject = 'Neues Feedback vom Training'; // Betreff der E-Mail
    $fromName = 'Training Feedback'; // Absender-Name

    $headers = "From: $fromName <$from>\r\n" .
               "Reply-To: $from\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Nachricht zusammenstellen
    $message = "Neues Feedback eingegangen:\n\n";
    $message .= "Bewertung: " . ($rating === 'positive' ? "Positiv" : "Negativ") . "\n";
    $message .= "Besonders gefallen: " . $favoritePart . "\n";
    $message .= "Vorschläge für nächstes Mal: " . $suggestions . "\n";
    $message .= "Gesendet am: " . $timestamp . "\n";

    // E-Mail senden
    if (mail($to, $subject, $message, $headers)) {
        echo "Feedback erfolgreich gesendet.";
    } else {
        echo "Fehler beim Senden des Feedbacks.";
    }
}
?>
