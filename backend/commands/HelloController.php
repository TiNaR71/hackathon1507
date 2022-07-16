<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Objects;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\ArrayHelper;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }


    function curlSend($link,$in,$headers=null, $req='GET') {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_USERAGENT, 'LetsBOT/1.0');
        curl_setopt($curl, CURLOPT_URL, $link);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $req);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        if(!empty($in)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $in);
            if($req=='GET')curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        }
        if($req!=='GET') curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $req);
        if(!empty($headers)) curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        else {
            if(!empty($in)&&!is_array($in)) {
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            }
        }
        $out = curl_exec($curl);
        curl_close($curl);
        return $out;
    }


    public function actionParser() {
            $page = 1;
            loadPage:
            $request = [
                'controller' => 'filter',
                'method' => 'runFilter',
                'FILTER' => [
                    'TYPE_OBJECT' => 'Квартира',
                    'DISTRICTS' => 'Любой',
                    'OBJECT' => 'Любой', //'ЖК «Зеленодар»',
                    'FLAT_TYPES' => 'Неважно',
                    'SQUARE' => [
                        '0.00 м²',
                        '1000 м²'
                    ],
                    'FULL_PRICE' => [
                        '0 ₽',
                        '9 999 999 999 ₽'
                    ],
                    'FLOOR' => [
                        '0',
                        '99'
                    ],
                    'MATERIAL' => 'Любой',
                    'COMMERCE' => 'Неважно',
                    'WINDOW' => 'Любой',
                    'BATHROOM' => 'Любой',
                    'CEILING' => 'Неважно',
                    'CLASS' => 'Любой',
                    'TERRITORY' => 'Неважно',
                    'HUMANIZED_READY_DATE' => 'Любой',
                    'PARKING' => 'Неважно'
                ],
                'PAGER' => [
                    'PAGE' => $page
                ]
            ];
            echo 'import page '.$page;
            $url = 'https://ask-yug.com/api/seo_filter/?'.http_build_query($request);
            $response = $this->curlSend($url, null);
            $response_object = json_decode($response);
            echo ' count: '.count($response_object->data->ITEMS);
            $already = ArrayHelper::getColumn(Objects::find()->all(),'external_id');
            if($response_object->status === true) {
                if(count($response_object->data->ITEMS) > 0) {
                    echo ', save data to json file';
                    /*$file = \Yii::getAlias('@app/commands') . '/objects.json';
                    $fp = fopen($file, "a");
                    if($page == 1) fwrite($fp, '['.json_encode($response_object->data->ITEMS).', ');
                    else {
                        if(count($response_object->data->ITEMS) == 20) fwrite($fp, json_encode($response_object->data->ITEMS)).', ';
                        else fwrite($fp, json_encode($response_object->data->ITEMS)).']';
                    }
                    fclose($fp);*/

                    foreach ($response_object->data->ITEMS as $ITEM) {
                        $ITEM = json_decode(json_encode($ITEM), true);
                        if(in_array($ITEM['ID'], $already)) continue;
                        $object = new Objects();
                        foreach ($ITEM as $k=>$v){
                            $k = strtolower($k);
                            if($object->hasAttribute($k)) {
                                if($k == 'parameters_icon') {
                                    if(!empty($v)) $object->$k = json_encode(array_keys($v));
                                }
                                elseif($k == 'id') $object->external_id = $v;
                                elseif(is_array($v)) $object->$k = json_encode($v);
                                else $object->$k = $v;
                            } else echo $object->hasAttribute($k).' - '.$k . json_encode($v).PHP_EOL;
                        }
                        $object->save();
                        if(!empty($object->getErrors())) {
                            echo json_encode($object->getErrors());
                            die();
                        }
                    }

                    if(count($response_object->data->ITEMS) == 20) {
                        echo ', goto next page'.PHP_EOL;
                        $page++;
                        goto loadPage;
                    }
                }
            }
    }
}
