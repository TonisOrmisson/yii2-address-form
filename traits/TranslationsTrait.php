<?php
namespace tonisormisson\addressform\traits;

use yii\i18n\PhpMessageSource;

/**
 * Trait TranslationsTrait
 * @package tonisormisson\addressform\traits
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
trait TranslationsTrait
{
    public function registerTranslations()
    {
        \Yii::$app->i18n->translations['addressform'] = [
            'class' => PhpMessageSource::class,
            'sourceLanguage' => 'en-US',
            'basePath' => __DIR__ . '/messages',
        ];
    }

}