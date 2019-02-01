<?php
/**
 * @link      https://github.com/clearbold/craft-darksky-weather
 * @copyright Copyright (c) Clearbold, LLC
 *
 * ...
 *
 */

namespace clearbold\darksky\models;

use clearbold\cmservice\DarkskyService;

use Craft;
use craft\base\Model;

/**
 * @author    Mark Reeves, Clearbold, LLC <hello@clearbold.com>
 * @since     0.1
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $apiKey = null;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['apiKey'], 'string'],
            [['apiKey'], 'required']
        ];
    }
}