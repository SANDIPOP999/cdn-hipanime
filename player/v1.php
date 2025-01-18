<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$videoUrl = $data['video'];
$gogoServerUrl = $data['gogoserver'];
$animeNameWithEP = $data['animeNameWithEP'];
$episodeNumber = $data['ep_num'];
$downloadLink = $data['ep_download'];
$nextEpText = $data['nextEpText'];
$nextEpLink = $data['nextEpLink'];
$prevEpText = $data['prevEpText'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $animeNameWithEP; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .video-container iframe {
            width: 100%;
            height: 500px;
            border: none;
            border-radius: 8px;
        }

        .episode-navigation {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .episode-navigation a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .episode-navigation a:hover {
            text-decoration: underline;
        }

        .download-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .download-button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Anime Title -->
        <h1><?php echo $animeNameWithEP; ?></h1>

        <!-- Video Player -->
        <div class="video-container">
            <iframe src="<?php echo $gogoServerUrl; ?>" allowfullscreen></iframe>
        </div>

        <!-- Episode Navigation -->
        <div class="episode-navigation">
            <?php if (!empty($prevEpText)) { ?>
                <a href="<?php echo $data['prevEpLink']; ?>"><?php echo $prevEpText; ?></a>
            <?php } else { ?>
                <span></span>
            <?php } ?>
            <a href="<?php echo $nextEpLink; ?>"><?php echo $nextEpText; ?></a>
        </div>

        <!-- Download Link -->
        <a href="<?php echo $downloadLink; ?>" class="download-button">Download Episode</a>
    </div>
</body>
</html>
