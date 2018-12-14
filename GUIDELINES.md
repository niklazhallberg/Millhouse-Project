Project Millhouse 

Styling
Use hyphen-case (-) for css-classnames
Only style with hex-colors and preferably the colors provided by Millhouse, even for black/white

PHP & HTML
Use shorthand echo for inline php: <?= $item["value"]; ?> (instead of <?php echo $item["value"]; ?>)
No ending PHP-tag in files that contains only PHP

Files and folders
Only small letters for all files except files that contain classes (Users.php/Comments.php)
Only small letters for all folders
Files that are sentences should be separated by snake_case (database_connection.php)

Database
Only small letters in table and column names
Separate table and column names with snake_case

GIT
Someone other than yourself should do pull requests on your branch if possible
Pull into master after each merged pull request
Start day by pulling from master
Only work on local branches, never on origin master
Never push to origin master - only to your branch
If more than one person works on same commit/push, include names of everyone involved