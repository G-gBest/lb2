<?php

require_once __DIR__."/vendor/autoload.php";
use MongoDB\Client;

class Car
{
    private Client $client;
    private \MongoDB\Collection $car;
    private \MongoDB\Collection $rent;

    public function __construct()
    {
        $this->client = new \MongoDB\Client("mongodb://127.0.0.1/");
        $this->car = $this->client->cars->car;
        $this->rent = $this->client->cars->rent;
    }

    public function costInDate($date): void
    {
        $date = new \MongoDB\BSON\UTCDateTime(strtotime($date) * 1000);
        $statement = $this->rent->find(['date_start' => ['$lte' => $date], 'date_end'=>['$gte'=>$date]]);
        echo "<div id='save'>";
        foreach ($statement->toArray() as $data) {
            echo "Машина: {$data['name']} Цена: {$data['cost']}<br>";
        }
        echo "</div>";
    }

    public function lessRace($race): void
    {
        $statement = $this->car->find(['race'=>['$lt'=>(int)$race]]);
        echo "<div id='save'>";
        foreach ($statement->toArray() as $data) {
            echo "Машина: {$data['name']} Пробег: {$data['race']}<br>";
        }
        echo "</div>";
    }

    public function carNames(): void
    {
        $statement = $this->car->distinct("name");
        echo "<div id='save'>Машины:";
        foreach ($statement as $data) {
            echo "$data<br>";
        }
        echo "</div>";
    }
}