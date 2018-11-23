Project Guidelines Example

Styling
Use hyphen-case (-) for css-classnames
Never style with ID
No magic numbers

PHP & HTML
Use shorthand echo for inline php: <?= $item["value"]; ?> (instead of <?php echo $item["value"]; ?>)
No ending PHP-tag in files that contains only PHP
Single line comment with //, multiline with /**/
Use Alternative syntax for control structures in files where HTML and PHP are mixed

Files and folders
Only small letters for all files except files that contain classes (Auth.php/Comments.php)
Only small letters for all folders
Files that are sentences should be separated by snake_case (database_connection.php)

Database
Only small letters in table and column names
Separate table and column names with snake_case

GIT
Commit message should be able to end the following sentance: "This commit will..."
For longer commit messages separate the message into title and body (`git commit -m "This is title" -m "This is body")
At least two people in the group should verify the pull request
Pull into master after each merged pull request
Start day by pulling from master
If more than one person works on same commit/push, include names of everyone involved