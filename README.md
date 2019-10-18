# Elementor Custom Shapes
WordPress plugin that allows you to add custom shapes dividers to the Elementor page builder.

## Prerequistes :
- Elementor version >= 2.1.0 activated

## Installation instructions
- Upload and activate Elementor Custom Shapes plugin
- Go to Elementor > Custom Shapes menu
- Publish a new Custom Shape : a title and an SVG file as a post thumbnail
- Your new shape will be available in Elementor Sections > Style > Shape divider select

## :warning: Important notes
- You need to allow SVG upload on your WordPress website, for example with the plugin [Safe SVG](https://fr.wordpress.org/plugins/safe-svg/)
- Your SVG files need to be cleaned up (no IDs, no styles), you can use [SVGOMG](https://jakearchibald.github.io/svgomg/) for that
- SVG paths must have CSS class "elementor-shape-fill"

## SVG example
Below an SVG code example:
```
<svg viewBox="0 0 1000 50" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
  <path class="elementor-shape-fill" d="M -0.19 51.146 L 1004.238 50.978 L -0.104 0.112 L -0.19 51.146 Z"/>
</svg>
```