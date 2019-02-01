<?php
/**
 * @link      https://github.com/clearbold/craft-darksky-weather
 * @copyright Copyright (c) Clearbold, LLC
 */

namespace clearbold\darksky;

use clearbold\darksky\models\Settings;
use clearbold\darksky\services\DarkskyService;
use clearbold\darksky\variables\DarkskyVariable;

use Craft;
use craft\base\Plugin;
use clearbold\darksky\twig\TwigExtensions;
use craft\web\twig\variables\CraftVariable;
use yii\base\Event;

/**
 * Darksky
 *
 * @author Mark Reeves, Clearbold, LLC <hello@clearbold.com>
 * @since 0.1
 */
class Darksky extends Plugin
{
    public $hasCpSettings = true;
    public static $plugin;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$plugin = $this;

        $this->setComponents([
            'darksky' => DarkskyService::class,
        ]);

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('darksky', DarkskyVariable::class);
            }
        );

        Craft::info(
            Craft::t(
                'darksky',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    protected function createSettingsModel()
    {
        return new \clearbold\cmservice\models\Settings();
    }

    protected function settingsHtml()
    {
        return Craft::$app->getView()->renderTemplate('darksky/settings', [
            'settings' => $this->getSettings()
        ]);
    }
}
