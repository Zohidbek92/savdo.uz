<?php

namespace restapi\controllers;

use Yii;
use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = '\restapi\models\User';

}

?>