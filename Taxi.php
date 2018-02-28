<?php

class Taxi
{
    const CAPACITY = 18;  //вместительность маршрутки
    public static $occupied_places = 0; // Маршрутка пустая

    public function openDoor()
    {
        echo "Маршрутка открывает двери\r\n";
    }

    public function closeDoor()
    {
        echo "Маршрутка закрывает двери\r\n";
    }

    public function admitPassengers($pass)
    {
        echo "Маршрутка впускает пассажиров\r\n";
        if(self::$occupied_places >= self::CAPACITY)
        {
            echo "В маршрутке нет мест\r\n"; //поехали дальше
        }
        else
        {
            $admPass = rand(0,$pass); // мы изначально не знаем сколько захочет попасть внутрь маршрутки
            $count = 0;
            while($count < $admPass)
            {
                self::$occupied_places++;  // заходим по одному!
                if(self::$occupied_places == self::CAPACITY)
                {
                    echo "Маршрутка заполнена, было впущено ".($count+1)." пассажиров\r\n";
                    break;
                }
                $count++;
            }
            if(self::$occupied_places < self::CAPACITY)
            {
                echo "Всего зашло ".$count." пассажиров\r\n";
                echo "Маршрутка не полная, ждем 1 минуту!\r\n";
            }
        }
    }

    public function releasePassengers()
    {
        echo "Маршрутка выпускает пассажиров\r\n";
        $relPass = rand(0, self::$occupied_places);
        self::$occupied_places-=$relPass;
        echo "Маршрутка выпустила ".$relPass." пассажиров\r\n";
    }

    public function howMuch()
    {
        echo "После отправки маршрутки в салоне ".self::$occupied_places." пассажиров\r\n";
    }
}