<?php
/**
 * @link      https://github.com/clearbold/craft-campaignmonitor-lists
 * @copyright Copyright (c) Clearbold, LLC
 */

namespace clearbold\darksky\variables;
use clearbold\darksky\Darksky;
use Craft;
/**
 * @author    Mark Reeves
 * @since     0.3
 */
class DarkskyVariable
{
    // Public Methods
    // =========================================================================
    public function forecast(float $latitude, float $longitude, string $lang='en', string $units='us')
    {
        return Darksky::getInstance()->darksky->getForecast($latitude, $longitude, $lang, $units);
    }
}
