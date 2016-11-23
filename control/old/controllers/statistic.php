<?php

$this->title = 'أحصائيات الموقع';


$fetch = new Adv('SELECT DISTINCT udate, FROM_UNIXTIME(udate, "%a ,%D %M, %Y") AS day, count(id) as numberOfEstates, sum(views) as numberOfViews
FROM bezaat
GROUP BY day
');
$fetch->addOrderBy(' udate desc ');
$fetch->addLimit('30');
$fetch->prepare();
$estates = $fetch->getRecordSet();

$fetch = new Adv('SELECT DISTINCT date, FROM_UNIXTIME(date, "%a ,%D %M, %Y") AS day, count(id) as numberOfUsers
FROM users
GROUP BY day
');
$fetch->addOrderBy(' date desc ');
$fetch->addLimit('30');
$fetch->prepare();
$users = $fetch->getRecordSet();


$i = 0;
foreach($estates as $estate){
    foreach($users as $user){
        if($user['day'] == $estate['day']){
            $records[$i]['date'] = $estate['day'];
            $records[$i]['numberOfEstates'] = $estate['numberOfEstates'];
            $records[$i]['numberOfViews'] = $estate['numberOfViews'];
            $records[$i]['numberOfUsers'] = $user['numberOfUsers'];
            
            $elementsNumberOfEstates[] = $estate['numberOfEstates'];
            $elementsNumberOfViews[] = $estate['numberOfViews'];
            $elementsNumberOfUsers[] = $user['numberOfUsers'];
            
            $i++;
        }
    }
}

$estatesAverage = intval(array_sum($elementsNumberOfEstates) / count($elementsNumberOfEstates));
$viewsAverage = intval(array_sum($elementsNumberOfViews) / count($elementsNumberOfViews));
$usersAverage = intval(array_sum($elementsNumberOfUsers) / count($elementsNumberOfUsers));
?>