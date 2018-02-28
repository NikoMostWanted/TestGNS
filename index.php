<?php

include 'Taxi.php';

// Название остановки и количество пассажиров
$stands = array(
    array('name' => 'Первая остановка', 'pass' => rand(1, 20)),
    array('name' => 'Вторая остановка', 'pass' => rand(1, 20)),
    array('name' => 'Третья остановка', 'pass' => rand(1, 20)),
    array('name' => 'Четвертая остановка', 'pass' => rand(1, 20)),
    array('name' => 'Пятая остановка', 'pass' => rand(1, 20))
);

$max_iteration = 2; // для демонстрации работы запустим макс 15 циклов

$taxi = new Taxi();

while($i < $max_iteration)
{
    foreach ($stands as $stand)
    {
        echo $stand['name']."\r\n";
        $taxi->openDoor();
        $taxi->releasePassengers();
        $taxi->admitPassengers($stand['pass']);
        $taxi->closeDoor();
        $taxi->howMuch();

        echo "---------------------------------------------------\r\n";
    }

    $stands = array_reverse($stands); // переворачиваем остановки

    $i++;
}