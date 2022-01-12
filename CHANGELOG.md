# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/) ([Spanish version](https://keepachangelog.com/es-ES/1.0.0/)),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html) (or at least I'll try to).

### [Unreleased]
- ~~Better way to organize SASS files.~~
- Better support for Guetenberg editor styles
- Live Demo
- ~~Start using @use and @fordward instead of @import (depracated) in SASS~~
- ~~Support for Kadence Blocks plugin~~.
- ~~Highlight link on main menu~~.

#### [1.0.6](https://github.com/LuisColome/the-dock/releases/tag/v1.0.6) - 2022-01-11
#### Fixed
- Border radius on image in Media and Text block, when the image is marked to fill the content.

#### [1.0.6](https://github.com/LuisColome/the-dock/releases/tag/v1.0.6) - 2022-01-11
#### Added
- Space between entry and footer
- General editor styles in separate file
- Editor styles to scss folder
- Code block styles
- List styles to _typography.scss
#### Updated
- Gitignore
- Margins on headings
- Style for blockquote and pullquote block
- Close mobile menu when clicking outside of it
- Fixed site header size on scrolling down
#### Fixed
- Submenu arrow icons
- Font sizes on Gutenberg paragraph variations
- Arrows on parent links on mobile 
#### Removed
- Non needed files
- Entry-content file from list on functions.php
- Entry-content file due to outdated code
- Index.scss file due to not used at the moment

#### [1.0.5.1](https://github.com/LuisColome/the-dock/releases/tag/v1.0.5.1) - 2021-09-24
#### Fix
- Padding on secondary buttons (outlined)
- Color variables conflict with brand-color funciton.

#### [1.0.5](https://github.com/LuisColome/the-dock/releases/tag/v1.0.5) - 2021-09-21
#### Update
- Responsive typography with clamp().

#### [1.0.4.2](https://github.com/LuisColome/the-dock/releases/tag/v1.0.4.2) - 2021-09-10
#### Add
- Kadence block support on full width by removing the internal margin (padding).

#### [1.0.4.1] - 2021-04-26
#### Changed
- Stop using `_index.scs` files to call the SCSS partials (for now). Instead, use @use for every individual file. 

#### [1.0.4] - 2021-04-26
#### Changed
- Better way to organize SASS files. Following the 7:1 Sass rule, adapted to the way I work with Genesis Child Themes. 
- Start using @use and @forward Sass rules.
#### Remove
- @import Sass rule depracated.

#### [1.0.3] - 2021-04-20
#### Changed
- Gutenberg font sizes now not only apply to paragraphs.
#### Added
- Support for Contact Form 7. Remove the p tag from the CF7 code and only loads the CSS, JS and Google Reacptcha where CF7 shortcode is used.
- Check list style. Just add .check-list class on List Gutenberg Block.
- Two new icons. Chevron Bottom and Chevron Right.
- Support for Genesis featured images on single posts. 

#### [1.0.2] - 2021-04-12
#### Changed
- Improve mobile responsive menu. Added a nav header for responsive navigation with an option to negative site logo.
- Improve post comments form with CSS grid.
#### Added
- Support for Custom Genesis logo. Still have the option for a full custom logo in [inc/site-logo.php](./inc/site-logo.php).
#### Remove
- Default Google fonts. Using system's by default.  

#### [1.0.1] - 2021-04-10
#### Changed
- Improve support for Contact Form 7 forms.

#### [1.0.0] - 2021-03-11
#### Added
- Inicial upload.