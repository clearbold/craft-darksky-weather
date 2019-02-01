<?php
/**
 * @author Mark Reeves, Clearbold, LLC <hello@clearbold.com>
 * @since 0.1
 */

namespace clearbold\darksky\services;

use clearbold\darksky\Darksky;

use Craft;
use craft\base\Component;
use craft\elements\db\EntryQuery;
use craft\elements\Entry;
use yii\base\Event;

/**
 * DarkskyService
 */
class DarkskyService extends Component
{
    // Public Methods
    // =========================================================================
    /*
     * @return mixed
     */
    public function getForecast(float $latitude, float $longitude, string $lang='en', string $units='us')
    {
        $settings = Darksky::$plugin->getSettings();
        $api_key = '';
        $forecastUrl = 'https://api.darksky.net/forecast/';
        $client = new \GuzzleHttp\Client();
        $data = array();

        try {
            $api_key = (string)$settings->apiKey;
            $forecastUrl .= $api_key . '/';
            $forecastUrl .= $latitude . ',' . $longitude;
            $forecastUrl .= '?lang=' . $lang . '&units=' . $units;
            $response = $client->request('GET', $forecastUrl);

            // echo $response->getStatusCode(); # 200
            // echo $response->getHeaderLine('content-type'); # 'application/json; charset=utf8'
            // echo $response->getBody(); # '{"id": 1420053, "name": "guzzle", ...}'

            $data = json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return [
                'success' => false,
                'reason' => ''
            ];
        }

        return $data;
    }
}