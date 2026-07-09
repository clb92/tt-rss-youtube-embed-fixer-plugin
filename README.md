# Plugin to fix YouTube embeds in TT-RSS
A simple plugin to fix error 153 in youtube embeds in TT-RSS

I was getting YouTube's Error 153 on almost all youtube embeds in my feeds. This plugin hooks into the sanitize hook and adds the needed referrer policy to the iframe. It also takes over the functionality of the bundled "af_youtube_embeds" plugin (since my plugin couldn't fix those other plugin-created embed iframes for some reason).

**Notice: I happen to be using an ancient version of TT-RSS, and I don't know if this works in newer TT-RSS versions.** Try it and report back, I guess?

## Installation

1. Go into your `plugins.local` directory and create a new dir `af_youtube_referrer`
2. Copy the `init.php` file into the `plugins.local/af_youtube_referrer/` directory.
3. Enable the plugin in TT-RSS

## Disclaimer

LLM/AI was used to create this and to help me debug my problem initially.

Everything here is provided as-is, and I'm not responsible for anything going wrong or not working.

## License

### MIT License

Copyright (c) 2026 clb92

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
