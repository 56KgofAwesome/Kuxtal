<?php
/**
 * Created by PhpStorm.
 * User: alejandrocastaneda
 * Date: 11/20/18
 * Time: 12:16 AM
 */

namespace frontend\controllers;

use common\models\Products;
use Yii;
use common\models\Categories;
use yii\helpers\VarDumper;

class ApiController extends \yii\web\Controller {
    public function beforeAction($action)
    {
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
        header('Access-Control-Allow-Credentials: true');
        header('Cache-Control: no-cache');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header('Pragma: no-cache');

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        //return true;
        return parent::beforeAction($action);
    }

    public function actionGetcategories(){
        $categories = Categories::find()->where(['status' => 1])->limit(6)->all();

        return $categories;
    }

    public function actionAddcart($id){
        if (Yii::$app->user->isGuest){
            return "Debes iniciar sesión para añadir items";
        }

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['cart'])){
            $_SESSION['cart']['user'] = Yii::$app->user->identity->id;
            $_SESSION['cart']['items'][] = $id;
            return "Item añadido al carrito";
        }else{
            $_SESSION['cart']['items'][] = $id;
            return "Item añadido al carrito";
        }
    }

    public function actionDeleteitem($id){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        foreach ($_SESSION['cart']['items'] as $key => $value){
            if($value == $id){
                unset($_SESSION['cart']['items'][$key]);
                break;
            }
        }

        return "Eliminado";
    }

    public function actionGetproductos(){
        $productos = Products::find()->where(['status' => 1])->limit(6)->orderBy('id', SORT_DESC)->all();
        $response = [];

        foreach ($productos as $key => $producto) {
            $response[$key]['id'] = $producto->id;
            $response[$key]['name'] = $producto->name;
            $response[$key]['desc'] = $producto->description;
            $response[$key]['stock'] = $producto->stock;
            $response[$key]['price'] = $producto->price;
            $response[$key]['priceb'] = $producto->price * 1.25;
            $response[$key]['brand'] = $producto->brand;
            $response[$key]['categoria'] = $producto->id_categoria;
            $response[$key]['photo'] = $producto->productGalleries[0]->url;
        }

        return $response;
    }
}