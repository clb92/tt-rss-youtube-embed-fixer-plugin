<?php
class Af_Youtube_Referrer extends Plugin {

    private array $yt_domains = [
        "youtube.com", "www.youtube.com",
        "youtube-nocookie.com", "www.youtube-nocookie.com",
        "youtu.be"
    ];

    function about() {
        return array(1.0,
            "Fixes YouTube embed Error 153 by adding referrerpolicy to iframes",
            "clb92");
    }

    function init($host) {
        $host->add_hook($host::HOOK_SANITIZE, $this);
        $host->add_hook($host::HOOK_RENDER_ENCLOSURE, $this);
        $host->add_hook($host::HOOK_IFRAME_WHITELISTED, $this);
    }

    // Adds referrerpolicy to any YouTube iframe already present in article content
    function hook_sanitize($doc, $site_url, $allowed_elements, $disallowed_attributes, $article_id) {
        $xpath = new DOMXPath($doc);

        foreach ($xpath->query("//iframe[contains(@src, 'youtube')]") as $node) {
            $node->setAttribute("referrerpolicy", "strict-origin-when-cross-origin");
        }

        return $doc;
    }

    // Lets YouTube iframes survive TT-RSS's default iframe stripping
    function hook_iframe_whitelisted($src) {
        return in_array(strtolower($src), $this->yt_domains, true);
    }

    // Renders a bare YouTube link enclosure as an embedded, referrer-safe player
    function hook_render_enclosure($entry, $id, $rv) {
        $url = $entry["content_url"] ?? "";

        if ($video_id = UrlHelper::url_to_youtube_vid($url)) {
            $embed_url = htmlspecialchars("https://www.youtube.com/embed/$video_id", ENT_QUOTES);

            return "<div class='embed-responsive'>
                        <iframe class='youtube-player' width='640' height='385'
                                src=\"$embed_url\"
                                referrerpolicy='strict-origin-when-cross-origin'
                                frameborder='0' allowfullscreen></iframe>
                    </div>";
        }

        return "";
    }

    function api_version() {
        return 2;
    }
}
