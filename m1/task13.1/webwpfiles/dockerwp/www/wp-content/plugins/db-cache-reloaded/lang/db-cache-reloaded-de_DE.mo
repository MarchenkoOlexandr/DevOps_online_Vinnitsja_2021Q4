??    *      l  ;   ?      ?  ?  ?  ?  h  l   	  }   ?	  Y   
    a
  ?   z  ?   f  s   ?  C   l  C   ?     ?               %     2  ?   E  )   ?               /     =  ?   Y     ?     ?     ?          0  ?   H     "     6     T  ?   Y     ?  ,   ?  9   )  ]   c  ]   ?  ?     J  ?  ;   ;  ^  w  ?  ?  ?  ?  l   I  ?   ?  l   [    ?  ?   ?  ?   ?   f   _!  G   ?!  G   "     V"  	   q"  #   {"     ?"     ?"  ?   ?"  8   p#     ?#     ?#     ?#     ?#  ?   ?#  
   ?$     ?$     ?$  -   ?$     ?$  P   %     X%     o%     ?%  ?   ?%     I&  ,   c&  9   ?&  g   ?&  g   2'  ?   ?'  W  y(  C   ?)                    %                                                  &   "                           #   
       *      (              !   '                    	          )         $                          
<h1>Can&#8217;t select database</h1>
<p>We were able to connect to the database server (which means your username and password is okay) but not able to select the <code>%1$s</code> database.</p>
<ul>
<li>Are you sure it exists?</li>
<li>Does the user <code>%2$s</code> have permission to use the <code>%1$s</code> database?</li>
<li>On some systems the name of your database is prefixed with your username, so it would be like <code>username_%1$s</code>. Could that be the problem?</li>
</ul>
<p>If you don't know how to setup a database you should <strong>contact your host</strong>. If all else fails you may find help at the <a href="http://wordpress.org/support/">WordPress Support Forums</a>.</p> 
<h1>Error establishing a database connection</h1>
<p>This either means that the username and password information in your <code>wp-config.php</code> file is incorrect or we can't contact the database server at <code>%s</code>. This could mean your host's database server is down.</p>
<ul>
	<li>Are you sure you have the correct username and password?</li>
	<li>Are you sure that you have typed the correct hostname?</li>
	<li>Are you sure that the database server is running?</li>
</ul>
<p>If you're unsure what these terms mean you should probably contact your host. If you still need help you can always visit the <a href='http://wordpress.org/support/'>WordPress Support Forums</a>.</p>
  $db->get_row(string query, output type, int offset) -- Output type must be one of: OBJECT, ARRAY_A, ARRAY_N <!-- Generated in {timer} seconds. Made {queries} queries to database and {cached} cached queries. Memory used - {memory} --> <b>DB Cache Reloaded Error:</b> <code>wpdb</code> class is redefined, plugin cannot work! <b>DB Cache Reloaded Error:</b> DB Module (<code>wpdb</code> class) is not loaded. Please open the <a href="%1$s">Options Page</a>, disable caching (remember to save options) and enable it again. If this will not help, please check <a href="%2$s">FAQ</a> how to do manual upgrade. <b>DB Cache Reloaded Error:</b> DB Module is not up to date (detected version %1$s instead of %2$s). In order to fix this, please open the <a href="%3$s">Options Page</a>, disable caching (remember to save options) and enable it again. <b>DB Cache Reloaded Error:</b> cannot include <code>db-functions.php</code> file. Please either reinstall plugin or remove <code>%s</code> file. <b>DB Cache Reloaded Info:</b> caching is not enabled. Please go to the <a href="%s">Options Page</a> to enable it. <strong>ERROR</strong>: WordPress %s requires MySQL 4.0.0 or higher <strong>ERROR</strong>: WordPress %s requires MySQL 4.1.2 or higher Additional options Advanced Cache files deleted. Cache filter Caching activated. Caching can't be activated. Please <a href="http://codex.wordpress.org/Changing_File_Permissions" target="blank">chmod 755</a> <u>wp-content</u> folder Caching deactivated. Cache files deleted. Clear the cache Clear the expired cache Configuration DB Cache Reloaded - Options Do not cache queries that contains this input contents. Divide different filters with '|' (vertical line, e.g. '_posts|_postmeta') Enable Enable Wrapper Mode Expire a cached query after Expired cache files deleted. Invalid database prefix It shows resources usage statistics in your template footer. To disable view just leave this field empty.<br/>{timer} - generation time, {queries} - count of queries to DB, {cached} - cached queries, {memory} - memory Load stats template Previous definition is at %s. Save Settings can't be saved. Please <a href="http://codex.wordpress.org/Changing_File_Permissions" target="blank">chmod 755</a> file <u>config.ini</u> Settings saved. WordPress database error %1$s for query %2$s WordPress database error %1$s for query %2$s made by %3$s Wrapper Mode is <strong>Disabled</strong>. In order to enable it, please disable cache first. Wrapper Mode is <strong>Enabled</strong>. In order to disable it, please disable cache first. Wrapper Mode requires at least PHP 5, and you are using PHP %s now. Please read the <a href="http://codex.wordpress.org/Switching_to_PHP5">Switching to PHP5</a> article for information how to switch to PHP 5. Wrapper Mode uses different method to load DB Module. It is less efficient (at least one query is not cached; some plugins may increase this number) and a bit slower. It allows to use DB Cache Reloaded along with incompatible plugins, which tries to load its own DB Module. You can try it if your cached query count is zero or -1. minutes. <em>(Expired files are deleted automatically)</em> Project-Id-Version: DB Cache Reloaded v2.0.2
Report-Msgid-Bugs-To: 
POT-Creation-Date: 
PO-Revision-Date: 2010-06-05 21:03+0100
Last-Translator: Carsten Tauber <carsten.tauber@greatsolution.de>
Language-Team: 
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Plural-Forms: nplurals=2; plural=n != 1;
X-Poedit-Language: German
X-Poedit-Country: GERMANY
X-Poedit-SourceCharset: utf-8
X-Poedit-KeywordsList: __;_e;__ngettext:1,2;_n:1,2;__ngettext_noop:1,2;_n_noop:1,2;_c,_nc:4c,1,2;_x:1,2c;_nx:4c,1,2;_nx_noop:4c,1,2
X-Textdomain-Support: yes
X-Poedit-SearchPath-0: .
 
<h1>Can&#8217;t select database</h1>
<p>We were able to connect to the database server (which means your username and password is okay) but not able to select the <code>%1$s</code> database.</p>
<ul>
<li>Are you sure it exists?</li>
<li>Does the user <code>%2$s</code> have permission to use the <code>%1$s</code> database?</li>
<li>On some systems the name of your database is prefixed with your username, so it would be like <code>username_%1$s</code>. Could that be the problem?</li>
</ul>
<p>If you don't know how to setup a database you should <strong>contact your host</strong>. If all else fails you may find help at the <a href="http://wordpress.org/support/">WordPress Support Forums</a>.</p> 
<h1>Error establishing a database connection</h1>
<p>This either means that the username and password information in your <code>wp-config.php</code> file is incorrect or we can't contact the database server at <code>%s</code>. This could mean your host's database server is down.</p>
<ul>
	<li>Are you sure you have the correct username and password?</li>
	<li>Are you sure that you have typed the correct hostname?</li>
	<li>Are you sure that the database server is running?</li>
</ul>
<p>If you're unsure what these terms mean you should probably contact your host. If you still need help you can always visit the <a href='http://wordpress.org/support/'>WordPress Support Forums</a>.</p>
  $db->get_row(string query, output type, int offset) -- Output type must be one of: OBJECT, ARRAY_A, ARRAY_N <!-- Generiert in {timer} Sekunden. {queries} Quer8es direkt an die Datenbank gestellt und {cached} zwischengespeicherte Queries. Verwendeter Speicher: {memory} --> <b>DB Reloaded Cache-Fehler:</b> <code>wpdb</code> Klasse wurde erneut definiert, Plugin funktioniert nicht! <b>DB Cache Reloaded Fehler:</b> DB-Modul (<code>wpdb</code> Klasse) ist nicht geladen. Bitte Caching abschalten und anschliessend erneut aktivieren <a href="%1$s">Optionen</a>. Sofern dies den Fehler nicht beseitigt, bitte ein Plugin-Upgrade in Erwägung ziehen <a href="%2$s">FAQ</a>. <b>DB Cache Reloaded Error:</b> DB-Modul ist nicht aktuell (erkannte Version %1$s anstelle von%2$s). Um dies zu beheben, bitte Caching abschalten, anschliessend wieder aktivieren. <a href="%3$s">Optionen</a>. <b>DB Reloaded Cache-Fehler:</b> kann <code>db-functions.php</code> nicht einbinden. Bitte reinstallieren Sie das Plugin oder entfernen Sie die <code>%s</code> Datei. <b>DB Cache Reloaded Info:</b> Caching ist inaktiv. Bitte in den <a href="%s">Optionen</a> aktivieren. <strong>FEHLER:</strong> WordPress% s benötigt MySQL 4.0.0 oder höher <strong>FEHLER:</strong> WordPress% s benötigt MySQL 4.1.2 oder höher Zusätzliche Einstellungen Erweitert Cachedateien erfolgreich gelöscht. Cache-Filter Caching aktiviert. Caching konnte nicht aktiviert werden. Bitte <a href="http://codex.wordpress.org/Changing_File_Permissions" target="_blank">chmod 755</a> für das Verzeichnis <u>wp-content</u> Caching deaktiviert. Cachedateien erfolgreich gelöscht. Cache leeren abgelaufenen Cache löschen Einstellungen DB Cache Reloaded - Optionen Cachen von Seiten verhindern, welche diesen Inhalt haben. Trenne verschiedene Filter mit '|' (vertikale Linie, z.B. '_posts|_postmeta') Aktivieren Wrapper Mode aktivieren Cache soll ablaufen nach Veraltete Cachedateien erfolgreich gelöscht. Invalid database prefix Statistik der Ressourcenauslastung in der Fusszeile (als Kommentar im Quellcode) Lade Statistik Vorlage Zurück Definition ist bei% s. Sichern Einstellungen konnten nicht gespeichert werden. Bitte <a href="http://codex.wordpress.org/Changing_File_Permissions" target="blank">chmod 755</a> für die Datei <u>config.ini</u> Einstellungen gespeichert WordPress database error %1$s for query %2$s WordPress database error %1$s for query %2$s made by %3$s Wrapper-Modus <strong>deaktiviert.</strong> Um diesen zu aktivieren, bitte zuerst den Cache abschalten. Wrapper-Modus <strong>aktiviert</strong>. Um diesen zu deaktivieren, bitte erst das Caching abschalten! Wrapper-Modus benötigt mindestens PHP 5, aktuell steht PHP% s zur Verfüugn. Bitte lesen Sie die <a href="http://codex.wordpress.org/Switching_to_PHP5">Umstellung auf PHP5</a> Artikel um weitere Informationen zu erhalten. Wrapper-Modus verwendet verschiedene Verfahren um das DB Modul zu laden. Dieser Modus ist weniger effizient (mindestens eine Abfrage wird nicht zwischengespeichert, einige Plugins können diese Zahl zusätzlich erhöhen). Der Modus erlaubt, den DB-Cache auch für sonst unkompatible Plugins zu verwenden, das diese ein eigenes DB-Modul laden.  Minuten. <em>(Abgelaufen Dateien werden automatisch gelöscht)</em> 