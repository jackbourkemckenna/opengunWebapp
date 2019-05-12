
<?php
  session_start();

  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must log in first";
    echo "hello";
  	header('location: login.php');
  }


include 'errors.php';
require 'aws-autoloader.php';
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

//Create a S3Client
$s3Client = new S3Client([
    'profile' => 'default',
    'region' => 'eu-west-1',
    'version' => '2006-03-01'
]);
/*
//Listing all S3 Bucket
$buckets = $s3Client->listBuckets();
foreach ($buckets['Buckets'] as $bucket) {
    echo $bucket['Name'] . "\n";
}
*/
$bucket = 'open-gun-recordings';
/*

$keyname = 'gun4_2.mp4';

try {
    // Get the object.
    $result = $s3Client->getObject([
        'Bucket' => $bucket,
        'Key'    => $keyname
    ]);

    // Display the object in the browser.
		header("Content-Type: {$result['ContentType']}");
    echo $result['Body'];
} catch (S3Exception $e) {
    //echo $e->getMessage() . PHP_EOL;
}


*/
$imgOut = array();
$videOut = array();

try {
    $vidResults = $s3Client->getPaginator('ListObjects', [
        'Bucket' => $bucket,

				'Prefix' => 'recordings/'
    ]);

    foreach ($vidResults as $result) {
        foreach ($result['Contents'] as $object) {
            $videOut[] = $object['Key'] . PHP_EOL;

        }
    }
} catch (S3Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

try {
    $imgResults = $s3Client->getPaginator('ListObjects', [
        'Bucket' => $bucket,

				'Prefix' => 'users/screenshots/'
    ]);

    foreach ($imgResults as $result) {
        foreach ($result['Contents'] as $object) {
            $imgOut[] = $object['Key'] . PHP_EOL;

        }
    }
} catch (S3Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

/*
try {
    $objects = $s3Client->listObjects([
        'Bucket' => $bucket
    ]);
    foreach ($objects['Contents']  as $object) {
        echo $object['Key'] . PHP_EOL;

    }
} catch (S3Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}
*/



//slicing the array because keep display s3 bucket folder name for some reason quick work around



// pull screen shots





$imageSlice = array_slice($imgOut, 1);
$videSlice = array_slice($videOut, 1);

?>

<html>

<h1>Your recordings</h1>
<p>Welcome <strong><?php echo $_SESSION['email']; ?></strong></p>
<h1>webview</h1>
<iframe src="https://www.w3schools.com"></iframe>
<iframe src="http://52.49.200.121:5000/" width="200" height="300" scrolling="auto" frameborder=0></iframe>

<body>
	<?php foreach($videSlice as $key => $value) : ?>
	<video width="320" height="240" controls>
		<source src="https://s3-eu-west-1.amazonaws.com/open-gun-recordings/<?php echo $value; ?>">
		</video>
	<?php endforeach; ?>


	<hr>
	<h1>screen shots</h1>
	<?php foreach($imageSlice as $key => $value) : ?>

		<img src="https://s3-eu-west-1.amazonaws.com/open-gun-recordings/<?php echo $value; ?>" height="240" width="240">
	</img>



	<?php endforeach; ?>


</body>

</html>
