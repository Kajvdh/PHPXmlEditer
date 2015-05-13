<?php

  //Test data, should be fetched from upload form
  $newThemeTitle = "K4j";
  $newThemeDate = "13/05/2015";
  $newThemeVersion = "1.0";
  $newThemeWp = "6.22";
  $newThemeScreenshots = array('screenshot1.jpg','screenshot2.jpg','screenshot3.jpg');

  /** What we want to add between <themes> and </themes>
    <theme>
      <title>K4j</title>
      <date>13/05/2015</data>
      <version>1.0</version>
      <wp>6.22</wp>
      <screenshots>
        <screenshot>screenshot1.jpg</screenshot>
        <screenshot>screenshot2.jpg</screenshot>
        <screenshot>screenshot3.jpg</screenshot>
      </screenshots>
    </theme>
  */

  $xml = simplexml_load_file('Themes.xml');
  $theme = $xml->addChild('theme');
  $theme->addChild('title',$newThemeTitle);
  $theme->addChild('date',$newThemeDate);
  $theme->addChild('version',$newThemeVersion);
  $theme->addChild('wp',$newThemeWp);

  $screenshots = $theme->addChild('screenshots');
  foreach ($newThemeScreenshots as $newThemeScreenshot) {
    $screenshots->addChild('screenshot',$newThemeScreenshot);
  }

  $dom = new DOMDocument('1.0');
  $dom->preserveWhiteSpace = false;
  $dom->formatOutput = true;
  $dom->loadXML($xml->asXml());
  //echo $dom->saveXml();
  $dom->save('ThemesOutput.xml');
?>
