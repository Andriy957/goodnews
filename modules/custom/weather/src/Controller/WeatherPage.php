<?php
/**
*@file
*Contains \Drupal\weather\Controller\WeatherPage
*/

namespace Drupal\weather\Controller;  
use Drupal\Core\Render\Markup;

class WeatherPage {
  public function getWeather($city) {
    $response = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$city.',&appid=2730c05d240c8e3069fab6327d5f2bba&units=metric');
    $data = json_decode($response);
    
    return [
      '#markup' => Markup::create(
                                   '<h1>'  . $data->name . '</h1>' . 
                                   '<div>' . 'Температура: ' . round($data->main->temp). '°C' . '</div>' .
                                   '<div>' . 'Хмарність: ' . $data->clouds->all. '%' . '</div>' .
                                   '<div>' . 'Вологість: ' . $data->main->humidity. '%' . '</div>' .
                                   '<div>' . 'Тиск: ' . $data->main->pressure. ' мм' . '</div>' . 
                                   '<div>' . 'Вітер: ' . $data->wind->speed. ' м/сек' . '</div>' 
                                  )
    ];   
  }    
}


