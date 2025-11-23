<?php

if (!function_exists('vite_asset')) {
    function vite_asset($entry)
    {
        $manifestPath = base_path('../build/manifest.json');

        if (!file_exists($manifestPath)) {
            throw new Exception("Vite manifest not found at: $manifestPath");
        }

        $manifest = json_decode(file_get_contents($manifestPath), true);

        if (!isset($manifest[$entry])) {
            throw new Exception("Asset not found: $entry");
        }

        return '/build/' . $manifest[$entry]['file'];
    }
}
