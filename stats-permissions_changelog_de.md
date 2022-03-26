#### 1.0.0 Release

(2022-03-26)

* Den API-Modus von LFWWH übernommen, damit andere Entwickler die Anzeige des Templates deaktivieren können. Dieser Modus kann momentan nur per PHP Event getriggert werden, die ACP Einstellung dafür kommt später.
* Das PHP Event `lukewcs.statspermissions.display_condition` eingebaut, mit dem bestimmte Variablen übersteuert werden können um das Verhalten von StatsPerm zu ändern. Hilfreich für Bridge-Entwickler. Die folgenden Event-Variablen werden erstmalig unterstützt: 
  * force_api_mode: Erzwingt den API-Modus damit StatsPerm nicht angezeigt wird, sondern lediglich die Template Variablen erzeugt werden.
* Versionsprüfung hinzugefügt.

#### 1.0.0-rc1 Release

(2022-02-28)

* Erste öffentliche Version.
* Komplette Überarbeitung und Anpassung an die aktuellen Richtlinien.
* Vorhandene Funktionen und Eigenschaften die von LFWWH 2.0.0 bereits 2019 und 2020 übernommen wurden auf den neuesten Stand gebracht, primär das Rechtesystem.
* Neue Funktionen und Eigenschaften von LFWWH 2.1.0+ übernommen.
