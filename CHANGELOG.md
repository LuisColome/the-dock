# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/) ([Spanish version](https://keepachangelog.com/es-ES/1.0.0/)),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html) (or at least I'll try to).

## [Unreleased]
- ~~Better way to organize SASS files.~~
- Better support for Guetenberg editor styles.
- Live Demo.
- ~~Start using @use and @fordward instead of @import (depracated) in SASS.~~
- Support for Genesis Block plugin.

## [1.0.4] - 2021-04-26
### Changed
- Better way to organize SASS files. Following the 7:1 Sass rule, adapted to the way I work with Genesis Child Themes. 
- Start using @use and @forward Sass rules.
### Remove
- @import Sass rule depracated.

## [1.0.3] - 2021-04-20
### Changed
- Gutenberg font sizes now not only apply to paragraphs.
### Added
- Support for Contact Form 7. Remove the p tag from the CF7 code and only loads the CSS, JS and Google Reacptcha where CF7 shortcode is used.
- Check list style. Just add .check-list class on List Gutenberg Block.
- Two new icons. Chevron Bottom and Chevron Right.
- Support for Genesis featured images on single posts. 

## [1.0.2] - 2021-04-12
### Changed
- Improve mobile responsive menu. Added a nav header for responsive navigation with an option to negative site logo.
- Improve post comments form with CSS grid.
### Added
- Support for Custom Genesis logo. Still have the option for a full custom logo in [inc/site-logo.php](./inc/site-logo.php).
### Remove
- Default Google fonts. Using system's by default.  

## [1.0.1] - 2021-04-10
### Changed
- Improve support for Contact Form 7 forms.

## [1.0.0] - 2021-03-11
### Added
- Inicial upload.