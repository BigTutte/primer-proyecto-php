<?php
declare(strict_types=1); //para que php sea mas estricto con los tipos de datos

class SiguientePeli {

    public function __construct
    (
        private string $title,
        private int $daysUntil,
        private string $followingProducting,
        private string $releaseDate,
        private string $posterUrl,
        private string $overview
    )
    {
        //no es necesario hacer nada
    }

    public function getCuantoFaltaMsj() : string
    {
        //recordar match es como un switch
        return match(true) 
        {
            $this->daysUntil === 0                              => $msj = "Hoy se estrena!",
            $this->daysUntil === 1                              => $msj = "Mañana se estrena!",
            1 < $this->daysUntil && $this->daysUntil < 7        => $msj = "Faltan pocos dias para el estreno!",
            7 <= $this->daysUntil && $this->daysUntil < 30      => $msj = "Faltan algunas semanas para el estreno!",
            default                                             => $msj = "Faltan $this->daysUntil dias para el estreno!"
        };
    }

    public static function fetchAndCreateMovie(string $apiURL) : SiguientePeli //
    {
        $result = file_get_contents($apiURL);
        $data = json_decode($result, true);
        return new self (
            $data['title'],
            $data['days_until'],
            $data['following_producting']['title'] ?? 'No disponible', //en caso de que no se sepa la siguiente peli, devuelve desconocido
            $data['release_date'],
            $data['poster_url'],
            $data['overview']
        );
    }

    public function getData()
    {
        return get_object_vars($this);
    }

}