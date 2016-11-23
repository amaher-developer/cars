<?php



$module = $_GET['p'];

if($module)
    include '../prepare.php';



$delegate = array(
                'studentAdd',
                'studentAll', 
                'students', 
                'studentSearch', 
                'studentSubscription',
                'studentSubscribes'
                );

$employee = array(
                'openclosed',
                'config', 
                'admins', 
                'adminAdd', 
                'adminEdit'
                );

$account = array(
                'openclosed',
                'config', 
                'admins', 
                'adminAdd', 
                'adminEdit'
                );

$manager = array(
                'admins', 
                'adminAdd', 
                'adminEdit',
                'sendMail',
                'classrooms',
                'classroomAdd',
                'classroomEdit',
                'ClassroomsSchedule',
                'courses',
                'courseAdd',
                'courseEdit',
                'levels',
                'levelAdd',
                'levelEdit',
                'rounds',
                'roundAdd',
                'roundEdit',
                'studentWaiting'
             );



 $boss = array(
 
                'openclosed',
                'config',
                'reports',
                'reportCompares'
                );

 print_r(array_merge($boss, $manager, $account));
 if($module != 'login')
{
    if($_SESSION['admin']['goupId'] && in_array($module, explode($_SESSION['admin']['permissions'])))
        echo "<script>window.location = 'contents.php?p=default'</script>";
}

$router = new Router($module);
$router->render();



?>