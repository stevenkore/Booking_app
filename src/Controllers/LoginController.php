<?php

namespace BookingApp\Controllers;

use Doctrine\DBAL\Connection;
use Symfony\Component\HttpFoundation\Request;

class LoginController
{
    public function __construct(Connection $dbConnection, \Twig_Environment $twigEnv)
    {
        $this->dbConnection = $dbConnection;
        $this->twigEnv = $twigEnv;
    }

    public function __invoke(Request $request)
    {
        $query = $this->dbConnection->executeQuery("SELECT * FROM bookings");
        $result = $query->fetchAll();

        return $this->twigEnv->render('login.html.twig', ['bookings' => $result]);
    }
}