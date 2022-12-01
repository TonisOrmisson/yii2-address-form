<?php
namespace tonisormisson\addressform;
use tonisormisson\addressform\traits\TranslationsTrait;
use yii\base\Module as BaseModule;

/**
 * Class Module
 * @package tonisormisson\addressform
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class Module extends BaseModule
{
    use TranslationsTrait;
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'tonisormisson\addressform\controllers';
    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }


}