# tt-rss-youtube-embed-fixer-plugin
A simple plugin to fix error 153 in youtube embeds in TT-RSS

I happen to use an ancient version of TT-RSS, and I was getting YouTube's Error 153 on almost all youtube embeds in my feeds. This plugin hooks into the sanitize hook and adds the needed referrer policy to the iframe. It also takes over the functionality of the bundled "af_youtube_embeds" plugin (since my plugin couldn't fix those other plugin-created embed iframes for some reason).

#### DISCLAIMER: AI (Claude Sonnet 5) was used to create this. Everything is provided as-is, and I'm not responsible for anything going wrong or not working.

#### Released under MIT License
