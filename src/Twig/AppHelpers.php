<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppHelpers extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('area', [$this, 'welcomToApp']),
        ];
    }

    public function welcomToApp(): string
    {
        return WelcomApp();
    }
}
