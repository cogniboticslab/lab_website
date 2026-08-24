<?php
    // Block direct access
    if (basename($_SERVER['PHP_SELF']) === 'config.php') {
        http_response_code(403);
        exit('Forbidden');
    }

    define('ROOT_PATH', realpath(__DIR__));
    require_once __DIR__ . '/vendor/autoload.php';

    use Symfony\Component\Yaml\Yaml;

    /**
     * Load a YAML file without ever taking the whole page down.
     * Returns [] when the file is missing, empty or malformed.
     */
    function load_yaml(string $path): array
    {
        if (!is_file($path) || !is_readable($path)) {
            error_log('load_yaml: missing or unreadable file ' . $path);
            return [];
        }
        try {
            $data = Yaml::parseFile($path);
        } catch (\Throwable $e) {
            error_log('load_yaml: cannot parse ' . $path . ' - ' . $e->getMessage());
            return [];
        }
        return is_array($data) ? $data : [];
    }

    /** Escape a value for safe HTML output. */
    function e($value): string
    {
        return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    /**
     * For YAML fields that intentionally contain a little inline markup
     * (news entries, member bios). Keeps a short tag allowlist and strips
     * event handlers and script-ish URLs.
     */
    function rich($value): string
    {
        $html = strip_tags((string) ($value ?? ''), '<a><b><strong><i><em><br><sup><sub><code>');
        $html = preg_replace('/\son[a-z]+\s*=\s*("[^"]*"|\'[^\']*\'|[^\s>]+)/i', '', $html);
        $html = preg_replace('/(href\s*=\s*["\']?)\s*(?:javascript|data|vbscript)\s*:/i', '$1#', $html);
        return $html;
    }

    /**
     * YAML sometimes holds a bare host ("www.linkedin.com/in/..."), which a
     * browser would treat as a relative path. Give it a scheme.
     */
    function link_url($value): string
    {
        $url = trim((string) ($value ?? ''));
        if ($url === '' || $url === '#') {
            return '';
        }
        if (!preg_match('~^(https?:|mailto:|/)~i', $url)) {
            $url = 'https://' . $url;
        }
        return $url;
    }

    $config = load_yaml(__DIR__ . '/data/config.yml') + [
        'title'       => 'Cognitive Robotics Lab',
        'description' => '',
        'university'  => 'University of Arkansas',
    ];
