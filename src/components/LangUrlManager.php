<?php
/**
 * Created by PhpStorm.
 * User: phpCreator
 * Date: 19.08.2017
 * Time: 21:42
 */

namespace justyork\yii2_multilanguage\components;

use common\models\Language;
use yii\web\UrlManager;
class LangUrlManager extends UrlManager{

    public function createUrl($params){

        if(isset($params['lang_id'])){


            $lang = Language::findOne($params['lang_id']);
            if($lang === null){
                $lang = Language::getDefaultLang();
            }
            unset($params);
        }
        else{
            $lang = Language::getCurrent();
        }

        $url = parent::createUrl($params);

        if($url == '/'){
            return '/'.$lang->code;
        }
        else{
            return '/'.$lang->code.$url;
        }
    }


}