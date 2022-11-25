### 1.0.1
GH (2022--)

* Einstellungen:
  * Bei den Einstellungen werden für Ja/Nein-Optionen jetzt Checkboxen mit Toggle-Style verwendet. Dabei wurden für Menschen mit Farbseh-Schwäche (Rot/Grün Problematik und Farbblindheit) zwei Merkmale berücksichtigt: 1) Beibehaltung der gewohnten Positionen für Ja und Nein. 2) Eindeutige Symbole für die Zustände Ja und Nein. Toggle Funktionalität in angepasster Form von "Style Changer" übernommen. (Danke an Kirk)
  * "Absenden" und "Zurücksetzen" sind jetzt in einer eigenen Untergruppe, die auf dieselbe Weise dargestellt wird, wie bei ACP Seiten von phpBB.
  * Verbesserte Benachrichtigungen-Funktion von EMP übernommen.
  * Die aktualisierten Funktionen des Sprachpaket-Infosystems von EMP übernommen.
  * XHTML, Javascript Events und alle unnötigen IDs aus dem HTML entfernt.
* Javascript/jQuery:
  * Alle aktuellen Entwicklungen von EMP übernommen.

### 1.0.0
GH (2022-03-26)

* Den API-Modus von LFWWH übernommen, damit andere Entwickler die Anzeige des Templates deaktivieren können. Dieser Modus kann momentan nur per PHP Event getriggert werden, die ACP Einstellung dafür kommt später.
* Das PHP Event `lukewcs.statspermissions.display_condition` eingebaut, mit dem bestimmte Variablen übersteuert werden können um das Verhalten von StatsPerm zu ändern. Hilfreich für Bridge-Entwickler. Die folgenden Event-Variablen werden erstmalig unterstützt: 
  * `force_api_mode` (bool): Erzwingt den API-Modus damit StatsPerm nicht angezeigt wird, sondern lediglich die Template Variablen erzeugt werden.
* Update-Prüfung hinzugefügt.
* Template Änderungen:
  * API-Modus hinzugefügt.
  * Die von phpBB nicht genutzte CSS Klasse `statistics` in `statsperm-statistics` umbenannt. (Vorschlag von: Kirk) 

### 1.0.0-rc1
GH (2022-02-28)

* Erste öffentliche Version.
* Komplette Überarbeitung und Anpassung an die aktuellen Richtlinien.
* Vorhandene Funktionen und Eigenschaften die von LFWWH 2.0.0 bereits 2019 und 2020 übernommen wurden auf den neuesten Stand gebracht, primär das Rechtesystem.
* Neue Funktionen und Eigenschaften von LFWWH 2.1.0+ übernommen.
