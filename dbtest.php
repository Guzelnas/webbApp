<?php
//connection
require '/var/www/html/vendor/autoload.php';
$rds = new Aws\Rds\RdsClient([
  'region'            => 'us-west-2',
    'version'           => 'latest'
]);
$result = $rds->describeDBInstances([
	'AllocatedStorage' => 10,
	'DBInstanceClass' => 'db.t1.micro',
  'DBInstanceIdentifier' => 'itmo444db',
	'DBName' => 'guzeldb',
    	'Engine' => 'MySQL', // REQUIRD
    	'MasterUserPassword' => 'ilovebunnies',
    	'MasterUsername' => 'controller',
    	'PubliclyAccessible' => true,
]);
$result = $rds->waitUntil('DBInstanceAvailable',['DBInstanceIdentifier' => 'itmo444db',
]);
#Creating the table
$result = $rds->describeDBInstances([
    'DBInstanceIdentifier' => 'itmo444db',
]);
$endpoint = $result['DBInstances'][0]['Endpoint']['Address'];
echo $endpoint . "\n";
$link = mysqli_connect($endpoint,"controller","ilovebunnies","itmo444db") or die("Error " . mysqli_error($link));
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
//sql to create a table
$sql = "CREATE TABLE records
(
ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
Uname VARCHAR(20),
Email VARCHAR(20),
Phone VARCHAR(20),
RawS3url VARCHAR(32),
FinishedS3url VARCHAR(32),
Filename VARCHAR(256),
State INT(1),
Datetime timestamp
)";
$link->close();
?>
