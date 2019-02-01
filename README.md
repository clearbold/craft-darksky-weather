# Dark Sky Weather for Craft 3
A Craft plugin to display weather data from the Dark Sky API.

You can set your Dark Sky API key in the plugin's settings via the Control Panel.

<p><strong>Note</strong> that, per Dark Sky&rsquo;s <a href="https://darksky.net/dev/docs/terms#attribution">Terms of Service</a>:</p>
<p>&ldquo;You are required to display the message &ldquo;Powered by Dark Sky&rdquo; that links to <a href="https://darksky.net/poweredby">https://darksky.net/poweredby</a> somewhere prominent in your app or service.&rdquo;</p>
<p>You are responsible for any Dark Sky fees per Dark Sky&rsquo;s Terms of Service.</p>

## Usage
```
{# See https://darksky.net/dev/docs#request-parameters #}
{% set weather = craft.darksky.forecast(entry.latitudeField, entry.longitudeField) %}
{% set weather = craft.darksky.forecast(37.8267, -122.4233) %}
{% set weather = craft.darksky.forecast(44.2741865, -72.6037392, 'en', 'us') %}}
{% set weather = craft.darksky.forecast(44.2741865, -72.6037392) %}
    <dl>
        <dt>Latitude</dt>
        <dd>{{ weather.latitude }}</dd>
        <dt>Longitude</dt>
        <dd>{{ weather.longitude }}</dd>
        <dt>Timezone</dt>
        <dd>{{ weather.timezone }}</dd>
    </dl>
    <h2>Currently:</h2>
    <dl>
        <dt>Time</dt>
        <dd>{{ weather.currently.time|datetime }}</dd>
        <dt>Summary</dt>
        <dd>{{ weather.currently.summary }}</dd>
        <dt>Icon</dt>
        <dd>{{ weather.currently.icon }}</dd>
        <dt>Nearest Storm Distance</dt>
        <dd>{{ weather.currently.nearestStormDistance }}</dd>
        <dt>Precipitation Intensity</dt>
        <dd>{{ (weather.currently.precipIntensity is defined) ? weather.currently.precipIntensity : 'NA' }}</dd>
        <dt>Precipitation Intensity Error</dt>
        <dd>{{ (weather.currently.precipIntensityError is defined) ? weather.currently.precipIntensityError : 'NA' }}</dd>
        <dt>Precipitation Probability</dt>
        <dd>{{ weather.currently.precipProbability }}</dd>
        <dt>Precipitation Type</dt>
        <dd>{{ (weather.currently.precipType is defined) ? weather.currently.precipType : 'NA' }}</dd>
        <dt>Temperature</dt>
        <dd>{{ weather.currently.temperature }}</dd>
        <dt>Apparent Temperature</dt>
        <dd>{{ weather.currently.apparentTemperature }}</dd>
        <dt>Dewpoint</dt>
        <dd>{{ weather.currently.dewPoint }}</dd>
        <dt>Humidity</dt>
        <dd>{{ weather.currently.humidity }}</dd>
        <dt>Pressure</dt>
        <dd>{{ weather.currently.pressure }}</dd>
        <dt>Wind Speed</dt>
        <dd>{{ weather.currently.windSpeed }}</dd>
        <dt>Wind Gust</dt>
        <dd>{{ weather.currently.windGust }}</dd>
        <dt>Wind Bearing</dt>
        <dd>{{ weather.currently.windBearing }}</dd>
        <dt>Cloud Cover</dt>
        <dd>{{ weather.currently.cloudCover }}</dd>
        <dt>UV Index</dt>
        <dd>{{ weather.currently.uvIndex }}</dd>
        <dt>Visibility</dt>
        <dd>{{ weather.currently.visibility }}</dd>
        <dt>Ozone</dt>
        <dd>{{ weather.currently.ozone }}</dd>
    </dl>
    <h2>Minutely:</h2>
    <dl>
        <dt>Length</dt>
        <dd>{{ weather.minutely.data|length }}
        <dt>Summary</dt>
        <dd>{{ weather.minutely.summary }}</dd>
        <dt>Icon</dt>
        <dd>{{ weather.minutely.icon }}</dd>
{% for minute in weather.minutely.data %}
        <dt>Minute</dt>
        <dd>{{ loop.index0 }}</dd>
        <dt>Time</dt>
        <dd>{{ minute.time|datetime }}</dd>
        <dt>Precipitation Intensity</dt>
        <dd>{{ (minute.precipIntensity is defined) ? minute.precipIntensity : 'NA' }}</dd>
        <dt>Precipitation Intensity Error</dt>
        <dd>{{ (minute.precipIntensityError is defined) ? minute.precipIntensityError : 'NA' }}</dd>
        <dt>Precipitation Probability</dt>
        <dd>{{ minute.precipProbability }}</dd>
        <dt>Precipitation Type</dt>
        <dd>{{ (minute.precipType is defined) ? minute.precipType : 'NA' }}</dd>
{% endfor %}
    </dl>
    <h2>Hourly:</h2>
    <dl>
        <dt>Length</dt>
        <dd>{{ weather.hourly.data|length }}</dd>
        <dt>Summary</dt>
        <dd>{{ weather.hourly.summary }}</dd>
        <dt>Icon</dt>
        <dd>{{ weather.hourly.icon }}</dd>
{% for hour in weather.hourly.data %}
        <dt>Hour</dt>
        <dd>{{ loop.index0 }}</dd>
        <dt>Time</dt>
        <dd>{{ hour.time|datetime }}</dd>
        <dt>Summary</dt>
        <dd>{{ hour.summary }}</dd>
        <dt>Icon</dt>
        <dd>{{ hour.icon }}</dd>
        <dt>Precipitation Intensity</dt>
        <dd>{{ (hour.precipIntensity is defined) ? hour.precipIntensity : 'NA' }}</dd>
        <dt>Precipitation Intensity Error</dt>
        <dd>{{ (hour.precipIntensityError is defined) ? hour.precipIntensityError : 'NA' }}</dd>
        <dt>Precipitation Probability</dt>
        <dd>{{ hour.precipProbability }}</dd>
        <dt>Precipitation Type</dt>
        <dd>{{ (hour.precipType is defined) ? hour.precipType : 'NA' }}</dd>
        <dt>Temperature</dt>
        <dd>{{ hour.temperature }}</dd>
        <dt>Apparent Temperature</dt>
        <dd>{{ hour.apparentTemperature }}</dd>
        <dt>Dewpoint</dt>
        <dd>{{ hour.dewPoint }}</dd>
        <dt>Humidity</dt>
        <dd>{{ hour.humidity }}</dd>
        <dt>Pressure</dt>
        <dd>{{ hour.pressure }}</dd>
        <dt>Wind Speed</dt>
        <dd>{{ hour.windSpeed }}</dd>
        <dt>Wind Gust</dt>
        <dd>{{ hour.windGust }}</dd>
        <dt>Wind Bearing</dt>
        <dd>{{ hour.windBearing }}</dd>
        <dt>Cloud Cover</dt>
        <dd>{{ hour.cloudCover }}</dd>
        <dt>UV Index</dt>
        <dd>{{ hour.uvIndex }}</dd>
        <dt>Visibility</dt>
        <dd>{{ hour.visibility }}</dd>
        <dt>Ozone</dt>
        <dd>{{ hour.ozone }}</dd>
{% endfor %}
    </dl>
    <h2>Daily:</h2>
    <dl>
        <dt>Length</dt>
        <dd>{{ weather.daily.data|length }}</dd>
        <dt>Summary</dt>
        <dd>{{ weather.daily.summary }}</dd>
        <dt>Icon</dt>
        <dd>{{ weather.daily.icon }}</dd>
{% for day in weather.daily.data %}
        <dt>Hour</dt>
        <dd>{{ loop.index0 }}</dd>
        <dt>Time</dt>
        <dd>{{ day.time|datetime }}</dd>
        <dt>Summary</dt>
        <dd>{{ day.summary }}</dd>
        <dt>Icon</dt>
        <dd>{{ day.icon }}</dd>
        <dt>Sunrise</dt>
        <dd>{{ day.sunriseTime|datetime }}</dd>
        <dt>Sunset</dt>
        <dd>{{ day.sunsetTime|datetime }}</dd>
        <dt>Moon Phase</dt>
        <dd>{{ day.moonPhase }}</dd>
        <dt>Precipitation Intensity</dt>
        <dd>{{ (day.precipIntensity is defined) ? day.precipIntensity : 'NA' }}</dd>
        <dt>Precipitation Intensity Max</dt>
        <dd>{{ (day.precipIntensityMax is defined) ? day.precipIntensityMax : 'NA' }}</dd>
        <dt>Precipitation Intensity Max Time</dt>
        <dd>{{ (day.precipIntensityMaxTime is defined) ? day.precipIntensityMaxTime : 'NA' }}</dd>
        <dt>Precipitation Intensity Error</dt>
        <dd>{{ (day.precipIntensityError is defined) ? day.precipIntensityError : 'NA' }}</dd>
        <dt>Precipitation Probability</dt>
        <dd>{{ day.precipProbability }}</dd>
        <dt>Precipitation Type</dt>
        <dd>{{ (day.precipType is defined) ? day.precipType : 'NA' }}</dd>

        <dt>Temperature High</dt>
        <dd>{{ day.temperatureHigh }}</dd>
        <dt>Temperature High Time</dt>
        <dd>{{ day.temperatureHighTime|datetime }}</dd>
        <dt>Temperature Low</dt>
        <dd>{{ day.temperatureLow }}</dd>
        <dt>Temperature Low Time</dt>
        <dd>{{ day.temperatureLowTime|datetime }}</dd>

        <dt>Apparent Temperature High</dt>
        <dd>{{ day.apparentTemperatureHigh }}</dd>
        <dt>Apparent Temperature High Time</dt>
        <dd>{{ day.apparentTemperatureHighTime|datetime }}</dd>
        <dt>Apparent Temperature Low</dt>
        <dd>{{ day.apparentTemperatureLow }}</dd>
        <dt>Apparent Temperature Low Time</dt>
        <dd>{{ day.apparentTemperatureLowTime|datetime }}</dd>

        <dt>Dewpoint</dt>
        <dd>{{ day.dewPoint }}</dd>
        <dt>Humidity</dt>
        <dd>{{ day.humidity }}</dd>
        <dt>Pressure</dt>
        <dd>{{ day.pressure }}</dd>
        <dt>Wind Speed</dt>
        <dd>{{ day.windSpeed }}</dd>
        <dt>Wind Gust</dt>
        <dd>{{ day.windGust }}</dd>
        <dt>Wind Bearing</dt>
        <dd>{{ day.windBearing }}</dd>
        <dt>Cloud Cover</dt>
        <dd>{{ day.cloudCover }}</dd>
        <dt>UV Index</dt>
        <dd>{{ day.uvIndex }}</dd>
        <dt>Visibility</dt>
        <dd>{{ day.visibility }}</dd>
        <dt>Ozone</dt>
        <dd>{{ day.ozone }}</dd>

        <dt>Temperature Min</dt>
        <dd>{{ day.temperatureMin }}</dd>
        <dt>Temperature Min Time</dt>
        <dd>{{ day.temperatureMinTime|datetime }}</dd>
        <dt>Temperature Max</dt>
        <dd>{{ day.temperatureMax }}</dd>
        <dt>Temperature Max Time</dt>
        <dd>{{ day.temperatureMaxTime|datetime }}</dd>
        <dt>Apparent Temperature Min</dt>
        <dd>{{ day.apparentTemperatureMin }}</dd>
        <dt>Apparent Temperature Min Time</dt>
        <dd>{{ day.apparentTemperatureMinTime|datetime }}</dd>
        <dt>Apparent Temperature Max</dt>
        <dd>{{ day.apparentTemperatureMax }}</dd>
        <dt>Apparent Temperature Max Time</dt>
        <dd>{{ day.apparentTemperatureMaxTime|datetime }}</dd>
{% endfor %}
    </dl>
{% if weather.alerts|length %}
    <h2>Alerts</h2>
    <dl>
        <dt>Length</dt>
        <dd>{{ weather.alerts|length }}</dd>
{% for alert in weather.alerts %}
        <dt>Alert</dt>
        <dd>{{ loop.index0 }}</dd>
        <dt>{{ alert.title }}</dt>
{% for region in alert.regions %}
        <dt>Region</dt>
        <dd>{{ region }}
{% endfor %}
        <dt>Severity</dt>
        <dd>{{ alert.severity }}</dd>
        <dt>Time</dt>
        <dd>{{ alert.time|datetime }}</dd>
        <dt>Expires</dt>
        <dd>{{ alert.expires }}</dd>
        <dt>Description</dt>
        <dd>{{ alert.description }}</dd>
        <dt>URI</dt>
        <dd>{{ alert.uri }}</dd>
{% endfor %}
    </dl>
{% endif %}
    <h2>Flags</h2>
    <dl>
{% for source in weather.flags.sources %}
        <dt>Source</dt>
        <dd>{{ source }}</dd>
{% endfor %}
        <dt>Nearest Station</dt>
        <dd>{{ attribute(weather.flags, 'nearest-station') }}</dd>
        <dt>Units</dt>
        <dd>{{ weather.flags.units }}</dd>
    </dl>
    <h2>Offset</h2>
    <dl>
        <dt>Offset</dt>
        <dd>{{ weather.offset }}</dd>
    </dl>
```