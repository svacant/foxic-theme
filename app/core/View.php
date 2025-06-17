<?php
class View
{
    /**
     * Render a template file. If a matching `.html` template exists, it will
     * be processed using a very small placeholder engine. Otherwise the
     * corresponding `.php` file is included for backward compatibility.
     */
    public static function render(string $template, array $params = []): void
    {
        $base = __DIR__ . '/../views/';
        $htmlFile = $base . $template . '.html';
        $phpFile  = $base . $template . '.php';

        if (file_exists($htmlFile)) {
            $output = file_get_contents($htmlFile);
            echo self::parse($output, $params);
            return;
        }

        if (file_exists($phpFile)) {
            extract($params);
            include $phpFile;
        }
    }

    /**
     * Very small templating engine.
     * Supports variable replacement [[var]] and simple loops
     * [[#items]] ... [[/items]]. Includes can be loaded via [[> partial]].
     */
    private static function parse(string $content, array $params): string
    {
        // includes
        $content = preg_replace_callback('/\[\[>\s*(\w+)\s*\]\]/', function ($m) use ($params) {
            $file = __DIR__ . '/../views/partials/' . $m[1] . '.html';
            if (file_exists($file)) {
                return self::parse(file_get_contents($file), $params);
            }
            return '';
        }, $content);

        // loops
        $content = preg_replace_callback('/\[\[#(\w+)\]\](.*?)\[\[\/\1\]\]/s', function ($m) use ($params) {
            $key = $m[1];
            $inner = $m[2];
            $out = '';
            if (!empty($params[$key]) && is_iterable($params[$key])) {
                foreach ($params[$key] as $item) {
                    $vars = array_merge($params, is_array($item) ? $item : ['.' => $item]);
                    $out .= self::parse($inner, $vars);
                }
            }
            return $out;
        }, $content);

        // variables e.g. [[var]] or [[user.name]]
        $content = preg_replace_callback('/\[\[\s*([\w\.]+)\s*\]\]/', function ($m) use ($params) {
            $keys = explode('.', $m[1]);
            $value = $params;
            foreach ($keys as $k) {
                if (is_array($value) && array_key_exists($k, $value)) {
                    $value = $value[$k];
                } elseif (is_object($value) && isset($value->$k)) {
                    $value = $value->$k;
                } else {
                    return '';
                }
            }
            return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
        }, $content);

        return $content;
    }
}
