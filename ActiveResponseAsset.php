<?php

/**
 * @package   srusakov\yii2-activeresponse
 * @author    Sergey Rusakov <srusakov@gmail.com>
 * @copyright Copyright &copy; Sergey Rusakov, 2015
 * @version   1.0
 */

namespace srusakov\activeresponse;


/**
 * Asset bundle for ActiveResponse
 *
 * @see http://github.com/srusakov/yii2-activeresponse
 * @since 1.0
 */
class ActiveResponseAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/srusakov/yii2-activeresponse/assets';
    public $js = [
        'js/activeresponse.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
    ];
    public $publishOptions = [
        'forceCopy' => true,
    ];
}
