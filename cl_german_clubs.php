<?php
	$relevantClubs = array("Bayern", "Leipzig", "Dortmund", "Hoffenheim", "Köln", "Hertha BSC", "Freiburg", "Bremen", "Mönchengladbach", "Schalke", "Frankfurt", "Leverkusen");
	$eventRegex = '/BEGIN:VEVENT.*?END:VEVENT/s';
	
	$rawData = file_get_contents('');
	preg_match_all($eventRegex, $rawData, $events);
	
	$result = "BEGIN:VCALENDAR\nPRODID:-//Google Inc//Google Calendar 70.9054//EN\nVERSION:2.0\nCALSCALE:GREGORIAN\nMETHOD:PUBLISH\nX-WR-CALNAME:Champions League mit deutscher Beteiligung\nX-WR-TIMEZONE:Europe/Berlin\nX-WR-CALDESC:Champions League mit deutscher Beteiligung\n";

	foreach ($events[0] as$event) {
		$count = 0;
		str_replace($relevantClubs, '', $event, $count);
		if (0 < $count) {
			$result .= $event . "\n";
		}
	}
	
	$result .= "END:VCALENDAR\n";
	header('Content-Disposition: attachment; filename="calendar.ics"');
	header('Content-Type: application/force-download"');
	header('Content-Length: ' . filesize($result));
	header('Connection: close');
	echo $result;
?>