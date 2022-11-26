#### Builds 1.0.1

#### 1.0.1-b2
* ACP-Template:
  * Twig optimiert, um im Output unnötige Whitespaces zu eliminieren.
  * Bei einem `legend` wurde `class="legend_sub"` definiert, welches jedoch nur bei EMP benötigt wird. Copy&Paste Fehler. (Meldung Kirk)
* Sprachdateien:
  * Beschreibungen der Rechte erweitert, damit man auch in den Rechten sofort sieht, was zu StatsPerm gehört.
* JS:
  * ACP JS Objekt umbenannt.
* CSS:
  * Beim Toggle CSS einen kompakten Header eingefügt mit grundlegenden Infos und um Dan Klammer zu benennen, von dessen Webseite wir den CSS Code ursprünglich haben.

#### 1.0.1-b1
* ACP-Modul:
  * Optimierung der Metadata Funktion, übernommen von EMP.
  * Verbesserte Notes Funktion (PHP) von EMP übernommen.
  * Die aktualisierten Funktionen des Sprachpaket-Infosystems von EMP übernommen.
* ACP-Template:
  * Radio Buttons auf Checkboxen mit Toggle-Style umgestellt.
  * "Absenden" und "Zurücksetzen" sind in einer eigenen Untergruppe.
  * Verbesserte Notes Funktion (Twig) von EMP übernommen.
  * Alle JS Events (`onchange`, `onclick`)im HTML entfernt.
  * Alle unnötigen IDs im HTML entfernt.
  * XHTML entfernt.
  * Twig Makro `switch` von EMP eingefügt, mit dem einfache Ja/nein Schalter generiert werden können. 
* JS:
  * Javascript Events werden direkt per jQuery registriert wie bei EMP.
  * Ansprechen der Formular-Controls erfolgt nicht mehr per `id`, sondern per `name` Attribut wie bei EMP.
* CSS:
  * Toggle CSS von EMP übernommen.
* Sprachdateien:
  * Sprachvariablen an die Änderungen angepasst.
* `ext.php`:
  * PHP Maximalversion auf <8.2.0 erhöht.
* `composer.json`:
  * PHP Maximalversion auf <8.2.0 erhöht.
  * Überflüssige (redundante) Angabe des phpBB Versionsbereichs entfernt.

#### Builds 1.0.0

#### b10
* GitHub: `.gitattributes` ergänzt.
* Changelog ergänzt.

#### b9
* GitHub: `.gitattributes` angepasst, `docs/` hinzugefügt.

#### b8
* Release
* API-Modus eingebaut.
* Event `lukewcs.statspermissions.display_condition` eingebaut.
* Update-Prüfung hinzugefügt.
* GitHub: GitHub Pages eingerichtet für Update-Prüfung.

#### b7
* RC1
* `composer.json`:
  * Aktualisiert.
* Kleinere Änderungen in den Sprachdateien.
* GitHub: `README.md` aktualisiert.

#### b6
* GitHub: GitHub Actions eingerichtet.

#### b5
* `composer.json`: 
  * Aktualisiert, ausserdem Update-Prüfung entfernt.
* GitHub: Versionsdatei entfernt.
* GitHub: `.gitattributes` angepasst.

#### b4
* GitHub: Offizielles Changelog hinzugefügt.
* GitHub: `README.md` angepasst.

#### b3
* Komplette Überarbeitung und Anpassung an die aktuellen Richtlinien. Dadurch ändern sich auch die Mindestvoraussetzungen auf phpBB 3.2.10 und PHP 7.0. Ältere Entwicklerversionen dieser Ext sind zur Version 1.0.0-rc1 inkompatibel und darum ***nicht*** Update-fähig. Diese müssen vor der Installation dieser Version komplett deinstalliert werden.
* Vorhandene Funktionen und Eigenschaften die von LFWWH 2.0.0 bereits 2019 und 2020 übernommen wurden auf den neuesten Stand gebracht, primär das Rechtesystem.
* Neue Funktionen und Eigenschaften von LFWWH 2.1.0+ übernommen.
