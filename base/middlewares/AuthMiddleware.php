<?php

namespace app\base\middlewares;

use app\base\Init;

class AuthMiddleware extends BaseMiddleware
{
    public array $actions = [];

    /**
     * @param array $actions
     */
    public function __construct(array $actions)
    {
        $this->actions = $actions;
    }

    public function exceute()
    {
        if (Init::isGuest()) {
            if (empty($this->actions) || in_array(Init::$self->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}