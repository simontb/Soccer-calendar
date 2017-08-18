# Soccer calendar
Internet calendar with matches of the clubs you're interested in

## Goals
I wanted a calendar with all Champions League matches involving German clubs that I can import into my Google calendar. However, I only found calendars with all matches. So I developed a small PHP app, that downloads an .ics file and returns a file containing only relevant matches.

## How to use
1. Add all clubs you're interested in to the 'relevantClubs' array (a distinct part of the name is sufficient as well).
2. Insert the URL of the original internet calendar as parameter for the 'file_get_contents' method to download the raw data.
3. (Optional) Edit the name, timezone, and description of your calendar in the 'result' string.
4. Upload the file to your server.
5. In your Google calendar add the calendar using the link to the hostet .php file (https://support.google.com/calendar/answer/37100?&hl=en)
