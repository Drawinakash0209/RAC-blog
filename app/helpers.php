<?php

use Illuminate\Support\Str;

if (! function_exists('html_excerpt')) {
    /**
     * Convert rich-text HTML into a clean plain-text excerpt, preserving
     * the spacing between block-level elements (p, br, div, li, headings)
     * so stripped tags don't leave words mashed together.
     */
    function html_excerpt(?string $html, int $limit = 50, string $end = '...'): string
    {
        if (! $html) {
            return '';
        }

        $html = str_ireplace(['<br>', '<br/>', '<br />'], ' ', $html);
        $html = preg_replace('/<\/[a-z0-9]+>/i', '$0 ', $html);

        $text = strip_tags($html);
        $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
        $text = trim(preg_replace('/\s+/', ' ', $text));

        return Str::limit($text, $limit, $end);
    }
}
