<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $geschlecht = $_POST["geschlecht"];
    $vorname = $_POST["vorname"];
    $nachname = $_POST["nachname"];
    $strasse = $_POST["strasse"];
    $plz = $_POST["plz"];
    $ort = $_POST["ort"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $betrag = $_POST["betrag"];
    $datenverarbeitungZustimmung = isset($_POST["datenverarbeitung_zustimmung"]);
    $verbindlicheZusage = isset($_POST["verbindliche-zusage"]);

    // Validate form data
    if (empty($vorname) || empty($nachname) || empty($strasse) || empty($plz) || empty($ort) || empty($email) || empty($geschlecht) || empty($betrag)) {
        echo "Bitte füllen Sie alle Felder aus.";
        exit;
    }

    // Check data processing agreement
    if (!$datenverarbeitungZustimmung) {
        echo "Bitte stimme der Verarbeitung deiner Daten zu.";
        exit;
    }

    // Check binding pledge confirmation
    if (!$verbindlicheZusage) {
        echo "Bitte bestätigen Sie Ihre verbindliche Spendenzusage.";
        exit;
    }

    // Set recipient email address
    $to = "spenden@aktionsbuendnis-demokratie.de";

    // Set email subject
    $subject = "Neue Spendenzusage";

    // Set email headers
    $headers = "From: $vorname $nachname <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";

    // Set email content
    $emailContent = "Geschlecht: $geschlecht\n";
    $emailContent .= "Vorname: $vorname\n";
    $emailContent .= "Nachname: $nachname\n";
    $emailContent .= "Straße: $strasse\n";
    $emailContent .= "Postleitzahl: $plz\n";
    $emailContent .= "Ort: $ort\n";
    $emailContent .= "Email: $email\n";
    $emailContent .= "Spendenbetrag: $betrag\n";
    $emailContent .= "Bemerkung: $message\n";
    $emailContent .= "Datenverarbeitung Zustimmung: " . ($datenverarbeitungZustimmung ? "Ja" : "Nein") . "\n";
    $emailContent .= "Verbindliche Spendenzusage: " . ($verbindlicheZusage ? "Ja" : "Nein") . "\n";

    // Send email
    if (mail($to, $subject, $emailContent, $headers)) {
        echo "E-Mail erfolgreich gesendet.";
    } else {
        echo "Fehler beim Senden der E-Mail.";
    }
}
?>

?>
