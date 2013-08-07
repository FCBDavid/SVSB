<?php

namespace Compufix\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CompufixUserBundle extends Bundle
{
    function getParent() {
      //  return "CompufixUserBundle";
        return "FOSUserBundle";
    }
}
