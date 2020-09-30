<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
if (!session_id()) {
    session_start();

    if (empty($_SESSION['sessionVariables'])) {
        $_SESSION['sessionVariables'] = array();
    }
}

if (!empty($_GET['action']) && $_GET['action'] == 'download') {
    header('Content-Type: text/css');
    header('Content-Disposition: attachment; filename="theme-base.less"');
    
    foreach ($_SESSION['sessionVariables'] as $var => $hex) {
        echo "$var: $hex\n";
    }
    exit;
}

if ((!empty($_POST['action']) && $_POST['action'] == 'reset') || (empty($_SESSION['lessFileLoaded'])
        || !file_exists('theme-variables.less') || !file_exists('theme.less') || !file_exists('theme-base.less'))) {
    copy('../theme/theme-variables.less', 'theme-variables.less');
    copy('../theme/theme.less', 'theme.less');
    copy('../theme/theme-base.less', 'theme-base.less');
    $_SESSION['lessFileLoaded'] = true;
    $_SESSION['sessionVariables'] = array();
}

$allowedVariables = array(
    '@gray',
    '@brand-primary',
    '@brand-secondary',
    '@brand-tertiary',
    '@brand-success',
    '@brand-warning',
    '@brand-danger',
    '@brand-danger-alt',
    '@brand-info',
    '@brand-online',
    '@brand-highlight'
);

require 'lessc.inc.php';

class ColorPicker extends lessc {

    private $data;
    private static $colorPicker = null;

    public function __construct() {
        parent::__construct();
        $this->data = array();
    }

    public static function getColorPicker() {

        if (!self::$colorPicker) {
            self::$colorPicker = new ColorPicker();
        }

        return self::$colorPicker;
    }

    function getData() {
        return $this->data;
    }

    function getAllVariables() {

        if (file_exists('theme-variables.less')) {

            $allVariables = array();
            $wholeFile = array();
            $wholeFile = file("theme-variables.less");
            global $allowedVariables;

            foreach ($wholeFile as $line) {

                if ($line[0] == '@') {
                    $elements = array();
                    $elements = explode(":", $line);

                    $colorHex = array();
                    $colorHex = explode(";", $elements[1]);
                    $colorHex[0] = trim($colorHex[0]);

                    if (preg_match('/^#([a-fA-F0-9]){3}(([a-fA-F0-9]){3})?\b/',
                                    $colorHex[0]) || in_array($elements[0],
                                    $allowedVariables)) {
                        $hex = array();

                        preg_match('/^#([a-fA-F0-9]){3}(([a-fA-F0-9]){3})?\b/',
                                $colorHex[0], $hex);

                        if ($hex && in_array($elements[0], $allowedVariables)) {
                            array_push($allVariables,
                                    array('label' => $elements[0], 'hex' => $hex[0]));
                        } else if (in_array($elements[0], $allowedVariables)) {
                            array_push($allVariables,
                                    array('label' => $elements[0], 'hex' => $colorHex[0]));
                        }
                    }
                }
            }
            $this->data['allVariables'] = $allVariables;
            $this->data['success'] = "success";
        } else {
            $this->data['error'] = "theme-variables.less could not be found";
        }
    }

    function changeVariable() {

        $variableName = $_POST['selectedOption'];
        $color = $_POST['color'];
        $file = fopen("theme-variables.less", "r+");
        $thisLine = 0;
        $previousLine = 0;
        while (!feof($file)) {
            $line = fgets($file, 4046);
            $thisLine = ftell($file);
            if ($line) {
                if ($line[0] === '@') {
                    $elements = array();
                    $elements = explode(":", $line);
                    if ($elements[0] === $variableName) {
                        $newLine = $elements[0] . ": #" . $color . ";";

                        $_SESSION['sessionVariables'][$elements[0]] = '#' . $color . ';';

                        fseek($file, $previousLine);
                        fwrite($file, $newLine . "//");
                        $this->data['success'] = "success";
                    }
                }
                $previousLine = $thisLine;
            }
        }
        fclose($file);
        $parser = new Less_Parser();
        $parser->parseFile(dirname(__FILE__) . '/theme.less', '/colorPicker/');
        $css = $parser->getCss();
        file_put_contents('theme.css', $css);

        $parser = new Less_Parser();
        $parser->parseFile(dirname(__FILE__) . '/theme-base.less',
                '/colorPicker/');
        $css = $parser->getCss();
        file_put_contents('theme-bootstrap.css', $css);
    }

}

$myColorPicker = ColorPicker::getColorPicker();
$variable = $_POST['variable'];

if ($variable == 0) {
    $myColorPicker->getAllVariables();
} elseif ($variable == 1) {
    $myColorPicker->changeVariable();
}

echo json_encode($myColorPicker->getData());
