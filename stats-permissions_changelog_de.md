### 1.2.0
(2024--)

* Die Unterstützung für phpBB 3.2 wurde aufgegeben, Minimum ist jetzt phpBB 3.3.0.
* Rechtesystem: Von LFWWH 2.2.0 die Änderungen am vereinfachten Berechtigungssystem übernommen.
  * Das vereinfachte Berechtigungssystem in einen eigenen Abschnitt gesetzt und eine kleine Erklärung hinzugefügt.
  * Statt einem Dropdown-Menü mit 4 Optionen, dienen jetzt 2 separate Schalter pro Gruppe für die Wahl der Berechtigungen.

### 1.1.0
(2023-12-09)

* Freigegeben für PHP 8.3.
* Erweiterung ist jetzt kompatibel mit Toggle Control. Somit können Administratoren zentral an einer Stelle entscheiden, ob für Ja/Nein Schalter Radio Buttons, Checkboxen oder Toggles verwendet werden sollen.
* Technik auf den Stand von EMP 2.0 gebracht, Details im Build Changelog.

### 1.0.2
(2023-02-12)

* Fix: Von LFWWH einen Fix im Rechtesystem bezüglich Bots übernommen, der sich auf eine Warnung im Foren-Frontend bezieht.
* ACP-Template:
  * Toggle Farben von Extension Manager Plus übernommen.
  * Korrektur im CSS bezüglich vertikalem Abstand bei responsive Ansicht. (Meldung Kirk)
  * Verschiedenes CSS von LFWWH übernommen.
  * Twig: Das `spaceless` Tag, welches seit Twig 2.7 als DEPRECATED eingestuft ist, wurde entfernt. Stattdessen wird `spaceless` Filter und Whitespace Modifier eingesetzt.
* ACP-Modul:
  * Im Modul wurde noch in 2 Zeilen das alte 3.1 Sprachobjekt verwendet.
  * Umgestellt auf Controller.
* PHP Minimalversion auf 7.1.0 erhöht und Maximalversion auf 8.2.x.

### 1.0.1
(2022-12-01)

* Rechte:
  * Beschreibungen der Rechte erweitert, damit man auch in den Rechten sofort sieht, was zu StatsPerm gehört.
* Einstellungen:
  * Bei den Einstellungen werden für Ja/Nein-Optionen jetzt Checkboxen mit Toggle-Style verwendet. Dabei wurden für Menschen mit Farbseh-Schwäche (Rot/Grün Problematik und Farbblindheit) zwei Merkmale berücksichtigt: 1) Beibehaltung der gewohnten Positionen für Ja und Nein. 2) Eindeutige Symbole für die Zustände Ja und Nein. Toggle Funktionalität in angepasster Form von "Style Changer" übernommen. (Danke an Kirk)
  * "Absenden" und "Zurücksetzen" sind jetzt in einer eigenen Untergruppe, die auf dieselbe Weise dargestellt wird, wie bei ACP Seiten von phpBB.
* Optimierung:
  * Code Optimierung bei Javascript, Twig und HTML. Mehrere Eigenschaften und aktuelle Entwicklungen von "Extension Manager Plus" übernommen.
  * XHTML, Javascript Events und alle unnötigen IDs aus dem HTML entfernt.
  * Javascript Events werden jetzt direkt in jQuery registriert und Elemente werden nicht mehr über die ID sondern über den Element-Namen angesprochen, der ohnehin vorhanden sein muss.

### 1.0.0
(2022-03-26)

* Den API-Modus von LFWWH übernommen, damit andere Entwickler die Anzeige des Templates deaktivieren können. Dieser Modus kann momentan nur per PHP Event getriggert werden, die ACP Einstellung dafür kommt später.
* Das PHP Event `lukewcs.statspermissions.display_condition` eingebaut, mit dem bestimmte Variablen übersteuert werden können um das Verhalten von StatsPerm zu ändern. Hilfreich für Bridge-Entwickler. Die folgenden Event-Variablen werden erstmalig unterstützt: 
  * `force_api_mode` (bool): Erzwingt den API-Modus damit StatsPerm nicht angezeigt wird, sondern lediglich die Template Variablen erzeugt werden.
* Update-Prüfung hinzugefügt.
* Template Änderungen:
  * API-Modus hinzugefügt.
  * Die von phpBB nicht genutzte CSS Klasse `statistics` in `statsperm-statistics` umbenannt. (Vorschlag von: Kirk) 

### 1.0.0-rc1
(2022-02-28)

* Erste öffentliche Version.
* Komplette Überarbeitung und Anpassung an die aktuellen Richtlinien.
* Vorhandene Funktionen und Eigenschaften die von LFWWH 2.0.0 bereits 2019 und 2020 übernommen wurden auf den neuesten Stand gebracht, primär das Rechtesystem.
* Neue Funktionen und Eigenschaften von LFWWH 2.1.0+ übernommen.
