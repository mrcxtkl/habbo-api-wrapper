<?php
include '../lib/class.client.php';

$HabboClient = new HabboClient($_GET['username']);

# echo json_encode($HabboClient->user);

$user = $HabboClient->user->data;
$badges = $HabboClient->user->badges->data;
$friends = $HabboClient->user->friends->data;
$groups = $HabboClient->user->groups->data;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div id="root">
        <div id="profile">
            <h2><?php echo $user->name ; ?></h2>
            <img src="<?php echo $user->avatarURL; ?>" id="char">
            <p><?php echo $user->motto . "<br><b>$user->memberSince</b>"; ?></p><br>
        </div>

        <div id="friends">
            <?php
            foreach ($friends as $friend) {
                echo "<img src='$friend->avatarURL&size=s' style='margin: 5px' title=\"$friend->name\"/>";
            }
            ?>
        </div>

        <div id="badges">
            <?php
            foreach ($badges as $badge) {
                echo "<img src='$badge->badgeURL' style='margin: 5px;width:40px;height:40px;' title=\"$badge->name\"/>";
            }
            ?>
        </div>

        <div id="groups">
            <?php
            foreach ($groups as $group) {
                echo "<img src='$group->badgeURL' style='margin: 5px;width:40px;height:40px;' title=\"$group->name\"/>";
            }
            ?>
        </div>
    </div>
</body>

</html>