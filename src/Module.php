<?php
namespace tonisormisson\addressform;
use tonisormisson\addressform\traits\TranslationsTrait;

/**
 * Class Module
 * @property
 * @package tonisormisson\addressform
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class Module extends \yii\base\Module
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